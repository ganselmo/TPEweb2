
function asincronismo () {
    document.addEventListener("DOMContentLoaded", function () {

        document.querySelector(".btnAgregar").addEventListener("click", crearBotones);

        function crearBoton (nombre) {
            let container = document.querySelector(".container");
            let boton = document.createElement("button");
            boton.name = nombre;
            boton.innerHTML = "Eliminar";
            boton.addEventListener("click", ()=>mostrarAlert(nombre))
            container.appendChild(boton);
        }

        function crearBotones () {
            let N =  document.querySelector(".input").value;
            for (let i = 0; i < N; i++) {
                let tiempo = Math.random() * 5000;
                setTimeout(function () {crearBoton(parseInt(Math.random() * 100000) + "id" + i)}, tiempo);
            }
        }

        function mostrarAlert (nombre) {
            console.log(nombre);
            document.querySelectorAll()
        }
    })
}