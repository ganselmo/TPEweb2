let cancionShow = new Vue({
    el: '#cancionesShow',
    data: {
        cancionId :"",
        cancion: {
            artista:{},
            imagenes:[]
        },
        loading: true,
        comentarios:[]
    },
    methods: {

        getCancion() {
            
            let url = window.location.href.split('/')
            this.cancionId = url[url.length-1];
            fetch("api/Canciones/Get/"+this.cancionId)
            .then(res => res.json())
            .then(data => this.cancion = data
                ).then(this.loading = false)
        },

        getComentarios()
        {
            
            fetch("api/Comentarios/Cancion/"+this.cancionId)
            .then(res => res.json())
            .then(data => this.comentarios = data)
           
        }

    },
    mounted: function () {
        
        this.getCancion();
        this.getComentarios();

    },

})