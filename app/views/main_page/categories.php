<?php
ob_start();
include IINT_VIEWS;
$format->page_title = 'categories';
include $tpl . 'header.php';
?>
<body>
<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
  $category_id = $this->getUrl()[2];
  $results_per_page = 3;
  $start_from = ($page - 1) * $results_per_page;
  $number_of_result =  $this->posts->getCountOfPostsCategory($category_id);
  $number_of_page = ceil($number_of_result / $results_per_page);
  if($page > $number_of_page){
    $this->redirect('page404');
  }
}
?>
<?php include $tpl . 'navbar.php'; ?>
<?php include $tpl . 'main_ads.php'; ?>
<!-- Start body -->


<!-- Start body -->
<div class="main-body cat_main_body">
  <div class="container">
     <h2 class="header">
       <?php echo 'Discover news'; ?>
   </h2>
   <div class="row">
      <!-- start latest posts -->

      <?php
      if($data['count'] > 0):
        foreach( $data['row'] as $postData ):
          $id              = $postData['post_id'];
          $title           = substr($postData['title'], 0 , 100);
          $content         = substr($postData['content'], 0 , 100);
          $author_fullname = $postData['author_fullname'];
          $category_name   =  $postData['category_name'];
          $category_id     = $postData['category_id'];
          $img             = $postData['img'];
          $tags            = $postData['tags'];
          $post_created_at = $postData['post_created_at'];
          $date_diff       = $date->date_differance($post_created_at);
           ?>
            <div class="col-md-3">
              <div class="latest-news">
                  <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>">
                    <div class="img-box">
                      <img class="img-fluid" src="<?php echo IMG_PATH_POST; ?><?php echo $img; ?>"/>
                    </div>

                  </a>
                    <div class="news-box-body">
                      <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>"  class="d-block">
                        <h5><?php echo $title; ?></h5>
                      </a>
                      <span class="date"><i class="fa fa-calendar"></i><?php echo $date_diff; ?></span><br>
                      <span class="author"><i class="fa fa-user"></i><?php echo $author_fullname; ?></span>
                        <P><?php echo $content; ?></P>
                      <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>" class="read-more">Read more</a>
                      <div class="categories"><i class="fa fa-tags"></i>
                        Categories:
                        <a href="<?php echo BASEURL; ?>/categories/posts/<?php echo $category_id; ?>/?page=1"><?php echo $category_name; ?></a>
                      </div>
                      <div class="categories"><i class="fa fa-tags"></i>
                        tags:
                        <?php
                        $tags = str_replace(' ', '', $tags);
                        $tags = explode(',', $tags);
                        foreach($tags as $tag):
                        ?>
                        <a href="<?php echo BASEURL; ?>/tags/posts/<?php echo $tag; ?>/?page=1"><?php echo $tag; ?></a>
                        <?php
                        endforeach;
                        ?>
                      </div>
                    </div>
              </div>
            </div>
        <?php endforeach; ?>
       <!-- end latest posts -->
     <?php

   else: ?>
     <div class="alert alert-danger">Mohamed shares no post in this categories</div>
  <?php endif; ?>

   </div>
   <div class="order-list">
     <ul class="list-unstyled">

       <?php for($page = 1; $page <= $number_of_page; $page++) { ?>
          <li> <a href="<?php echo BASEURL; ?>/categories/posts/<?php echo $this->getUrl()[2]; ?>/?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
        <?php } ?>
     </ul>
   </div>

  </div>
</div>
<!-- End body -->

<?php include $tpl . 'footer_content.php'; ?>
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
