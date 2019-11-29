let ArtistasTable = new Vue({
    el: '#artistasTable',
    data: {
        artistas: [],
        canEditar : false,
        canNuevo : false,
        canBorrar : false
    },
    methods: {

        nuevo() {
            console.log('test');
            window.location.href = "Artistas/Create";
        },
        getArtistas() {
            fetch("api/Artistas/All")
            .then(res => res.json())
            .then(data => this.artistas = data)
        },
        editar(event)
        {
            let value = event.target.value;
            window.location.href = "Artistas/Edit/"+ value;
        },
        borrar(event)
        {
            
            let value = event.target.value;
            let data =
            {
                id:value
            }
            let url = "api/Artistas/Delete";
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
                    this.getArtistas();
                });
        },


    },
    created: function () {

        headerMan.$watch('access', function () {
    

            ArtistasTable.canEditar = headerMan.evaluate('Artistas/Edit/[id]')
            ArtistasTable.canNuevo = headerMan.evaluate('Artistas/New')
            ArtistasTable.canBorrar = headerMan.evaluate('Artistas/Delete')
          
        })
    
    }
    ,
    mounted: function () {
        this.getArtistas();
        
    },

})