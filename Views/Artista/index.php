<div class="container">


    <div>
        <h1>Artistas</h1>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Nacimiento</th>
                    <th>Ranking</th>
                    <th>Opcion</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($models as $artista) {
                    echo
                        "<tr id = '" . $artista->id . "'>       
                <td>" . $artista->nombre . "</td>
                <td>" . $artista->apellido . "</td>
                <td>" . $artista->fechanac . "</td>
                <td>" . $artista->ranking . "</td>
                <td><button>Editar</button> <button>Borrar</button></td>
            <tr>";
                }

                ?>
            </tbody>
        </table>

    </div>

</div>