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
        }


        event(new ImportProgress($this->rowCount));

        return new Promovido([
            'nombre' => $row['nombre'],
            'id_seccion' => $seccion->id,
            'domicilio' => $row['direccion'] ?? null,
            'genero' => $sexo,
            'edad' => $row['edad'] ?? null,
            'telefono' => $row['telefono'] ?? null,
            'id_usuario' => $id_usuario,
            'id_promotor' => $id_promotor
        ]);
    }
}
