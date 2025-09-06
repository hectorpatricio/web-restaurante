<?php
require('../../models/conexion.php');

// Función para obtener todos los puntos
function obtenerTodosLosAbastecimientos() {
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar y ejecutar consulta
        $stmt = $conn->prepare("
            SELECT 
                id, 
                nombre, 
                descripcion, 
                contacto, 
                latitud, 
                longitud, 
                DATE_FORMAT(fecha_cre, '%d-%m-%Y %H:%i') AS fecha_creacion,
                activo
            FROM abastecimiento
            WHERE activo = 1
        ");
        $stmt->execute();

        // Obtener los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        throw new Exception('Error al obtener todos los puntos: ' . $e->getMessage());
    }
}

// Función para obtener puntos específicos (por id o algún otro parámetro)
function obtenerAbastecimientosEspecificos($id_abastecimiento) {
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar y ejecutar consulta
        $stmt = $conn->prepare("SELECT 
                                    id, 
                                    nombre, 
                                    descripcion, 
                                    contacto, 
                                    latitud, 
                                    longitud, 
                                    DATE_FORMAT(fecha_cre, '%d-%m-%Y %H:%i') AS fecha_creacion,
                                    activo
                                FROM abastecimiento
                                WHERE id = :id AND activo = 1");

        // Bind de parámetros
        $stmt->bindParam(':id', $id_abastecimiento, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener el resultado
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        throw new Exception('Error al obtener el punto específico: ' . $e->getMessage());
    }
}

// Lógica principal
try {
    $resultado = []; // Aseguramos que la variable esté definida

    // Verificar si el parámetro 'id' está presente
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Si el parámetro 'id' está presente, obtener un punto específico
        $id_abastecimiento = intval($_GET['id']); // Convertir a entero para mayor seguridad
        $resultado = obtenerAbastecimientosEspecificos($id_abastecimiento);

    } else {
        // Si no hay parámetro 'id', obtener todos los abastecimientos
        $resultado = obtenerTodosLosAbastecimientos();
    }

    // Enviar respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($resultado);

} catch (Exception $e) {
    // Manejar errores y enviar mensaje JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}
