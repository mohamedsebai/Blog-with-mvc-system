<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'logo';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start Main Body -->
<div class="main-body">
 <div class="container">
  <div class="row">
    <div class="responsive-table m-auto">
      <h2 class="text-center">Our Logo</h2>
      <?php if(isset($data['error']) && !empty($data['error'])): ?>
      <div class="altert alert-danger"><?php  echo $data['error']; ?></div>
      <?php endif;  ?>
      <?php if(isset($data['success']) && !empty($data['success'])): ?>
      <div class="altert alert-success"><?php  echo $data['success']; ?></div>
      <?php endif;  ?>

      <table class="table-bordered">
       <thead class="text-center">
         <tr>
          <th>Logo</th>
          <th>title</th>
          <th>Date</th>
          <th>Edit</th>
        </tr>
       </thead>
       <?php
       if( $data['count'] > 0 ):
       foreach( $data['row'] as $logoData ):
         $logo_id  = $logoData['id'];
         $title    = $logoData['title'];
         $img      = $logoData['img'];
         $date     = $logoData['created_at'];
         ?>
        <tbody class="text-center">
         <tr>
           <td><img src="<?php echo IMG_PATH_LOGO . $img; ?>" alt="img slider" style="width: 100%; height: 200px;"> </td>
           <td><?php echo $title; ?></td>
           <td><?php echo $date;?></td>
           <td><a href="<?php echo ADMINSITE;?>/logos/edit/<?php echo $logo_id; ?>" class="btn btn-primary custom-btn"><i class="fa fa-close"></i>Edit</a></td>
         </tr>
        </tbody>
      <?php endforeach;
            else: ?>
          <div class="altert alert-danger">there is no Logo</div>
      <?php endif; ?>
      </table>
    </div>
   </div>
 </div>
</div>
<!-- End Main Body -->
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
