<?php
// class like DBconnect , Framework all these you can chekc static method from it in any view;
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  //redirect one step back then auto will go to login if no Session
  $path->redirect('../');
endif;
$format->page_title = 'add media';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start Main Body -->
  <div class="main-body"> 
   <div class="container">
    <div class="row">
      <div class="form-box" style="width: 600px; text-align: center; margin: auto;">
        <h2 class="text-center">Add New Media</h2>
        <?php if( isset($data['success']) && !empty($data['success']) ):?>
        <div class="error alert alert-success"><?php echo $data['success']; ?></div>
         <?php endif; ?>
        <?php if( isset($data['error']) && !empty($data['error']) ):?>
         <div class="error alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>

       <form action="<?php echo ADMINSITE; ?>/media/add_msg" method="POST" enctype="multipart/form-data" style="width: 100%">

         <div class="form-group">
           <label>name:</label>
           <select name="name" class="form-control">
             <option value="facebook">facebook</option>
             <option value="instagram">instagram</option>
             <option value="twitter">twitter</option>
             <option value="github">github</option>
             <option value="linkedin">linkedin</option>
             <option value="youtube">youtube</option>
           </select>
           <?php if( isset($data['nameError']) && !empty($data['nameError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['nameError']; ?></div>
           <?php endif; ?>
         </div>

       <div class="form-group">
         <label>Url:</label>
         <textarea class="form-control" type="text" name="url" placeholder="url"><?php if(isset($data['url'])){echo $data['url']; } ?></textarea>
         <?php if(isset($data['urlError']) && !empty($data['urlError'])): ?>
             <div class="error alert alert-danger"><?php echo $data['urlError']; ?></div>
        <?php endif; ?>
       </div>

         <input type="submit" value="add" name="add_media" class="btn btn-primary" />
        </form>
       </div>
      </div>
    </div>
  </div>
<!-- End Main Body -->
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
