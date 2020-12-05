<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    
    <header>
    
    </header>

    <main>

    <div class="container">
            <div class="row justify-content-center mt-2 mb-2">
                <h3 class="text-center">Ingrese los datos del vehículo:</h3>
            </div>
            <form action="gestionVehiculo.php" method="POST">
                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Placa:</label>
                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" name="placa">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Color:</label>
                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" name="color">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-2">
                        <button type="submit" class="btn btn-success btn-block" name="botonIngresar">Ingreso</button>
                    </div>
                    <div class="col-sm-10 col-md-2">
                        <button type="submit" class="btn btn-danger btn-block" name="botonSalir">Salida</button>
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