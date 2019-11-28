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
        ver(event)
        {
            let value = event.target.value;
            window.location.href = "Canciones/Get/"+ value;
        },
        editar(event)
        {
            
        },
        borrar(event)
        {
            
        }


    },
    mounted: function () {
        this.getCanciones();
        
    },

})