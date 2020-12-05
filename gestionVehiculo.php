<?php

    include("claseBD.php");
    date_default_timezone_set("America/Bogota");

    if (isset($_POST["botonIngresar"])) {
        $placa = $_POST["placa"];
        $color = $_POST["color"];
        $fechaIngreso = date_create()->format('Y-m-d H:i:s');

        $transaccion = new BaseDatos();
        $consultaSQLParqueo = "INSERT INTO parqueo (fechaIngreso) VALUES ('$fechaIngreso')";
        $transaccion->guardarBD($consultaSQLParqueo, "agregar");

        $consultaSQLbuscarid = "SELECT idParqueo FROM parqueo WHERE fechaIngreso='$fechaIngreso'";
        $id = $transaccion->buscarBD($consultaSQLbuscarid);
        $idParqueo_vp = $id[0]["idParqueo"];

        $consultaSQLVehiculo = "INSERT INTO vehiculo(idParqueo_vp, placa, color) VALUES ('$idParqueo_vp', '$placa', '$color')";        
        $transaccion->guardarBD($consultaSQLVehiculo, "agregar");
        
        header("location:index.php");
    }

    if (isset($_POST["botonSalir"])) {
        $placa = $_POST["placa"];

        $transaccion = new BaseDatos();
        $consultaSQL = "DELETE FROM vehiculo WHERE placa='$placa'";
        $transaccion->guardarBD($consultaSQL, "eliminar");
        header("location:index.php");
    }

?>