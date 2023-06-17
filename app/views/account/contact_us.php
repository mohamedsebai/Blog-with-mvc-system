<?php
ob_start();
include IINT_VIEWS;
$format->page_title = 'contact us';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<?php include $tpl . 'main_ads.php'; ?>
<!-- Start body -->
<div class="edit-profile">
  <div class="container">
   <div class="row">
     <div class="form-box m-auto">

       <?php
      if(isset($data['success']) && !empty($data['success'])): ?>
          <div class="alert alert-success"><?php echo $data['success']; ?></div>
       <?php endif; ?>

       <?php
      if(isset($data['error']) && !empty($data['error'])): ?>
          <div class="alert alert-danger"><?php echo $data['error']; ?></div>
       <?php endif; ?>

       <h2 class="text-center">Contact us</h2>

      <form action="<?php echo BASEURL; ?>/contact_us/msg" method="POST" id="form">
        <?php
        if(isset($_COOKIE['email'])){
          $email_by_cookie = $_COOKIE['email'];
          $checked = 'checked';
        }else{
          $checked = '';
        }
        ?>

        <div class="form-group">
          <input class="form-control" type="email" name="email" placeholder="your Email"
          value="<?php if(isset($email_by_cookie)){ echo $email_by_cookie; }?>">
        </div>
        <?php
       if(isset($data['emailError']) && !empty($data['emailError'])): ?>
           <div class="alert alert-danger"><?php echo $data['emailError']; ?></div>
        <?php endif; ?>

        <div class="form-group">
          <input class="form-control" type="text" name="fullname" placeholder="your name"
          value="<?php if(isset($data['fullname'])){echo $data['fullname'];} ; ?>">
        </div>
        <?php
       if(isset($data['fullnameError']) && !empty($data['fullnameError'])): ?>
           <div class="alert alert-danger"><?php echo $data['fullnameError']; ?></div>
        <?php endif; ?>

        <div class="form-group">
          <input class="form-control" type="text" name="phone" placeholder="your phone">
        </div>
        <?php
       if(isset($data['phoneError']) && !empty($data['phoneError'])): ?>
           <div class="alert alert-danger"><?php echo $data['phoneError']; ?></div>
        <?php endif; ?>

        <div class="form-group">
          <textarea class="form-control" name="subject" rows="12" cols="80"><?php if(isset($data['subject'])){echo $data['subject'];} ; ?></textarea>
        </div>
        <?php
       if(isset($data['subjecteError']) && !empty($data['subjecteError'])): ?>
           <div class="alert alert-danger"><?php echo $data['subjecteError']; ?></div>
        <?php endif; ?>


        <input class="btn btn-primary d-block m-auto" type="submit" name="login" value="Send" style="margin-top: 10px !important">
       </form>
    </div>

     </div>
    </div>
   </div>
<!-- End body -->



<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
