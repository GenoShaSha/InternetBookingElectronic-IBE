<?php
/** @var yii\web\View $this */


$this->registerCssFile("@web/css/login.css")
?>

<!DOCTYPE html>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"

/>




<html>
  <head>
    <div class="LoginForm">
    <title>Login page with jQuery and AJAX</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="containerSignIn">
      <form method="post" ,action="Login.html">
        <div class="row">
          <h2 class="LoginTitle" style="text-align: left">
            Sign Up
          </h2>

       

          <div class="col">
            <div class="hide-md-lg">
              <p>Sign Up manually:</p>
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
            <br></br>    
            <input type="button" value="Login" id="login" />
            <br>
            <div class = butns>
            <p class="links">Already have an account? <a href="https://www.w3schools.com/">Sign In here</a></p>
            <div class="foot-icons">
          <ul class="footer-social-links list-inline list-unstyled">
          <p class="links">Or Sign Up with Google :<a class="glink" href="https://id.linkedin.com/company/sqiva" target="_blank"> <img src="<?= \Yii::getAlias('@web/images/home/google2.png') ?>"></a></p>	  
		      </ul>
</div>
          </div>
          </div>
        </div>
      </form>
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
<link rel="stylesheet" href="../assets/css/Login.css" />
