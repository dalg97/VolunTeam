document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card-voluntariado");
    const modal = document.getElementById("modal-detalle");
    const contenidoDetalle = document.getElementById("contenido-detalle");
    const btnCerrar = document.getElementById("cerrar-modal");
    const mensaje = document.getElementById("mensaje-registro");

cards.forEach(card => {
    card.addEventListener("click", function () {
    const info = this.querySelector(".info").cloneNode(true);

    contenidoDetalle.innerHTML = "";
    contenidoDetalle.appendChild(info);
    modal.style.display = "flex";

setTimeout(() => {
    const botonRegistro = contenidoDetalle.querySelector(".btn");
    if (botonRegistro) {
        botonRegistro.addEventListener("click", function (e) {
        e.preventDefault();

    mensaje.textContent = "¡Registro exitoso!";
    mensaje.classList.add("mostrar");

    modal.style.display = "none";

    setTimeout(() => {
        mensaje.classList.remove("mostrar");
    }, 3000);
    });
    }
}, 0);
});
});

btnCerrar.addEventListener("click", () => {
modal.style.display = "none";
});

modal.addEventListener("click", (e) => {
if (e.target === modal) {
    modal.style.display = "none";
}
});
});