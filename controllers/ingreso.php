<?php
ob_start();
class ControladorIngreso
{

    /*=============================================
    INGRESO DE USUARIO
    =============================================*/

    public static function ctrIngresoUsuario()
    {
        if (isset($_POST["ingEmail"])) {

            if (
                filter_var($_POST["ingEmail"], FILTER_VALIDATE_EMAIL) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {

                $encriptar = password_hash($_POST["ingPassword"], PASSWORD_BCRYPT);

                $tabla = "usuarios";
                $item = "email";
                $valor = $_POST["ingEmail"];

                $respuesta = ModeloIngreso::mdlIngresoUsuario($tabla, $item, $valor);
                // show_var($respuesta);exit;
                // if ($respuesta && password_verify($_POST["ingPassword"], $encriptar)) {
                if($respuesta && password_verify($_POST["ingPassword"], $respuesta["password"])){


                    if ($respuesta["activo"] == 1) {

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                        $_SESSION["id_perfil"]  = $respuesta["id_perfil"];
                        $_SESSION["nombre"]     = $respuesta["primer_nombres"];
                        $_SESSION["perfil"]     = $respuesta["des_perfil"];
                        $_SESSION["email"]      = $respuesta["email"];

                        /*=============================================
                        REGISTRAR FECHA PARA SABER EL ULTIMO LOGIN
                        =============================================*/

                        $id_usuario = $respuesta["id_usuario"];
                        
                        $ultimoLogin = ModeloIngreso::mdlActualizarIngreso($tabla, $id_usuario);


                        if ($ultimoLogin == "ok") {
                            
                            header('Location: inicio');
                        }
                    } else {
                        echo '
                        <div class="alert alert-danger" role="alert">
                            <i class="icon-new_releases"></i>Este perfil está desactivado, ya no tienes acceso al sistema.
                        </div>';
                    }
                } else {
                    echo '
                    <div class="alert alert-warning" role="alert">
                        <i class="icon-warning"></i>Email o clave incorrectos.
                    </div>';
                }
            } else {
                echo '
                <div class="alert alert-danger" role="alert">
                    <i class="icon-warning"></i>Datos de entrada no válidos.
                </div>';
            }
        }
    }
}
