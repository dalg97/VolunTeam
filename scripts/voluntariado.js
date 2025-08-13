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

            const botonRegistro = contenidoDetalle.querySelector(".btn-registrar");
            if (botonRegistro) {
                console.log("Botón registrar encontrado en modal.");
                
                botonRegistro.replaceWith(botonRegistro.cloneNode(true));
                const nuevoBoton = contenidoDetalle.querySelector(".btn-registrar");

                nuevoBoton.addEventListener("click", function (e) {
                    e.preventDefault();
                    const idEvento = nuevoBoton.getAttribute("data-evento");
                    console.log("Click registrar para evento:", idEvento);
                    console.log("Entrando al fetch:");
                    fetch('scripts/registrar_evento.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'id_evento=' + encodeURIComponent(idEvento),
                        credentials: 'include'
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Respuesta servidor:", data);
                        if (data.success) {
                            mensaje.textContent = "¡Registro exitoso!";
                            mensaje.classList.add("mostrar");
                        } else {
                            mensaje.textContent = "Error: " + data.message;
                            mensaje.classList.add("mostrar");
                        }
                        modal.style.display = "none";
                        setTimeout(() => {
                            mensaje.classList.remove("mostrar");
                        }, 3000);
                    })
                    .catch(error => {
                        console.error("Error en fetch:", error);
                        mensaje.textContent = "Error en la comunicación con el servidor.";
                        mensaje.classList.add("mostrar");
                        modal.style.display = "none";
                        setTimeout(() => {
                            mensaje.classList.remove("mostrar");
                        }, 3000);
                    });
                });
            } else {
                console.warn("No se encontró el botón registrar en modal.");
            }
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
