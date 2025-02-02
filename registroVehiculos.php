<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
                            <a class="nav-link" href="index.html">Ingreso/Salida<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="disponibilidad.php">Disponibilidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listadoParqueo.php">Vehículos Parqueados</a>
                        </li>
                        <li class="nav-item active">
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

    <div class="container">
            <div class="row justify-content-center mt-2 mb-2">
                <h3 class="text-center">Ingrese los datos del vehículo:</h3>
            </div>
            <form action="vehiculosMensualidad.php" method="POST">
                <div class="form-group row justify-content-center">

                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" placeholder="Placa" name="placa">
                    </div>
                </div>
                <div class="form-group row justify-content-center">

                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" placeholder="Marca" name="marca">
                    </div>
                </div>
                <div class="form-group row justify-content-center">

                    <div class="col-sm-10 col-md-4">
                        <input type="number" class="form-control" placeholder="Modelo" name="modelo">
                    </div>
                </div>
                <div class="form-group row justify-content-center">

                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" placeholder="Color" name="color">
                    </div>
                </div>
                <div class="form-group row justify-content-center">

                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" placeholder="Nombre del conductor" name="nombreConductor">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-2">
                        <button type="submit" class="btn btn-success btn-block mb-2" name="botonGuardar">Guardar</button>
                    </div>
                    <div class="col-sm-10 col-md-2">
                    <a href="listadoMensualidad.php" class="btn btn-dark btn-block mb-2">Listado</a>
                    </div>
                </div>                
            </form>
        </div>

    </main>

    <footer>
    
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>