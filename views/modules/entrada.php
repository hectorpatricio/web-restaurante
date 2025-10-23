

<?php

$lista_colaboradores = ControladorPlatillos::ctrPlatillos(); 
$lista_colaboradores_bebidas = ControladorBebidas::ctrBebidas(); 



// echo "<pre>";
// print_r($lista_obtener_datos);
// echo "</pre>";

$_SESSION['mesa'] = $_REQUEST["mesa"];

date_default_timezone_set('America/Santiago');
// Genera el valor solo la primera vez
if (!isset($_SESSION['timestamp'])) {
    $_SESSION['timestamp'] = date("HisdmY");
}

// Usas $_SESSION['timestamp'] en todas partes
$codigoMesa=$_SESSION['timestamp'];


$lista_obtener_datos = ControladorInformacion::ctrInformacion($codigoMesa) ?? [];

if (isset($_POST['order_data']) && isset($_POST['total_price'])) 
{
    $rut_usuario = $_SESSION["id_usuario"];
    $lista_bebidas   = ControladorOrden::ctrOrden($rut_usuario,$codigoMesa); 

    // Redirige inmediatamente después de procesar
    header("Location: index.php?ruta=entrada&mesa=" . urlencode($_SESSION['mesa']));
    exit; 
}



?>
<section class="section-content padding-y-sm bg-default ">
        <div class="container-fluid">

            <div class="row">


                <div class="col-md-8 card padding-y-sm card ">
                    <ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist" id="navMenu">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="pill" href="#nav-tab-paypal" onclick="showCategory('all')">
                                <i class="fa fa-tags"></i> All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-bank" onclick="showCategory('category-1')">
                                <i class="fa fa-tags"></i> Category 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-bank" onclick="showCategory('category-2')">
                                <i class="fa fa-tags"></i> Category 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-bank" onclick="showCategory('category-3')">
                                <i class="fa fa-tags"></i> Category 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-bank" onclick="showCategory('category-4')">
                                <i class="fa fa-tags"></i> Category 4
                            </a>
                        </li>
                    </ul>

                    <span id="items-category-1">
                        <div class="row">
                            <?php foreach ($lista_colaboradores as $key => $value) { ?>
                                <div class="col-md-3 item category-1">
                                    <figure class="card card-product">
                                        <div class="img-wrap">
                                            <img src="views/dist/images/conf_platos/<?= $value['foto_platos'];?>" />
                                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                        </div>
                                        <figcaption class="info-wrap">
                                            <a href="#" class="title"><?= $value['nombre_platos']; ?></a>
                                            <div class="action-wrap">
                                                <?php
                                                    $mesaSeleccionada = $_SESSION['mesa'];
                                                    // var_dump($mesaSeleccionada);
                                                ?>
                                                <a href="#" class="btn btn-primary btn-sm float-right" onclick="addItemToSidebar('<?= $key + 1 ?>', <?= $value['precio_platos']; ?>, '<?= $value['nombre_platos']; ?>',<?= $value['id_platos']; ?>,<?= $mesaSeleccionada ?>,'Comida')">
                                                    <i class="fa fa-cart-plus"></i> Agregar
                                                </a>
                                                <div class="price-wrap h5">
                                                    <span class="price-new">$<?= $value['precio_platos']; ?></span>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            <?php } ?>
                        </div>
                    </span>

                    <span id="items-category-3">
                        <div class="row">
                            <?php foreach ($lista_colaboradores_bebidas as $key => $value) { ?>
                                <div class="col-md-3 item category-3">
                                    <figure class="card card-product">
                                        <div class="img-wrap">
                                            <img src="views/dist/images/conf_bebidas/<?= $value['foto_bebidas'];?>" />
                                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                        </div>
                                        <figcaption class="info-wrap">
                                            <a href="#" class="title"><?= $value['nombre_bebidas']; ?></a>
                                            <div class="action-wrap">
                                                <?php
                                                    $mesaSeleccionada = $_SESSION['mesa'];
                                                    // var_dump($mesaSeleccionada);
                                                ?>
                                                <a href="#" class="btn btn-primary btn-sm float-right" onclick="addItemToSidebar('<?= $key + 1 ?>', <?= $value['precio_bebidas']; ?>, '<?= $value['nombre_bebidas']; ?>',<?= $value['id_bebidas']; ?>,<?= $mesaSeleccionada ?>,'Bebidas')">
                                                    <i class="fa fa-cart-plus"></i> Agregar
                                                </a>
                                                <div class="price-wrap h5">
                                                    <span class="price-new">$<?= $value['precio_bebidas']; ?></span>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            <?php } ?>
                        </div>
                    </span>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <span id="cart">
                            <?php
                                $mesaSeleccionada = $_SESSION['mesa'];
                            ?>
                            <?php if (isset($mesaSeleccionada)) {
                                $mesaSeleccionada = $_SESSION['mesa']; ?><h3 class="text-primary" style="text-align: center;">Mesa <?= htmlspecialchars($mesaSeleccionada); ?></h3><?php } ?>
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col" class="text-secondary">Nombre</th>
                                        <th scope="col" class="text-secondary" width="120">Valor</th>
                                        <th scope="col" class="text-secondary" width="120">Cantidad</th>
                                        <th scope="col" class="text-secondary" width="200">Total</th>
                                        <th scope="col" class="text-secondary" width="200"></th>
                                    </tr>
                                </thead>
                                <tbody id="summary-body"></tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-secondary"><strong>Precio total:</strong></td>
                                        <td id="total-price-cell">$0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="text-center">
                                <button id="generate-order" class="btn btn-success" onclick="generateOrder()">Generar Orden</button>
                            </div>
                        </span>
                    </div>

                    <div class="card mt-3">
                        <span id="cart2">
                            <h3 class="text-primary" style="text-align: center;">Orden Generada</h3>
          
                            <div style="padding:20px; border:0px solid #ccc;">
                                <table class="table table-bordered table-striped" style="border-radius:10px; overflow:hidden;">
                                    <thead class="text-white" style="background-color:#007bff;">
                                        <tr>
                                            <th>Nombre Orden</th>
                                            <th>Cantidad</th>
                                            <th>Precio (Unitario)</th>
                                            <th>Precio Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lista_obtener_datos as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value['nombre_orden']; ?></td>
                                                <td><?php echo $value['cantidad_orden']; ?></td>
                                                <td><?php echo "$".$value['precio_orden']; ?></td>
                                                <td><?php echo "$".$value['total_orden']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </span>
                    </div>

                </div>




            </div>
        </div>
    </section>

    <script>

        const navLinks = document.querySelectorAll('#navMenu .nav-link');

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remover la clase 'active' de todos los enlaces
                navLinks.forEach(nav => nav.classList.remove('active', 'show'));

                // Agregar la clase 'active' al enlace seleccionado
                this.classList.add('active', 'show');
            });
        });

        function showCategory(category) {
            console.log('Selected category:', category);
            // Aquí puedes manejar la lógica según la categoría seleccionada
        }

        $(function() {
            // Configuración de scroll para los elementos
            $("#items").height(552);
            $("#items").overlayScrollbars({
                overflowBehavior: {
                    x: "hidden",
                    y: "scroll"
                }
            });
            $("#cart").height(445);
            $("#cart").overlayScrollbars();
        });

        let totalPrice = 0;

        // Función para actualizar el precio total en la vista
        function updateTotalPrice() {
            const totalPriceCell = document.getElementById("total-price-cell");
            if (totalPriceCell) {
                totalPriceCell.textContent = formatPrice(totalPrice);
            }
        }

        // Función para formatear el precio con o sin decimales
        function formatPrice(price) {
            return price % 1 === 0 ? `$${price}` : `$${price.toFixed(2)}`;
        }

        // Función para agregar un artículo al carrito lateral
        function addItemToSidebar(item, precio, plato, id, mesa, categoria) {
            const precioInt = parseFloat(precio);
            if (isNaN(precioInt)) {
                alert("El precio proporcionado no es válido.");
                return;
            }

            const summaryBody = document.getElementById("summary-body");

            // const row = document.createElement("tr");
            // row.id = `row-${item}`;

            const row = document.createElement("tr");
            row.id = `row-${item}`; // Asignar un ID único a la fila
            row.setAttribute("data-id", id); // Almacenar el ID del artículo como un atributo
            row.setAttribute("data-mesa", mesa);
            row.setAttribute("data-categoria", categoria);

            const itemCell = document.createElement("td");
            itemCell.textContent = plato;

            const priceCell = document.createElement("td");
            priceCell.textContent = formatPrice(precioInt); // Mostrar precio en la celda de precio

            const quantityCell = document.createElement("td");
            const quantityInput = document.createElement("input");
            quantityInput.id = `input-${item}`;
            quantityInput.type = "text"; // Campo de texto en lugar de número
            quantityInput.value = "1";
            quantityInput.style.width = "50px"; // Estilo opcional para el tamaño del input

            // Actualización de la cantidad e interacciones con el total
            quantityInput.oninput = () => {
                const cantidad = parseInt(quantityInput.value, 10);
                if (!isNaN(cantidad) && cantidad >= 1) {
                    const totalForItem = precioInt * cantidad;
                    const previoTotal = parseFloat(row.querySelector(".total-price").textContent.replace('$', ''));
                    totalPrice -= previoTotal;
                    totalPrice += totalForItem;
                    row.querySelector(".total-price").textContent = formatPrice(totalForItem);
                    updateTotalPrice();
                } else {
                    quantityInput.value = "1"; // Restablecer si el valor no es válido
                }
            };
            quantityCell.appendChild(quantityInput);

            const totalCell = document.createElement("td");
            totalCell.classList.add("total-price");
            totalCell.textContent = formatPrice(precioInt); // Inicializa el total por artículo

            // Botón para eliminar el artículo del carrito
            const removeCell = document.createElement("td");
            const removeButton = document.createElement("button");
            removeButton.classList.add("btn", "btn-danger");
            removeButton.textContent = "Eliminar";
            removeButton.onclick = () => {
                totalPrice -= precioInt;
                updateTotalPrice();
                row.remove();
            };
            removeCell.appendChild(removeButton);

            // Construcción de la fila y su adición al cuerpo de la tabla
            row.appendChild(itemCell);
            row.appendChild(priceCell);
            row.appendChild(quantityCell);
            row.appendChild(totalCell);
            row.appendChild(removeCell);

            summaryBody.appendChild(row);

            totalPrice += precioInt; // Acumula el precio total
            updateTotalPrice();
        }

        // Función para filtrar artículos según la categoría
        function showCategory(category) {
            const items = document.querySelectorAll('.item');
            items.forEach(item => item.style.display = 'none'); // Oculta todos los artículos

            if (category === 'all') {
                // Si se selecciona "all", muestra todos los artículos
                items.forEach(item => item.style.display = 'block');
            } else {
                // Si no, solo muestra los artículos que pertenezcan a la categoría seleccionada
                const filteredItems = document.querySelectorAll(`.${category}`);
                filteredItems.forEach(item => item.style.display = 'block');
            }
        }

        function generateOrder() {
            const orderSummary = [];
            const rows = document.querySelectorAll("#summary-body tr");
            let totalPrice = 0; // Inicializamos el total
            let mesaId = null; // Inicializar la variable mesaId correctamente

            rows.forEach(row => {
                const itemId = row.getAttribute("data-id");
                const itemName = row.querySelector("td:nth-child(1)").textContent;
                const itemPriceText = row.querySelector("td:nth-child(2)").textContent;
                const itemQuantity = parseInt(row.querySelector("input").value);

                // Limpiar el precio (eliminar caracteres no numéricos como "$" o ",")
                const itemPrice = parseFloat(itemPriceText.replace(/[^\d.-]/g, ''));

                const itemTotal = itemPrice * itemQuantity;
                mesaId = row.getAttribute("data-mesa"); // Obtener el ID de la mesa (debería ser un valor válido)
                categoriaId = row.getAttribute("data-categoria");

                orderSummary.push(`| ID: ${itemId} - Nombre: ${itemName} - Cantidad: ${itemQuantity} - Precio: ${itemPrice.toFixed(2)} - Total: ${itemTotal.toFixed(2)} - Mesa: ${mesaId} - Categoria: ${categoriaId} |`);

                // Sumar al total general
                totalPrice += itemTotal;
            });

            if (orderSummary.length > 0 && mesaId !== null) { // Verificar que mesaId no sea null
                const orderData = orderSummary.join("\n");
                const totalPriceFormatted = totalPrice.toFixed(2);

                // Agregar salto de línea antes de mostrar el precio total
                const fullOrderData = `${orderData}\nPrecio total: $${totalPriceFormatted}`;

                // Crear el formulario oculto
                const form = document.createElement("form");
                form.method = "POST";

                // Concatenar la URL con el número de la mesa
                form.action = `index.php?ruta=entrada&mesa=${mesaId}`; // URL con número de mesa

                // Crear un input oculto para el resumen de la orden
                const orderDataInput = document.createElement("input");
                orderDataInput.type = "hidden";
                orderDataInput.name = "order_data";
                orderDataInput.value = fullOrderData;
                form.appendChild(orderDataInput);

                // Crear un input oculto para el precio total
                const totalPriceInput = document.createElement("input");
                totalPriceInput.type = "hidden";
                totalPriceInput.name = "total_price";
                totalPriceInput.value = totalPriceFormatted;
                form.appendChild(totalPriceInput);

                // Agregar el formulario al cuerpo del documento y enviarlo
                document.body.appendChild(form);
                form.submit(); // Enviar el formulario
            } else {
                alert("No hay artículos en la orden o no se ha definido el número de la mesa.");
            }
        }
    </script>
