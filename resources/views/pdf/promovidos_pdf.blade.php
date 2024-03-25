<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="table-responsive row">
        <table  id="dataTableExample" class="table table-responsive">
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
                        <td>{{$promovido->seccion_elec}}</td>
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
    
</body>
</html>