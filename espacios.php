<?php
    include("claseBD.php");
    

    class Espacios{
        public $espaciosMensualidad = 10;
        public $espaciosPorHoras = 10;

        public function __contruct(){}

        public function ocupados_PH(){
            $transaccion = new BaseDatos();
            $consultaSQL = "SELECT SUM(estado) as porhoras FROM parqueo 
            INNER JOIN vehiculoparqueo ON vehiculoparqueo.idParqueo_vp = parqueo.idParqueo 
            INNER JOIN vehiculo ON vehiculo.idVehiculo = vehiculoparqueo.idVehiculo_vp 
            WHERE tipoServicio='Por horas'";
            $resultado = $transaccion->buscarBD($consultaSQL);
            return $resultado[0]["porhoras"];
        }

        public function ocupados_M(){
            $transaccion = new BaseDatos();
            $consultaSQL = "SELECT SUM(estado) as mensualidad FROM parqueo 
            INNER JOIN vehiculoparqueo ON vehiculoparqueo.idParqueo_vp = parqueo.idParqueo 
            INNER JOIN vehiculo ON vehiculo.idVehiculo = vehiculoparqueo.idVehiculo_vp 
            WHERE tipoServicio='Mensualidad'";
            $resultado = $transaccion->buscarBD($consultaSQL);
            return $resultado[0]["mensualidad"];
        }
    }

?>