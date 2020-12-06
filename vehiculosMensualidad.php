<?php
    include("claseBD.php");

    if (isset($_POST["botonGuardar"])) {
        $placa = $_POST["placa"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $color = $_POST["color"];
        $nombreConductor = $_POST["nombreConductor"];
        
        $transaccion = new BaseDatos();
        $consultaSQL = "INSERT INTO vehiculo (tipoServicio, placa, marca, modelo, color, nombreConductor) 
        VALUES ('Mensualidad', '$placa', '$marca', '$modelo', '$color', '$nombreConductor')";
        $transaccion->guardarBD($consultaSQL, "agregar");
        header("location:registroVehiculos.php");
    }


?>