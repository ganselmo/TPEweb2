{include file="header.tpl"}

{literal}
    

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
      
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>    
  <div class="container">
                <div class="row">
              <div class="col-sm-4">
                        <form action="Artistas/Get&" method="GET">
                            <button class= "btn btn-primary btn-md" type="submit">Ver</button>
                        </form>
                    </div>
            {if $session->isLoggedIn()}
           
          

                  

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

             
                        <form action="Artistas/Create" method="GET">
                            <button class= "btn btn-info btn-md" type="submit">Nuevo</button>
                        </form>

</div>
{/literal}
<script></script>
{include file="footer.tpl"}