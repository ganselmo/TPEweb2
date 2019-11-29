let menu = new Vue({
  el: '#menu',
  data: {
    canClickCanciones: false,
    canClickArtistas: false,
    canClickUsuarios: false
  },
  methods: {
    redirect(event) {

      window.location.href = event.currentTarget.getAttribute("data-direct") + "/Get";
    }


  },
  created: function () {

    headerMan.$watch('access', function () {

      menu.canClickCanciones = headerMan.evaluate('Canciones/Get')
      menu.canClickArtistas = headerMan.evaluate('Artistas/Get')
      menu.canClickUsuarios = headerMan.evaluate('Users/All')
      
    })



  }
});