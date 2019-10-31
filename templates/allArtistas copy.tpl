{include file="header.tpl"}


<div class = "row">
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
        {foreach from=$artistas item=artista}
        <tr>
            <td>{$artista->nombre}</td>
            <td>{$artista->apellido}</td>
            <td>{$artista->fechanac}</td>
            <td>{$artista->ranking}</td>
            <td>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-4">
                        <form action="API/Artistas/Edit" method="POST">
                            <input type="hidden" name="id" value="{$artista->id}">
                            <button class= "btn btn-warning btn-md" type="submit">Modificar</button>
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <form action="API/Artistas/Delete" method="POST">
                            <input type="hidden" name="id" value="{$artista->id}">
                            <button class= "btn btn-danger btn-md" type="submit">Borrar</button>
                        </form>
                    </div>
                
                </div>
            </div
            </td>
      
        </tr>
        {/foreach}
    </tbody>
    </table>
</div>

{include file="footer.tpl"}