const botonesVerMas = document.querySelectorAll(".btn-vermas");

botonesVerMas.forEach((boton) => {
  boton.addEventListener("click", () => {
    console.log(boton.getAttribute("desc"));

    const contenidoProd = document.createElement("DIV");
    contenidoProd.classList.add("primer-div");

    const ventanaModal = document.querySelector(".ventana-modal");
    ventanaModal.classList.remove("oculto");

    const closeBtn = document.querySelector(".ventana-modal .close");
    closeBtn.addEventListener("click", () => {
      ventanaModal.classList.add("oculto");
      document
        .querySelector(".ventana-modal__content")
        .removeChild(contenidoProd);
    });

    contenidoProd.innerHTML = `
          <div class="prod-content">
              <div class="imagen"></div>
              <div class="Titulo">
                <h4 class="nombre-prod">${boton.getAttribute("nombreprod")}</h4>
              </div>
              <div class="Descripcion">
                <p class="desc-prod">${boton.getAttribute("desc")}</p>
                <p  class="precio-prod">Precio: <b class="verde">$${boton.getAttribute(
                  "precio"
                )}</b></p>
              </div>
               <div class="Botones">
                <a  class="comprar-prod-vermas" href="">COMPRAR</a>
                <div  class="carrito-vermas"><img src="./assets/media/carrito-de-compras.png" alt=""></div>
               </div> 

            </div>
        `;
    document
      .querySelector(".ventana-modal__content")
      .appendChild(contenidoProd);
  });
});
