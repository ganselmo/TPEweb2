document.addEventListener("DOMContentLoaded",function()
{
    let btnArtista = document.querySelector("#Artistas");
    let btnCancion = document.querySelector("#Canciones");
<<<<<<< HEAD

=======
>>>>>>> 562bdb1c8eb07b2daf03520116292118d0dbb94e

    btnArtista.addEventListener("click",function()
    {
        window.location='Artistas/Get';
    });
    btnCancion.addEventListener("click",function()
    {
        window.location='Canciones/Get';
    });
    
});