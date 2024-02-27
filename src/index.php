<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>CV - Koval</title>
  <meta name="description" content="simple CV example created with HTML and CSS">
  <meta name="author" content="Fly Nerd">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="assets/main.js"></script>
</head>

<body>
<header>
  <div>
    <img src="./img/avatar.jpg"/>
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
        <h4>Udacity: Intro to HTML and CSS</h4>
      </div>
      <div class="descrition">
        <p>Build styled, well-structured websites. Learn how to use HTML5 standard to create websites. Understand CSS
          syntax, selectors, and units. Learn about code editors and a browser's Developer Tools.</p>
      </div>
    </article>
    <article class='course'>
      <div class='title'>
        <h4>Udemy: The Web Developer Bootcamp</h4>
      </div>
      <div class="descrition">
        <p>Learn how to create full-stack web applications from scratch using HTML, CSS, JavaScript, jQuery, VanillaJS,
          NodeJS, MongoDB.</p>
      </div>
    </article>
    <article class='course'>
      <div class='title'>
        <h4>EdX: Web Programming with JavaScript</h4>
      </div>
      <div class="descrition">
        <p>Learn how to create web apps and prototypes with JavaScript, represent and exchange data using JavaScript
          Object Notation (JSON), and how to access RESTful APIs on the web.</p>
      </div>
    </article>
    <article class='course'>
      <div class='title'>
        <h4>Django Girls: 2-Day Workshops</h4>
      </div>
      <div class="descrition">
        <p>Learn back-end development with simple blog application using Django framework.</p>
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
