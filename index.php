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
    <h1 class="text">Pavlo Koval</h1>
    <section>
      <p class="text">Hello! I am Pavlo Koval. I am an experienced software developer with over N years of practical experience. My specialties lie in programming languages such as C++, Vue, and Laravel. I have significant experience in developing dynamic SVG programs, adding life and interactivity to graphical elements. I am proactive in tackling tasks and capable of creating innovative software solutions.</p>
      <a href="https://github.com/losimen" target="_blank">
        <i class="fab fa-github-alt"></i>
      </a>
    </section>
  </div>
</header>
<main>
  <section>
    <h3>Courses & Workshops</h3>
    <article class='course'>
      <div class='title'>
        <h4>BEST Hackathon 2021</h4>
      </div>
      <div class="descrition">
        <p>Develop interactive game for QUIZEs.</p>
      </div>
    </article>
    <article class='course'>
      <div class='title'>
        <h4>SoftServe IT Academy</h4>
      </div>
      <div class="descrition">
        <p>Developed HTTP Chat using QT and cpprestSDK </p>
      </div>
    </article>
    <article class='course'>
      <div class='title'>
        <h4>GlobalLogic IT Academy</h4>
      </div>
      <div class="descrition">
        <p>Developed virus, which you can control from your computer and remotely kill processes on the victim PC</p>
        <p>Developed HTTP Messenger with openssl encryption (RSA+Sha256)</p>
      </div>
    </article>
    <article class='course'>
      <div class='title'>
        <h4>Incora hackthon</h4>
      </div>
      <div class="descrition">
        <p>Developed mobile program to create events and manage them</p>
      </div>
    </article>
  </section>
  <section>
    <h3>Skills</h3>
    <div class='skills'>
      <div class='column'>
        <h4>Good knowledge</h4>
        <ul>
          <li>C++</li>
          <li>Vue</li>
          <li>Laravel</li>
          <li>Nest JS</li>
          <li>Docker</li>
          <li>Gitlab, Github CI/CD</li>
          <li>SQL</li>
          <li>JWT security</li>
        </ul>
      </div>
      <div class='column'>
        <h4>Basic knowledge</h4>
        <ul>
          <li>HTML</li>
          <li>CSS</li>
          <li>React</li>
          <li>Embedded dev</li>
        </ul>
      </div>
      <div>
        <h4>Languages</h4>
        <p>🇺🇦 Ukrainian - Native speaker</p>
        <p>🇬🇧 English - B2</p>
      </div>
    </div>
  </section>

  <section>
    <h3>Education</h3>
    <article>
      <div class='school'>
        <span>2021</span> <strong>SoftServer IT Academy C++</strong>
      </div>
    </article>
    <article>
      <div class='school'>
        <span>2021-2022</span> <strong>Tech Magic IT Academy Web Dev</strong>
      </div>
    </article>
    <article>
      <div class='school'>
        <span>2022</span> <strong>Global Logic IT Academy C++</strong>
      </div>
    </article>
  </section>
  <section>
    <h3>Experience</h3>
    <article>
      <div class='job-title'>
        <span>02.2023</span> <strong>Maprehend</strong><br> <strong>Position:</strong> Senior SVG Engine Developer
      </div>
      <div>
        <p><strong>Tech stack:</strong> Vue, TS, C++/C, Laravel</p>
        <ul class="job-description">
          <li>Automated design of placement of solar modules</li>
          <li>Implement algorithms like offset figure, ballast placement</li>
          <li>Implement UI (front-end site) based on received graphic design and requirements</li>
        </ul>
      </div>
    </article>
  </section>
  <section>
    <div id="demo">
      <h2>Contact me</h2>
      <button type="button" onclick="loadDoc()">Send form</button>
    </div>
  </section>
</main>
</body>
</html>