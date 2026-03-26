<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f5f5f5; padding: 20px 0; }
        .product-card { background: white; border-radius: 8px; padding: 18px; margin-bottom: 15px; border: 1px solid #e0e0e0; display: flex; justify-content: space-between; align-items: center; }
        .carrito-section { position: sticky; top: 20px; background: white; border-radius: 8px; border: 1px solid #e0e0e0; }
        .carrito-header { padding: 16px; border-bottom: 1px solid #e0e0e0; font-weight: 600; display: flex; justify-content: space-between; }
        .carrito-item { padding: 10px; background: #fafafa; border-radius: 6px; margin-bottom: 8px; border-left: 3px solid #2c3e50; }
        .carrito-footer { padding: 14px; border-top: 1px solid #e0e0e0; }
    </style>
</head>
<body>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-8">
            <h2 class="mb-4">Catalogo de Productos</h2>
            @foreach($products as $product)
                <div class="product-card">
                    <div>
                        <h5 class="mb-1">{{ $product->name }}</h5>
                        <small class="text-muted">{{ $product->description }}</small><br>
                        <strong>$ {{ number_format($product->price) }}</strong>
                    </div>
                    <button class="btn btn-dark btn-sm" onclick="agregarAlCarrito({{ json_encode($product) }})">
                        Anadir al carrito
                    </button>
                </div>
            @endforeach
        </div>
        <div class="col-lg-4">
            <div class="carrito-section">
                <div class="carrito-header">
                    Mi Carrito
                    <span id="badge-count" class="badge bg-secondary">0</span>
                </div>
                <div class="p-3" id="carrito">
                    <p class="text-muted text-center">Tu carrito esta vacio</p>
                </div>
                <div class="carrito-footer">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total productos:</span>
                        <strong id="total-items">0</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Total a pagar:</span>
                        <strong id="total-price">$0</strong>
                    </div>
                    <a href="/checkout" class="btn btn-primary w-100">Ir al Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let carrito = JSON.parse(localStorage.getItem("carrito")) || []
    mostrarCarrito()

    function agregarAlCarrito(product) {
        let pos = carrito.findIndex(item => item.id === product.id)
        if (pos !== -1) {
            carrito[pos].cantidad++
        } else {
            product.cantidad = 1
            carrito.push(product)
        }
        localStorage.setItem("carrito", JSON.stringify(carrito))
        mostrarCarrito()
    }

    function eliminarDelCarrito(id) {
        carrito = carrito.filter(item => item.id !== id)
        localStorage.setItem("carrito", JSON.stringify(carrito))
        mostrarCarrito()
    }

    function mostrarCarrito() {
        let div = document.getElementById("carrito")
        let badge = document.getElementById("badge-count")
        let totalPrecioEl = document.getElementById("total-price")
        let totalItemsEl = document.getElementById("total-items")

        if (carrito.length === 0) {
            div.innerHTML = "<p class=\"text-muted text-center\">Tu carrito esta vacio</p>"
            badge.textContent = "0"
            totalPrecioEl.textContent = "$0"
            totalItemsEl.textContent = "0"
            return
        }

        div.innerHTML = carrito.map(item =>
            "<div class=\"carrito-item\">" +
            "<strong>" + item.name + "</strong><br>" +
            "<small>Cantidad: " + item.cantidad + "</small><br>" +
            "<small>Subtotal: $" + (item.price * item.cantidad) + "</small><br>" +
            "<button class=\"btn btn-sm btn-outline-danger mt-1\" onclick=\"eliminarDelCarrito(" + item.id + ")\">Eliminar</button>" +
            "</div>"
        ).join("")

        let total = carrito.reduce(function(sum, item) { return sum + (item.price * item.cantidad) }, 0)
        let totalItems = carrito.reduce(function(sum, item) { return sum + item.cantidad }, 0)

        totalPrecioEl.textContent = "$" + total.toLocaleString()
        totalItemsEl.textContent = totalItems
        badge.textContent = totalItems
    }
</script>
</body>
</html>
