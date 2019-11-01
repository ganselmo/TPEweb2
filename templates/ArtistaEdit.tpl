{include file="header.tpl"}

<form action="{BASE}Artistas/Patch" method="POST">
  <div class="form-group">
  <input type="hidden" name="id" value="{$artista->id}">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{$artista->nombre}">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" value="{$artista->apellido}">
    <label for="fechanac">Fecha de Nacimiento</label>
    <input type="date" class="form-control" name="fechanac" value="{$artista->fechanac}">
    <label for="ranking">Ranking</label>
    <input type="text" class="form-control" name="ranking" value="{$artista->ranking}">
  </div>
  <button type="submit" class="btn btn-primary">Modificar</button>
  <button type="button" class="btn btn-warning">Cancelar</button>
</form>

{include file="footer.tpl"}
