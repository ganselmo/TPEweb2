let ArtistaEdit = new Vue({
    el: '#ArtistaEdit',
    data: {
        artista: {},
    },
    methods:
    {
        getArtista() {

            let url = window.location.href.split('/')
            this.artistaid = url[url.length - 1];
            fetch("api/Artistas/Get/" + this.artistaid)
                .then(res => res.json())
                .then(data => {
                this.artista = data;
                });

        },
        aceptar() {
            let data =
            {
                id:this.artista.id,
                nombre: this.artista.nombre,
                apellido: this.artista.apellido,
                fechanac: this.artista.fechanac,
                ranking: this.artista.ranking,
            }

            fetch("api/Artistas/Patch", {
                method: 'PATCH',
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
    mounted:function()
    {
        this.getArtista();
    }
});