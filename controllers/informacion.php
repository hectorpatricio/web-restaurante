<?php
class ControladorInformacion
{
    static public function ctrInformacion($codigoMesa = null)
    {
        if (!empty($codigoMesa)) 
        {
            $tabla = "tbl_orden";
            $respuesta = Informacion::vistaInformacionModel($tabla, $codigoMesa);
            return $respuesta;
        } 
        else 
        {
            return "lala"; // o return [];
        }
    }
}