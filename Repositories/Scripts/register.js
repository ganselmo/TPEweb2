let register = new Vue({
    el: '#register',
    data: {
        email:"",
        opass:"",
        rpass:""
    },
    methods:{
        register()
        {   

            let url = 'api/User/Register';
            data = {
                email:this.email,
                opass:this.opass,
                rpass:this.rpass
            }
            fetch(url, {
              method: 'POST',
              body: JSON.stringify(data),
              headers:{
                'Content-Type': 'application/json'
              }
            }).then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => console.log('Success:', response));
        }
    }
})