<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
 //$format->title must be after init.views.php becuse the object $format instant from it and befor header to declare it befor method;
$format->page_title = 'profile edit';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start body -->
<div class="edit-profile">
  <div class="container">
   <div class="row">
     <div class="form-box m-auto">
       <h2 class="text-center">
         Edit profile <br>
         <?php echo $session_fullname; ?>
       </h2>
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



       <form method="post" action="<?php echo ADMINSITE; ?>/profileEdit/msg" enctype="multipart/form-data">
         <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">
         <div class="form-group">
           <label>fullname name:</label>
           <input class="form-control" type="text" name="fullname" placeholder="enter fullname"
           value="<?php if(isset($session_fullname)){echo $session_fullname; }?>">
           <?php
           if(isset($data['fullnameError']) && !empty($data['fullnameError'])): ?>
              <div class="alert alert-danger"><?php echo $data['fullnameError']; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>email:</label>
           <input class="form-control" type="text" name="email" placeholder="write valid email not contain (~^$#)"
           value="<?php if(isset($session_email)){echo $session_email; }?>">
           <?php
           if(isset($data['emailError']) && !empty($data['emailError'])): ?>
              <div class="alert alert-danger"><?php echo $data['emailError']; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>gender:</label>
           <select class="form-control" name="gender">
             <option value="male" <?php if($session_gender == 0){ echo 'selected'; } ?>>male</option>
             <option value="female" <?php if($session_gender == 1){ echo 'selected'; } ?>>female</option>
           </select>
         </div>

         <div class="form-group">
           <label>country:</label>
           <select class="form-control" name="country">
             <option value="egypt"  <?php if($session_country == 'egypt'){ echo 'selected'; } ?> >Egypt</option>
             <option value="england" <?php if($session_country == 'england'){ echo 'selected'; } ?> >england</option>
             <option value="spain" <?php   if($session_country  == 'spain' ) { echo 'selected'; } ?> >spain</option>
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
<!-- End body -->



<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
