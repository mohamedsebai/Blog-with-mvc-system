<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'categories';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start Main Body -->
<div class="main-body">
 <div class="container">
  <div class="row">
    <div class="responsive-table m-auto">
      <h2 class="text-center">categories</h2>
      <?php if(isset($data['error']) && !empty($data['error'])): ?>
      <div class="altert alert-danger"><?php  echo $data['error']; ?></div>
      <?php endif;  ?>
      <?php if(isset($data['success']) && !empty($data['success'])): ?>
      <div class="altert alert-success"><?php  echo $data['success']; ?></div>
      <?php endif;  ?>

      <table class="table-bordered">
       <thead class="text-center">
         <tr>
          <th>ID</th>
          <th>name</th>
          <th>description</th>
          <th>Date</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
       </thead>
       <?php
       if( $data['count'] > 0 ):
       foreach( $data['row'] as $categoryData ):
         $category_id  = $categoryData['id'];
         $name         = $categoryData['name'];
         $description  = substr($categoryData['description'], 0, 30);
         $date         = $categoryData['created_at'];
         ?>
        <tbody class="text-center">
         <tr>
           <td><?php echo $category_id; ?></td>
           <td><?php echo $name; ?></td>
           <td><?php echo $description; ?></td>
           <td><?php echo $date;?></td>
           <td><a href="<?php echo ADMINSITE;?>/categories/edit/<?php echo $category_id; ?>" class="btn btn-primary custom-btn"><i class="fa fa-close"></i>Edit</a></td>
           <td><a href="<?php echo ADMINSITE;?>/categories/delete/<?php echo $category_id; ?>" class="btn btn-danger custom-btn"><i class="fa fa-close"></i>Delete</a></td>
         </tr>
        </tbody>
      <?php endforeach;
            else: ?>
          <div class="altert alert-danger">there is no Posts</div>
      <?php endif; ?>
      </table>
    </div>
   </div>
 </div>
</div>
<!-- End Main Body -->
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
