<h1>Checkout</h1>

<div id="resumen">
    <form action="/procesar" method="POST">
        <div id="products">
               
        </div>
    </form>
</div>

<script>
    let carrito = JSON.parse(localStorage.getItem('carrito'))
    let divProducts = document.getElementById('products')
    carrito.map(product => {
        divProducts.innerHTML += ` <p>${product.cantidad} - ${product.name} - ${product.cantidad * product.price}</p>`
        divProducts.innerHTML += ` <input type='hidden' name='product_id[]' value=${product.id}>`
        divProducts.innerHTML += ` <input type='hidden' name='price[]' value=${product.price}>`
        divProducts.innerHTML += ` <input type='hidden' name='cantidad[]' value=${product.cantidad}>`
    })
</script>