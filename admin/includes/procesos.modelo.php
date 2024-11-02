<?php

require_once "conexion.php";

class ProcesosModelo{
    static public function mdListarTiemposProcesos(){
        $stmt= Conexion::conectar()->prepare("CALL prc_ListarTiemposProcesos");
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

}

?>