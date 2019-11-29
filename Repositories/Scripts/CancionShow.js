let cancionShow = new Vue({
    el: '#cancionesShow',
    data: {
        cancionId: "",
        cancion: {
            artista: {},
            imagenes: []
        },
        loading: true,
        comentarios: [],
        nuevoComentario: "",
        comentarioPuntaje: 3,
        comentarioError: "",
        fileError: "",
        actualImage: "",
        imageToUpload: ""
    },
    methods: {
        checkear(event)
        {
            let form  = event.currentTarget.parentNode;
            if(document.querySelector("#file").files.length > 0)
            {
                form.submit();
                this.fileError=""
            }
            else{
                this.fileError="Archivo no selecionado"
            }
        }
        ,
        getCancion() {

            let url = window.location.href.split('/')
            this.cancionId = url[url.length - 1];
            fetch("api/Canciones/Get/" + this.cancionId)
                .then(res => res.json())
                .then(data => this.cancion = data
                ).then(this.loading = false)
        },

        getComentarios() {

            fetch("api/Comentarios/Cancion/" + this.cancionId)
                .then(res => res.json())
                .then(data => this.comentarios = data)

        }
        ,
        comentar() {
            let url = 'api/Comentarios/New';
            if (this.nuevoComentario.trim() == "") {
                this.comentarioError = "El comentario esta vacio"
            }
            else {


                if (this.validatePuntuacion()) {
                    data = {
                        comentario: this.nuevoComentario,
                        valoracion: this.comentarioPuntaje,
                        id_cancion: this.cancionId
                    }
                    fetch(url, {
                        method: 'POST',
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(res => res.json())
                        .catch(error => console.error('Error:', error))
                        .then(response => {
                            console.log('Success:', response);
                            this.cleanComenatio();
                            this.comentarioError = "";
                            this.getComentarios();
                        }
                        );
                }
                else {
                    this.comentarioError = "Solo Valores entre 1 y 5"
                }
            }

        },
        validatePuntuacion() {
            if (this.comentarioPuntaje > 0 && this.comentarioPuntaje <= 5) {
                return true;
            }
            else {
                return false;
            }
        },
        cleanComenatio() {
            this.nuevoComentario = "";
            this.comentarioPuntaje = 3;
        },
        borrarImagen() {

            let elementid = this.$el.querySelector(".carousel-item.active").children[0].id;
            this.$el.querySelector(".carousel-item").classList.add("active");
            let url = 'api/Imagenes/Delete';
            let data = {
                id: elementid
            }

            if (elementid != 0) {
                fetch(url, {
                    method: 'DELETE',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json())
                    .catch(error => console.error('Error:', error))
                    .then(response => {
                        console.log('Success:', response);
                        this.getCancion();
                    }).then(this.getCancion())


            }
            else {
                console.log("no se puede eliminar la imagen standard");
            }
        },
        borrarComentario(id) {
            let url = 'api/Comentarios/Delete';
            let data = {
                id: id
            }


            fetch(url, {
                method: 'DELETE',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json())
                .catch(error => console.error(error))
                .then(response => {
                    console.log('Success:', response);
                    this.getComentarios();
                })


        },
        puntuacion() {
            let promedio = 0;
            this.comentarios.forEach(element => {
                promedio += parseInt(element.valoracion)
            });
            if (this.comentarios.length == 0) {
                return (promedio).toFixed(2);
            } else {
                return (promedio / this.comentarios.length).toFixed(2);
            }
        }
    },
    mounted: function () {

        this.getCancion();
        this.getComentarios();

    },

})