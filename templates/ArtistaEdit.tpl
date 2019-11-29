{include file="header.tpl"}

{literal}

<form id="ArtistaEdit">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" v-model="artista.nombre">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" v-model="artista.apellido">
    <label for="fechanac">Fecha de nacimiento</label>
    <input type="date" class="form-control" name="fechanac" v-model="artista.fechanac">
    <label for="ranking">Ranking</label>
    <input type="text" class="form-control" name="ranking" v-model="artista.ranking">

   </div>
  <button type="button" class="btn btn-primary" v-on:click="aceptar">Aceptar</button>
</form>



<script src="./Repositories/Scripts/artistaEdit.js"></script>
{/literal}
{include file="footer.tpl"}
