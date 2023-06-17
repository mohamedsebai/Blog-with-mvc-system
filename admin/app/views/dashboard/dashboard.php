<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'home';
include $tpl . 'header.php';
?>
<?php include $tpl . 'navbar.php'; ?>
<body>
  <!-- Start Main Body -->
  <div class="main-body">
   <div class="container">
     <h2 style="background-color: red; text-align: center; padding: 10px; color: white; margin-bottom: 20px; text-transform: capitalize;">admin panel</h2>
    <div class="row">

      <div class="col-md-6 col-lg-3">
       <div class="stat user" style="background-color: #0c0000cc;">
        <div class="d-inline-block text-center">
          <h5>Admins</h5>
          <i class="fa fa-users"></i>
        </div>
        <div class="float-right d-inline-block text-center">
          <h5><?php echo $this->auth->count(1); ?></h5>
          <span></span>
        </div>
       </div>
      </div>

     <div class="col-md-6 col-lg-3">
      <div class="stat user">
       <div class="d-inline-block text-center">
         <h5>Users</h5>
         <i class="fa fa-users"></i>
       </div>
       <div class="float-right d-inline-block text-center">
         <h5><h5><?php echo $this->auth->count(0); ?></h5></h5>
         <span></span>
       </div>
      </div>
     </div>

     <div class="col-md-6 col-lg-3">
       <div class="stat post">
         <div class="d-inline-block text-center">
           <h5>Posts</h5>
           <i class="fa fa-paste"></i>
         </div>
         <div class="float-right d-inline-block text-center">
           <h5><h5><?php echo $this->post->count(); ?></h5></h5>
           <span></span>
         </div>
       </div>
     </div>

     <div class="col-md-6 col-lg-3">
       <div class="stat category">
         <div class="d-inline-block text-center">
           <h5>Category</h5>
           <i class="fa fa-tags"></i>
         </div>
         <div class="float-right d-inline-block text-center">
           <h5><h5><?php echo $this->category->count(); ?></h5></h5>
           <span></span>
         </div>
       </div>
     </div>

     <div class="col-md-6 col-lg-3">
       <div class="stat category">
         <div class="d-inline-block text-center">
           <h5>Messages</h5>
           <i class="fa fa-tags"></i>
         </div>
         <div class="float-right d-inline-block text-center">
           <h5><h5><?php echo $this->message->count(); ?></h5></h5>
           <span></span>
         </div>
       </div>
     </div>

    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 latest-items">
     <div class="latest latest-posts">
       <h4>Latest Posts</h4>
       <?php
       $count = $common_data->select_limit_data('posts', 5)['count'];
       $row = $common_data->select_limit_data('posts', 5)['row'];
       if($count > 0):
         foreach($row as $postData): ?>
         <div class="item post">
          <img src="<?php echo IMG_PATH_POST . $postData['img']; ?>" width="50">
          <span class="title"><?php echo $postData['title']; ?></span>
          <p class="body">
          <span class="cat d-block" style="color: black;">Tags: <?php echo $postData['tags']; ?></span>
          <span class="body d-block"><?php echo substr($postData['content'], 0, 200) . "..."; ?></span>
          <a href="<?php echo ADMINSITE; ?>/posts/show/<?php echo $postData['id']; ?>" class="btn btn-success">show</a>
          <p>
         </div>
         <hr>
         <?php endforeach; endif; ?>
     </div>
   </div>

  </div>
</div>

</div>
</div>
<!-- End Main Body -->

<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
