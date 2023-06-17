

<!-- start navigation -->
<div class="navigation" style="top: 0">

  <div class="toggle-menu" style="top: 0">
    <i class="fa fa-bars fa-fw fa-lg"></i>
  </div>

<div class="nav">

  <h2 style="color: black;">Welcome our admin</h2>


<?php if( Session::check('admin_id') ): ?>
  <div class="logo-box">
    <img src="<?php  echo IMG_PATH_USER . $session_profile_img; ?>"/>
    <br><br>
  </div>
  <p><?php echo $session_email; ?></p>
  <h3>
    <?php echo $session_fullname; ?>
  </h3>
<?php endif; ?>

    <br>

    <div class="join">
        <!-- user control -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/dashboard">Home</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/add_user">add_admin</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/show_admin_users/pages/?page=1">show_admin_users</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/show_normal_users/pages/?page=1">show_normal_users</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/profileEdit">edit profile</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/change_password">change password</a>

        <!-- categories control -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/categories">show categories</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/categories/add">add category</a>

        <!-- messages control -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/messages/pages/?page=1">show messages</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/messages/add">send message</a>

        <!-- logo control -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/logos">show logo</a>

        <!-- media control -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/media">show media links</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/media/add">add media</a>

        <!-- post control -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/posts/pages/?page=1">show posts</a>
        <a class="join-us" href="<?php echo ADMINSITE; ?>/posts/add">add post</a>

        <!-- slider control -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/slider">show sliders</a>

        <!-- Logout -->
        <a class="join-us" href="<?php echo ADMINSITE; ?>/logout">logout</a>
    </div>

  </div>

</div>
