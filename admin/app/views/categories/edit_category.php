<?php
// class like DBconnect , Framework all these you can chekc static method from it in any view;
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  //redirect one step back then auto will go to login if no Session
  $path->redirect('../');
endif;
$format->page_name = 'edit post';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start body -->

  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box" style="width: 600px; text-align: center; margin: auto;">
        <h2 class="text-center">Edit category</h2>

        <?php if( isset($data['success']) && !empty($data['success']) ):?>
        <div class="error alert alert-success"><?php echo $data['success']; ?></div>
         <?php endif; ?>
        <?php if( isset($data['error']) && !empty($data['error']) ):?>
         <div class="error alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>

       <form action="<?php echo ADMINSITE; ?>/categories/edit_msg" method="POST" enctype="multipart/form-data" style="width: 100%">

         <div class="form-group">
           <input type="hidden" name="category_id" value="<?php echo $data['row']['id']; ?>">
           <label>name:</label>
           <input class="form-control" type="text" name="name" placeholder="category name"
           value="<?php if(isset($data['row']['name'])){echo $data['row']['name']; } ?>">
           <?php if( isset($data['nameError']) && !empty($data['nameError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['nameError']; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>description:</label>
           <textarea class="form-control" type="text" name="description" placeholder="description">
             <?php if(isset($data['row']['description'])){echo $data['row']['description']; } ?></textarea>
           <?php if(isset($data['descriptionError']) && !empty($data['descriptionError'])): ?>
               <div class="error alert alert-danger"><?php echo $data['descriptionError']; ?></div>
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
