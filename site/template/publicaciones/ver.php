<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/ver-view.php');
 $view = new ver_view($params);

 $publi = $view->publi;
 ?>

 <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
     <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
     <li data-target="#carouselIndicators" data-slide-to="1"></li>
     <li data-target="#carouselIndicators" data-slide-to="2"></li>
   </ol>
   <div class="carousel-inner">
     <div class="carousel-item active">
       <img src="/archivos/recortes/1" class="d-block w-100" alt="Card image cap">
     </div>
     <div class="carousel-item">
       <img src="/archivos/recortes/2" class="d-block w-100" alt="Card image cap">
     </div>
     <div class="carousel-item">
       <img src="/archivos/recortes/3" class="d-block w-100" alt="Card image cap">
     </div>
   </div>
   <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>
 
 <?php
  echo $publi->texto;
  ?>
