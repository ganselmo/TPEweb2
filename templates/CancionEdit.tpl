{include file="header.tpl"}

<form action="Canciones/Patch" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{$cancion->nombre}">
    <label for="duracion">Duración</label>
    <input type="number" class="form-control" name="duracion" value="{$cancion->duracion}">
    <label for="genero">Género</label>
    <input type="text" class="form-control" name="genero" value="{$cancion->genero}">
    <label for="album">Álbum</label>
    <input type="text" class="form-control" name="album" value="{$cancion->album}">
    <label for="id_artista">Artista</label>
    <input type="text" class="form-control" name="id_artista" value="{$cancion->id_artista}">
    <label for="ranking">Ranking</label>
    <input type="text" class="form-control" name="ranking" value="{$cancion->ranking}">
    <input type="hidden" name="id" value="{$cancion->id}">
  </div>
  <button type="submit" class="btn btn-primary">Aceptar</button>
</form>

{include file="footer.tpl"}