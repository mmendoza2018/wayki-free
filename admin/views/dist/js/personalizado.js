console.log("hola");
/* general */
const alertaPersonalizada = (type, message) => {

    Swal.fire({
        position: "center",
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 1500
    });

}

const toastPersonalizado = (type, message) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: type,
        title: message
    })
}


const validarFormulario = (idFormulario) => {
    const listaCampos = document.querySelectorAll(`#${idFormulario} [data-validate]`);
    let validacion = true;

    if (listaCampos.length > 0) {
        listaCampos.forEach(elemento => {
            const tipoElemento = elemento.getAttribute("type");
            //validamos campos con value
            if (elemento.value === "") {
                validacion = false;
                elemento.style.setProperty("border", "1px solid red");
                setTimeout(() => {
                    elemento.style.setProperty("border", "");
                }, 2000);
            }

            //validamos campos tipo checkbox
            if (tipoElemento === "checkbox" && !elemento.checked) {
                validacion = false;
                elemento.style.setProperty("border", "1px solid red");
                setTimeout(() => {
                    elemento.style.setProperty("border", "");
                }, 2000);
            }

            //validamos campos tipo radio
            if (tipoElemento === "radio") {
                const name = elemento.getAttribute("name");
                const inputsRadio = document.querySelectorAll(`input[type="radio"][name="${name}"]`);
                let checked = false;

                inputsRadio.forEach(radio => {
                    if (radio.checked) {
                        checked = true;
                    }
                });

                if (!checked) {
                    validacion = false;
                }
            }
        })
    }
    return validacion;
}


/* fin general */


/* para clientes  */

const agregarCliente = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("clientes/add_clientes.php", { method: "POST", body: data });
    let response = await res.json();
    if (response[0]) {
        alertaPersonalizada("success", response[1])
        formulario.reset();
    } else {
        alertaPersonalizada("error", response[1])
    }

}

const obtenerClientes = async (id) => {

    let res = await fetch(`clientes/data.php?id=${id}`);
    let response = await res.json();

    document.getElementById("idAct").value = response.id;
    document.getElementById("nombresAct").value = response.nombres;
    document.getElementById("correoAct").value = response.correo;
    document.getElementById("celularAct").value = response.celular;
    document.getElementById("estadoAct").value = 1;

}

const actualizarCliente = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("clientes/update_clientes.php", { method: "POST", body: data });
    let response = await res.json();

    if (response[0]) {
        alertaPersonalizada("success", response[1])
        $("#updateModal").modal("hide");
        setTimeout(() => {
            CargarContenido('content-wrapper', "clientes/tabla_clientes.php");
        }, 500);
    } else {
        alertaPersonalizada("error", response[1])
    }

}

/* fin clientes  */



/* para servicios  */

const agregarServicio = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("servicios/add_servicios.php", { method: "POST", body: data });
    let response = await res.json();
    if (response[0]) {
        alertaPersonalizada("success", response[1])
        formulario.reset();
    } else {
        alertaPersonalizada("error", response[1])
    }

}

const obtenerServicio = async (id) => {

    let res = await fetch(`servicios/data.php?id=${id}`);
    let response = await res.json();

    document.getElementById("idAct").value = response.id;
    document.getElementById("descripcionAct").value = response.descripcion;
    document.getElementById("estadoAct").value = 1;

}

const actualizarServicio = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("servicios/update_servicios.php", { method: "POST", body: data });
    let response = await res.json();

    if (response[0]) {
        alertaPersonalizada("success", response[1])
        $("#updateModal").modal("hide");
        setTimeout(() => {
            CargarContenido('content-wrapper', "servicios/tabla_servicios.php");
        }, 500);
    } else {
        alertaPersonalizada("error", response[1])
    }

}

/* fin servicios  */

/* para categoria servicios  */

const agregarCategoriaServicio = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("categoria_servicios/add_cat_servicios.php", { method: "POST", body: data });
    let response = await res.json();
    if (response[0]) {
        alertaPersonalizada("success", response[1])
        formulario.reset();
    } else {
        alertaPersonalizada("error", response[1])
    }

}

const obtenerCategoriaServicio = async (id) => {
    let res = await fetch(`categoria_servicios/data.php?id=${id}`);
    let response = await res.json();

    document.getElementById("idAct").value = response.id;
    document.getElementById("tituloAct").value = response.titulo;
    document.getElementById("servicio_idAct").value = response.servicio_id;
    document.getElementById("descripcionAct").value = response.descripcion;
    document.getElementById("precioAct").value = response.precio;
    document.getElementById("cantidad_max_personasAct").value = response.cantidad_max_personas;
    document.getElementById("estadoAct").value = 1;

}

