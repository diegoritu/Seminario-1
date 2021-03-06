<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->
<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/ver-view.php');
 $view = new ver_view($params);
 $publi = $view->publi;
 ?>


<div class="verContainer" >
  <?php
    $objetivos = '';
    foreach($publi->getObjetivos() as $objetivo){
      $objetivos .= ' [' . $objetivo->getObjetivo()->nombre . ']';
    }
    $duracion = '';
    if($publi->tiempo != null)
    {
      $duracion .= ' (Duración: ' . $publi->tiempo . ' ' . $publi->getUnidadTiempo() . ')';
    }

  ?>
  <!--AGREGADO-->
  <div class="tutclase">
   <?php echo $publi->titulo; ?>
  </div>
  <!--FIN-->
</div>

<?php if(Utiles::obtenerIdUsuarioLogueado() !=  $publi->getUsuario()->id){ ?>
  <div class="row text-center" style="padding-bottom:10px">
    <div class="col-md-3">
      
    </div>
	  <div class="col-md-9">
      <button id="editarPublicacion" onClick="editarPublicacion('<?php echo $publi->alias; ?>')" class="btn btn-info"><i class="fa fa-pencil"></i> Editar publicación</button>
    </div>
	</div>
<?php } ?>

<div class="row" style="margin:0px 5px;">
 
  <div class="col-md-3" style="width: 15rem;">
    <?php 
      if(Utiles::obtenerUsuarioLogueado() != null){
        if(Utiles::obtenerUsuarioLogueado()->id != $publi->getUsuario()->id){ 
    ?>
    <a href="\usuario\perfil\<?php echo $publi->getUsuario()->alias; ?>"><img class="userImg" src="<?php echo $publi->getUsuario()->archivo; ?>" name="aboutme" width="80" height="80"></a>
    <?php 
      }else{ ?>
    <div class="row">
    <a href="/usuario" class= "col-9"><img class="userImg" src="<?php echo $publi->getUsuario()->archivo; ?>" name="aboutme" width="80" height="80"></a>
    </div>
    <?php 
      }
    }else{ ?>
    <a href="\usuario\perfil\<?php echo $publi->getUsuario()->alias; ?>"><img class="userImg" src="<?php echo $publi->getUsuario()->archivo; ?>" name="aboutme" width="80" height="80"></a>
    <?php 
    }
    ?>  
    <div class="card-body" id="userCardBody">
      <h5 class="card-title" id="userCardTitle"><?php $usuario = $publi->getUsuario();
                              echo $usuario->nombre . " " . $usuario->apellido;?></h5>
      <em class="card-text" id="userCardText"><?php echo "Miembro desde el " . $usuario->creado_fecha;?></em><br><br>
      <?php if(Utiles::obtenerIdUsuarioLogueado() ==  $publi->getUsuario()->id){ ?>
        <button id="editarPublicacion" onClick="editarPublicacion('<?php echo $publi->alias; ?>')" class="btn btn-light"><i class="fa fa-pencil"></i> Editar publicación</button>
      <?php }else{ ?>
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-light"><i class="far fa-address-card"></i> Acerca de mi</a>
      <?php } ?>
    </div>
  </div>
    <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo $usuario->nombre . " " . $usuario->apellido;?></h4>
        </div>
        <div class="modal-body">
          <div style="text-align:center;">
            <img src="<?php echo $usuario->archivo; ?>" name="aboutme" width="140" height="140" class="img-circle"></a>
            <h3 class="media-heading"><?php echo $usuario->nombre . " " . $usuario->apellido;?></h3>
            <span><strong>Fecha de nacimiento: </strong></span><span class="label label-info"><?php echo $usuario->fecha_nacimiento;?></span><br>
            <span><strong>Mail: </strong></span><span class="label label-info"><?php echo $usuario->mail;?></span><br>
            <span><strong>Objetivos del usuario</strong></span><br>
            <?php
              foreach($usuario->getObjetivos() as $objetivoUsuario){
            ?>
            <span class="label label-info"><?php echo $objetivoUsuario->nombre; ?></span><br>
            <?php } ?>
          </div>
          <hr>
        </div>
        <div class="modal-footer">
          <div style="text-align:center;">
            <button type="button" class="button1" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!--</div>-->


