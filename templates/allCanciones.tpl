{include file="header.tpl"}


<div class = "row">
    <table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Genero</th>
            <th>Album</th>
            <th>Artista</th>
            <th>Ranking</th>
            {if $session->isLoggedIn()}
            <th>Accion</th>
            {/if}

        </tr>
    </thead>
    <tbody>
        {foreach from=$canciones item=cancion}
        <tr>
            <td>{$cancion->nombre}</td>
            <td>{$cancion->duracion}</td>
            <td>{$cancion->genero}</td>
            <td>{$cancion->album}</td>
            <td>{$cancion->apellido}</td>
            <td>{$cancion->ranking}</td>
            {if $session->isLoggedIn()}
            <td>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-4">
                        <form action="Canciones/Edit/{$cancion->id}" method="GET">
                            <button class= "btn btn-warning btn-md" type="submit">Modificar</button>
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <form action="Canciones/Delete" method="POST">
                            <input type="hidden" name="id" value="{$cancion->id}">
                            <button class= "btn btn-danger btn-md" type="submit">Borrar</button>
                        </form>
                    </div>
                
                </div>
            </div>
            </td>

            {/if}
      
        </tr>
        {/foreach}
    </tbody>
    </table>
</div>
<div class = "row">
{if $session->isLoggedIn()}
             
                        <form action="Canciones/Create" method="GET">
                            <button class= "btn btn-info btn-md" type="submit">Nuevo</button>
                        </form>
 {/if}
</div>
{include file="footer.tpl"}