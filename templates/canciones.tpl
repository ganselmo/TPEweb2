{include file="header.tpl"}
    {foreach from=$canciones item=cancion}
        <li>{$cancion->nombre}: {$cancion->duracion} {$cancion->genero} {$cancion->album} {$cancion->id_artista} {$cancion->ranking}</li>
    {/foreach}
{include file="footer.tpl"}