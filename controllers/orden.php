<?php 



class ControladorOrden
{
   static public function ctrOrden($rut = null, $codigoMesa = null)
    {
        $order_data  = $_POST['order_data'] ?? null;
        $total_price = $_POST['total_price'] ?? 0;

        if ($order_data !== null && $total_price != 0) 
        {
            $rut_usuario = $_SESSION["id_usuario"];

            $idArray = $nombreArray = $cantidadArray = $precioArray = $totalArray = $mesaArray = $categoriaArray = [];

            // Expresiones regulares para extraer los datos
            preg_match_all('/ID:\s*(\d+)/', $order_data, $idArray);
            preg_match_all('/(?<=Nombre:\s)([A-Za-z\s]+)/', $order_data, $nombreArray);
            preg_match_all('/Cantidad:\s*(\d+)/', $order_data, $cantidadArray);
            preg_match_all('/Precio:\s*([\d\.]+)/', $order_data, $precioArray);
            preg_match_all('/Total:\s*([\d\.]+)/', $order_data, $totalArray);
            preg_match_all('/Mesa:\s*(\d+)/', $order_data, $mesaArray);
            preg_match_all('/Categoria:\s*([\w\s]+)/', $order_data, $categoriaArray);

            // Extraer solo los valores encontrados
            $idArray = $idArray[1];
            $nombreArray = $nombreArray[0]; 
            $cantidadArray = $cantidadArray[1];
            $precioArray = $precioArray[1];
            $totalArray = $totalArray[1];
            $mesaArray = $mesaArray[1];
            $categoriaArray = $categoriaArray[1];

// Mostrar todos los datos antes de enviarlos al modelo
//TRATAR DE LIMPIAR QUE QUE CUANDO SE GUARDA NO SE GUARDE OTRA VES!A
            echo "<pre>";
            echo "RUT Usuario: "; var_dump($rut_usuario);
            echo "ID Array: "; var_dump($idArray);
            echo "Nombre Array: "; var_dump($nombreArray);
            echo "Cantidad Array: "; var_dump($cantidadArray);
            echo "Precio Array: "; var_dump($precioArray);
            echo "Total Array: "; var_dump($totalArray);
            echo "Mesa Array: "; var_dump($mesaArray);
            echo "Categoria Array: "; var_dump($categoriaArray);
            echo "Total Price: "; var_dump($total_price);
            echo "RUT: "; var_dump($rut);
            echo "Codigo Mesa: "; var_dump($codigoMesa);
            echo "</pre>";

            $tabla = "tbl_orden";
            $respuesta = Orden::ordenIngresarModel(
                $tabla,
                $idArray,
                $nombreArray,
                $cantidadArray,
                $precioArray,
                $totalArray,
                $mesaArray,
                $categoriaArray,
                $total_price,
                $rut,
                $codigoMesa
            );
            return $respuesta;
        } 
    }
}