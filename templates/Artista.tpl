{include file="header.tpl"}

<div class="card" >
  <div class="card-body">
    <h3 class="card-title">{$artista->nombre},{$artista->apellido}</h3>
    <h5 class="card-title">Fecha de nacimiento: {$artista->fechanac} </h5>
    <h5 class="card-subtitle mb-2 text-muted">Ranking#: {$artista->ranking}</h5>

  </div>
</div>

{include file="footer.tpl"}
