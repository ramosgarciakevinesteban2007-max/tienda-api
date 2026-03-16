<h1>Aqui van los productos listados</h1>

<div id="carrito">

</div>

@foreach($products as $product) 
    <ul>
        <li>{{ $product->name }}</li>
        <button onclick="agrgarAlcarrito({{ $product }})">Añadir al carrito</button>
    </ul>    
@endforeach 

<script>
    let carrito = []
    function agrgarAlcarrito(product){
        let posicion = carrito.findIndex(item => item.id === product.id)
        if(posicion !== -1){
            carrito[posicion].cantidad++
        } else {
            product.cantidad = 1
            carrito.push(product)
        }
        console.log(carrito)

    } 
    
    function mostrarCarrito(){
        Let divcarrito = document.getElementById('carrito')
        carrito.map(item => {
            divcarrito.innerHTML += `<p>${item.name} - ${item.cantidad}</p>`
        })
    }
</script>    