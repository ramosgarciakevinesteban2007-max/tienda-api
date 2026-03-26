<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Orden Exitosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container" style="max-width:600px">
    <div class="alert alert-success mt-4">
        <h4>Orden #{{ $orden->id }} registrada correctamente</h4>
        <p>Metodo de pago: {{ $orden->metodo_pago }}</p>
    </div>

    <h5>Productos comprados:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orden->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->cantidad }}</td>
                <td>${{ number_format($product->pivot->price) }}</td>
                <td>${{ number_format($product->pivot->price * $product->pivot->cantidad) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/products" class="btn btn-primary">Seguir comprando</a>
</div>

<script>
    // Limpiar el carrito del localStorage al confirmar la orden
    localStorage.removeItem("carrito")
</script>
</body>
</html>
