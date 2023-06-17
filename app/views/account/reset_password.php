<?php
ob_start();
include IINT_VIEWS;
if(Session::check('ucode') || Session::check('id') || Session::check('fb_user_id')):
  $path->redirect('home');
endif;
$format->page_title = 'rest password';
include $tpl . 'header.php';
?>
<body>
<div class="main-body" style="width: 500px; margin: 50px auto auto">
  <div class="container">
    <h3 class="text-center">reset your password</h3>
    <p class="text-center">An e-mail will send to you with instruction on how to reset your password.</p>
      <div class="form-box">
        <form method="post" action="<?php echo BASEURL; ?>/reset_password/msg">
          <?php
          if(isset($data['success']) && !empty($data['success'])): ?>
             <div class="alert alert-success"><?php echo $data['success']; ?></div>
          <?php endif; ?>
          <?php
         if(isset($data['error']) && !empty($data['error'])): ?>
             <div class="alert alert-danger"><?php echo $data['error']; ?></div>
          <?php endif; ?>
          <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="enter yor e-mail adderss...">
          </div>
          <button type="submit" name="reset-request-submit" class="btn btn-primary">recive new password by mail</button>
        </form>
      </div>

  </div>
</div>
<?php
include $tpl . 'footer.php';
ob_end_flush();
 ?>
