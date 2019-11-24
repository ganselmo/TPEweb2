document.addEventListener("DOMContentLoaded",function()
{
    let btnArtista = document.querySelector("#Artistas");
    let btnCancion = document.querySelector("#Canciones");

    btnArtista.addEventListener("click",function()
    {
        window.location='Artistas/Get';
    });
    btnCancion.addEventListener("click",function()
    {
        window.location='Canciones/Get';
    });
    
});