{include file="header.tpl"}

{literal}
    

<div id="artistasTable">
    <div class="row">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Ranking</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="artista in artistas">
                    <td>{{artista.nombre}}</td>
                    <td>{{artista.apellido}}</td>
                    <td>{{artista.fechanac}}</td>
                    <td>{{artista.ranking}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button class="btn btn-info" v-bind:value="artista.id" v-on:click="editar">Editar</button>
                                </div>
                               
                     
                                <div class="col-sm-4">
                                    <button class="btn btn-danger" v-bind:value="artista.id" v-on:click="borrar">Borrar</button>
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
<script src="./Repositories/Scripts/ArtistasVue.js"></script>

<script></script>
{/literal}
{include file="footer.tpl"}