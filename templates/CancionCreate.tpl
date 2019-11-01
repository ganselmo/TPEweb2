{include file="header.tpl"}

<form action="{BASE}Canciones/New" method="POST">
  <div class="form-group">
     <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre">
    <label for="duracion">Duración</label>
    <input type="number" class="form-control" name="duracion">
    <label for="genero">Género</label>
    <input type="text" class="form-control" name="genero">
    <label for="album">Álbum</label>
    <input type="text" class="form-control" name="album">
    <label for="id_artista">Artista</label>
    <select name="id_artista" class="form-control">
      {foreach from=$artistas item=artista}
      <option value="{$artista->id}">{$artista->nombre} {$artista->apellido}</option>
      {/foreach}
    </select>
    <label for="ranking">Ranking</label>
    <input type="text" class="form-control" name="ranking">
  </div>
  <button type="submit" class="btn btn-primary">Nuevo</button>
 
</form>

{include file="footer.tpl"}
