<?php
ob_start();
include IINT_VIEWS;
if(Session::check('ucode') || Session::check('id') || Session::check('fb_user_id')):
  $path->redirect('home');
endif;
$format->page_title = 'create new password';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<?php include $tpl . 'main_ads.php'; ?>

<body>

  <div class="main-body" style="width: 500px; margin: 50px auto auto">
    <div class="container">
      <h3 class="text-center">create new password</h3>
      <?php
      if(isset($data['success']) && !empty($data['success'])): ?>
         <div class="alert alert-success"><?php echo $data['success']; ?></div>
      <?php endif; ?>


      <div class="form-box">
        <?php
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];
       if(isset($data['error']) && !empty($data['error'])): ?>
           <div class="alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif;
        if(empty($selector) || empty($validator)){
          echo 'good';
        }else{
           ?>
            <form  method="post" action='<?php echo BASEURL; ?>/create_new_password/msg/?selector=<?php echo $selector; ?>&validator=<?php echo $validator; ?>'>
              <?php if(isset($data['password_error'])){ ?>
                <div class="alert alert-danger"><?php echo $data['password_error']; ?></div>
              <?php } ?>
             <input type="hidden" name="selector" value="<?php echo $selector; ?>">
             <input type="hidden" name="validator" value="<?php echo $validator; ?>">
             <div class="form-group">
               <input class="form-control" type="text" name="pwd" placeholder="write your new password">
             </div>
             <div class="form-group">
               <input class="form-control" type="text" name="pwd_repeat" placeholder="repeat your new password">
             </div>
             <input class="btn btn-primary" type="submit" name="rtype-password-submit" value="rtype password">
            </form>
          <?php
        }
        ?>
      </div>
    </div>
  </div>


<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
