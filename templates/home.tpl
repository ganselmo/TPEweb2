{include file="header.tpl"}

<div id="menu" class = "row">
    <button type="button"  v-on:click="redirect" class="btn btn-primary btn-lg btn-block" >Artistas</button>
    <button type="button"  v-on:click="redirect" class="btn btn-secondary btn-lg btn-block">Canciones</button> 
</div>
<script src="./Repositories/Scripts/menuVue.js"></script>
{include file="footer.tpl"}