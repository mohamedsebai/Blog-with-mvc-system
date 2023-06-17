<?php
$post_id_for_comments = $this->getUrl()[2];
if(Session::check('id')){
  $userId = Session::get('id');
}

//ADD PARENT
//

if(isset($_POST['parent_comment'])){
  $parent_comment_body = $_POST['parent_comment_body'];
  $added_date = date("F j, Y, g:i a");
  $this->comment->add_comment("0", $parent_comment_body, $post_id_for_comments, $userId, $added_date);
}
//
// ?>
<?php

if(isset($_POST['child'])):
  $chlid_comment_body =  $_POST['chlid_comment_body'];
  $parent_id = $_POST['parent_id'];
  $added_date = date("F j, Y, g:i a");
  $this->comment->add_comment($parent_id, $chlid_comment_body, $post_id_for_comments, $userId, $added_date);
endif;
// ?>
<?php
if(isset($_POST['edit_parent_comment'])):
  $id_comment = $_POST['id'];
  $parent = $_POST['id_for_parent'];
  $content_parent_edit =  $_POST['content_parent_edit'];
  $added_date = date("F j, Y, g:i a");
  $this->comment->edit_comment($parent, $content_parent_edit, $post_id_for_comments, $userId, $added_date, $id_comment);
endif;
//
?>
<?php
if(isset($_POST['edit_child'])):
  $id_comment = $_POST['id'];
  $parent = $_POST['parent_id'];
  $chlid_comment_body =  $_POST['chlid_comment_body'];
  $added_date = date("F j, Y, g:i a");
  $this->comment->edit_comment($parent, $chlid_comment_body, $post_id_for_comments, $userId, $added_date, $id_comment);
endif;
//
?>
<?php
if(isset($_POST['replay_comment'])):
  $replay_comment_body =  $_POST['replay_comment_body'];
  $reply_parent_id = $_POST['reply_parent_id'];
  $added_date = date("F j, Y, g:i a");
  $this->comment->add_comment($reply_parent_id, $replay_comment_body, $post_id_for_comments, $userId, $added_date);
endif;
//

// ?>
<?php

// delete parent comment
if(isset($_GET['delete'])):
  $id_to_delete = $_GET['delete'];
  $this->comment->delete_comment_with_id($id_to_delete);
  $this->comment->delete_comment_with_parent($id_to_delete);
endif;

