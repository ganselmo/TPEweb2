{include file="header.tpl"}
{literal}

<form id="cancionCreate">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" v-model="cancion.nombre">
    <label for="duracion">Duración</label>
    <input type="text" class="form-control" name="duracion" v-model="cancion.duracion">
    <label for="genero">Género</label>
    <input type="text" class="form-control" name="genero" v-model="cancion.genero">
    <label for="album">Álbum</label>
    <input type="text" class="form-control" name="album" v-model="cancion.album">
    <label for="id_artista">Artista</label>
   
    <select class="form-control"  v-model="select" >
      <option v-for="artista in artistas"   v-bind:value="artista.id">
        {{artista.apellido}},  {{artista.nombre}}</option>
    </select>
    <label for="ranking">Ranking</label>
    <input type="text" class="form-control" name="ranking" v-model="cancion.ranking">
  </div>
  <button type="button" class="btn btn-primary" v-on:click="aceptar">Aceptar</button>
</form>

{/literal}

<script src="./Repositories/Scripts/CancionNew.js"></script>
{include file="footer.tpl"}
