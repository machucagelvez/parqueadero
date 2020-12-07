<?php

    include("espacios.php");
    date_default_timezone_set("America/Bogota");
    $transaccion = new BaseDatos();           
    $parqueaderos = new Espacios();
    $ocupadosPorHoras = $parqueaderos->ocupados_PH();
    $totalPorHoras = $parqueaderos->espaciosPorHoras;

    //Ingreso de vehículo
    if (isset($_POST["botonIngresar"])) {
        $placa = $_POST["placa"];
        $color = $_POST["color"];
        $fechaIngreso = date_create()->format('Y-m-d H:i:s');

        //Verificar si ya está parqueado
        $consultaSQL = "SELECT SUM(estado) as estado FROM vehiculo 
        INNER JOIN vehiculoparqueo ON vehiculoparqueo.idVehiculo_vp = vehiculo.idVehiculo 
        INNER JOIN parqueo ON parqueo.idParqueo = vehiculoparqueo.idParqueo_vp WHERE placa='$placa'";
        $resultado = $transaccion->buscarBD($consultaSQL);
        $estado = $resultado[0]["estado"];
        if ($estado==0) {      
            //Verificar disponibilidad
            $consultaSQLbuscarplaca = "SELECT tipoServicio FROM vehiculo WHERE placa='$placa'";
            $resultado = $transaccion->buscarBD($consultaSQLbuscarplaca);
            if ((count($resultado)==0 || $resultado[0]["tipoServicio"]=="Por horas") && $ocupadosPorHoras==$totalPorHoras) {
                //echo "No ha espacios disponibles";
                header("location:noDisponible.html");
            }
            else {
                //Ingresar datos tabla parqueo        
                $consultaSQLParqueo = "INSERT INTO parqueo (estado, fechaIngreso) VALUES (1, '$fechaIngreso')";
                $transaccion->guardarBD($consultaSQLParqueo, "agregar");

                //Buscar idParqueo
                $consultaSQLbuscarid = "SELECT idParqueo FROM parqueo WHERE fechaIngreso='$fechaIngreso'";
                $id = $transaccion->buscarBD($consultaSQLbuscarid);
                $idParqueo_vp = $id[0]["idParqueo"];
                
                if (count($resultado)==0) {    
                    //Ingresar datos tabla vehiculo (nuevo por horas)
                    $consultaSQLVehiculo = "INSERT INTO vehiculo(tipoServicio, placa, color) VALUES ('Por horas', '$placa', '$color')";        
                    $transaccion->guardarBD($consultaSQLVehiculo, "agregar");            
                }
                
                //Buscar idVehiculo e insertar los id en tabla vehiculoparqueo
                $consultaSQLbuscarplaca = "SELECT idVehiculo, tipoServicio FROM vehiculo WHERE placa='$placa'";
                $resultado = $transaccion->buscarBD($consultaSQLbuscarplaca);
                $idVehiculo_vp = $resultado[0]["idVehiculo"];
                $consultaSQLVP = "INSERT INTO vehiculoParqueo (idParqueo_vp, idVehiculo_vp) VALUES ($idParqueo_vp, '$idVehiculo_vp')";
                $transaccion->guardarBD($consultaSQLVP, "agregar");

                if ($resultado[0]["tipoServicio"]=="Mensualidad") {
                    header("location:datosVehiculo.php");
                }
                else {
                    header("location:ingresado.html");
                }            
            }
        }
        else {
            header("location:duplicado.html");
        }
    }

    //Salida de Vehículo
    if (isset($_POST["botonSalir"])) {
        $placa = $_POST["placa"];

        //Buscar idParqueo
        $consultaSQLbuscarid = "SELECT idParqueo FROM vehiculo 
        INNER JOIN vehiculoparqueo ON vehiculoparqueo.idVehiculo_vp = vehiculo.idVehiculo 
        INNER JOIN parqueo ON parqueo.idParqueo = vehiculoparqueo.idParqueo_vp WHERE placa='$placa' AND estado=1";
        $resultado = $transaccion->buscarBD($consultaSQLbuscarid);
        $idParqueo = $resultado[0]["idParqueo"];
        $fechaRetiro = date_create();
        $fechaSalida = date_create()->format('Y-m-d H:i:s');

        //Buscar fecha de ingreso
        $consultaSQLbuscarfecha = "SELECT fechaIngreso FROM parqueo WHERE idParqueo='$idParqueo'";
        $resultado = $transaccion->buscarBD($consultaSQLbuscarfecha);
        $fechaIngreso = date_create($resultado[0]["fechaIngreso"]);

        //Calcular duración
        $duracion = date_diff($fechaIngreso, $fechaRetiro)->format('%d días %h horas %i minutos %s segundos');
        $dias = date_diff($fechaIngreso, $fechaRetiro)->format('%d');
        $horas = date_diff($fechaIngreso, $fechaRetiro)->format('%h');
        $minutos = date_diff($fechaIngreso, $fechaRetiro)->format('%i');
        $segundos = date_diff($fechaIngreso, $fechaRetiro)->format('%s');

        //Verificar tipo de servicio
        $consultaSQL = "SELECT tipoServicio FROM vehiculo WHERE placa='$placa'";
        $tipoServicio = $transaccion->buscarBD($consultaSQL);
        $tipoServicio = $tipoServicio[0]["tipoServicio"];

        //Salida si es por mensualidad
        if ($tipoServicio=="Mensualidad") {
            echo $tipoServicio;
            $consultaSQLSalida = "UPDATE parqueo SET estado=0, fechaSalida='$fechaSalida', duracion='$duracion' WHERE idParqueo='$idParqueo'";
            $transaccion->guardarBD($consultaSQLSalida, "actualizar"); 
        }

        //Salida si es por horas
        else {
            $costo = ((1440 * $dias) + ($horas * 60) + $minutos) * 1000;
            if ($segundos>0) {
                $costo = $costo + 1000;
            }
            $consultaSQLSalida = "UPDATE parqueo SET estado=0, fechaSalida='$fechaSalida', duracion='$duracion', costo='$costo' WHERE idParqueo='$idParqueo'";
            $transaccion->guardarBD($consultaSQLSalida, "actualizar"); 
        }
        header("location:mostrarCosto.php");      
    }
?>