
<?php
require_once '../Controller/conexion/configuracion.php';

// Consulta SQL para obtener el producto más vendido por año
$sql = "SELECT YEAR(fecha_registro) AS anio, producto_nombre, SUM(cantidad) AS total_cantidad 
        FROM carrito 
        GROUP BY anio, producto_nombre 
        HAVING total_cantidad = (
            SELECT MAX(sum_cantidad)
            FROM (
                SELECT YEAR(fecha_registro) AS anio, producto_nombre, SUM(cantidad) AS sum_cantidad
                FROM carrito
                GROUP BY anio, producto_nombre
            ) AS ventas_por_anio
            WHERE anio = ventas_por_anio.anio
        )";

$result = $conn->query($sql);

// Crear arrays para almacenar los datos del gráfico
$anios = array();
$productos = array();
$cantidades = array();

// Recorrer los resultados y almacenar los datos en los arrays
while ($row = $result->fetch_assoc()) {
    $anios[] = $row["anio"];
    $productos[] = $row["producto_nombre"];
    $cantidades[] = $row["total_cantidad"];
}


// Consulta SQL para obtener los datos del carrito
$sql = "SELECT producto_nombre, SUM(cantidad) AS total_cantidad
        FROM carrito
        GROUP BY producto_nombre
        ORDER BY total_cantidad DESC";
$resultado = $conn->query($sql);

$productos = array();
$cantidades = array();

while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila['producto_nombre'];
    $cantidades[] = $fila['total_cantidad'];
}

// Consulta SQL para obtener los datos de productos y stock
$sql = "SELECT producto, stock FROM productoss";
$resultado = $conn->query($sql);

$productos = array();
$stock = array();

while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila['producto'];
    $stock[] = $fila['stock'];
}
// Consulta SQL para obtener la cantidad de productos vendidos por categoría
$sql = "SELECT p.categoria, SUM(c.cantidad) AS total_vendidos
        FROM carrito c
        INNER JOIN productoss p ON c.producto_id = p.id
        GROUP BY p.categoria";

$result = $conn->query($sql);

$categorias = array();
$totalVendidos = array();

while ($row = $result->fetch_assoc()) {
    $categorias[] = $row["categoria"];
    $totalVendidos[] = $row["total_vendidos"];
}

$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <style>
            /* Estilos CSS para embellecer la plantilla */
            .my-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: #fff;
                text-decoration: none;
                border-radius: 4px;
                transition: background-color 0.3s ease;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            .my-button:hover {
                background-color: #45a049;
            }
            body {
                font-family: Arial, sans-serif;
                background-color: #f1f1f1;
                margin: 0;
                padding: 20px;
            }
            .chart-container1 {
                max-width: 600px; /* Ajusta el valor según tus preferencias */
                margin: 0 auto;

                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 4px;
                padding: 20px;
                margin-bottom: 20px;
            }
            .container {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .chart-container {
                width: 45%;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 4px;
                padding: 20px;
                margin-bottom: 20px;
            }

            h2 {
                margin-top: 0;
            }
        </style>
        <!-- Agrega aquí los enlaces a tus archivos CSS y JS de Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body style="background: #0f0c29;  /* fallback for old browsers */
          background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
          background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
          ">
        <h1 style="color: #fff; text-align: center; padding: 10px">DASHBOARD </h1>
        <div class="container" style="padding: 20px 50px">
            <div class="chart-container"  >
                <h2 style="text-align: center;color: #fff;">Ventas de productos</h2>
                <canvas id="productosChart" ></canvas>
            </div>
            <div class="chart-container">
                <h2 style="text-align: center;color: #fff;">Stock de productos</h2>
                <canvas id="stockChart"></canvas>
            </div>
            <div class="chart-container1">
                <h2 style="text-align: center;color: #fff;" >Ventas por Categoria</h2>
                <canvas id="productosChart1"></canvas>
            </div>
            <div class="chart-container">
                <div style="text-align: center; margin-top: 20px;">
                    <h2 style="text-align: center; color: #fff;">Descargar Reportes</h2>
                    <br/>
                    <br/>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <div style="margin-right: 20px; width: 33%;">
                            <img src="https://www.aplicacionesdenegocio.com/wp-content/uploads/2021/10/reporte-de-ventas-mercadolibre-mexico.png" style="width: 150px;">
                            <br>
                            <center><a class="my-button" href="../fpdf/PruebaV.php">Ventas</a></center>
                        </div>
                        <div style="margin-right: 20px; width: 33%;">
                            <img src="https://img.freepik.com/vector-premium/trabajadores-supermercados-haciendo-su-trabajo_23-2148549581.jpg" style="width: 150px;">
                            <br>
                            <center><a class="my-button" href="../fpdf/PruebaH.php">Trabajadores</a></center>
                        </div>
                        <div style="margin-right: 20px; width: 33%;">
                            <img src="https://static.vecteezy.com/system/resources/previews/008/102/609/non_2x/basket-with-food-online-purchase-of-food-products-on-the-internet-local-market-and-grocery-store-online-grocery-shopping-food-delivery-services-fashionable-hand-drawn-banner-design-vector.jpg" style="width: 150px;">
                            <br>
                            <center><a class="my-button" href="../fpdf/PDF_Canasta.php">Canasta</a></center>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <script>
            // Obtener el contexto del lienzo del gráfico
            var ctx = document.getElementById("productosChart").getContext("2d");

            // Obtener los datos de productos y cantidades desde PHP
            var productos = <?php echo json_encode($productos); ?>;
            var cantidades = <?php echo json_encode($cantidades); ?>;

            // Obtener la cantidad de productos para definir los colores
            var cantidadProductos = productos.length;

            // Crear un array de colores aleatorios
            var colores = [];
            for (var i = 0; i < cantidadProductos; i++) {
                var color = getRandomColor();
                colores.push(color);
            }

            // Crear el gráfico de barras
            var productosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: productos,
                    datasets: [{
                            label: 'Cantidad',
                            data: cantidades,
                            backgroundColor: colores,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });

            // Función para generar un color aleatorio en formato RGB
            function getRandomColor() {
                var r = Math.floor(Math.random() * 256);
                var g = Math.floor(Math.random() * 256);
                var b = Math.floor(Math.random() * 256);
                return 'rgb(' + r + ',' + g + ',' + b + ')';
            }
        </script>

        <script>
            // Obtener el contexto del lienzo del gráfico
            var ctx = document.getElementById("stockChart").getContext("2d");

            // Obtener los datos de productos y stock desde PHP
            var productos = <?php echo json_encode($productos); ?>;
            var stock = <?php echo json_encode($stock); ?>;

            // Crear el gráfico de líneas
            var stockChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: productos,
                    datasets: [{
                            label: 'Stock',
                            data: stock,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            fill: false
                        }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <script>
            var ctx = document.getElementById('productosChart1').getContext('2d');

            var categorias = <?php echo json_encode($categorias); ?>;
            var totalVendidos = <?php echo json_encode($totalVendidos); ?>;
            var colores = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40"];

            var productosChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: categorias,
                    datasets: [{
                            data: totalVendidos,
                            backgroundColor: colores
                        }]
                },
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    var label = context.label || '';
                                    var value = context.raw || '';
                                    return label + ': ' + value;
                                }
                            }
                        }
                    }
                }
            });
        </script>

    </body>
</html>
