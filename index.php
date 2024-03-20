<?php
include('./config.php');

$login_button_google = '';
$login_button_def = '';

if(isset($_GET["code"]))
{
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  if(!isset($token['error']))
  {
    $google_client->setAccessToken($token['access_token']);
    $_SESSION['access_token'] = $token['access_token'];

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    if(!empty($data['given_name']))
    {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if(!empty($data['family_name']))
    {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if(!empty($data['email']))
    {
      $_SESSION['user_email_address'] = $data['email'];
    }

    if(!empty($data['gender']))
    {
      $_SESSION['user_gender'] = $data['gender'];
    }

    if(!empty($data['picture']))
    {
      $_SESSION['user_image'] = $data['picture'];
    }
  }
}

if(!isset($_SESSION['access_token']))
{
  $login_button_google = '<a href="'.$google_client->createAuthUrl().'"><img src="img/img.png" style="width: 100px; height: 50px;"  /></a>';
}

if(!isset($_SESSION['access_token']))
{
  $login_button_google = '<a href="'.$google_client->createAuthUrl().'"> Use Google </a>';
  $login_button_def .= '<form action="http://localhost:8080/login.php" method="post">';
  $login_button_def .= '<input type="email" name="email" placeholder="Email" required><br>';
  $login_button_def .= '<input type="password" name="password" placeholder="Password" required><br>';
  $login_button_def .= '<input type="submit" value="Login">';
  $login_button_def .= '</form>';}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>CV - Koval</title>
  <meta name="description" content="CV">
  <meta name="author" content="Fly Nerd">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="assets/main.js"></script>
</head>

<body>
<?php
if($login_button_google == '')
{
  echo '<h2>Welcome User</h2>';
  echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
  echo '<h3><a href="logout.php">Logout</h3></div>';
}
else
{
  echo '<div>'. $login_button_google . '</div>';
  echo '<div>'. $login_button_def . '</div>';
}
?>
<header>
  <div>
    <img src="img/avatar.jpg"/>
  </div>
  <div class="wrapper">
    <h1 class="text">Paul Smith</h1>
    <section>
      <p class="text">Hello! I am dev.</p>
      <a href="https://github.com/losimen" target="_blank">
        <i class="fab fa-github-alt"></i>
      </a>
    </section>
  </div>
</header>
<h1> Hello world </h1>
</body>
</html>
