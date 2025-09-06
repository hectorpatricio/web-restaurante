<?php

class ControladorPlantilla {

    // Mostrar la plantilla principal
    static public function ctrPlantilla() {
        require_once "views/template.php"; // Asegura una sola inclusión
    }

    static public function ctrBebidas() {
        require_once "views/template.php"; 
    }

    static public function ctrOrden() {
        require_once "views/template.php"; 
    }
}

