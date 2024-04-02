<?php

namespace App\Imports;

use App\Events\ImportProgress;
use App\Models\Promovido;
use App\Models\seccion;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PromovidosImport implements ToModel, WithHeadingRow
{
    private $lideres;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $rowCount = 0; // Variable para mantener el seguimiento del conteo de filas


    public function model(array $row)
    {
        $this->rowCount++; // Incrementar el contador de filas después de procesar la fila actual
        
        $seccion = Seccion::where('seccion', $row['seccion'])->first();
        // Mapear valores de sexo del Excel a la base de datos
        $sexo = strtolower($row['sexo']) === 'hombre' ? 'H' : (strtolower($row['sexo']) === 'mujer' ? 'M' : null);

        // Búsqueda del responsable con comparación más precisa
        $responsableName = $row['promotor'];
        $users = User::all();
        $closestMatch = null;
        $highestSimilarity = 0;

        foreach ($users as $user) {
            similar_text(strtolower($responsableName), strtolower($user->name), $similarity);
            if ($similarity > $highestSimilarity) {
                $closestMatch = $user;
                $highestSimilarity = $similarity;
            }
        }

        $responsable = $closestMatch;

        // Lógica para asignar id_promotor e id_usuario
        $id_usuario = null;
        $id_promotor = null;
        
        if ($responsable) {
            if ($responsable->rol === 'promotor') {
                $id_promotor = $responsable->id;
            } elseif ($responsable->rol === 'responsable' && $responsable->id_seccion == $seccion->id) {
                $id_usuario = $responsable->id;
            }
        }
        // Si el responsable tiene una sección diferente a la del archivo Excel, se asigna como promovido
        if ($responsable && $responsable->id_seccion != $seccion->id) {
            $id_promotor = $responsable->id;
            echo "entro";
        }

        // Se divide el nombre completo en nombre, apellido paterno y apellido materno
        $nombreCompleto = explode(' ', $row['nombre']);

        // Si hay al menos cuatro partes en el nombre completo, asumimos que los dos primeros elementos son los nombres,
        // el tercer elemento es el apellido paterno y el cuarto elemento es el apellido materno
        if (count($nombreCompleto) >= 4) {
            $nombre = $nombreCompleto[0] . ' ' . $nombreCompleto[1]; // Concatenamos los dos primeros elementos como nombre
            $apellido_pat = $nombreCompleto[2]; // El tercer elemento es el apellido paterno
            $apellido_mat = $nombreCompleto[3]; // El cuarto elemento es el apellido materno
        } elseif (count($nombreCompleto) == 3) {
            // Si hay tres partes en el nombre completo, el primer elemento es el primer nombre, el segundo elemento es el segundo nombre
            // el tercer elemento es el apellido paterno y el cuarto elemento es el apellido materno
            $nombre = $nombreCompleto[0]; //asumimos que el primer elemento es el nombre
            $apellido_pat = $nombreCompleto[1]; // El segundo elemento es el apellido paterno
            $apellido_mat = $nombreCompleto[2];; // El tercel elemento es el apellido materno
        } elseif (count($nombreCompleto) == 2) {
            // Si hay dos partes en el nombre completo, asumimos que el primer elemento es el nombre, el segundo elemento es el apellido paterno
            $nombre = $nombreCompleto[0];
            $apellido_pat = $nombreCompleto[1];
            $apellido_mat = null; // No se proporciona el apellido materno
        } else {
            // Si solo hay una parte en el nombre completo, asumimos que es el nombre y los apellidos son nulos
            $nombre = $nombreCompleto[0];
            $apellido_pat = null;
            $apellido_mat = null;
        }


        event(new ImportProgress($this->rowCount));

        return new Promovido([
            'nombre' => $nombre,
            'apellido_pat' => $apellido_pat,
            'apellido_mat' => $apellido_mat,
            'id_seccion' => $seccion->id,
            'localidad_y_domicilio' => $row['direccion'] ?? null,
            'genero' => $sexo,
            'edad' => $row['edad'] ?? null,
            'telefono' => $row['telefono'] ?? null,
            'id_usuario' => $id_usuario,
            'id_promotor' => $id_promotor
        ]);
    }
}
