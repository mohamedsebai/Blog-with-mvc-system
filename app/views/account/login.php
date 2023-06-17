<?php
ob_start();
include IINT_VIEWS;
if(Session::check('ucode') || Session::check('id') || Session::check('fb_user_id')):
  $path->redirect('home');
endif;
$format->page_title = 'login';
include $tpl . 'header.php';
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script>
    function onSubmit(token) {
      document.getElementById("form").submit();
    }
</script>
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
      <form action="<?php echo BASEURL; ?>/login/msg" method="POST" id="form">
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

       <!-- social media login -->
        <div class="container">
            <div class="row">
              <!-- google login -->
                <div style="margin-right: 2%">
                    <a href="<?= $gclient->createAuthUrl() ?>" class="btn btn btn-primary "><i class="fa fa-google"></i></a>
                </div style="margin-right: 2%">
                <!-- facebook login -->
                <div>
                  <?php
                  $permissions = ['email']; //optional
                  $fb_login_url = $fb_helper->getLoginUrl(FB_Redirect_URL, $permissions);
                  ?>
                  <a href="<?php echo $fb_login_url;?>" class="btn btn btn-primary"><i class="fa fa-facebook"></i></b></a>
                </div>
            </div>
      </div>



        <div class="form-group">
          <input type="checkbox" name="remember_me" id="remember_me" <?php echo $checked; ?>>
          <label for="remember_me">remember me</label>
        </div>

        <div class="form-group">
          <a class="pwd-link" href="reset_password">forgot your password?</a>
        </div>

        <!-- recaptcha key -->
        <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_FRONT_END; ?>"></div>
        <!-- end recaptcha key -->

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
