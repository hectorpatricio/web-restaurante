<?php 

class ControladorOrden
{
    static public function ctrOrden($rut)
    {
        $orderData = $_POST['order_data']; // Recibe el resumen de la orden
        $totalPrice = $_POST['total_price']; // Recibe el precio total

        // show_var($rut);
        // show_var($_POST);

        // Inicializar arrays para cada campo
        $idArray = $nombreArray = $cantidadArray = $precioArray = $totalArray = $mesaArray = $categoriaArray = [];

        // Utilizar expresiones regulares correctamente para extraer los datos
        preg_match_all('/ID:\s*(\d+)/', $orderData, $idArray);
        preg_match_all('/(?<=Nombre:\s)([A-Za-z\s]+)/', $orderData, $nombreArray);
        preg_match_all('/Cantidad:\s*(\d+)/', $orderData, $cantidadArray);
        preg_match_all('/Precio:\s*([\d\.]+)/', $orderData, $precioArray);
        preg_match_all('/Total:\s*([\d\.]+)/', $orderData, $totalArray);
        preg_match_all('/Mesa:\s*(\d+)/', $orderData, $mesaArray);
        preg_match_all('/Categoria:\s*([\w\s]+)/', $orderData, $categoriaArray);

        // Extraer solo los valores encontrados (el segundo elemento de cada array)
        $idArray = $idArray[1];
        $nombreArray = $nombreArray[0]; 
        $cantidadArray = $cantidadArray[1];
        $precioArray = $precioArray[1];
        $totalArray = $totalArray[1];
        $mesaArray = $mesaArray[1];
        $categoriaArray = $categoriaArray[1];
        
        // echo "IDs: " . $idArray[0] . "<br>";
        //  echo "Nombres: " . $nombreArray[0] . "<br>";
        //  exit;
        // echo "Cantidades: " . $cantidadArray[0] . "<br>";
        // echo "Precios: " . $precioArray[0] . "<br>";
        // echo "Totales: " . $totalArray[0] . "<br>";
        // echo "Mesas: " . $mesaArray[0] . "<br>";
        // echo "Categorías: " . $categoriaArray[0] . "<br>";

        $tabla = "tbl_orden";
        $respuesta = Orden::ordenIngresarModel($tabla,$idArray,$nombreArray,$cantidadArray,$precioArray,$totalArray,$mesaArray,$categoriaArray,$totalPrice,$rut);
        return $respuesta;

        // echo "Resumen de la orden:\n" . $orderData;
        // echo "\nPrecio total: $" . $totalPrice;
        // exit;
    }
}