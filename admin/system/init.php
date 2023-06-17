<?php


include 'classes/vendor_mailer/autoload.php';


include 'traits/file.trait.php';
include 'traits/filter.trait.php';

spl_autoload_register(function($class){
  include 'classes/'.$class.'.class.php';
});

$rout = new Rout();
$db = new DBconnect();
