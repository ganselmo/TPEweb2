{include file="header.tpl"}
    <table>
    <thead>
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
            <td><button>Editar</button><button>Borrar</button></td>
      
        </tr>
        {/foreach}
    </tbody>
    </table>
{include file="footer.tpl"}