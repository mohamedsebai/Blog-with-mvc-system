<?php
ob_start();
include IINT_VIEWS;
if(Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'login';
include $tpl . 'header.php';
?>
<!-- Start body -->

<body class="member-page-body">
<div class="overlay"></div>
<div class="member-page">
  <div class="container">
   <div class="row">
     <div class="form-box m-auto">
       <?php
      if(isset($data['error']) && !empty($data['error'])): ?>
          <div class="alert alert-danger"><?php echo $data['error']; ?></div>
       <?php endif; ?>
       <h2 class="text-center">Welcome back!</h2>
      <form action="<?php echo ADMINSITE; ?>/login/msg" method="POST" id="form">
        <?php
        if(isset($_COOKIE['email'])){
          $email_by_cookie = $_COOKIE['email'];
          $checked = 'checked';
        }else{
          $checked = '';
        }
        ?>
        <div class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Email"
          value="<?php if(isset($email_by_cookie)){ echo $email_by_cookie;}?>">
        </div>

        <div class="form-group">
          <input class="form-control" type="text" name="password" placeholder="Password">
        </div>


        <div class="form-group">
          <input type="checkbox" name="remember_me" id="remember_me" <?php echo $checked; ?> >
          <label for="remember_me">remember me</label>
        </div>

        <input class="btn btn-primary d-block m-auto" type="submit" name="login" value="Send" style="margin-top: 10px !important">
       </form>
    </div>
   </div>
  </div>
</div>
<!-- end body -->
<?php
 //include $tpl . 'footer.php';
include $tpl . 'footer.php';
ob_end_flush();
 ?>
