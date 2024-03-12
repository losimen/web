function loadDoc() {
  return
  let xhttp = new XMLHttpRequest();

  // Define the function to handle the response
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {
      document.getElementById("demo").innerHTML = this.responseText;
      document.getElementById('loginForm').addEventListener('submit', handleFormSubmit);
    }
  };

  // Send the request
  xhttp.open("GET", "../api/get_content.php", true);
  xhttp.send();
}

function displayLoginButtons() {
  let userEmail = localStorage.getItem('email');
  let userPassword = localStorage.getItem('password');

  const loginContainer = document.getElementById('login-container');

  if (userEmail && userPassword) {
    const logoutButton = document.createElement('button');
    logoutButton.textContent = 'Logout as ' + userEmail;
    logoutButton.addEventListener('click', () => {
      localStorage.removeItem('email');
      localStorage.removeItem('password');
      location.reload();
    });
    loginContainer.appendChild(logoutButton);
  } else {
    const loginButton = document.createElement('button');
    loginButton.textContent = 'Login/Signup';
    loginButton.addEventListener('click', () => {
      const loginForm = `
        <form id="login-form">
          <input type="text" placeholder="Email" id="email">
          <input type="password" placeholder="Password" id="password">
          <button type="submit">Login</button>
          <button type="button" id="signup">Signup</button>
        </form>
      `;
      loginContainer.innerHTML = loginForm;

      document.getElementById('login-form').addEventListener('submit', (event) => {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        logIn(email, password)
      });

      document.getElementById('signup').addEventListener('click', (event) => {
        event.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        signUp(email, password)
      });
    });
    loginContainer.appendChild(loginButton);
  }
}

function handleFormSubmit(event) {
  event.preventDefault();

  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  logIn(email, password);
}

function logIn(email, password) {
  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {
      if (this.status === 200) {
        localStorage.setItem('email', email);
        localStorage.setItem('password', password);
        location.reload();
      } else {
        document.getElementById('log-error').innerText = this.responseText;
      }
    }
  };

  let url = "../api/login.php";
  url += "?email=" + encodeURIComponent(email);
  url += "&password=" + encodeURIComponent(password);

  xhttp.open("GET", url, true);
  xhttp.send();
}


function signUp(email, password) {
  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {
      if (this.status === 200) {
        localStorage.setItem('email', email);
        localStorage.setItem('password', password);
        location.reload();
      } else {
        document.getElementById('log-error').innerText = this.responseText;
      }
    }
  };

  let url = "../api/signup.php"; // Modify the URL to point to the signup API endpoint
  url += "?email=" + encodeURIComponent(email);
  url += "&password=" + encodeURIComponent(password);

  xhttp.open("GET", url, true);
  xhttp.send();
}

document.addEventListener('DOMContentLoaded', function () {
  displayLoginButtons();
});


var YOUR_CLIENT_ID = '230618191152-mv0jo7rthrggvcgu8mfott8331sdsiq4.apps.googleusercontent.com';
var YOUR_REDIRECT_URI = 'http://localhost:8080/index.php';
var fragmentString = location.hash.substring(1);

// Parse query string to see if page request is coming from OAuth 2.0 server.
var params = {};
var regex = /([^&=]+)=([^&]*)/g, m;
while (m = regex.exec(fragmentString)) {
  params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
}
if (Object.keys(params).length > 0) {
  localStorage.setItem('oauth2-test-params', JSON.stringify(params));
  if (params['state'] && params['state'] == 'try_sample_request') {
    trySampleRequest();
  }
}

function trySampleRequest() {
  var params = JSON.parse(localStorage.getItem('oauth2-test-params'));
  if (params && params['access_token']) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET',
      'https://www.googleapis.com/drive/v3/about?fields=user&' +
      'access_token=' + params['access_token']);
    xhr.onreadystatechange = function (e) {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.response);
      } else if (xhr.readyState === 4 && xhr.status === 401) {
        // Token invalid, so prompt for user permission.
        oauth2SignIn();
      }
    };
    xhr.send(null);
  } else {
    oauth2SignIn();
  }
}

/*
* Create form to request access token from Google's OAuth 2.0 server.
*/
function oauth2SignIn() {
// Google's OAuth 2.0 endpoint for requesting an access token
  var oauth2Endpoint = 'https://accounts.google.com/o/oauth2/v2/auth';

// Create element to open OAuth 2.0 endpoint in new window.
  var form = document.createElement('form');
  form.setAttribute('method', 'GET'); // Send as a GET request.
  form.setAttribute('action', oauth2Endpoint);

// Parameters to pass to OAuth 2.0 endpoint.
  var params = {
    'client_id': YOUR_CLIENT_ID,
    'redirect_uri': YOUR_REDIRECT_URI,
    'scope': 'https://www.googleapis.com/auth/drive.metadata.readonly',
    'state': 'try_sample_request',
    'include_granted_scopes': 'true',
    'response_type': 'token'
  };

// Add form parameters as hidden input values.
  for (var p in params) {
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', p);
    input.setAttribute('value', params[p]);
    form.appendChild(input);
  }

// Add form to page and submit it to open the OAuth 2.0 endpoint.
  document.body.appendChild(form);
  form.submit();
}