?>
<div class="comment-section">
  <div class="header">
    <i class="fa fa-plus flaot-left"></i>
    <h4 class="d-inline-block flaot-right">Add comment</h4>
  </div>
    <div class="comment-show">
      <!-- start parent -->
      <?php
      $get_parent_comments_data = $this->comment->get_commments_data($post_id_for_comments, "0");
      if($get_parent_comments_data !== false) :
        foreach($get_parent_comments_data as $parent_comment_data):
          $comment_id = $parent_comment_data['comment_id'];
          echo $comment_id;
          $comment_parent_id = $parent_comment_data['id'];
          $comment_body = $parent_comment_data['comment_body'];
          $profile_img = $parent_comment_data['profile_img'];
          $author_fullname = $parent_comment_data ['author_fullname'];
          $author = $author_fullname;
          $parent = $parent_comment_data['parent'];
          $updated_at = $parent_comment_data['update_date'];
          $_SESSION['parent_comment_id'] = $comment_parent_id;
          echo $comment_parent_id;
          ?>
          <!-- edit parent comment -->
      <div class="parent">
        <img src="<?php echo $profile_img; ?>" width="50">
        <span class="author"><?php echo $author; ?></span>
        <span class="date"><?php echo $updated_at; ?></span>
        <div class="body">
          <p><?php echo $comment_body; ?></p>
        </div>

        <div class="option-box">
          <span class="edit">Edit</span>
          <span class="delete">
            <a href="<?PHP echo  BASEURL; ?>/post/single/<?php echo $post_id_for_comments; ?>/?delete=<?php echo $comment_parent_id; ?>">
              Delete
            </a>
          </span>

            <form action="" method="POST" class="edit_comment_form">
              <div class="form-group">
                <h5>Edit comment</h5>
              <input type="hidden" name="id_for_parent" value="<?php echo "0"; ?>">
              <input type="hidden" name="id" value="<?php echo $comment_parent_id; ?>">
              <textarea class="form-control" name="content_parent_edit"><?php echo $comment_body; ?></textarea>
              <input type="submit" name="edit_parent_comment" class="btn btn-primary" value="update">
              </div>
          </form>
        </div>
        <span class="reply-head">replies</span>
        <?php
        $comments_number = $this->comment->get_comments_number($post_id_for_comments, $comment_parent_id);
        if( $comments_number > 0){
          echo 'comments_repleais ' . $comments_number;
        }else{
          echo "there is no replies on this comment";
        }
        ?>
        <!-- start child -->
        <?php
        $get_child_comments_data = $this->comment->get_commments_data($post_id_for_comments, $comment_parent_id);
        if($get_child_comments_data !== false):
          foreach($get_child_comments_data as $child_comment_data):
            $child_comment_id = $child_comment_data['id'];
            $comment_parent_id = $child_comment_data['parent'];
            $comment_body = $child_comment_data['comment_body'];
            $profile_img = $child_comment_data['profile_img'];
            $author_fullname = $parent_comment_data ['author_fullname'];
            $author = $author_fullname;
            $updated_at = $child_comment_data['update_date'];
            ?>
        <div class="child">
          <div class="reply">
            <img src="<?php echo $profile_img; ?>" width="50">
            <span class="author"><?php echo $author; ?></span>
            <span class="date"><?php echo $updated_at; ?></span>
            <div class="body">
              <p><?php echo $comment_body; ?></p>
            </div>

            <div class="option-box">
              <span class="edit">Edit</span>
              <span class="delete">
                <a href="<?PHP echo  BASEURL; ?>/post/single/<?php echo $post_id_for_comments; ?>/?delete=<?php echo $child_comment_id; ?>">
                Delete
              </a>
              </span>
                  <form action="" method="POST" class="edit_comment_form">
                    <div class="form-group">
                      <h5>Edit comment</h5>
                      <input type="hidden" name="id" value="<?php echo $child_comment_id; ?>">
                      <input type="hidden" name="parent_id" value="<?php echo $comment_parent_id; ?>">
                      <textarea class="form-control" name="chlid_comment_body"><?php echo $comment_body; ?></textarea>
                      <input type="submit" name="edit_child" class="btn btn-primary" value="update">
                    </div>
                  </form>
              </div>
            </div>
      </div>

   <?php endforeach; endif; // end if get_commments_data($post_id, $parent); //child ?>

        <!-- end child -->

        <!-- Reply for parent comments -->
      </div>
      <form action="" method="POST">
          <input type="hidden" value="<?php echo $_SESSION['parent_comment_id']; ?>" name="reply_parent_id"/>
        <div class="form-group">
          <h5>Reply comment</h5>
          <textarea class="form-control" name="replay_comment_body"></textarea>
          <input type="submit" class="btn btn-primary" value="reply" name="replay_comment">
        </div>
        </form>
<?php endforeach; endif; // end if get_commments_data($post_id, $parent); // parent ?>


      <!-- <div class="alert alert-danger">there is no comments yet.</div> -->
  <!-- end parent -->

  <!-- send parent comment -->
      <?php if(Session::check('id')){ ?>
        <form action="" method="POST">
          <div class="form-group">
            <h5>Add comment</h5>
            <textarea class="form-control" name="parent_comment_body"></textarea>
            <input type="submit" class="btn btn-primary" value="Send" name="parent_comment">
          </div>
          </form>
      <?php }else{ ?>
        <h6>login to add comment</h6>
        <a href="<?php echo BASEURL; ?>/signup" class="create_account">Create account</a>
        <a href="<?php echo BASEURL; ?>/login" class="create_account">Login</a>
      <?php }?>
    </div>
    <!-- end comment_show -->
</div>
