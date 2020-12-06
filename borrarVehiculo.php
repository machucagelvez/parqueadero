<?php
    include("claseBD.php");

    $id = $_GET["id"];
    $transaccion = new BaseDatos();
    $consultaSQL = "DELETE FROM vehiculo WHERE idVehiculo='$id'";
    $transaccion->guardarBD($consultaSQL, "eliminar");
    header("location:listadoMensualidad.php");

?>