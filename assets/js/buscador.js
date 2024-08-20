const buscador = document.querySelector(".buscarProducto");
buscador.addEventListener("input", () => {
    const filter = buscador.value.toLowerCase();
    const productList = document.querySelector(".lista-productos");
    const products = productList.getElementsByClassName('producto-carta');
    
    for (let i = 0; i < products.length; i++) {
        const productName = products[i].getAttribute('data-name').toLowerCase();

        if (productName.includes(filter)) {
            products[i].style.display = '';
        } else {
            products[i].style.display = 'none';
        }
    }
})