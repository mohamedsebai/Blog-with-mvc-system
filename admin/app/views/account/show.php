<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'show post';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>



<div class="show">
  <div class="container">
    <div class="row">
      <?php
      if($data['count'] > 0):
          $userData        = $data['row'];
          $id              = $userData['id'];
          $fullname        = $userData['fullname'];
          $email           = $userData['email'];
          $img             = $userData['profile_img'];
          $gender          = $userData['gender'];
          $country         = $userData['country'];
          $group_id        = $userData['group_id'];
          $status          = $userData['status'];
          $created_at      = $userData['created_at'];
          $formating_date  = $date->formating_date($created_at);
      ?>
      <div class="col-md-3">
          <div class="img-fluid">
            <img src="<?php echo IMG_PATH_USER. $img; ?>" alt="img-to-show" style="width: 100%; border-radius: 20px">
          </div>
      </div>
      <div class="col-md-9" style="margin-top: 50px;">
        <?php if($group_id == 1): ?>
           <h2><?php echo "Admin"; ?></h2>
        <?php else: ?>
           <h2><?php echo "Normal user"; ?></h2>
        <?php endif; ?>

        <h5><?php echo $email; ?></h5>

        <span class="date"><i class="fa fa-calendar"></i>
          created at : <?php echo $formating_date; ?></span><br>

        <span class="author"><i class="fa fa-user"></i><?php echo $fullname; ?></span>

        <div><i class="fa fa-tags"></i>
          <?php echo $gender == 0  ? 'male' : 'female'; ?>
        </div>
        <div ><i class="fa fa-tags"></i>
          <?php echo $country; ?>
        </div>
        <div ><i class="fa fa-tags"></i>
          <?php echo $status == 0  ? 'offline' : 'online'; ?>
        </div>

        <div style="margin-top: 10px;">
          <?php if( Session::get('admin_id') == $id ): ?>
            <i class="fa fa-tags"></i>
            <a class="join-us" href="<?php echo ADMINSITE; ?>/profileEdit" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">edit profile</a>
            <a class="join-us" href="<?php echo ADMINSITE; ?>/change_password" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">change password</a>
            <a class="join-us" href="<?php echo ADMINSITE; ?>/logout" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">logout</a>
          <?php endif; ?>
        </div>
      </div>
     <?php else: ?>
        <div class="altert alert-danger">there is no user</div>
    <?php endif; ?>
    </div>
  </div>
</div>

<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
