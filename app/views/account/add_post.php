<?php
ob_start();
include IINT_VIEWS;
if(!Session::check('id')):
  $path->redirect('home');
endif;
$format->page_title = 'add post';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>
<?php include $tpl . 'main_ads.php'; ?>
<!-- Start body -->
<!-- Start Main Body -->
<style>
.ck-editor__editable[role="textbox"] {
             /* editing area */
             min-height: 400px;
}
</style>
  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box" style="width: 600px; text-align: center; margin: auto;">
        <h2 class="text-center">Add New Post</h2>

        <?php if( isset($data['success']) && !empty($data['success']) ):?>
        <div class="error alert alert-success"><?php echo $data['success']; ?></div>
         <?php endif; ?>
        <?php if( isset($data['error']) && !empty($data['error']) ):?>
         <div class="error alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>

       <form action="<?php echo BASEURL; ?>/add_post/msg" method="POST" enctype="multipart/form-data" style="width: 100%">
         <div class="form-group">
           <label>Title:</label>
           <input class="form-control" type="text" name="title" placeholder="Post Title">
           <?php if( isset($data['titleError']) && !empty($data['titleError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['titleError']; ?></div>
           <?php endif; ?>
         </div>
         <div class="form-group">
           <label>Content:</label>
           <textarea id="content" class="form-control" type="text" name="content" placeholder="post Content"></textarea>
           <?php if(isset($data['contentError']) && !empty($data['contentError'])): ?>
               <div class="error alert alert-danger"><?php echo $data['contentError']; ?></div>
          <?php endif; ?>
         </div>
         <div class="form-group">
           <input class="form-control" type="hidden" name="author_id" value="<?php echo Session::get('id'); ?>">
         </div>
         <div class="form-group">
           <label>Tags:</label>
           <input class="form-control" type="text" name="tags" placeholder="Separet tag with(,)">
           <?php if( isset($data['tagsError']) && !empty($data['tagsError']) ):?>
              <div class="error alert alert-danger"><?php echo $data['tagsError']; ?></div>
          <?php endif; ?>
         </div>

         <div class="form-group">
            <h5>Category: chosse just one category</h5>
            <select name="category_id">
              <?php
                $row = $common_data->select_data('categories')['row'];
                foreach( $row as $category):?>
              <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <?php if(isset($data['categoriesError']) && !empty($data['categoriesError'])):?>
               <div class="error alert alert-danger"><?php echo $data['categoriesError']; ?></div>
            <?php endif; ?>
         </div>

         <div class="form-group">
           <label>Image:</label>
           <input class="form-control" type="file" name="img" >
           <?php if(isset($data['imageError']) && !empty($data['imageError'])):?>
              <div class="error alert alert-danger"><?php echo $data['imageError']; ?></div>
           <?php endif; ?>
         </div>
         <input type="submit" value="add" name="add_post" class="btn btn-primary" />
        </form>
       </div>
      </div>
    </div>
  </div>
<!-- End Main Body -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>
