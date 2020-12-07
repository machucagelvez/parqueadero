<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disponibilidad</title>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="disponibilidad.php">Disponibilidad</a>
                        </li>
                        <li class="nav-item">
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
            include("espacios.php");            
            $parqueaderos = new Espacios();
            $totalPorHoras = $parqueaderos->espaciosPorHoras;
            $totalMensualidad = $parqueaderos->espaciosMensualidad;
            $ocupadosPorHoras = $parqueaderos->ocupados_PH();
            $ocupadosMensualidad = $parqueaderos->ocupados_M();
            $disponiblesPorHoras = $totalPorHoras - $ocupadosPorHoras;
            $disponibleMensualidad = $totalMensualidad - $ocupadosMensualidad;


        ?>

        <div class="container">
            <h3 class="mb-2 mt-2">INFORMACIÓN DE ESPACIOS DEL PARQUEADERO</h3>            
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Tipo contrato</th>
                    <th scope="col">Ocupados</th>
                    <th scope="col">Disponibles</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>      
                    <tr>
                    <th scope="row">Mensualidad</th>
                    <td><?php echo $ocupadosMensualidad ?></td>
                    <td><?php echo $disponibleMensualidad ?></td>
                    <td><?php echo $totalMensualidad ?></td>
                    </tr>
                </tbody>
                <tbody>      
                    <tr>
                    <th scope="row">Por Horas</th>
                    <td><?php echo $ocupadosPorHoras ?></td>
                    <td><?php echo $disponiblesPorHoras ?></td>
                    <td><?php echo $totalPorHoras ?></td>
                    </tr>
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