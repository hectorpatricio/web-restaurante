<?php 

require_once "conexion.php";

class Orden
{
	static public function ordenIngresarModel($tabla,$idArray,$nombreArray,$cantidadArray,$precioArray,$totalArray,$mesaArray,$categoriaArray,$totalPrice,$rut) 
    {
        $tabla_numero_orden = "tbl_ordenum";
        $conexion = Conexion::conectar(); // Usa la misma conexión
        $stmt = $conexion->prepare("INSERT INTO $tabla_numero_orden (rut_ordenum, estado_ordenum) VALUES (:rut, 1)");
        $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            $lastInsertId = $conexion->lastInsertId();
            echo "El ID recién creado es: " . $lastInsertId;
        } else {
            echo "Error al insertar el dato.";
        }
        
        $stmt->closeCursor();

        for ($i = 0; $i < count($idArray); $i++) 
        { 
            if (trim($categoriaArray[$i]) == 'Comida' || trim($categoriaArray[$i]) == 'Bebidas') 
            {
                $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
                    (`id_platos`, `id_bebidas`, `cantidad_orden`, `precio_orden`, `total_orden`, `mesa_orden`, `nombre_orden`, `usuario_orden`) 
                VALUES 
                    (:id_platos, :id_bebidas, :cantidad, :precio, :total, :mesa, :nombre, :rut)");
                
                // Definir los valores de acuerdo a la categoría
                $id_platos = (trim($categoriaArray[$i]) == 'Comida') ? $idArray[$i] : 0;
                $id_bebidas = (trim($categoriaArray[$i]) == 'Bebidas') ? $idArray[$i] : 0;

                $stmt->bindParam(":id_platos", $id_platos, PDO::PARAM_STR);
                $stmt->bindParam(":id_bebidas", $id_bebidas, PDO::PARAM_STR);
                $stmt->bindParam(":nombre", $nombreArray[$i], PDO::PARAM_STR);
                $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
                $stmt->bindParam(":cantidad", $cantidadArray[$i], PDO::PARAM_STR);
                $stmt->bindParam(":precio", $precioArray[$i], PDO::PARAM_STR);
                $stmt->bindParam(":total", $totalArray[$i], PDO::PARAM_STR);
                $stmt->bindParam(":mesa", $mesaArray[$i], PDO::PARAM_STR);

                $stmt->execute();
                // $resultado = $stmt->fetchAll(); // Guardar el resultado antes de cerrar la conexión
                $stmt->closeCursor(); // Cierra correctamente la consulta
            }
        }
        return true; 
	}
}
?>