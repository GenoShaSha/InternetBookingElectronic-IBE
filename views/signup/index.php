<?php

/** @var yii\web\View $this */


$this->registerCssFile("@web/css/Register.css")
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />




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
          Register
        </h2>
        <div class="col">
          <div class="hide-md-lg">
            <p>Sign Up manually:</p>
          </div>
          <h3>Email :</h3>
          <input type="text" name="email" id="email" placeholder="Email" required />
          <h3>Password :</h3>
          <input type="password" name="password" id="password" placeholder="Password" required />
            <div class="Warning">
              <h3 class="Warning">Password must contain the following:</h3>
              <p id="letter" class="Warning">A <b>lowercase</b> letter</p>
              <p id="capital" class="Warning">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="Warning">A <b>number</b></p>
              <p id="length" class="Warning">Minimum <b>8 characters</b></p>
            </div>
          <h3>Repeat Password :</h3>
          <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Reapeat Password" required />
          <br></br>
          <input type="button" value="Register" id="login" />
          <br>

         
          <p class="links">Already have an account? <a href="<?= \Yii::getAlias('@web/signin/index') ?>">Sign In here</a></p>
          <div class="foot-icons">
            <ul class="footer-social-links list-inline list-unstyled">
              <p class="links">Or Sign Up with Google :<a class="glink" href="https://id.linkedin.com/company/sqiva" target="_blank"> <img src="<?= \Yii::getAlias('@web/images/home/google2.png') ?>"></a></p>
            </ul>
          </div>

        </div>
      </div>
    
    </form>
  </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>



    $(document).ready(function() {
      $("#login").on("click", function() {
        var email = $("#email").val();
        var password = $("#password").val();
        var RepeatPassword = $("#repeatPassword").val();
        if (ValidateEmail(email) && ValidatePassword(password, RepeatPassword)) {
          $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/signup/save' ?>',
            type: "POST",
            data: {
              email: $("#email").val(),
              password: $("#password").val()
            },
            success: function(response) {
              alert("Register sucessful")
            },
          });
        }
      });
    });

    function ValidateEmail(inputText) {
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (inputText.match(mailformat)) {
        alert("Valid email address!");
        return true;
      } else {
        alert("You have entered an invalid email address!");
        return false;
      }
    }

    function ValidatePassword(password, repeat) {
      var lowerCaseLetters = /[a-z]/g;
        var upperCaseLetters = /[A-Z]/g;
        var numbers = /[0-9]/g;

      if (password === repeat && password.match(lowerCaseLetters) && password.match(upperCaseLetters) && password.match(numbers) && password.length >= 8) {
        alert("Valid password match!");
        return true;
      } else {
          alert("You password sucks cock");
        return false;
      }

    }
  </script>
</body>

</html>
<link rel="stylesheet" href="../assets/css/Login.css" />