<?php
/** @var yii\web\View $this */


$this->registerCssFile("@web/css/login.css")
?>

<!DOCTYPE html>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"

/>

<link rel="stylesheet" href="../assets/css/Login.css" />



<html>
  <head>
    <div class="banner">
    <div class="LoginForm">
    <title>Login page with jQuery and AJAX</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="container">
      <form method="post" ,action="Login.html">
        <div class="row">
          <h2 class="LoginTitle" style="text-align: left">
            Sign In
          </h2>
          <div class="vl">
            <span class="vl-innertext">or</span>
          </div>

          <div class="col">
            <a href="#" class="google btn"
              ><i class="fa fa-google fa-fw"> </i> Login with Google+
            </a>
          </div>

          <div class="col">
            <div class="hide-md-lg">
              <p>Or sign in manually:</p>
            </div>
            <h3>Email :</h3>
            <input
              type="text"
              name="email"
              id="email"
              placeholder="Email"
              required
            />
            <h3>Password :</h3>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Password"
              required
            />       
            <input type="button" value="Login" id="login" />
            <br>
            <p class="links">Forgotten password? <a href="https://www.w3schools.com/">Reset password</a></p>
            <p class="links">Not a member yet?<a href="https://www.w3schools.com/">Sign up here</a></p>
          </div>
        </div>
      </form>
    </div>

  </div>

  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#login").on("click", function () {
          var email = $("#email").val();
          var password = $("#password").val();
          $.ajax({
            url: "Login.html",
            data: {
              emailAttempt: email,
              passwordAttempt: password,
            },
            success: function (response) {
              console.log("Your email and password are: ".emailAttempt);
            },
            dataType: "text",
          });
        });
      });
    </script>
  </body>
</html>
