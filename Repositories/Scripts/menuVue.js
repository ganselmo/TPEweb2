let menu = new Vue({
    el: '#menu',
    data: {
      message: 'Hello Vue!'
    },
    methods:{
        redirect(event)
        {   
            window.location.href = event.target.innerText + "/Get";            
        }
    }
  })