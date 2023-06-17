<?php
// class like DBconnect , Framework all these you can chekc static method from it in any view;
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'change password';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start body -->
<!-- Start Main Body -->
  <div class="change-pass">
   <div class="container">
    <div class="row">
      <div class="form-box m-auto">
        <h2 class="text-center" style="margin: 30px 0;">Change Password</h2>

       <form action="<?php echo ADMINSITE; ?>/change_password/msg" method="POST">
         <?php if(isset($data['password_error'])): ?>
           <div class="alert alert-danger"><?php echo $data['password_error']; ?></div>
         <?php endif; ?>

         <?php if(isset($data['success']) && !empty($data['success'])): ?>
           <div class="alert alert-success"><?php echo $data['success']; ?></div>
         <?php endif; ?>

         <?php
        if(isset($data['error']) && !empty($data['error'])): ?>
            <div class="alert alert-danger"><?php echo $data['error']; ?></div>
         <?php endif; ?>

         <div class="form-group">
           <input class="form-control" type="password" name="old_password" placeholder="Old Password">
         </div>
         <div class="form-group">
           <input class="form-control" type="password" name="new_password" placeholder="New Password">
         </div>
         <div class="form-group">
           <input class="form-control" type="password" name="repeat_new_password" placeholder="Repeat New Password">
         </div>
         <input class="btn btn-primary"type="submit" value="change password">
        </form>
       </div>
      </div>
    </div>
  </div>
<!-- End Main Body -->

<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
