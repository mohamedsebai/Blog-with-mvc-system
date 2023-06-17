<?php
// main url
define("BASEURL" , "http://localhost/mvc_oop");
define("ADMINSITE" , "http://localhost/mvc_oop/admin");

// img path for each data
define("IMG_PATH_CAROUSEL" , "http://localhost/mvc_oop/admin/public/img/carousel/");
define("IMG_PATH_ADS" , "http://localhost/mvc_oop/admin/public/img/ads/");
define("IMG_PATH_LOGIN" , "http://localhost/mvc_oop/admin/public/img/login/");
define("IMG_PATH_LOGO" , "http://localhost/mvc_oop/admin/public/img/logo/");
define("IMG_PATH_POST" , "http://localhost/mvc_oop/admin/public/img/post/");
define("IMG_PATH_USER" , "http://localhost/mvc_oop/admin/public/img/user/");

// include file has many information to views pages
define('IINT_VIEWS', '../app/views/init.views.php');

// database information
define("HOST", 'localhost');
define("DATABASENAME", 'mvc_oop');
define("USER", 'root');
define("PASS", '');


// recaptcha code
define('RECAPTCHA_FRONT_END',  '6LdWuoolAAAAAG70L70P4bJA6RxLYMbwG8O8C8Rh');  // in views
define('RECAPTCHA_BACK_END', '6LdWuoolAAAAACli9LlH_n7VILEuatD8IgLHvZ_6'); // in controller

// facebook login api
define('APP_ID', '905710930711168');
define('APP_SECRET', '8ac5b9aa62b7f5b03a64686a98d3f9f4');
define('API_VERSION', 'v2.5');
//redirect url for facebook api
define('FB_Redirect_URL', 'http://localhost/mvc_oop/home');
// Your main domain for login page that has the form to submit
define('BASE_URL', 'http://localhost/mvc_oop/');


if(!session_id()){
   session_start();
}
