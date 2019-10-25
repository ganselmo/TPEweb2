{include file="header.tpl"}
    <ul>
    {foreach from=$canciones item=cancion}
        <li>
            <form action="cancion/delete" method="post">
                <input type="hidden" name="id" value="{$cancion->id}">{$cancion->nombre}: {$cancion->duracion} {$cancion->genero} {$cancion->album} {$cancion->id_artista} {$cancion->ranking} <button type="submit">Delete</button>
            </form>
        </li>
    {/foreach}
    </ul>
    <form action="cancion/create" method="post">
        <input type="text" name="artista" placeholder="Artista">
        <input type="text" name="nombre" placeholder="Cancion">
        <input type="number" name="duracion" placeholder="Duración">
        <input type="text" name="genero" placeholder="Género">
        <input type="text" name="album" placeholder="Álbum">
        <input type="text" name="ranking" placeholder="Ptos para ranking">
        <input type="submit" value="Agregar">
    </form>
{include file="footer.tpl"}