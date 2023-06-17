<?php
// class like DBconnect , Framework all these you can chekc static method from it in any view;
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'add user';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>

<!-- Start Main Body -->
  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box m-auto">

        <h2 class="text-center">Add new admin</h2>
          <!-- if success -->
          <?php
          if(isset($data['success']) && !empty($data['success'])): ?>
             <div class="alert alert-success"><?php echo $data['success']; ?></div>
          <?php endif; ?>

          <!-- if failed -->
          <?php
          if(isset($data['error']) && !empty($data['error'])): ?>
             <div class="alert alert-alert"><?php echo $data['error']; ?></div>
          <?php endif; ?>



        <form method="post" action="<?php echo ADMINSITE; ?>/add_user/msg" enctype="multipart/form-data">
          <div class="form-group">
            <label>fullname name:</label>
            <input class="form-control" type="text" name="fullname" placeholder="enter fullname"
            value="<?php if(isset($data['fullname'])){echo $data['fullname']; }?>">
            <?php
            if(isset($data['fullnameError']) && !empty($data['fullnameError'])): ?>
               <div class="alert alert-danger"><?php echo $data['fullnameError']; ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label>email:</label>
            <input class="form-control" type="text" name="email" placeholder="write valid email not contain (~^$#)"
            value="<?php if(isset($data['email'])){echo $data['email'];}?>">
            <?php
            if(isset($data['emailError']) && !empty($data['emailError'])): ?>
               <div class="alert alert-danger"><?php echo $data['emailError']; ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label>password:</label>
            <input class="form-control" type="text" name="password" placeholder="enter password"
            value="<?php if(isset($data['password'])){echo $data['password']; }?>">
            <?php
            if(isset($data['passwordError']) && !empty($data['passwordError'])): ?>
               <div class="alert alert-danger"><?php echo $data['passwordError']; ?></div>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label>gender:</label>
            <select class="form-control" name="gender">
              <option value="male">male</option>
              <option value="female">female</option>
            </select>
          </div>

          <div class="form-group">
            <label>country:</label>
            <select class="form-control" name="country">
              <option value="egypt">Egypt</option>
              <option value="england">England</option>
              <option value="spain">spain</option>
            </select>
          </div>

          <div class="form-group">
            <label>profile image:</label>
            <input class="form-control" type="file" name="profile_img">
            <?php
            if(isset($data['imageError'])): ?>
               <div class="alert alert-danger"><?php echo $data['imageError']; ?></div>
           <?php  endif; ?>
          </div>

          <input class="btn btn-primary d-block m-auto" type="submit"  value="Send">

         </form>

     </div>
      </div>
    </div>
  </div>
  <!-- End Main Body -->
  <?php include $tpl . 'footer.php'; ob_end_flush(); ?>
