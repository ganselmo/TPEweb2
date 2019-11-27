let headerMan = new Vue({
    el: '#header',
    data: {
        username:{},
        isset:false
    },
    methods:
    {
        getSessionData()
        {
            fetch("api/User/Session")
            .then(res => res.json())
            .then(data => this.username = data)
        }
    },
    mounted: function()
    {
        this.getSessionData();
    }

})