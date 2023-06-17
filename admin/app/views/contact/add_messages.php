<?php
// class like DBconnect , Framework all these you can chekc static method from it in any view;
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  //redirect one step back then auto will go to login if no Session
  $path->redirect('../');
endif;
$format->page_title = 'add message';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start Main Body -->
  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box" style="width: 600px; text-align: center; margin: auto;">
        <h2 class="text-center">Send new message</h2>
        <?php if( isset($data['success']) && !empty($data['success']) ):?>
        <div class="error alert alert-success"><?php echo $data['success']; ?></div>
         <?php endif; ?>
        <?php if( isset($data['error']) && !empty($data['error']) ):?>
         <div class="error alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>

       <form action="<?php echo ADMINSITE; ?>/messages/add_msg" method="POST" enctype="multipart/form-data" style="width: 100%">

         <div class="form-group">
           <label>Email:</label>
           <input class="form-control" type="text" name="email" placeholder="email"
           value="<?php if(isset($data['email'])){echo $data['email']; } ?>">
           <?php if( isset($data['emailError']) && !empty($data['emailError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['emailError']; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>Username:</label>
           <input class="form-control" type="text" name="username" placeholder="username"
           value="<?php if(isset($data['username'])){echo $data['username']; } ?>">
           <?php if( isset($data['usernameError']) && !empty($data['usernameError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['usernameError']; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>phone:</label>
           <input class="form-control" type="text" name="phone" placeholder="phone"
           value="<?php if(isset($data['phone'])){echo $data['phone']; } ?>">
           <?php if( isset($data['phoneError']) && !empty($data['phoneError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['phoneError']; ?></div>
           <?php endif; ?>
         </div>



       <div class="form-group">
         <label>subject:</label>
         <textarea class="form-control" type="text" name="subject" placeholder="subject">
           <?php if(isset($data['subject'])){echo $data['subject']; } ?></textarea>
         <?php if(isset($data['subjectError']) && !empty($data['subjectError'])): ?>
             <div class="error alert alert-danger"><?php echo $data['subjectError']; ?></div>
        <?php endif; ?>
       </div>

         <input type="submit" value="add" name="add_message" class="btn btn-primary" />
        </form>
       </div>
      </div>
    </div>
  </div>
<!-- End Main Body -->
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
