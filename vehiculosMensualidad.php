<?php
    include("claseBD.php");

    if (isset($_POST["botonGuardar"])) {
        $placa = $_POST["placa"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $color = $_POST["color"];
        $nombreConductor = $_POST["nombreConductor"];

        $transaccion = new BaseDatos();

        $consultaSQLbuscarplaca = "SELECT placa FROM vehiculo WHERE placa='$placa'";
        $resultado = $transaccion->buscarBD($consultaSQLbuscarplaca);
        print_r($resultado);
        echo count($resultado);
        $prueba = count($resultado);

        if (count($resultado)==0) {
            echo "agregar";
            $consultaSQL = "INSERT INTO vehiculo (tipoServicio, placa, marca, modelo, color, nombreConductor) 
            VALUES ('Mensualidad', '$placa', '$marca', '$modelo', '$color', '$nombreConductor')";
            $transaccion->guardarBD($consultaSQL, "agregar");
            header("location:registroVehiculos.php");
        }
        else {
            echo "actualizar";
            $consultaSQL = "UPDATE vehiculo SET tipoServicio='Mensualidad', marca='$marca', 
            modelo='$modelo', color='$color', nombreConductor='$nombreConductor' WHERE placa='$placa'";
            $transaccion->guardarBD($consultaSQL, "actualizar");
            header("location:registroVehiculos.php");
        }
        
    }


?>