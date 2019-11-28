{include file="header.tpl"}
{literal}

<div id="cancionesShow" class="card" v-if="!loading">
  <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
    <div class="carousel-inner" >

      <div class="carousel-item" v-for="(imagen,key) in cancion.imagenes" v-bind:class="{ active: key==0 }">
        <img v-bind:src="imagen.path" v-bind:id="imagen.id" class="d-block w-100 "  alt="...">
        
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      
    </div>
    
  </div>
  
  <div class="card-header">
    <h5 class="card-title"> {{cancion.nombre}}</h5>
    <p class="card-text">Duracion:{{cancion.duracion}}</p>
    <p class="card-text">Genero: {{cancion.genero}}</p>
    <p class="card-text">Album: {{cancion.album}}</p>

    <p class="card-text">Autor: {{cancion.artista.apellido}}, {{cancion.artista.nombre}}</p>
    <p class="card-text">Ranking:{{cancion.ranking}}</p>
    <form action="Imagenes/Cancion/New" method="POST" enctype="multipart/form-data">
      <input type="file" name="input_name" id="imageToUpload">
      <input type="hidden" name="id_cancion" v-model="cancionId">
      <button class="btn btn-danger col-md-2 float-right ml-1" v-on:click="borrarImagen" type="button">Borrar Actual</button>
      <button class="btn btn-info col-md-2 float-right" type="submit">Agregar Imagen</button>
      
    </form>
  </div>
  <div class="card-body">
    <h6 class="card-title"> Comentarios</h6>
    <ul class="list-group " v-for="comentario in comentarios">

      <li class="list-group-item mt-1">
        <div class="row">
          <div class="col-md-6 ">{{comentario.timestamp}}</div>

          <div class="col-md-6 col-md-offset-12 text-right">{{comentario.user}}</div>
        </div>
        <div class="row">

          <div class="col-md-6">{{comentario.comentario}}</div>
          <div class="col-md-6 col-md-offset-12 text-right">

            <span class="badge badge-primary badge-pill">Valoracion: {{comentario.valoracion}}</span>
          </div>

        </div>
        <div>

          <button class="btn btn-danger col-md-2 float-right">Borrar</button>
        </div>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h6 class="card-title">
      Nuevo comentario
    </h6>
    <textarea name="" id="" cols="50" rows="2" v-model = "nuevoComentario">
    </textarea>
    <label for="ranking">Puntaje</label>
    <input class="form-control col-md-1" type="number" value="3" v-model = "comentarioPuntaje">
    <div class="alert alert-danger" role="alert" v-if='comentarioError!=""'>
      {{comentarioError}}
    </div>
    <button class="btn btn-info col-md-2  float-right" v-on:click="comentar">Enviar</button>
  </div>
</div>
<script src="./Repositories/Scripts/CancionShow.js"></script>
{/literal}
{include file="footer.tpl"}