document.addEventListener("DOMContentLoaded",function()
{
    let btnArtista = document.querySelector("#Artistas");
    let btnCancion = document.querySelector("#Canciones");
    let btnAC = document.querySelector("#AC");

    btnArtista.addEventListener("click",function()
    {
        window.location='Artistas/Get';
    });
    btnCancion.addEventListener("click",function()
    {
        window.location='Canciones/Get';
    });
    btnAC.addEventListener("click",function()
    {
        window.location='Artistas/Canciones';
    });
});