const actualizarCategoriaServicio = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("categoria_servicios/update_cat_servicios.php", { method: "POST", body: data });
    let response = await res.json();

    if (response[0]) {
        alertaPersonalizada("success", response[1])
        $("#updateModal").modal("hide");
        setTimeout(() => {
            CargarContenido('content-wrapper', "categoria_servicios/tabla_cat_servicios.php");
        }, 500);
    } else {
        alertaPersonalizada("error", response[1])
    }

}

/* fin categoria servicios  */


/* para subCategoria servicios  */

const agregarSubCategoriaServicio = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("subcategoria_servicios/add_subcat_servicios.php", { method: "POST", body: data });
    let response = await res.json();
    if (response[0]) {
        alertaPersonalizada("success", response[1])
        formulario.reset();
    } else {
        alertaPersonalizada("error", response[1])
    }

}

const obtenerSubCategoriaServicio = async (id) => {
    let res = await fetch(`subcategoria_servicios/data.php?id=${id}`);
    let response = await res.json();

    document.getElementById("idAct").value = response.id;
    document.getElementById("tituloAct").value = response.titulo;
    document.getElementById("servicio_cat_idAct").value = response.servicio_cat_id;
    document.getElementById("descripcionAct").value = response.descripcion;
    document.getElementById("precioAct").value = response.precio;
    document.getElementById("cantidad_max_personasAct").value = response.cantidad_max_personas;
    document.getElementById("estadoAct").value = 1;

}

const actualizarSubCategoriaServicio = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("subcategoria_servicios/update_subcat_servicios.php", { method: "POST", body: data });
    let response = await res.json();

    if (response[0]) {
        alertaPersonalizada("success", response[1])
        $("#updateModal").modal("hide");
        setTimeout(() => {
            CargarContenido('content-wrapper', "subcategoria_servicios/tabla_subcat_servicios.php");
        }, 500);
    } else {
        alertaPersonalizada("error", response[1])
    }

}

/* fin servicios  */



/* para subCategoria servicios  */

const agregarReserva = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("reservas/add_reservas.php", { method: "POST", body: data });
    let response = await res.json();
    if (response[0]) {
        alertaPersonalizada("success", response[1])
        formulario.reset();
    } else {
        alertaPersonalizada("error", response[1])
    }

}

const obtenerReserva = async (id) => {
    let res = await fetch(`reservas/data.php?id=${id}`);
    let response = await res.json();

    document.getElementById("idAct").value = response.id;
    document.getElementById("id_servicio_categoriaAct").value = response.id_servicio_categoria;
    document.getElementById("id_servicio_subcategoriaAct").value = response.id_servicio_subcategoria;
    document.getElementById("id_clienteAct").value = response.id_cliente;
    document.getElementById("num_personasAct").value = response.num_personas;
    document.getElementById("fecha_reservaAct").value = response.fecha_reserva;
    document.getElementById("estadoAct").value = 1;

}

const actualizarReserva = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("reservas/update_reservas.php", { method: "POST", body: data });
    let response = await res.json();

    if (response[0]) {
        alertaPersonalizada("success", response[1])
        $("#updateModal").modal("hide");
        setTimeout(() => {
            CargarContenido('content-wrapper', "reservas/tabla_reservas.php");
        }, 500);
    } else {
        alertaPersonalizada("error", response[1])
    }

}


const arrayBufferToPDF = (idContainer, arrayBuffer) => {
    document.getElementById(idContainer).innerHTML = "";
    let blob = new Blob([arrayBuffer], { type: "application/pdf" });
    let blobUrl = URL.createObjectURL(blob);
    let iframe = document.createElement("iframe");
    iframe.src = blobUrl;
    iframe.width = "100%";
    iframe.height = "500px";
    document.getElementById(idContainer).appendChild(iframe);
  };


const generarPdf = async (idReserva) => {
    try {
        console.log('idReserva :>> ', idReserva);
        const response = await fetch(`../templatesPDF/capacitacion.php?id=${idReserva}`);
        const arrayBuffer = await response.arrayBuffer();
        arrayBufferToPDF("pdfReserva", arrayBuffer);
    } catch (error) {
        console.error(error);
    }

}

/* fin servicios  */

/* login */

const autentication = async (formulario) => {
    event.preventDefault();
    if (!validarFormulario(formulario.getAttribute("id"))) return toastPersonalizado("warning", "Complete todos los campos");
    let data = new FormData(formulario);

    let res = await fetch("admin/login.php", { method: "POST", body: data });
    let response = await res.json();

    if (response[0]) {
        alertaPersonalizada("success", response[1])
        setTimeout(() => {
            location.href = "admin/views/admin.php";
        }, 1100);
    } else {
        alertaPersonalizada("error", response[1])
    }

}


const sendEmail = async (idReserva) => {
    try {
        const response = await fetch(`../envio_reserva/send.php?id=${idReserva}`);
        const data = await response.json();
        if (data[0]) {
            alertaPersonalizada("success", data[1])
        } else {
            alertaPersonalizada("error", data[1])
        }
    } catch (error) {
        console.error(error);
    }

}