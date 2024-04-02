<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>

        table {
            border-collapse: collapse;
            width: 700px; /* Ancho correspondiente al tamaño de una hoja carta en píxeles (8.5 x 72 ppp) */
            margin: 0 auto;
        }
        th, td {
            padding: 2px; /* Reducir el relleno */
            border: 1px solid #ccc; /* Reducir el tamaño del borde */
            text-align: center;
            font-size: 12px; /* Reducir el tamaño de fuente */
        }
        /* Otros estilos... */

        /* Estilo para las filas impares */
        tr:nth-child(odd) {
          background-color: #f9f9f9;
        }

        /* Estilo para el encabezado */
        th {
          background-color: #F2F2F9;
          font-weight: bold;
        }
    </style>

        <table  id="dataTableExample" >
            <thead>
                <tr>
                    <th>Sección</th>
                    <th>Nombre</th>
                    <th>Localidad y domicilio</th>
                    <th>Clave Elector</th>
                    <th>Telefono</th>
                    <th>Lider</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promovidos as $promovido)
                    <tr>
                        <td>{{$promovido->secciones->seccion}}</td>
                        <td>{{$promovido->nombre}} {{$promovido->apellido_pat}} {{$promovido->apellido_mat}}</td>
                        <td>{{$promovido->localidad_y_domicilio}}</td>
                        <td>{{$promovido->clave_elec}}</td>
                        <td>{{$promovido->telefono}}</td>
                        @if ($promovido->lideres)
                        <td>{{$promovido->lideres->name}}</td>
                        @else
                            <td>Sin asignar</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>