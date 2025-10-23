<?php

require_once "controllers/templates.php";
require_once "controllers/ingreso.php";
require_once "controllers/usuario.php";
require_once "controllers/platillos.php";
require_once "controllers/bebidas.php";
require_once "controllers/orden.php";
require_once "controllers/informacion.php";

require_once "models/ingreso.php";
require_once "models/usuario.php";
require_once "models/platillos.php";
require_once "models/bebidas.php";
require_once "models/orden.php";
require_once "models/informacion.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

$bebidas = new ControladorBebidas();
$bebidas -> ctrBebidas();

// $orden = new ControladorOrden();
// $orden -> ctrOrden();

$informacion = new ControladorInformacion();
$informacion -> ctrInformacion();