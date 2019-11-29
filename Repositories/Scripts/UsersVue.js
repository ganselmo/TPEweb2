let usersTable = new Vue({
    el: '#usersTable',
    data: {
        users: [],
        roles:[],
        roleSelect:""
    },
    methods: {


        getUsuarios() {
            fetch("api/Users/All")
            .then(res => res.json())
            .catch(error => console.log(error))
            .then(data =>{this.users= data})
        },
        getRoles()
        {
            fetch("api/Roles/All")
            .then(res => res.json())
            .catch(error => console.log(error))
            .then(data =>this.roles= data)
        },
        cambiarRole(event)
        {
            let usuario = this.buscarUsuario(event.currentTarget.value);

            
            let data = {
                id:usuario.id,
                id_role:usuario.roleId
            }
            let url = "api/User/Role/Patch";
            fetch(url, {
                method: 'PATCH',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json())
                .catch(error => console.error(error))
                .then(response => {
                    console.log('Success:', response);
                    this.getUsuarios();
                })
            
          
        },
        buscarUsuario(id)
        {
            return this.users.find( user => user.id === id );

        },
        resetPass(event)
        {
           console.log("TO-DO")
        },


    },
    mounted: function () {
        this.getUsuarios();
        this.getRoles();
    },

})