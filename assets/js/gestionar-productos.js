document.querySelectorAll(".btn-editar").forEach((editBtn) => {
  editBtn.addEventListener("click", () => {
    const ventanaModal = document.querySelector(".ventana-modal");
    ventanaModal.classList.remove("oculto");

    const editContent = document.createElement("DIV");
    editContent.classList.add("primerDiv")

    const closeBtn = document.querySelector(".ventana-modal .close");
    closeBtn.addEventListener("click", () => {
      document
        .querySelector(".ventana-modal__content")
        .removeChild(editContent);
      ventanaModal.classList.add("oculto");
    });

    editContent.innerHTML = ` 
      <form action="" method="post" class="form-editar">
          <p>Editar producto</p>
          <div>
           <label for="">Nombre</label>
          <input name="nombreProd" type="text" value="${editBtn.getAttribute(
            "NombreProd"
          )}">
          </div>
          <div>
          <label for="">Descripcion</label>
          <input name="descProd" type="text" value="${editBtn.getAttribute(
            "desc"
          )}">
          </div>
          <div>
          <label for="">Categoria</label>
          <input name="categProd" type="text" value="${editBtn.getAttribute(
            "categ"
          )}">
          </div>
          <div>
          <label for="">Stock</label>
          <input name="stockProd" type="text" value="${editBtn.getAttribute(
            "stock"
          )}">
          </div>
          <div>
          <label for="">Precio</label>
          <input name="precioProd" type="text" value="${editBtn.getAttribute(
            "precio"
          )}">
          </div>
          <input name="idProd" style="display:none"  type="text" value="${editBtn.getAttribute(
            "idProd"
          )}">
          <button name="edit-submit" type="submit" class="Submit-Edit">Guardar cambios</button>
      </form>
    `;

    document.querySelector(".ventana-modal__content").appendChild(editContent);
  });
});
