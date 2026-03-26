<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Checkout</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div id="resumen">
        <form action="/checkout" method="POST">
            @csrf
            <div id="products" class="mb-3"></div>
            <a href="/products" class="btn btn-secondary">Volver</a>
            <button type="submit" class="btn btn-primary">Confirmar Orden</button>
        </form>
    </div>

    <script>
        let carrito = JSON.parse(localStorage.getItem('carrito')) || []
        let divProducts = document.getElementById('products')

        if (carrito.length === 0) {
            divProducts.innerHTML = '<p class="text-danger">El carrito está vacío. <a href="/products">Volver a productos</a></p>'
        } else {
            carrito.forEach(product => {
                divProducts.innerHTML += `<p><strong>${product.name}</strong> — Cantidad: ${product.cantidad} — Subtotal: $${product.cantidad * product.price}</p>`
                divProducts.innerHTML += `<input type="hidden" name="product_id[]" value="${product.id}">`
                divProducts.innerHTML += `<input type="hidden" name="price[]" value="${product.price}">`
                divProducts.innerHTML += `<input type="hidden" name="cantidad[]" value="${product.cantidad}">`
            })
        }
    </script>
</body>
</html>
