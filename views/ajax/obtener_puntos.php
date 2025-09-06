<?php
require('../../models/conexion.php');

function obtenerPuntoEspecifico($id_reporte) {
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar y ejecutar consulta
        $stmt = $conn->prepare("
            SELECT 
                r.titulo, 
                r.id_estadoreporte, 
                r.longitud, 
                r.latitud, 
                DATE_FORMAT(r.fecha_cre_cortes, '%d-%m-%Y') AS fecha_reporte, 
                DATE_FORMAT(r.fecha_cre_cortes, '%H:%i') AS hora_reporte, 
                t.descripcion AS tipo_corte, 
                c.descripcion AS causa_corte, 
                e.descripcion AS estado_corte,
                r.reposicion
            FROM reportes r
            INNER JOIN tipocorte t ON t.id_tipocorte = r.id_tipocorte
            INNER JOIN causacorte c ON c.id_causacorte = r.id_causacorte
            INNER JOIN estadoreporte e ON e.id_estadoreporte = r.id_estadoreporte
            WHERE r.id = :id
        ");
        $stmt->bindParam(':id', $id_reporte, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener los resultados
        $punto = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$punto) {
            throw new Exception('No se encontró ningún reporte con el ID proporcionado.');
        }

        return $punto;

    } catch (Exception $e) {
        throw new Exception('Error al obtener el punto específico: ' . $e->getMessage());
    }
}

function obtenerTodosLosPuntos() {
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar y ejecutar consulta
        $stmt = $conn->prepare("
        SELECT 
                r.titulo, 
                r.id_estadoreporte, 
                r.longitud, 
                r.latitud, 
                DATE_FORMAT(r.fecha_cre_cortes, '%d-%m-%Y') AS fecha_reporte, 
                DATE_FORMAT(r.fecha_cre_cortes, '%H:%i') AS hora_reporte, 
                t.descripcion AS tipo_corte, 
                c.descripcion AS causa_corte, 
                e.descripcion AS estado_corte,
                r.reposicion
            FROM reportes r
            INNER JOIN tipocorte t ON t.id_tipocorte = r.id_tipocorte
            INNER JOIN causacorte c ON c.id_causacorte = r.id_causacorte
            INNER JOIN estadoreporte e ON e.id_estadoreporte = r.id_estadoreporte
        ");
        $stmt->execute();

        // Obtener los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        throw new Exception('Error al obtener todos los puntos: ' . $e->getMessage());
    }
}

// Lógica principal
try {
    // Verificar si el parámetro 'id' está presente
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_reporte = intval($_GET['id']); // Convertir a entero para mayor seguridad
        $resultado = obtenerPuntoEspecifico($id_reporte);
    } else {
        $resultado = obtenerTodosLosPuntos();
    }

    // Enviar respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($resultado);

} catch (Exception $e) {
    // Manejar errores y enviar mensaje JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}

