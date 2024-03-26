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
          width: 80%; /* Modifica el ancho como desees */
          border: 1px solid #ccc;
          border-radius: 8px;
          margin: 0 auto; /* Centra la tabla horizontalmente */
        }

        /* Estilo para las celdas */
        th, td {
            padding: 5px;
            border: 1px solid #ccc;
            text-align: center; /* Centra el contenido de las celdas */
        }

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

    <div >
        <table  id="dataTableExample" >
            <thead>
                <tr>
                    <th>Sección</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
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
                        <td>{{$promovido->nombre}}</td>
                        <td>{{$promovido->apellido_pat}}</td>
                        <td>{{$promovido->apellido_mat}}</td>
                        <td>{{$promovido->localidad_y_domicilio}}</td>
                        <td>{{$promovido->clave_elec}}</td>
                        <td>{{$promovido->telefono}}</td>
                        <td>{{$promovido->lideres->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>