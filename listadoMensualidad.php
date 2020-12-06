<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos con mensualidad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <header>
    
    </header>

    <main>
        
        <?php
            include("claseBD.php");
            $transaccion = new BaseDatos();
            $consultaSQL = "SELECT * FROM vehiculo WHERE tipoServicio='Mensualidad'";
            $vehiculos = $transaccion->buscarBD($consultaSQL);
        ?>

        <div class="container">
            <h2 class="mb-2 mt-2">LISTADO DE VEHÍCULOS CON MENSUALIDAD</h2>            
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Color</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>        
                    <?php foreach($vehiculos as $vehiculo): ?>            
                    <tr>
                    <th scope="row"><?php echo $vehiculo["idVehiculo"] ?></th>
                    <td><?php echo $vehiculo["nombreConductor"] ?></td>
                    <td><?php echo $vehiculo["placa"] ?></td>
                    <td><?php echo $vehiculo["marca"] ?></td>
                    <td><?php echo $vehiculo["modelo"] ?></td>
                    <td><?php echo $vehiculo["color"] ?></td>
                    <td><a href="borrarVehiculo.php?id=<?= $vehiculo["idVehiculo"] ?>" class="btn btn-danger">Eliminar</a></td>

                    </tr>
                    <?php endforeach ?>            
                </tbody>
            </table>  
            <a href="registrovehiculos.php" class="btn btn-dark">Volver</a>          
        </div>
    </main>

    <footer>
    
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>