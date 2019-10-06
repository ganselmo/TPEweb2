
document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    // LISTA DE TABLA CANCIONES
    let lista = listainicio();
    actualizarlista(lista);
    // BOTON AGREGAR
    let btnAgregar = document.querySelector("#btnAgregar");
    btnAgregar.addEventListener("click", agregar);

    // BOTON AGREGAR X 3
    let btnAgregarX3 = document.querySelector("#btnAgregarX3");
    btnAgregarX3.addEventListener("click", function (e) {
        const MAX = 3;
        for (let i = 0; i < MAX; i++) {
            agregar(e);
        }
    });

    // FUNCION AGREGAR
    function agregar(e) {
        e.preventDefault();
        let cancion = document.querySelector("#inputCancion").value;
        let artista = document.querySelector("#inputArtista").value;
        let anio = document.querySelector("#comboBoxAnio").value;
        let album = document.querySelector("#inputAlbum").value;
        let duracion = document.querySelector("#inputDuracion").value;
        let linea = {
            "cancion": cancion,
            "artista": artista,
            "anio": anio,
            "album": album,
            "duracion": duracion,
        }

        if ((cancion != "") && (artista != "") && (anio != 0) && (album != "") && (duracion != 0)) {
            lista.push(linea);
            actualizarlista(lista);
        } else {
            console.log("Falta completar algún campo");
        }
    }

    // BOTON  RESET/BORRAR TABLA
    let btnReset = document.querySelector("#btnReset");
    btnReset.addEventListener("click", function (e) {
        e.preventDefault();
        lista.splice(0, lista.length);
        actualizarlista(lista);
    });
    
    
    // FUNCION INICIALIZAR LISTA
    function listainicio() {
        return [{
            "cancion": "cancion1",
            "artista": "artista1",
            "anio": "1990",
            "album": "album1",
            "duracion": 10,
        },
        {
            "cancion": "cancion2",
            "artista": "artista1",
            "anio": "1991",
            "album": "album3",
            "duracion": 11,
        }
        ]
    }


    // FUNCION ACTUALIZAR/MOSTRAR lista
    function actualizarlista(lista) {
        let tablelista = "";
        let sumaMinutos = 0;
        for (let i = 0; i < lista.length; i++) {
            tablelista += "<tr><td>" + lista[i].cancion + "</td>" +
                "<td>" + lista[i].artista + "</td>" +
                "<td>" + lista[i].anio + "</td>" +
                "<td>" + lista[i].album + "</td>" +
                "<td>" + lista[i].duracion + "</td></tr>";
            sumaMinutos += parseFloat(lista[i].duracion);
        }
        document.querySelector("#tBodyCanciones").innerHTML = tablelista;
        document.querySelector("#spantotal").innerHTML = sumaMinutos.toFixed(2);
    };


    let btnQuitar = document.querySelector("#btnQuitar");
    btnQuitar.addEventListener('click', function () {
        actualizarlista(lista);
    })



    let btnBuscar = document.querySelector("#btnBuscar");
    btnBuscar.addEventListener('click', filtrar)

    function filtrar() {

        let cancion = document.querySelector("#filtroCancion").value;

        if (cancion != "") {
            let filtro = [];


            lista.forEach(element => {
                if (element.cancion == cancion)
                    filtro.push(element);
            });

            if (filtro == []) {
                actualizarlista(lista);
            } else {
                actualizarlista(filtro);
            }
        }
    }

    let btnResaltar = document.querySelector("#btnResaltar");
    btnResaltar.addEventListener('click', resaltar);

    function resaltar() {
        actualizarlista(lista);

        let anio = document.querySelector("#filtroAnio").value;
        let tablelista = document.querySelectorAll("tbody tr");

        
        tablelista.forEach(element => {
          
            if (element.children[2].innerHTML == anio)
                element.classList.toggle("resaltada")
        });

    }
})

