document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    document.querySelector(".navImg").addEventListener("click", () => {
        toggleOculto(document.querySelector(".headerNav"));
        
        menuImageToggle();
    });
    let footerlist = document.querySelectorAll(".footerblock");
    footerlist.forEach(function (item) {

        item.addEventListener("click", function () {

            toggleOculto(item.querySelector("section"));
        });
    });
    window.addEventListener("resize", function () {
        if (window.matchMedia("only screen and (min-width: 768px)").matches) {
            let oculto = document.querySelectorAll("nav.oculto, .footerblock section");
            oculto.forEach(function (item) {
                item.classList.remove("oculto");
            });
            
        }
        else {
            let oculto = document.querySelectorAll(".headerNav, .footerblock section");
            oculto.forEach(function (item) {
                item.classList.add("oculto");
            }); 
            menuReset();
        }       
    });
    function toggleOculto(item){
        if (!window.matchMedia("only screen and (min-width: 768px)").matches) {
            item.classList.toggle("oculto");
        }
        
    }
    if (window.matchMedia("only screen and (min-width: 768px)").matches) {
        let oculto = document.querySelectorAll("nav.oculto, .footerblock section");
        oculto.forEach(function (item) {
            item.classList.remove("oculto");
        })

        
    }
    function menuImageToggle(){
        let menuImage = document.getElementById("menu");
            if (menuImage.classList.contains("abierto")) {
                
                menuImage.classList.remove("abierto");
                menuImage.src = "css/images/menu-512.png";
            }
            else{
                menuImage.classList.add("abierto");
                document.getElementById("menu").src = "css/images/close3.png";
            }
    }
    function menuReset(){
        let menuImage = document.getElementById("menu");
        menuImage.classList.remove("abierto");
        menuImage.src = "css/images/menu-512.png";
    }
})
