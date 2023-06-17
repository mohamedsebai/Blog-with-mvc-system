<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'show message';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>



<div class="show">
  <div class="container">
    <div class="row">
      <?php
      if( $data['count'] > 0 ):
        $messageData     = $data['row'];
        $id              = $messageData['id'];
        $email           = $messageData['email'];
        $username        = $messageData['username'];
        $phone           = $messageData['phone'];
        $subject         = $messageData['subject'];
        $created_at      = $messageData['created_at'];
        ?>

      <div class="col-md-12" style="margin-top: 50px;">
        <h5>Username: <?php echo $username; ?></h5>
        <h5>Email: <?php echo $email; ?></h5>
        <h5>Subject: </h5><P> <?php echo $subject; ?></P>
        <h5>Phone: </h5><span class="author"><?php echo $phone; ?></span><br>
        <i class="fa fa-calendar" style="margin-right: 10px"></i><span class="date"><?php echo $created_at; ?></span><br>

        <a href="<?php echo ADMINSITE; ?>/messages/reply/<?php echo $id; ?>" class="btn btn-success custom-btn">reply</a>
      </div>
     <?php else: ?>
        <div class="altert alert-danger">there is no Posts</div>
    <?php endif; ?>
    </div>
  </div>
</div>

<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
