<?php
ob_start();
include IINT_VIEWS;
$format->page_title = 'post';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<?php include $tpl . 'main_ads.php'; ?>

<!-- Start body -->
<div class="main-body single_page">
  <div class="container">
   <div class="row">
     <!-- start latest posts -->
     <div class="col-md-9">
       <?php
       if($data['count_single'] > 0):
           $postData = $data['row_single'];
           $id              = $postData['post_id'];
           $title           = substr($postData['title'], 0 , 100);
           $content         = substr($postData['content'], 0 , 100);
           $author_fullname = $postData['author_fullname'];
           $category_name   = $postData['category_name'];
           $category_id     = $postData['category_id'];
           $img             = $postData['img'];
           $tags            = $postData['tags'];
           $post_created_at = $postData['post_created_at'];
           $date_diff       = $date->date_differance($post_created_at);
       ?>
       <div class="latest-news">
             <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>">
               <img class="img-fluid" src="<?php echo IMG_PATH_POST; ?><?php echo $img; ?>" style="width: 100%; height: 500px;"/>
             </a>
            <div class="news-box-body">
              <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>" class="d-block"><h5><?php echo $title; ?></h5></a>
              <span class="date"><i class="fa fa-calendar"></i><?php echo $date_diff; ?></span><br>
              <span class="author"><i class="fa fa-user"></i><?php echo $author_fullname; ?></span>
              <P><?php echo $content; ?></P>
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
      <?php endif; ?>
       <!-- comment -->
         <?php include $tpl . 'comments.php'; ?>
       <!-- end comment -->
     </div>
     <!-- end latest posts -->

     <!-- start sidebar -->
      <?php include $tpl . 'right_sidebar.php'; ?>
     <!-- end sidebar -->
   </div>

   <div class="cat_news">
     <h2 class="header">Latest News</h2>
     <div class="row">
       <?php
       if($data['count_limit'] > 0):
       foreach($data['row_limit'] as $post):
         $id              = $post['post_id'];
         $title           = substr($post['title'], 0 , 100);
         $content         = substr($post['content'], 0 , 100);
         $author_fullname = $post['author_fullname'];
         $img             = $post['img'];
       ?>
       <div class="col-md-3">
         <div class="news-box">
           <div class="img-box">
             <div class="overlay"></div>
             <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>">
               <img class="img-fluid" src="<?php echo IMG_PATH_POST; ?><?php echo $img; ?>"/>
             </a>
           </div>
          <div class="news-box-body">
            <a href="" class="d-block"><h5><?php echo $title; ?></h5></a>
              <P><?php echo $content; ?></P>
            <P><?php echo $author_fullname; ?></P>
            <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>" class="read-more">Read more</a>
          </div>
         </div>
       </div>
     <?php endforeach; ?>
     <?php else: ?>
       <div class="alert alert-danger">there is no posts</div>
     <?php endif; ?>

     </div>
   </div>

  </div>
</div>
<!-- End body -->


<?php include $tpl . 'footer_content.php'; ?>
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
