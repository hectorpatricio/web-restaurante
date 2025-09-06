<?php

class ControladorUsuarios
{

    static public function vistaUsuarios()
    {
        $tabla = "usuarios";
        $respuesta = Usuarios::vistaUsuariosModel($tabla);
        return $respuesta;
    }
    static public function ctrlPerfilUsuario($id_cliente)
    {
        $tabla = "usuarios";
        $respuesta = Usuarios::vistaPerfilUsuarioModel($tabla, $id_cliente);
        return $respuesta;
    }

    static public function ctrMostrarPerfil()
    {
        $tabla = "perfil";
        $respuesta = Usuarios::mdlMostrarPerfil($tabla);
        return $respuesta;
    }


    static public function registroClientes(){

        // Verificar si el formulario ha sido enviado
        if(isset($_POST["email_usuario"])){
    
            $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $rut = $_POST["rut_usuario"];
					
            // Eliminar puntos y guiones del RUT
            $rut_sin_puntos = str_replace(['.', '-'], '', $rut);

            // Obtener el dígito verificador
            $digito_verificador = substr($rut_sin_puntos, -1);

            // Obtener los números del RUT (sin el dígito verificador)
            $numeros_rut = substr($rut_sin_puntos, 0, -1);

            // Recoger los datos del formulario
            $datosController = array(
                "id_usuario" => $numeros_rut,
                "digito_rut" => $digito_verificador,
                "nombre" => $_POST["nombre_usuario"],
                "paterno" => $_POST["paterno"],
                "materno" => $_POST["materno"],
                "email" => $_POST["email_usuario"],
                "password" => $encriptar,
                "telefono" => $_POST["telefono_usuario"],
                "direccion" => $_POST["direccion_usuario"]
            );
    
            // Llamar al modelo para registrar los datos
            $respuesta = Usuarios::registroUsuariosModel($datosController, "usuarios");
    
            // Verificar si el registro fue exitoso
            if($respuesta == "success"){
    
                // Mostrar mensaje de éxito con SweetAlert
                echo '<script>
                    swal({
                        title: "¡OK!",
                        text: "¡Has Creado un Nuevo Usuario!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }, function(isConfirm) {
                        if (isConfirm) {
                            window.location = "usuarios";
                        }
                    });
                </script>';
    
            } else {
                var_dump($respuesta); // Mostrar error si ocurre un problema
            }
        }
    }
    

    static public function ctrActualizaUsuario() {
        if (isset($_POST["id_usuario"])) {
            // Validar contraseña
            if (!empty($_POST["password"])) {
                if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {
                    $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                } else {
                    echo '<script>alert("La contraseña no puede llevar caracteres especiales.");</script>';
                    return;
                }
            } else {
                $encriptar = $_POST["passwordActual"];
            }

            $rut = $_POST["id_usuario"];
					
            // Eliminar puntos y guiones del RUT
            $rut_sin_puntos = str_replace(['.', '-'], '', $rut);

            // Obtener el dígito verificador
            $digito_verificador = substr($rut_sin_puntos, -1);

            // Obtener los números del RUT (sin el dígito verificador)
            $numeros_rut = substr($rut_sin_puntos, 0, -1);
    
            $datosController = array(
                "id" => $_POST["id"],
                "id_usuario" => $numeros_rut,
                "digito_rut" => $digito_verificador,
                "nombre" => $_POST["nombre"],
                "paterno" => $_POST["paterno"],
                "materno" => $_POST["materno"],
                "email" => $_POST["email"],
                "telefono" => $_POST["telefono"],
                "direccion" => $_POST["direccion"],
                "id_perfil" => $_POST["id_perfil"],
                "password" => $encriptar
            );
    
            $respuesta = Usuarios::mdlActualizaUsuario($datosController, "usuarios");
    
            if ($respuesta == "success") {
                echo '<script>
                swal({
                    title: "¡OK!",
                    text: "¡Usuario actualizado correctamente.!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                },
                function(isConfirm){
                    if (isConfirm) {	   
                        window.location = "index.php?ruta=usuarioDetalle&cliente=' . $_POST["id"] . '";
                    } 
                });
                </script>';
            } else {
                echo '
                <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Error al actualizar usuario.",
                    footer: "Código de error A0004"
                });
                </script>
            ';
            }
        }
    }
    
    
    static public function validarEmailUsuario($validarUsuario){

        $datosController = $validarUsuario;
    
        $respuesta = Usuarios::mdlEmailUsuario($datosController, "usuarios");
        
        if ($respuesta && count($respuesta) > 0) {
            echo 0;
        }
        else{
            echo 1;
        }
    }

    // ControladorUsuarios
    static public function validarRutUsuario($validarUsuario){
        // Limpiar el RUT: quitar puntos, guion y todo lo que esté después del guion
        $validarUsuario = preg_replace('/[^0-9kK]/', '', $validarUsuario); // Eliminar todos los caracteres que no sean números o 'k'
        
        // Extraer la parte numérica del RUT (todo antes del último carácter)
        $rutNumerico = substr($validarUsuario, 0, -1);

        // Verificar si el RUT limpio está en la base de datos
        $datosController = $rutNumerico;
        $respuesta = Usuarios::mdlRutUsuario($datosController, "usuarios");

        if ($respuesta && count($respuesta) > 0) {
            echo 0; // RUT ya existe
        } else {
            echo 1; // RUT no existe
        }
    }


}
