{include file="header copy.tpl"}

<div class = "row">
    <table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacimiento</th>
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
                <form action="API/Artistas/Edit" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button class= "btn btn-warning btn-md" type="submit">Modificar</button>
                </form>
                <form action="API/Artistas/Delete" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button class= "btn btn-danger btn-md" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        {/foreach}
        <tr>
        <form action="API/Artistas/create" method="post">
            <td><input type="text" name="nombre" placeholder="Nombre"></td>
            <td><input type="text" name="apellido" placeholder="Apellido"></td>
            <td><input type="date" name="fechanac"></td>
            <td><input type="number" name="ranking" placeholder="Ranking"></td>
            <td><input type="submit" value="Agregar"></td>
        </form>
        </tr>
    </tbody>
    </table>
</div>

{include file="footer copy.tpl"}