

<!-- start navigation -->
<div class="navigation">

  <div class="toggle-menu">
    <i class="fa fa-bars fa-fw fa-lg"></i>
  </div>

  <div class="logo-box" style="text-align: center; margin-top: 50px;">

    <?php

    $count = $common_data->select_data('logo')['count'];
    if($count > 0){
    $row = $common_data->select_data('logo')['row'];
    foreach($row as $logo_common_data){ ?>
      <img style="width: 100px;" src="<?php echo IMG_PATH_LOGO . $logo_common_data['img']; ?>"/>
    <?php }
     }else{ echo ''; } ?>
    <?php
    ?>

  </div>

<div class="nav" style="margin-top: 5px !important;">
<?php if( Session::check('ucode')): ?>
  <h3>
    <?php echo Session::get('login_givenName') . " " . Session::get('login_familyName') ?>
  </h3>
  <p><?php echo Session::get('login_email')  ?></p>
  <div class="logo-box">
    <img src="<?= Session::get('login_picture') ?>"/>
    <br><br>
  </div>
<?php endif; ?>

<?php if( Session::check('id') == true): ?>
  <h3>
    <?php echo $session_fullname; ?>
  </h3>
  <p><?php echo $session_fullname; ?></p>
  <div class="logo-box">
    <img src="<?php echo IMG_PATH_USER . $session_profile_img; ?>"/>
    <br><br>
  </div>
<?php endif; ?>

<?php if( Session::check('fb_user_id') == true ): ?>
  <h3>
    <?php echo Session::get('fb_user_name') ?>
  </h3>
  <p><?php echo Session::get('fb_user_email') ?></p>
  <div class="logo-box">
    <img src="<?php echo Session::get('fb_user_pic') ?>"/>
    <br><br>
  </div>
<?php endif; ?>



    <br>
    <form action="<?php echo BASEURL; ?>/search/pages/?page=1" method="POST" class="searchform">
      <h2>Type keywords</h2>
      <div class="form-group">
        <input class="form-control" type="text" name="search">
        <input type="submit" value="Search">
      </div>
    </form>

    <ul class="list-unstyled">
    <h2>Categories</h2>
   <?php

   $count = $common_data->select_data('categories')['count'];
   if($count > 0){
   $row = $common_data->select_data('categories')['row'];
   foreach($row as $cat_common_data){ ?>
     <li><a href="<?php echo BASEURL; ?>/categories/posts/<?php echo $cat_common_data['id']; ?>/?page=1"><?php echo $cat_common_data['name']; ?></a></li>

   <?php }
    }else{ ?>
   <div class="alert alert-danger"><?php echo 'there is no categories'; ?></div>
 <?php } ?>

    </ul>

    <div class="join">
      <h2>Join us now</h2>
      <a class="join-us" href="<?php echo BASEURL; ?>/home">Home</a>
      <?php if( Session::check('id') == true ): ?>
        <a class="join-us" href="<?php echo BASEURL; ?>/profileEdit">edit profile</a>
        <a class="join-us" href="<?php echo BASEURL; ?>/change_password">change password</a>
        <a class="join-us" href="<?php echo BASEURL; ?>/show_profile/page/<?php echo Session::get('id'); ?>">show profile</a>
        <a class="join-us"href="<?php echo BASEURL; ?>/add_post">add post</a>
        <a class="join-us" href="<?php echo BASEURL; ?>/logout">logout</a>
      <?php elseif(!Session::check('id') && !Session::check('ucode') && !Session::check('fb_user_id') ): ?>
        <a class="join-us" href="<?php echo BASEURL; ?>/login">Login with us</a>
        <a class="join-us"href="<?php echo BASEURL; ?>/signup">register</a>
      <?php endif; ?>

       <!-- if there is google session ucode  -->
      <?php if(Session::check('ucode') && !Session::check('id')): ?>
        <a class="join-us" href="<?php echo BASEURL; ?>/logout">logout</a>
      <?php endif; ?>
      <?php if(Session::check('fb_user_id') && !Session::check('ucode') && !Session::check('id')): ?>
        <a class="join-us" href="<?php echo BASEURL; ?>/logout">logout</a>
      <?php endif; ?>




    </div>
  </div>

</div>
