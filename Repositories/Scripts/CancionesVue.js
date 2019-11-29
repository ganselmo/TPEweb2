let cancionesTable = new Vue({
    el: '#cancionesTable',
    data: {
        canciones: []
    },
    methods: {

        nuevo() {
            console.log('test');
            window.location.href = "Canciones/Create";
        },
        getCanciones() {
            fetch("api/Canciones/All")
            .then(res => res.json())
            .then(data => this.canciones = data)
        },
        nuevo()
        {
            window.location.href = "Canciones/Create";
        },
        ver(event)
        {
            let value = event.target.value;
            window.location.href = "Canciones/Get/"+ value;
        },
        editar(event)
        {
            let value = event.target.value;
            window.location.href = "Canciones/Edit/"+ value;
        },
        borrar(event)
        {
            let value = event.target.value;
            let data =
            {
                id:value
            }
            let url = "api/Canciones/Delete";
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
                    this.getCanciones();
                })
        }


    },
    mounted: function () {
        this.getCanciones();
        
    },

})