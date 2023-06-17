<?php
// class like DBconnect , Framework all these you can chekc static method from it in any view;
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  //redirect one step back then auto will go to login if no Session
  $path->redirect('../');
endif;
$format->page_name = 'edit media';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start body -->

  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box" style="width: 600px; text-align: center; margin: auto;">
        <h2 class="text-center">Edit Media</h2>

        <?php if( isset($data['success']) && !empty($data['success']) ):?>
        <div class="error alert alert-success"><?php echo $data['success']; ?></div>
         <?php endif; ?>
        <?php if( isset($data['error']) && !empty($data['error']) ):?>
         <div class="error alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>

       <form action="<?php echo ADMINSITE; ?>/media/edit_msg" method="POST" enctype="multipart/form-data" style="width: 100%">
         <input type="hidden" name="media_id" value="<?php echo $data['row']['id']; ?>">
         <div class="form-group">
           <label>name:</label>
           <select name="name" class="form-control">
             <option value="facebook" <?php  if($data['row']['name'] == 'facebook'){ echo 'selected'; } ?> >facebook</option>
             <option value="instagram" <?php if($data['row']['name'] == 'instagram'){ echo 'selected'; } ?> >instagram</option>
             <option value="twitter" <?php   if($data['row']['name'] == 'twitter'){ echo 'selected'; } ?> >twitter</option>
             <option value="github" <?php    if($data['row']['name'] == 'github'){ echo 'selected'; } ?> >github</option>
             <option value="linkedin" <?php  if($data['row']['name'] == 'linkedin'){ echo 'selected'; } ?> >linkedin</option>
             <option value="youtube" <?php   if($data['row']['name'] == 'youtube'){ echo 'selected'; } ?> >youtube</option>
           </select>
           <?php if( isset($data['nameError']) && !empty($data['nameError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['nameError']; ?></div>
           <?php endif; ?>
         </div>

       <div class="form-group">
         <label>Url:</label>
         <textarea class="form-control" type="text" name="url" placeholder="url"><?php if(isset($data['row']['url'])){echo $data['row']['url']; } ?></textarea>
         <?php if(isset($data['urlError']) && !empty($data['urlError'])): ?>
             <div class="error alert alert-danger"><?php echo $data['urlError']; ?></div>
        <?php endif; ?>
       </div>

         <input type="submit" value="update" name="update" class="btn btn-primary" />
        </form>
       </div>
      </div>
    </div>
  </div>
<!-- End Main Body -->
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
