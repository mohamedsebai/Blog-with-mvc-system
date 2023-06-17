<?php


trait file {


  public function file_extension( $img_name ){
    $img_extension = explode('.', $img_name);
    $img_extension = strtolower(end($img_extension));
    return $img_extension;
  }

  public function upload_file($img_name ,$img_tmp_name){
    $random_img_name = rand(0, getrandmax()) . $img_name;
    $target_file = IMG_PATH_POST . basename($random_img_name);
    move_uploaded_file( $img_tmp_name,  $target_file  );
    return $target_file;

  }


}
