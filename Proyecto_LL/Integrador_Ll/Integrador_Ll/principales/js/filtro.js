
function filtrarProductos() {
    // Obtener el valor ingresado en el campo de búsqueda
    var input = document.getElementById("buscar_producto");
    var filtro = input.value.toUpperCase();

    // Obtener las filas de la tabla de productos
    var table = document.getElementById("tabla_productos");
    var rows = table.getElementsByTagName("tr");

    // Recorrer las filas y mostrar u ocultar según el filtro
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var mostrar = false;

        for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];

            if (cell) {
                var contenido = cell.textContent || cell.innerText;
                if (contenido.toUpperCase().indexOf(filtro) > -1) {
                    mostrar = true;
                    break;
                }
            }
        }

        // Mostrar u ocultar la fila según el filtro
        rows[i].style.display = mostrar ? "" : "none";
    }
}