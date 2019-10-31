{include file="header.tpl"}


<div class = "row">
    <table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de nacimiento</th>
            <th>Ranking</th>
            {if $session->isLoggedIn()}
            <th>Accion</th>
            {/if}

        </tr>
    </thead>
    <tbody>
        {foreach from=$artistas item=artista}
        <tr>
            <td>{$artista->nombre}</td>
            <td>{$artista->apellido}</td>
            <td>{$artista->fechanac}</td>
            <td>{$artista->ranking}</td>
            {if $session->isLoggedIn()}
            <td>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-4">
                        <form action="Artistas/Edit/{$artista->id}" method="GET">
                            <button class= "btn btn-warning btn-md" type="submit">Modificar</button>
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <form action="Artistas/Delete" method="POST">
                            <input type="hidden" name="id" value="{$artista->id}">
                            <button class= "btn btn-danger btn-md" type="submit">Borrar</button>
                        </form>
                    </div>
                
                </div>
            </div
            </td>

            {/if}
      
        </tr>
        {/foreach}
    </tbody>
    </table>
</div>
<div class = "row">
{if $session->isLoggedIn()}
             
                        <form action="Artistas/Create" method="GET">
                            <button class= "btn btn-info btn-md" type="submit">Nuevo</button>
                        </form>
 {/if}
</div>
{include file="footer.tpl"}