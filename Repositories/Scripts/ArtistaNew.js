let ArtistaCreate = new Vue({
    el: '#artistaCreate',
    data: {
        artista: {},
    },
    methods:
    {

        aceptar() {
            let data =
            {
                nombre: this.artista.nombre,
                apellido: this.artista.apellido,
                fechanac: this.artista.fechanac,
                ranking: this.artista.ranking,
            }

            fetch("api/Artistas/New", {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json())
                .catch(errors=>console.log(errors))
                .then(data=>console.log(data))
                window.location.href = "Artistas/Get";
        }
    },
});