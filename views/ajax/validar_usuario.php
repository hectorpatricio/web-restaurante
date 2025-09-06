<?php
require_once "../../controllers/usuario.php";
require_once "../../models/usuario.php";

class Ajax{

    public $validarUsuario;

    public function validarUsuarioAjax(){
        $datos = $this->validarUsuario;
        $respuesta = ControladorUsuarios::validarEmailUsuario($datos); 
        echo $respuesta;
    }

    public function validarRutUsuarioAjax(){
        $datos = $this->validarUsuario;
        $respuesta = ControladorUsuarios::validarRutUsuario($datos);
        echo $respuesta;
    }
}

if(isset( $_POST["validarUsuario"])){
    $a = new Ajax();
    $a->validarUsuario = $_POST["validarUsuario"];
    $a->validarUsuarioAjax();
} elseif (isset( $_POST["validarRutUsuario"])){
    $a = new Ajax();
    $a->validarUsuario = $_POST["validarRutUsuario"];
    $a->validarRutUsuarioAjax();
}