<?php
// class like DBconnect , Framework all these you can chekc static method from it in any view;
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  //redirect one step back then auto will go to login if no Session
  $path->redirect('../');
endif;
$format->page_name = 'edit Slider';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start body -->

  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box" style="width: 600px; text-align: center; margin: auto;">
        <h2 class="text-center">Edit Slider</h2>

        <?php if( isset($data['success']) && !empty($data['success']) ):?>
        <div class="error alert alert-success"><?php echo $data['success']; ?></div>
         <?php endif; ?>
        <?php if( isset($data['error']) && !empty($data['error']) ):?>
         <div class="error alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>

       <form action="<?php echo ADMINSITE; ?>/slider/edit_msg" method="POST" enctype="multipart/form-data" style="width: 100%;">
         <input type="hidden" name="slider_id" value="<?php echo $data['row']['id']; ?>">

         <div class="form-group">
           <label>title:</label>
           <input class="form-control" type="text" name="title" placeholder="title"
           value="<?php if(isset($data['row']['title'])){echo $data['row']['title']; } ?>">
           <?php if( isset($data['titleError']) && !empty($data['titleError']) ): ?>
              <div class="error alert alert-danger"><?php echo $data['titleError']; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>content:</label>
           <textarea class="form-control" type="text" name="content" placeholder="content"><?php if(isset($data['row']['content'])){echo $data['row']['content']; } ?></textarea>
           <?php if(isset($data['contentError']) && !empty($data['contentError'])): ?>
               <div class="error alert alert-danger"><?php echo $data['contentError']; ?></div>
          <?php endif; ?>
         </div>

         <div class="form-group">
           <label>img:</label>
           <input class="form-control" type="file" name="img">
           <?php
           if(isset($data['imageError'])): ?>
              <div class="alert alert-danger"><?php echo $data['imageError']; ?></div>
          <?php  endif; ?>
         </div>

         <input type="submit" value="update" name="update" class="btn btn-primary" />
        </form>
       </div>
      </div>
    </div>
  </div>
<!-- End Main Body -->
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
