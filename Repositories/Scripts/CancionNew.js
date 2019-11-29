let cancionCreate = new Vue({
    el: '#cancionCreate',
    data: {
        cancion: {},
        artistas: [],
        select: ""
    },
    methods:
    {

        getAllArtistas() {

            fetch("api/Artistas/All")
                .then(res => res.json())
                .then(data => this.artistas = data
                ).catch(errors=>console.log(errors))

        }
        ,
        aceptar() {
            let data =
            {
                nombre: this.cancion.nombre,
                duracion: this.cancion.duracion,
                album: this.cancion.album,
                genero: this.cancion.genero,
                id_artista: this.select,
                ranking: this.cancion.ranking

            }

            fetch("api/Canciones/New", {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json())
                .catch(errors=>console.log(errors))
                .then(data=>console.log(data))
                window.location.href = "Canciones/Get";
        }
    },
    mounted: function () {

      
        this.getAllArtistas();



    },
});