<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos Parqueados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Ingreso/Salida<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="disponibilidad.php">Disponibilidad</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="listadoParqueo.php">Vehículos Parqueados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registroVehiculos.php">Registro Mensualidad</a>
                        </li>            
                    </ul>
                    <span class="navbar-text">
                        <h4>Parqueadero 2020</h4>
                    </span>
                </div>
            </nav>
        </div>
    </header>

    <main>
        
        <?php
            include("claseBD.php");
            $transaccion = new BaseDatos();
            $consultaSQL = "SELECT idVehiculo, tipoServicio, placa, fechaIngreso FROM vehiculo 
            INNER JOIN vehiculoparqueo ON vehiculoparqueo.idVehiculo_vp = vehiculo.idVehiculo 
            INNER JOIN parqueo ON parqueo.idParqueo = vehiculoparqueo.idParqueo_vp WHERE estado=1";
            $vehiculos = $transaccion->buscarBD($consultaSQL);
        ?>

        <div class="container">
            <h3 class="mb-2 mt-2">LISTADO DE VEHÍCULOS PARQUEADOS</h3>            
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Tipo de servicio</th>
                    <th scope="col">Fecha y hora de ingreso</th>
                    </tr>
                </thead>
                <tbody>        
                    <?php foreach($vehiculos as $vehiculo): ?>            
                    <tr>
                    <th scope="row"><?php echo $vehiculo["idVehiculo"] ?></th>
                    <td><?php echo $vehiculo["placa"] ?></td>
                    <td><?php echo $vehiculo["tipoServicio"] ?></td>
                    <td><?php echo $vehiculo["fechaIngreso"] ?></td>
                    </tr>
                    <?php endforeach ?>            
                </tbody>
            </table>        
        </div>
    </main>

    <footer>
    
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>