let cancionesTable = new Vue({
    el: '#cancionesTable',
    data: {
        canciones: [],
        canVer: false,
        canEditar : false,
        canNuevo : false,
        canBorrar : false
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
    created: function () {

        headerMan.$watch('access', function () {
    
            cancionesTable.canVer = headerMan.evaluate('Canciones/Get/[id]')
            cancionesTable.canEditar = headerMan.evaluate('Canciones/Edit/[id]')
            cancionesTable.canNuevo = headerMan.evaluate('Canciones/New')
            cancionesTable.canBorrar = headerMan.evaluate('Canciones/Delete')
          
        })
    
    }
    ,
    mounted: function () {
        this.getCanciones();
        
    },

})