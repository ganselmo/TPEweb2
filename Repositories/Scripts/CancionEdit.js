let cancionEdit = new Vue({
    el: '#cancionEdit',
    data: {
        cancion: {
            artista: {}
        },
        artistas: [],
        select: ""
    },
    methods:
    {
        getCancion() {

            let url = window.location.href.split('/')
            this.cancionId = url[url.length - 1];
            fetch("api/Canciones/Get/" + this.cancionId)
                .then(res => res.json())
                .then(data => {
                this.cancion = data;
                    this.select = data.artista.id;
                });

        },
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
                ranking: this.cancion.ranking,
                id:this.cancion.id
            }

            fetch("api/Canciones/Patch", {
                method: 'PATCH',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json())
                .then(data => this.artistas = data
                ).then(this.loading = false)
                .catch(errors=>console.log(errors))
                window.location.href = "Canciones/Get";
        }
    },
    mounted: function () {

        this.getCancion();
        this.getAllArtistas();



    },
});