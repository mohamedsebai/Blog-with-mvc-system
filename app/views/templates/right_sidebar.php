<div class="d-none d-md-block col-md-3">

 <div class="sidebar">

   <h2 class="header">Random News</h2>

   <div class="sidebar">
         <?php
         $count =  $common_data->select__random_posts_data(5)['count'];
         $postsData = $common_data->select__random_posts_data(5)['row'];
         if($count > 0):
         foreach($postsData as $post):
           $id              = $post['post_id'];
           $title           = substr($post['title'], 0 , 100);
           $content         = substr($post['content'], 0 , 100);
           $author_fullname = $post['author_fullname'];
           $img             = $post['img'];
         ?>
           <div class="news-box">
             <div class="img-box">
               <div class="overlay"></div>
               <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>">
                 <img class="img-fluid" src="<?php echo IMG_PATH_POST; ?><?php echo $img; ?>"/>
               </a>
             </div>
            <div class="news-box-body">
              <a href="" class="d-block"><h5><?php echo $author_fullname; ?></h5></a><br>
              <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>" class="d-block"><h5><?php echo $title; ?></h5></a>
                <P><?php echo $content; ?></P>
              <a href="<?php echo BASEURL; ?>/post/single/<?php echo $id; ?>" class="read-more">Read more</a>
            </div>
           </div>
       <?php endforeach; ?>
       <?php else: ?>
         <div class="alert alert-danger">there is no posts</div>
       <?php endif; ?>
   </div>
 </div>
</div>