<div class="col-md-6">
  <div id="carouselIndicators_<?php echo $publi->id; ?>" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
      $i=0;
      foreach ($publi->getImagenes() as $imagen) { ?>

      <li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
      <?php
      $i++;
          }?>     
    </ol>
   <div class="carousel-inner" style="padding:15px">
     <?php
     $i=0;
     foreach ($publi->getImagenes() as $imagen) {?>
       <div class="carousel-item  <?php echo ($i == 0 ? 'active' : ''); ?>">
         <img class="carousel-img" src="\archivos\recortes\<?php echo $imagen->archivo; ?>" class="d-block w-100" alt="Card image cap">
       </div>
     <?php
     $i++;
   }?>
   </div>
   <a class="carousel-control-prev" href="#carouselIndicators_<?php echo $publi->id; ?>" role="button" data-slide="prev" style="margin-left:10%;">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselIndicators_<?php echo $publi->id; ?>" role="button" data-slide="next" style="margin-right:10%;">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
   </div>
  </div>
 
  </div>


  <?php  $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true); 
    
          if(Utiles::obtenerIdUsuarioLogueado() ==  $publi->getUsuario()->id){
              $tienePermiso=false;
          }
  ?>
  <?php if($tienePermiso){?>
  <!--<div class="container">-->
    <div class="row">
      <div class="col-md-3" >
      </div>
      <div class="col-md-6 text-center" >
        <button id="like" class="btn btn-success" onclick="likePub()" <?php $publi->votoLike();?>><i class="fas fa-thumbs-up"></i> <?php echo sizeof($publi->getLikes());?></button>
        <button id="dislike" class="btn btn-danger" onclick="dislikePub()" <?php $publi->votoDisLike();?>><i class="fas fa-thumbs-down"></i> <?php echo sizeof($publi->getDislikes());?></button>
      </div>
    </div>
  <!--</div>-->
  <?php
    }else{
  ?>
    <div class="row" >
      <div class="col-md-3"  >
      </div>
      <div class="col-md-6 text-center" >
        <button class="btn btn-success" disabled><i class="fas fa-thumbs-up"></i> <?php echo sizeof($publi->getLikes());?></button>
        <button class="btn btn-danger" disabled><i class="fas fa-thumbs-down"></i> <?php echo sizeof($publi->getDislikes());?></button>
      </div>
    </div>
  <?php
    }
  ?>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 cajaPubli">
    <?php
    echo '<h5>'.$publi->texto.'</h5>';
    ?>
    </div>
    <div class="col-md-1"></div>
  </div>

<?php  $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true); ?>
<?php if($tienePermiso){?>
  <!--<div class="container" style="border:5px solid black">-->

    <!--<h2 id="h2-cmmnt">SISTEMA DE COMENTARIOS</h2>-->

	<div class="row text-center" >
    <div id="msj-error">

    </div>

    <div class="col-md-3"></div>
    <div class="col-md-6"> 
      <form name="form1" id="frm" action="javascript:void(1);">
      <input type="hidden" name="accion" id="accion" value="nuevo"/>
        <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
      <input type="hidden" name="id_publicacion" id="id_publicacion" value="<?php echo $publi->id; ?>"/>

        <label for="comentario"></label>
        <p style="color:black;">
        <textarea name="comentario" cols="80" rows="5" id="comentario"><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user']; ?><?php } ?> </textarea>
        </p>
        <p style="color:black">
        <input class="btn btn-warning btn-lg" type="submit" name="comentar" onClick="agregarComentario();" value="Comentar">
        </p>
      </form>
    </div>
  </div>
  <?php
    }
  ?>
    <br>
<div class="row text-center">
  <div class="col-md-3"></div>
  <div class="col-md-6"><h2 style="font-size:20px;" >Comentarios</h2></div>
