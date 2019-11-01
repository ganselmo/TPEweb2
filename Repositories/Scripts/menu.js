document.addEventListener("DOMContentLoaded",function()
{
    let btnArtista = document.querySelector("#Artistas");
    let btnCancion = document.querySelector("#Canciones");
    let btnAC = document.querySelector("#AC");

    btnArtista.addEventListener("click",function()
    {
        window.location=BASE+'Artistas/Get';
    });
    btnCancion.addEventListener("click",function()
    {
        window.location=BASE+'Canciones/Get';
    });
    btnAC.addEventListener("click",function()
    {
        window.location=BASE+'Artistas/Canciones';
    });
});