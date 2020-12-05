<?php

    class BaseDatos{
        public $usuarioBD = "root";
        public $passwordBD = "";

        public function __contruct(){}

        public function conexion(){
            $infoConexionBD = "mysql:host=localhost;dbname=parqueadero";

            try {
                $conexionBD = new PDO($infoConexionBD, $this->usuarioBD, $this->passwordBD);
                //echo "conectado";
                return $conexionBD;
                
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }

        public function guardarBD($consultaSQL, $tipo){
            $conexionBD = $this->conexion();
            $consultaguardarBD = $conexionBD->prepare($consultaSQL);
            $resultado = $consultaguardarBD->execute();
            switch ($tipo) {
                case "agregar":
                    echo "Registro agregado";
                    break;

                case "eliminar":
                    echo "Registro eliminado";
                    break;

                case "actualizar":
                    echo "Registro actualizado";
                    break;
                
                default:
                    echo "Error al agregar/eliminar/actualizar el registro";
                    break;
            }
        }

        public function buscarBD($consultaSQL){
            $conexionBD = $this->conexion();
            $consultaBuscarBD = $conexionBD->prepare($consultaSQL);
            $consultaBuscarBD->setFetchMode(PDO::FETCH_ASSOC);
            $resultado = $consultaBuscarBD->execute();
            return $consultaBuscarBD->fetchAll();

        }
    }

?>