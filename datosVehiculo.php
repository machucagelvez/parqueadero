<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso/Salida</title>
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
            $consultaSQL = "SELECT tipoServicio, placa, marca, modelo, color, nombreConductor FROM vehiculo 
                    INNER JOIN vehiculoparqueo ON vehiculoparqueo.idVehiculo_vp = vehiculo.idVehiculo  
                    WHERE idParqueo_vp=(SELECT MAX(idParqueo_vp) FROM vehiculoparqueo)";
            $resultado = $transaccion->buscarBD($consultaSQL);

        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card border-success bg-transparent mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Registro exitoso</h5>
                        <p class="card-text">Tipo de servicio: <?= $resultado[0]["tipoServicio"] ?></p>
                        <p class="card-text">Nombre del conductor: <?= $resultado[0]["nombreConductor"] ?></p>
                        <p class="card-text">Placa: <?= $resultado[0]["placa"] ?></p>
                        <p class="card-text">Marca: <?= $resultado[0]["marca"] ?></p>
                        <p class="card-text">Modelo: <?= $resultado[0]["modelo"] ?></p>
                        <p class="card-text">Color: <?= $resultado[0]["color"] ?></p>

                    </div>
                    <div class="card-footer bg-success border-success"><a href="index.html" class="btn btn-outline-light">Aceptar</a></div>
                </div>
            </div>
        </div>


    </main>

    <footer>

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>