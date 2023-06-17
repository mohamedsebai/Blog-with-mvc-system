<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('id')):
  $path->redirect('home');
endif;
$format->page_title = 'show profile';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<?php include $tpl . 'main_ads.php'; ?>
<!-- Start body -->
<!-- Start body -->
<div class="main-body single_page">
  <div class="container">
   <div class="row">
     <!-- start latest posts -->
     <div class="col-md-9">
       <?php
       if($data['count'] > 0):
           $postData = $data['row'];
           $id              = $postData['id'];
           $fullname        = $postData['fullname'];
           $email           = $postData['email'];
           $img             = $postData['profile_img'];
           $gender          = $postData['gender'];
           $country         = $postData['country'];
           $status          = $postData['status'];
           $created_at      = $postData['created_at'];
           $formating_date       = $date->formating_date($created_at);
       ?>
        <div class="latest-news">

         <img class="img-fluid" style="width: 100%; max-height: 500px"
         src="<?php echo IMG_PATH_POST; ?>1297955454139392330_2915229468802367_1065681302626753858_n.jpg<?php //echo $img; ?>"/>

         <div class="news-box-body">
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
         </div>

         <div style="margin-top: 10px;">
           <?php if( Session::check('id') == true ): ?>
             <i class="fa fa-tags"></i>
             <a class="join-us" href="<?php echo BASEURL; ?>/profileEdit" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">edit profile</a>
             <a class="join-us" href="<?php echo BASEURL; ?>/change_password" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">change password</a>
             <a class="join-us" href="<?php echo BASEURL; ?>/show_profile/page/<?php echo Session::get('id'); ?>" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">show profile</a>
             <a class="join-us" href="<?php echo BASEURL; ?>/add_post" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">add post</a>
             <a class="join-us" href="<?php echo BASEURL; ?>/logout" style="background-color: #c70e4eb0; color: white; padding: 5px 10px">logout</a>
           <?php endif; ?>
         </div>
        </div>
        <?php
      else:
         $path->redirect('page404');
      endif; ?>

</div>
<?php include $tpl . 'right_sidebar.php'; ?>
</div>
</div>
</div>
<!-- End Main Body -->
<?php include $tpl . 'footer_content.php'; ?>
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
