<?php
include 'inc/header.php';
Session::CheckLogin();
?>



<?php

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
    //It will Attempt to exchange a code for an valid authentication token.
    $token = Session::$google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if(!isset($token['error'])) {
        //Set the access token used for requests
        Session::$google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2(Session::$google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        $users->loginWithGoogle($data['email'], $data);

    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
   $userLog = $users->userLoginAuthotication($_POST);
}
if (isset($userLog)) {
  echo $userLog;
}

$logout = Session::get('logout');
if (isset($logout)) {
  echo $logout;
}



 ?>


<div class="card ">
  <div class="card-header">
          <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>User login</h3>
        </div>
        <div class="card-body">


            <div style="width:450px; margin:0px auto" class="log-in2">

            <form class="" action="" method="post">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"  class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
                </div>


            </form>

                <div class="or-wrapper"><div class="or-divider">or</div></div>

                <p class="provider provider-google">
                    <a href="<?= Session::$login_button ?>" title="Log in with Google">
                        <i class="fa fa-google mr-2"></i>
                        Login With Google
                    </a>
                </p>

          </div>


        </div>
      </div>



  <?php
  include 'inc/footer.php';

  ?>
