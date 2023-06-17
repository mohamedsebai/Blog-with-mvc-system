<?php
// Google API Client

$clientID = "812477419526-nfi99hcae3eueslgomd7i8mep0bmim68.apps.googleusercontent.com";
$secret = "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";
$redirect_url = 'http://localhost/mvc_oop';


$gclient = new Google_Client();

$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri($redirect_url);


$gclient->addScope('email');
$gclient->addScope('profile');

// check if get not session
if(isset($_GET['code'])){
    // Get Token
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if fetching token did not return any errors
    if(!isset($token['error'])){
        // Setting Access token
        $gclient->setAccessToken($token['access_token']);

        // store access token
        $_SESSION['access_token'] = $token['access_token'];

        // Get Account Profile using Google Service
        $gservice = new Google_Service_Oauth2($gclient);

        // Get User Data
        $udata = $gservice->userinfo->get();
        foreach($udata as $k => $v){
            $_SESSION['login_'.$k] = $v;
        }
        $_SESSION['ucode'] = $_GET['code'];

        header('location: ./');
        exit;
    }
}
