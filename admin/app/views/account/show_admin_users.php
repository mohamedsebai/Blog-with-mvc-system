<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('admin_id')):
  $path->redirect('login');
endif;
$format->page_title = 'show admin user';
include $tpl . 'header.php';
?>
<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
  $results_per_page = 100;
  $start_from = ($page - 1) * $results_per_page;
  $number_of_result =  $this->auth->count(1);
  $number_of_page = ceil($number_of_result / $results_per_page);
  if($page > $number_of_page){
    $this->redirect('page404');
  }
}
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<!-- Start Main Body -->
<div class="main-body">
 <div class="container">
  <div class="row">
    <div class="responsive-table m-auto">
      <h2 class="text-center">Admin users</h2>
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
          <th>Thumbnail</th>
          <th>Fullname</th>
          <th>Email</th>
          <th>Date</th>
          <th>show</th>
          <th>Delete</th>
        </tr>
       </thead>
       <?php
       if( $data['count'] > 0 ):
       foreach( $data['row'] as $adminData ):
         $id            = $adminData['id'];
         $img           = $adminData['profile_img'];
         $fullname      = $adminData['fullname'];
         $email         = $adminData['email'];
         $date          = $adminData['created_at'];
         ?>
        <tbody class="text-center">
         <tr>
           <td><?php echo $id; ?></td>
           <td><img src="<?php echo IMG_PATH_USER . $img; ?>" width="50"></td>
           <td><?php echo $fullname; ?></td>
           <td><?php echo $email; ?></td>
           <td><?php echo $date;?></td>
           <td><a href="<?php echo ADMINSITE;?>/show_admin_users/show/<?php echo $id; ?>" class="btn btn-success custom-btn"><i class="fa fa-close"></i>show</a></td>
           <td>
             <a href="<?php echo ADMINSITE;?>/show_admin_users/delete/<?php echo $id; ?>/?page=<?php echo $page; ?>" class="btn btn-danger custom-btn"><i class="fa fa-close"></i>Delete</a>
            <?php if(Session::get('admin_id') == $id): ?>
             <button style="cursor: text;" class="btn btn-primary custom-btn">it's you</button>
           <?php endif; ?>
           </td>


         </tr>
        </tbody>
      <?php endforeach;
            else: ?>
          <div class="altert alert-danger">there is no admin</div>
      <?php endif; ?>
      </table>
    </div>
   </div>
   <div class="order-list">
     <ul class="list-unstyled">
       <?php for($page = 1; $page <= $number_of_page; $page++) { ?>
          <li> <a href="<?php echo ADMINSITE; ?>/show_admin_users/pages/?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
        <?php } ?>
     </ul>
   </div>
 </div>
</div>
<!-- End Main Body -->
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
