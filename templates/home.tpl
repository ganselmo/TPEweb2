{include file="header.tpl"}

<div id="menu" class = "row">
    <button type="button"  v-on:click="redirect" v-if="canClickArtistas" data-direct="Artistas" class="btn btn-primary btn-lg btn-block" >Artistas</button>
    <button type="button"  v-on:click="redirect" v-if="canClickCanciones"  data-direct="Canciones" class="btn btn-secondary btn-lg btn-block">Canciones</button>
    <button type="button"  v-on:click="redirect" v-if="canClickUsuarios"  data-direct="Users"  class="btn btn-primary btn-lg btn-block" >Usuarios</button> 
</div>
<script src="./Repositories/Scripts/menuVue.js"></script>
{include file="footer.tpl"}