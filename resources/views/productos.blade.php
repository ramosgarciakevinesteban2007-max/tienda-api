<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
            min-height: 100vh;
            padding: 20px 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            color: #333;
        }

        .container-main {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 8px;
            border-left: 4px solid #2c3e50;
        }

        .header h1 {
            color: #2c3e50;
            margin: 0;
            font-weight: 500;
            font-size: 28px;
        }

        .products-section {
            margin-bottom: 30px;
        }

        .product-card {
            background: white;
            border-radius: 8px;
            padding: 18px;
            margin-bottom: 15px;
            border: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: border-color 0.2s ease;
        }

        .product-card:hover {
            border-color: #bbb;
        }

        .product-info h5 {
            color: #2c3e50;
            margin: 0 0 8px 0;
            font-weight: 500;
            font-size: 16px;
        }

        .product-info p {
            color: #777;
            margin: 0;
            font-size: 13px;
        }

        .btn-add {
            background: #2c3e50;
            border: 1px solid #2c3e50;
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            white-space: nowrap;
            margin-left: 10px;
        }

        .btn-add:hover {
            background: #34495e;
            color: white;
            text-decoration: none;
        }

        .carrito-section {
            position: fixed;
            right: 30px;
            top: 20px;
            width: 340px;
            max-height: 600px;
            background: white;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .carrito-header {
            background: white;
            color: #2c3e50;
            padding: 16px;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 8px 8px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 16px;
        }

        .carrito-header span {
            background: #f0f0f0;
            color: #2c3e50;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
        }

        .carrito-content {
            padding: 15px;
            max-height: 400px;
            overflow-y: auto;
        }

        .carrito-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            background: #fafafa;
            border-radius: 6px;
            margin-bottom: 10px;
            border-left: 3px solid #2c3e50;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            color: #2c3e50;
            font-weight: 500;
            margin: 0;
            font-size: 14px;
        }

        .item-cantidad {
            color: #777;
            font-weight: 400;
            font-size: 13px;
            margin: 4px 0 0 0;
        }

        .btn-remove {
            background: #e0e0e0;
            color: #666;
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            transition: background-color 0.2s ease;
            margin-left: 10px;
            font-weight: 500;
        }

        .btn-remove:hover {
            background: #ccc;
            color: #333;
        }

        .carrito-vacio {
            text-align: center;
            padding: 30px 20px;
            color: #bbb;
            font-size: 14px;
        }

        .carrito-vacio-icon {
            font-size: 36px;
            margin-bottom: 10px;
            opacity: 0.6;
        }

        .carrito-footer {
            border-top: 1px solid #e0e0e0;
            padding: 14px;
            background: #fafafa;
            border-radius: 0 0 8px 8px;
        }

        .carrito-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .carrito-total span {
            color: #2c3e50;
            font-size: 16px;
            font-weight: 600;
        }

        .btn-checkout {
            width: 100%;
            background: #2c3e50;
            color: white;
            border: 1px solid #2c3e50;
            padding: 10px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 8px;
            font-size: 14px;
        }

        .btn-checkout:hover:not(:disabled) {
            background: #34495e;
        }

        .btn-checkout:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: #ccc;
            border-color: #ccc;
        }

        @media (max-width: 768px) {
            .carrito-section {
                position: static;
                width: 100%;
                max-height: none;
                margin-top: 30px;
            }

            .product-card {
                flex-direction: column;
                text-align: center;
            }

            .btn-add {
                margin-left: 0;
                margin-top: 10px;
                width: 100%;
            }
        }

        .badge-cart {
            display: inline-block;
            background: #ccc;
            color: #333;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-main">
        <div class="header">
            <h1>🛍️ Catálogo de Productos</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="products-section">
                    @foreach($products as $product) 
                        <div class="product-card">
                            <div class="product-info">
                                <h5>{{ $product->name }}</h5>
                                <p><strong>ID:</strong> {{ $product->id }}</p>
                                <p><strong>Precio:</strong> ${{ $product->price }}</p>
                            </div>
                            <button class="btn-add" onclick="agregarAlcarrito({{ json_encode($product) }})">
                                ➕ Añadir al carrito
                            </button>
                        </div>
                    @endforeach 
                </div>
            </div>

            <div class="col-lg-4">
                <div class="carrito-section">
                    <div class="carrito-header">
                        <div>🛒 Mi Carrito</div>
                        <span id="badge-count">0</span>
                    </div>
                    <div class="carrito-content" id="carrito">
                        <div class="carrito-vacio">
                            <div class="carrito-vacio-icon">🛒</div>
                            <p>Tu carrito está vacío</p>
                        </div>
                    </div>
                    <div class="carrito-footer">
                        <div class="carrito-total">
                            <span>Total de artículos:</span>
                            <span id="total-items">0</span>
                        </div>
                        <div class="carrito-total">
                            <span>Total a pagar:</span>
                            <span id="total-price">$0</span>
                        </div>
                        <button class="btn-checkout" id="btn-comprar" onclick="finalizarCompra()" disabled>
                            Finalizar Compra
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let carrito = JSON.parse(localStorage.getItem('carrito'))
        carrito = carrito ? carrito : []
        console.log("carrito:", carrito)
        
        function agregarAlcarrito(product){
            let posicion = carrito.findIndex(item => item.id === product.id)
            if(posicion !== -1){
                carrito[posicion].cantidad++
            } else {
                product.cantidad = 1
                carrito.push(product)
            }
            localStorage.setItem("carrito" , JSON.stringify(carrito))
            console.log(carrito)
            mostrarCarrito();
        }

        function eliminarDelCarrito(productId) {
            carrito = carrito.filter(item => item.id !== productId)
            mostrarCarrito();
        }

        function mostrarCarrito(){
            let divcarrito = document.getElementById('carrito')
            let buyBtn = document.getElementById('btn-comprar')
            let totalItems = document.getElementById('total-items')
            let badge = document.getElementById('badge-count')

            if(carrito.length === 0) {
                divcarrito.innerHTML = `
                    <div class="carrito-vacio">
                        <div class="carrito-vacio-icon">🛒</div>
                        <p>Tu carrito está vacío</p>
                    </div>
                `;
                buyBtn.disabled = true;
                totalItems.textContent = '0';
                badge.textContent = '0';
                document.getElementById('total-price').textContent = '$0';
            } else {
                let items = carrito.map(item => `
                <div class="carrito-item">
                    <div class="item-info">
                        <p class="item-name">${item.name}</p>
                        <p class="item-cantidad">Cantidad: <strong>${item.cantidad}</strong></p>
                        <p class="item-cantidad">Precio: $${item.price}</p>
                        <p class="item-cantidad">Total: <strong>$${item.price * item.cantidad}</strong></p>
                    </div>
                <button class="btn-remove" onclick="eliminarDelCarrito(${item.id})">Eliminar</button>
                </div>
            `).join('');

                divcarrito.innerHTML = items;
                buyBtn.disabled = false;
                
                let totalDatos = carrito.reduce((sum, item) => sum + item.cantidad, 0);
                let totalPrecio = carrito.reduce((sum, item) => sum + (item.price * item.cantidad), 0);
                document.getElementById('total-price').textContent = '$' + totalPrecio;
                totalItems.textContent = totalDatos;
                badge.textContent = totalDatos;
            }
        }

       function finalizarCompra() {
            if(carrito.length === 0) {
            alert('Tu carrito está vacío');
            return;
       }
            alert('¡Compra realizada! Total productos: ' + carrito.reduce((sum, item) => sum + item.cantidad, 0));
            carrito = []; 
            localStorage.removeItem('carrito'); 
            mostrarCarrito(); 
}
    </script>
</body>
</html>    