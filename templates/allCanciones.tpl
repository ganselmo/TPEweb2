{include file="header.tpl"}

{literal}

<div id="cancionesTable">
    <div class="row">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Duración</th>
                    <th>Genero</th>
                    <th>Album</th>
                    <th>Artista</th>
                    <th>Ranking</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cancion in canciones">
                    <td>{{cancion.nombre}}</td>
                    <td>{{cancion.duracion}}</td>
                    <td>{{cancion.genero}}</td>
                    <td>{{cancion.album}}</td>
                    <td>{{cancion.artista.apellido}}, {{cancion.artista.nombre}}</td>
                    <td>{{cancion.ranking}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button class="btn btn-info" v-bind:value="cancion.id" v-on:click="ver">Ver</button>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-warning" v-bind:value="cancion.id" v-on:click="editar">Editar</button>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-danger" v-bind:value="cancion.id" v-on:click="borrar">Borrar</button>
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="row">
        <button class="btn btn-info btn-md" v-on:click="nuevo" type="button">Nuevo</button>
    </div>
</div>
<script src="./Repositories/Scripts/CancionesVue.js"></script>
{/literal}
{include file="footer.tpl"}