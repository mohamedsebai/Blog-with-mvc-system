

<?php
$imgs_count = $common_data->select_data('sliders')['row'];
$imgs_row = $common_data->select_data('sliders')['row'];
if( $imgs_count > 0){ ?>
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
     <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
     <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
     <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
   </ol>
   <div class="carousel-inner">
     <div class="overlay"></div>
     <div class="carousel-item active">
       <img src="<?php echo IMG_PATH_CAROUSEL .  $imgs_row[0]['img']; ?>" class="d-block w-100" alt="...">
       <div class="carousel-caption d-block">
         <h5 class="h2"><?php echo $imgs_row[0]['title']; ?></h5>
         <p><?php echo $imgs_row[0]['content']; ?></p>
       </div>
     </div>
     <div class="carousel-item">
       <img src="<?php echo IMG_PATH_CAROUSEL . $imgs_row[1]['img']; ?>" class="d-block w-100" alt="...">
       <div class="carousel-caption d-block">
         <h5 class="h2"><?php echo $imgs_row[1]['title']; ?></h5>
         <p><?php echo $imgs_row[1]['content']; ?></p>
       </div>
     </div>
     <div class="carousel-item">
       <img src="<?php echo IMG_PATH_CAROUSEL . $imgs_row[2]['img']; ?>" class="d-block w-100" alt="...">
       <div class="carousel-caption d-block">
         <h5 class="h2"><?php echo $imgs_row[2]['title']; ?></h5>
         <p><?php echo $imgs_row[2]['content']; ?></p>
       </div>
     </div>
   </div>
  </div>
<?php }