</div>
<br>
<div class="container" >
    <?php
        $i=0;
        foreach ($publi->getComentarios() as $comentario) {

          if($comentario->reply==0){
    ?>


	<div class="card">
	    <div class="card-body" style="color:black">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="<?php echo($comentario->getUsuario()->imagen);  ?>" alt="" width="60" height="60" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center"><?php echo($comentario->fecha);  ?></p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
                      <a class="float-left" href="#"><strong><?php echo($comentario->getusuario()->usuario); ?></strong></a>
                      <!-- Valoracion del comentario
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                      <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>-->

        	       </p>
        	       <div class="clearfix"></div>
        	        <p style="color:black;text-align:left"><?php echo $comentario->texto; ?></p>
        	        <p>
        	            <button class="float-right btn btn-info ml-2" onclick="responder(<?php echo $comentario->id ?>);"> <i class="fa fa-reply"></i> Responder</button>
        	            <!--<button class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</button>-->
        	       </p>
        	    </div>
          </div>
          <div id="<?php echo 'div-resp'.$comentario->id; ?>" style="display:none">
            <form name="<?php echo 'form'.$comentario->id; ?>" id="<?php echo 'formResp'.$comentario->id; ?>"action="javascript:void(1);">
              <input type="hidden" name="accion" id="accion" value="nuevoResp"/>
              <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
              <input type="hidden" name="id_publicacion" id="id_publicacion" value="<?php echo $publi->id; ?>"/>

              <label for="<?php echo 'respuesta'.$comentario->id; ?>"></label>
				<p style="color:black;">
                  <textarea name="<?php echo 'respuesta'.$comentario->id; ?>" cols="60" rows="3" id="<?php echo 'respuesta'.$comentario->id; ?>" style="text-align:left"></textarea>
                </p>
                <p>
                  <input class="btn btn-warning btn-lg" type="submit" name="<?php echo 'responder'.$comentario->id; ?>" onclick="agregarRespuesta(<?php echo $comentario->id ?>);" value="Responder">
                </p>
            </form>
          </div>
          <!-- Esta parte corresponde a las respuestas del comentario -->
          <?php
            $j=0;
            foreach($publi->getRespuestas($comentario->id) as $respuesta){

              if($comentario->id == $respuesta->reply){
          ?>
	        	<div class="card card-inner">
            	    <div class="card-body">
            	        <div class="row">
                    	    <div class="col-md-2">
                    	        <img src="<?php echo($respuesta->getUsuario()->imagen);  ?>" width="60" height="60" class="img img-rounded img-fluid"/>
                    	        <p class="text-secondary text-center"><?php echo($respuesta->fecha);  ?></p>
                    	    </div>
                    	    <div class="col-md-10 text-left respuestaComentario" style="color:black;">
                    	        <p><a href="#"><strong><?php echo($respuesta->getusuario()->usuario); ?></strong></a></p>
                    	        <p><?php echo $respuesta->texto; ?></p>
                    	        <p>
                    	            <!--<a class="float-right btn btn-info ml-2">  <i class="fa fa-reply"></i> Responder</a>
                    	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>-->
                    	       </p>
                    	    </div>
            	        </div>
            	    </div>
            </div>
            <?php
                }
              $j++;
              }
            ?>
	    </div>
	</div>
          <?php
                }
              $i++;
              }
            ?>
</div>


<script>

$(document).ready(function() {
      $('#comentario').summernote({
		  height: 150,
		  minHeight: null,
		  maxHeight: null,
		  focus: false
		});
  });

  function editarPublicacion(alias)
  {
	  window.location = '/publicaciones/editar/' + alias;
  }

  function agregarComentario()
  {
    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/comentario-controller.php",
      data: $('#frm').serialize(),
      beforeSend:function(){
      },
      success:function(datos) {
        datos = datos.split("|");
        console.log(datos[1]);
        if (datos[0] == 'OK') {
         window.location.reload();

        } else {
          location.hash = '';
          $('#msj-error').html(datos[1]);
          location.hash = 'msj-error';
        }
        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });
  }
  function responder(id){

    var x = document.getElementById('div-resp'+id);
    if (x.style.display === 'none') {
	  $('#respuesta' + id).summernote({
		  height: 150,
		  minHeight: null,
		  maxHeight: null,
		  focus: false
		});

      x.style.display = 'block';
    } else {
      x.style.display = 'none';
    }

  }

  function agregarRespuesta(id){

    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/comentario-controller.php",
      data: $('#formResp' + id).serialize() + "&id_comentario=" + id,
      beforeSend:function(){
      },
      success:function(datos) {
        datos = datos.split("|");
        console.log(datos[1]);
        if (datos[0] == 'OK') {
         window.location.reload();

        } else {
          location.hash = '';
          $('#msj-error').html(datos[1]);
          location.hash = 'msj-error';
        }
        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });

  }

function likePub(){

    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/like-controller.php",
      data: "id_publicacion=" + <?php echo $publi->id; ?> + "&accion=like&token=" + <?php echo Utiles::obtenerToken(); ?>,
      beforeSend:function(){
      },
      success:function(datos) {
         window.location.reload();

        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });
  }

  function dislikePub(){

    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/like-controller.php",
      data: "id_publicacion=" + <?php echo $publi->id; ?> + "&accion=dislike&token=" + <?php echo Utiles::obtenerToken(); ?>,
      beforeSend:function(){
      },
      success:function(datos) {
         window.location.reload();

        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });
  }
</script>
