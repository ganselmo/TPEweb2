let headerMan = new Vue({
    el: '#header',
    data: {
        username: "",
        lastStatus: "",
        access:[]
    },
    methods:
    {
        evaluate($url){
            let busqueda = this.buscarAcceso($url);
            if (typeof busqueda !== 'undefined') {
                return true;
            }
            else
            {return false}
        },
        buscarAcceso(url)
        {
            return this.access.find( access => access.url === url );

        },
        getSessionData() {
            fetch("api/User/Session")
                .then(res => res.json())
                .then(data => this.username = data)
        }
        ,
        logout(event) {
            event.preventDefault();
            fetch("api/User/Logout")
                .then(res => res.json())
                .then(data => this.lastStatus = data)
                .then(window.location.href = "");
            this.loggedIn = false;
        },
        isLoggedIn() {
            if (this.username != null)
                return true
            else
                return false
        },
        getAccessData()
        {
            fetch("api/Access/All")
                .then(res => res.json())
                .then(data => {this.access = data})
        }
    },

    mounted: function () {
        this.getSessionData();
        this.getAccessData();
    }

})