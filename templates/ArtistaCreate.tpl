{include file="header.tpl"}

<form action="/Artista/New" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido">
    <label for="fechanac">Fecha de Nacimiento</label>
    <input type="date" class="form-control" name="fechanac">
    <label for="ranking">Ranking</label>
    <input type="text" class="form-control" name="ranking">
  </div>
  <button type="submit" class="btn btn-primary">Nuevo</button>
  <button type="button" class="btn btn-warning">Cancelar</button>
</form>

{include file="footer.tpl"}
