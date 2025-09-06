<?php 
	session_start() ; 
	include 'models/funciones_base.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <title>Hector</title>

    <link rel="shortcut icon" type="image/x-icon" href="views/dist/images/logos/squanchy.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="views/dist/images/logos/squanchy.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="views/dist/images/logos/squanchy.jpg">
    <link href="views/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="views/dist/css/ui.css" rel="stylesheet" type="text/css" />
    <link href="views/dist/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
    <link href="views/dist/css/OverlayScrollbars.css" type="text/css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />


    <!-- Sweet Alert -->
	<link href="views/dist/plugins/sweet-alert2/sweetalert.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    	<!-- Sweet-Alert  -->
	<script src="views/dist/plugins/sweet-alert2/sweetalert.min.js"></script>

    <!-- ################################################################################################################# .STYLE -->
    <style>
        .avatar {
            vertical-align: middle;
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .bg-default,
        .btn-default {
            background-color: #f2f3f8;
        }

        .btn-error {
            color: #ef5f5f;
        }
    </style>
</head>

<body>

	<?php
	if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
		
		include 'views/modules/navs.php';

		if (isset($_GET["ruta"])) {


			if (
				$_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "entrada" || 
                $_GET["ruta"] == "entradadetalle" ||   
				$_GET["ruta"] == "usuarios" ||
				$_GET["ruta"] == "usuarioDetalle" ||
                $_GET["ruta"] == "conf_bebidas_principal" ||
                $_GET["ruta"] == "conf_bebidas_editar" ||
                $_GET["ruta"] == "conf_bebidas_crear" ||
                $_GET["ruta"] == "conf_platos_principal" ||
                $_GET["ruta"] == "conf_platos_editar" ||
                $_GET["ruta"] == "conf_platos_crear" ||
				$_GET["ruta"] == "salir"  
			) {

				include "modules/" . $_GET["ruta"] . ".php";
			} else {

				include "modules/404.php";
			}
		} else {

			include "modules/inicio.php";
		}

	} else {

		include "modules/login.php";
	}

	?>    
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="views/dist/js/OverlayScrollbars.js" type="text/javascript"></script>