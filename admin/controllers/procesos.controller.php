<?php
    class ProcesosController{

        static public function ctrListarTiemposProcesos(){
            $respuesta = ProcesosModelo::mdListarTiemposProcesos();

            return $respuesta;
        }
    }
?>