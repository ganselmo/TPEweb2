let login = new Vue({
    el: '#login',
    data: {
        email:"",
        opass:""
    },
    methods:{
        login()
        {   

            let url = 'api/User/Login';
            data = {
                email:this.email,
                opass:this.opass
            }
            fetch(url, {
              method: 'POST',
              body: JSON.stringify(data),
              headers:{
                'Content-Type': 'application/json'
              }
            }).then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => console.log('Success:', response))
            .then(window.location.href="");
        }
    }
})