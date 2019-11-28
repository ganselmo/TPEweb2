let headerMan = new Vue({
    el: '#header',
    data: {
        username: "",
        lastStatus: ""
    },
    methods:
    {
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
        }
    },
    mounted: function () {
        this.getSessionData();
    }

})