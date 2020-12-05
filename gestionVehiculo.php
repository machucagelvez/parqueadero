<?php

    include("claseBD.php");
    date_default_timezone_set("America/Bogota");
    $transaccion = new BaseDatos();

    if (isset($_POST["botonIngresar"])) {
        $placa = $_POST["placa"];
        $color = $_POST["color"];
        $fechaIngreso = date_create()->format('Y-m-d H:i:s');

        $consultaSQLbuscarplaca = "SELECT placa FROM vehiculo WHERE placa='$placa'";
        $resultado = $transaccion->buscarBD($consultaSQLbuscarplaca);
        print_r($resultado);

        //Ingresar datos tabla parqueo        
        $consultaSQLParqueo = "INSERT INTO parqueo (estado, fechaIngreso) VALUES (1, '$fechaIngreso')";
        $transaccion->guardarBD($consultaSQLParqueo, "agregar");

        //Buscar idParqueo
        $consultaSQLbuscarid = "SELECT idParqueo FROM parqueo WHERE fechaIngreso='$fechaIngreso'";
        $id = $transaccion->buscarBD($consultaSQLbuscarid);
        $idParqueo_vp = $id[0]["idParqueo"];
        
        if (count($resultado)==0) {
            echo "por horas nuevo";      
            //Ingresar datos tabla vehiculo
            $consultaSQLVehiculo = "INSERT INTO vehiculo(idParqueo_vp, tipoServicio, placa, color) VALUES ('$idParqueo_vp', 'Por horas', '$placa', '$color')";        
            $transaccion->guardarBD($consultaSQLVehiculo, "agregar");
        }
                
        else {
            echo "por horas antiguo";
            $consultaSQLVehiculo = "UPDATE vehiculo SET idParqueo_vp='$idParqueo_vp', color='$color' WHERE placa='$placa'";
            $transaccion->guardarBD($consultaSQLVehiculo, "agregar");        
        }        
    }

    if (isset($_POST["botonSalir"])) {
        $placa = $_POST["placa"];

        $consultaSQLbuscarid = "SELECT idParqueo FROM vehiculo INNER JOIN parqueo ON parqueo.idParqueo = vehiculo.idParqueo_vp WHERE placa='$placa'";
        $resultado = $transaccion->buscarBD($consultaSQLbuscarid);
        $idParqueo = $resultado[0]["idParqueo"];
        $fechaSalida = date_create();
        $consultaSQLbuscarfecha = "SELECT fechaIngreso FROM parqueo WHERE idParqueo='$idParqueo'";
        $resultado = $transaccion->buscarBD($consultaSQLbuscarfecha);
        $fechaIngreso = date_create($resultado[0]["fechaIngreso"]);
        $duracion = date_diff($fechaIngreso, $fechaSalida)->format('%d Day %h Hours %i Minute %s Seconds');
        echo $duracion;
        //$consultaSQLSalida = "UPDATE parqueo SET estado=0, fechaSalida='$fechaSalida', duracion='$duracion' WHERE idParqueo='$idParqueo'";
        //$transaccion->guardarBD($consultaSQLSalida, "actualizar");        
    }
    //header("location:index.php");
?>