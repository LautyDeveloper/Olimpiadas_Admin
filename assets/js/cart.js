const abrirCarritoBtns = document.querySelectorAll(".abrir-carrito");
const cerrarCarritoBtn = document.querySelector(".cerrar-carrito");
const carrito = document.querySelector(".carrito-container");
const carritoContainerProducts = document.querySelector(".carrito-productos");
const btnsAñadirAlCarrito = document.querySelectorAll(".btn-carrito");

let cart = JSON.parse(localStorage.getItem("carrito")) || [];

const actualizarLocalStorage = () => {
  localStorage.setItem("carrito", JSON.stringify(cart));
};

const actualizarCarritoDOM = () => {
  carritoContainerProducts.innerHTML = cart
    .map(({ id, nombre, precio, cantidad }) => {
      const precioTotal = precio * cantidad;
      const precioMostrar =
        precioTotal % 1 === 0 ? precioTotal : precioTotal.toFixed(2);
      return `
        <div class="carrito-producto">
          <p class="carrito-producto-nombre">${nombre} (${cantidad})</p>
          <p class="verde carrito-producto-precio">$${precioMostrar}</p>
          <p class="carrito-producto-cerrar" data-id="${id}">X</p>
        </div>
      `;
    })
    .join("");

  document.querySelectorAll(".carrito-producto-cerrar").forEach((btn) =>
    btn.addEventListener("click", () => {
      const idEliminar = btn.getAttribute("data-id");
      cart = cart.filter((producto) => producto.id !== idEliminar);
      actualizarCarrito();
    })
  );
};

const actualizarCarrito = () => {
  actualizarLocalStorage();
  actualizarCarritoDOM();
};

const añadirProductoAlCarrito = (id, nombre, precio) => {
  const productoExistente = cart.find((producto) => producto.id === id);

  if (productoExistente) {
    productoExistente.cantidad += 1;
  } else {
    cart.push({ id, nombre, precio: parseFloat(precio), cantidad: 1 });
  }

  actualizarCarrito();
};

abrirCarritoBtns.forEach((btn) =>
  btn.addEventListener("click", () => carrito.classList.add("carrito--show"))
);

cerrarCarritoBtn.addEventListener("click", () =>
  carrito.classList.remove("carrito--show")
);

btnsAñadirAlCarrito.forEach((btn) => {
  btn.addEventListener("click", () => {
    const id = btn.getAttribute("idProduct");
    const nombre = btn.getAttribute("nombreProduct");
    const precio = btn.getAttribute("precioProduct");
    añadirProductoAlCarrito(id, nombre, precio);
  });
});

window.onload = actualizarCarrito;
