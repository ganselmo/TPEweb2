document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    window.addEventListener("load", mostrarHome);

    let URL = "partials/";
    let home = "home.html", service = "services.html", partners = "partners.html", contacto = "form.html", legales = "legales.html";
    let contenedor = document.querySelector(".main");
    let navInicio = document.querySelectorAll(".aInicio")
    let navServicios = document.querySelectorAll(".aServicios");
    let navPartners = document.querySelectorAll(".aPartners");
    let navContacto = document.querySelectorAll(".aContacto");
    let navLegales = document.querySelectorAll(".aLegales");

    contenedor.innerHTML = "<h1>Cargando...</h1>";
    handlearEventos();
    let intervals;
    //FUNCION HANDLER
    function handlearEventos() {
        for (const elemento of navInicio) {
            elemento.addEventListener("click", mostrarHome);
        }
        for (const elemento of navServicios) {
            elemento.addEventListener("click", mostrarServicios);
        }
        for (const elemento of navPartners) {
            elemento.addEventListener("click", mostrarPartners);
        }
        for (const elemento of navContacto) {
            elemento.addEventListener("click", mostrarContacto);
        }
        for (const elemento of navLegales) {
            elemento.addEventListener("click", mostrarLegales);
        }
    }

    //MOSTRAR HOME HTML
    async function mostrarHome(e) {
    
        clearInterval(intervals);
        e.preventDefault();
        try {
            let promise = fetch(URL + home);
            let response = await promise;
            if (response.ok) {
                let texto = await response.text();
                contenedor.innerHTML = texto;
            } else {
                contenedor.innerHTML = "<h1>Falla en la respuesta</h1>";
            }
        } catch (exc) {
            contenedor.innerHTML = "<h1>Falla de conexión</h1>"
        }

    }

    //MOSTRAR SERVICIOS HTML
    async function mostrarServicios(e) {
        e.preventDefault();
        clearInterval(intervals)
        contenedor.innerHTML = "<h1>Cargando...</h1>";
        try {
            let promise = fetch(URL + service);
            let response = await promise;
            if (response.ok) {
                let texto = await response.text();
                contenedor.innerHTML = texto;
                cargarPaginaServicios();
            } else {
                contenedor.innerHTML = "<h1>Falla en la respuesta</h1>";
            }
        } catch (exc) {
            contenedor.innerHTML = "<h1>Falla de conexión</h1>";
        }
    }


    //MOSTRAR PARTNERS HTML
    async function mostrarPartners(e) {
        e.preventDefault();
        clearInterval(intervals)
        contenedor.innerHTML = "<h1>Cargando...</h1>";
        try {
            let promise = fetch(URL + partners);
            let response = await promise;
            if (response.ok) {
                let texto = await response.text();
                contenedor.innerHTML = texto;
            } else {
                contenedor.innerHTML = "<h1>Falla en la respuesta</h1>";
            }
        } catch (exc) {
            contenedor.innerHTML = "<h1>Falla de conexión</h1>";
        }
    }

    //MOSTRAR FORM HTML
    async function mostrarContacto(e) {
        e.preventDefault();
        clearInterval(intervals)
        contenedor.innerHTML = "<h1>Cargando...</h1>";
        try {
            let promise = fetch(URL + contacto);
            let response = await promise;

            if (response.ok) {
                let texto = await response.text();
                contenedor.innerHTML = texto;
                cargarPaginaContacto();
            } else {
                contenedor.innerHTML = "<h1>Falla en la respuesta</h1>";
            }
        } catch (exc) {
            contenedor.innerHTML = "<h1>Falla de conexión</h1>";
        }
    }

    //MOSTRAR LEGALES HTML
    async function mostrarLegales(e) {
        clearInterval(intervals)
        e.preventDefault();
        try {
            let promise = fetch(URL + legales);
            let response = await promise;
 
            if (response.ok) {
                let texto = await response.text();
                contenedor.innerHTML = texto;
            } else {
                contenedor.innerHTML = "<h1>Falla en la respuesta</h1>";
            }
        } catch (exc) {
            contenedor.innerHTML = "<h1>Falla de conexión</h1>"
        }
    }

    //SERVICES

    function cargarPaginaServicios() {
        let URLREST = "http://web-unicen.herokuapp.com/api/groups/grupo23/cancionero/";

        // SELECT
        const MAXSELECT = 1980;
        let select = document.querySelector("select");
        for (let i = 2019; i > MAXSELECT; i--) {
            select.innerHTML += "<option value='" + i + "'>" + i + "</option>";
        }

        //BOTON POST X3
        let btnPostx3 = document.querySelector(".btnPostx3");
        btnPostx3.addEventListener("click", () => {
            for (let i = 0; i < 3; i++) {
                post()
            }
            limpiarCampos()
        })

        // BOTON POST
        let btnPost = document.querySelector(".btnPost");
        btnPost.addEventListener("click", () => {
            post()
            limpiarCampos()
        });
        function limpiarCampos() {
            document.querySelector("#headerCancion").value = "";
            document.querySelector("#headerArtista").value = "";
            document.querySelector("#headerAnio").value = "2019";
            document.querySelector("#headerAlbum").value = "";
            document.querySelector("#headerDuracion").value = "";
        }
        async function post() {
            let data = {
                "thing": [{
                    "cancion": document.querySelector("#headerCancion").value,
                    "artista": document.querySelector("#headerArtista").value,
                    "anio": document.querySelector("#headerAnio").value,
                    "album": document.querySelector("#headerAlbum").value,
                    "duracion": document.querySelector("#headerDuracion").value,
                }]
            }
            let contenedor = document.querySelector(".contenedor");
            contenedor.innerHTML = "<h1>Cargando...</h1>";
            try {
                let request = fetch(URLREST, {
                    "method": "POST",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(data)
                });
                let response = await request;
                if (response.ok) {
                    let json = await response.json();
                    cargar();
                }
                else {
                    contenedor.innerHTML = "<h1>Falla de URL</h1>";
                }
            }
            catch (exc) {
                contenedor.innerHTML = "<h1>Falla de conexión</h1>";
            }

        }

        let todosElementos = [];




        //AUTO ACTUALIZACION
        intervals = setInterval(checkIfChanged, 2000);
        //Funcion para checkear si hubo cambios en el servicio vs lo que ya tiene el todosElementos - si los hay, se recarga la tabla.
        async function checkIfChanged() {
            console.log("Checked")
            try {
                let request = fetch(URLREST);
                let response = await request;
                if (response.ok) {
                    let json = await response.json();
                    if (todosElementos.length != json.cancionero.length) {
                        cargarTabla(json.cancionero)
                    }
                    else {
                        let cambio = false;
                        for (let i = 0; i < json.cancionero.length; i++) {
                            if (!(Object.entries(json.cancionero[i].thing[0]).toString() === Object.entries(todosElementos[i].thing[0]).toString())) {
                                //Object.entries trasnforma un objeto en una matriz de pares enumerables [key, value], entonces es mas facil hacerlos string y asi hacerlos comparables.
                                cambio = true;
                            }
                        }
                        if (cambio) {
                            cargarTabla(json.cancionero)
                        }

                    }
                }
            }
            catch (exc) {
                console.log(exc)
            }
        }
        //funcion para recargar la lista todosElementos.
        async function cargar() {
            let contenedor = document.querySelector(".contenedor");

            try {
                let request = fetch(URLREST);
                contenedor.innerHTML = "<h1>Cargando...</h1>";
                let response = await request;
                if (response.ok) {
                    let json = await response.json();
                    todosElementos = json.cancionero;

                    cargarTabla(json.cancionero)

                }
                else {
                    contenedor.innerHTML = "<h1>Falla de URL</h1>";
                }
            }
            catch (exc) {
                contenedor.innerHTML = "<h1>Falla de conexión</h1>";
            }



        }
        cargar()
        //funcion para dibujar a la tabla
        function cargarTabla(cancionero) {
            let contenedor = document.querySelector(".contenedor");

            if (cancionero != "") {
                todosElementos = cancionero;
                contenedor.innerHTML = "";

                for (let element of todosElementos) {
                    for (let data of element.thing) {
                        contenedor.innerHTML +=
                            `<tr>
                        <td>${data.cancion}</td>
                        <td>${data.artista}</td>
                        <td>${data.anio}</td>
                        <td>${data.album}</td>
                        <td>${data.duracion}</td>
                        <td class='options'>
                            <button id='${element._id}' class='btnDelete'>
                                <img class = 'icons' src = 'css/images/icons/delete.png'>
                            </button>
                            <button id='${element._id}' class='btnPut'>
                                <img class = 'icons' src = 'css/images/icons/edit.png'>
                            </button>
                        </td>
                    </tr>`;
                    }
                }
                handlearBotonEliminar();
                handlearBotonModificar();
            }
            else {
                contenedor.innerHTML = "<h1> No hay Elementos para mostrar</h1>"
            }

        }

        function handlearBotonEliminar() {
            let btnDelete = document.querySelectorAll(".btnDelete");
            for (let element of btnDelete) {
                element.addEventListener("click", function () {

                    deleteElement(element.id);
                })

            }
        }



        function handlearBotonModificar() {
            let btnPut = document.querySelectorAll(".btnPut");
            for (let element of btnPut) {
                element.addEventListener("click", function () {
                    cargarInput(element.id);

                })


            }


        }
        //funcion para llenar el input cuando se modifica.
        function cargarInput(id) {
            let btnPut = document.querySelectorAll(".btnPut");
            for (let element of btnPut) {
                element.classList.add("oculto");
            }
            let btnDelete = document.querySelectorAll(".btnDelete");


            for (let element of btnDelete) {
                element.disabled = true;
            }
            clearInterval(intervals);
            quitar()
            const resultado = todosElementos.find(elemento => elemento._id === id);

            document.querySelector("#headerCancion").value = resultado.thing[0].cancion;
            document.querySelector("#headerArtista").value = resultado.thing[0].artista;
            document.querySelector("#headerAnio").value = resultado.thing[0].anio;
            document.querySelector("#headerAlbum").value = resultado.thing[0].album;
            document.querySelector("#headerDuracion").value = resultado.thing[0].duracion;

            let btnGuardar = document.querySelector(".btnGuardar");

            btnPost.classList.add("oculto");
            btnPostx3.classList.add("oculto");
            btnGuardar.classList.remove("oculto");


            btnGuardar.id = resultado._id;
            btnGuardar.addEventListener("click", async function () {
                for (let element of btnDelete) {
                    element.disabled = false;
                }
                let data = {
                    "thing": [{
                        "cancion": document.querySelector("#headerCancion").value,
                        "artista": document.querySelector("#headerArtista").value,
                        "anio": document.querySelector("#headerAnio").value,
                        "album": document.querySelector("#headerAlbum").value,
                        "duracion": document.querySelector("#headerDuracion").value,
                    }]
                }

                let contenedor = document.querySelector(".contenedor");
                contenedor.innerHTML = "<h1>Cargando...</h1>";

                try {
                    let request = fetch(URLREST + btnGuardar.id, {
                        "method": "PUT",
                        "headers": { "Content-Type": "application/json" },
                        "body": JSON.stringify(data)
                    });
                    let response = await request;

                    if (response.ok) {
                        let json = await response.json();
                        btnPost.classList.remove("oculto");
                        btnPostx3.classList.remove("oculto");
                        btnGuardar.classList.add("oculto");
                        cargar();
                        limpiarCampos();

                        for (let element of btnPut) {
                            element.classList.add("oculto");
                        }


                    }
                    else {
                        contenedor.innerHTML = "<h1>Falla de URL</h1>";
                    }
                }
                catch (exc) {
                    contenedor.innerHTML = "<h1>Falla de conexión</h1>";
                }
            })
        }

        // BOTON DELETE
        async function deleteElement(id) {
            clearInterval(intervals);
            quitar()
            try {
                let request = fetch(URLREST + id, {
                    "method": "DELETE",
                    "headers": { "Content-Type": "application/json" }
                });
                let response = await request;
                if (response.ok) {
                    let json = await response.json();
                    cargar();
                }
                else {
                    contenedor.innerHTML = "<h1>Falla de URL</h1>";
                }
            }
            catch (exc) {
                contenedor.innerHTML = "<h1>Falla de conexión</h1>";
            }
        }

        let btnBuscar = document.querySelector("#btnBuscar");
        
        let filtroCancion = document.querySelector("#filtroCancion");
        filtroCancion.addEventListener('focus',function(e){
                clearInterval(intervals);   
            }
        );
        
        btnBuscar.addEventListener('click', filtrar)

        function filtrar() {
            clearInterval(intervals);
            let cancion = document.querySelector("#filtroCancion").value;
            if (cancion != "") {
                let filtro = [];

                for (let element of todosElementos) {
                    if (element.thing[0].cancion == cancion) {
                        filtro.push(element);
                    }
                };
                btnBuscar.classList.add("oculto");
                btnPost.disabled = true;
                btnPostx3.disabled = true;
                cargarTabla(filtro);
                btnQuitar.classList.remove("oculto");
            }
        }
        let btnQuitar = document.querySelector("#btnQuitar");
        btnQuitar.classList.add("oculto");

        btnQuitar.addEventListener('click', function () {
            cargar();

            quitar();
        })

        function quitar() {
            intervals = setInterval(checkIfChanged, 2000);
            btnPost.disabled = false;
            btnPostx3.disabled = false;
            btnQuitar.classList.add("oculto");
            btnBuscar.classList.remove("oculto")
            document.querySelector("#filtroCancion").value = "";
        }
    }

    // VALIDACION FORMULARIO DE CONTACTO
    function cargarPaginaContacto() {
        randomear();

        //BOTON VALIDAR
        let btn = document.querySelector("#btn-enviar");
        btn.addEventListener("click", validar);

        function validar(e) {
            let captcha = document.querySelector("#captcha").innerHTML;
            let validationtxt = document.querySelector("#captchainput").value;

            if (captcha != validationtxt) {
                console.log("NO validado");
                randomear();
                e.preventDefault();
            }
        }

        function randomear() {
            let captcha = document.querySelector("#captcha");
            captcha.innerHTML = Math.floor((Math.random() * 10)).toString() + Math.floor((Math.random() * 10)).toString() + Math.floor((Math.random() * 10)).toString() + Math.floor((Math.random() * 10)).toString() + Math.floor((Math.random() * 10)).toString() + Math.floor((Math.random() * 10)).toString();
        }
    }
})