<?php

// Class Name: Session

//Include Google Client Library for PHP autoload file
require_once ('vendor/autoload.php');

class Session{

    public static $login_button;
    public static $google_client;

  // Session Start Method
  public static function init(){

    if (version_compare(phpversion(), '5.4.0', '<')) {
      if (session_id() == '') {
        session_start();
      }
    }else{
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    }


      //Make object of Google API Client for call Google API
      $google_client = self::$google_client =  new Google_Client();

      //Set the OAuth 2.0 Client ID
      $google_client->setClientId('1047065832362-bibsd5c89afrtdtp0vsgjj1rrs6as479.apps.googleusercontent.com');

      //Set the OAuth 2.0 Client Secret key
      $google_client->setClientSecret('fxdQwOFxlGT59TRKhHi0oH0h');

      //Set the OAuth 2.0 Redirect URI
      $google_client->setRedirectUri('http://localhost:8888/dolftech-test/login.php');

      //
      $google_client->addScope('email');

      $google_client->addScope('profile');

      // Get OAuth link
      self::$login_button = $google_client->createAuthUrl();



  }


  // Session Set Method
  public static function set($key, $val){
    $_SESSION[$key] = $val;
  }



  // Session Get Method
  public static function get($key){
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    }else{
      return false;
    }
  }

  // User logout Method
  public static function destroy(){
    session_destroy();
    session_unset();
    header('Location:login.php');
  }


  // Check Session Method
  public static function CheckSession(){
    if (self::get('login') == FALSE) {
      session_destroy();
      header('Location:login.php');
    }

  }


  // Check Login Method
  public static function CheckLogin(){
    if (self::get("login") == TRUE) {
      header('Location:index.php');
    }
  }







}
