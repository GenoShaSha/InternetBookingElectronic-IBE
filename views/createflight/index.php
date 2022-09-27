<?php
/** @var yii\web\View $this */

$this->registerCssFile("@web/css/createflight.css")

?>

<!DOCTYPE html>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"

/>




<html>
  <head>
    <div class="LoginForm">
    <!-- <title>Login page with jQuery and AJAX</title> -->
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="containerSignIn">
      <form method="post" ,action="Login.html">
        <div class="row">
          <h2 class="LoginTitle">
            Add Flight
          </h2>

          <div class="col">
            <h3>Flight Number :</h3>
            <input type="text" name="flightNumber" id="flightNumber" placeholder="Flight Number" required />
            <h3>From :</h3>
            <input type="from" name="from" id="from" placeholder="From" required />
            <h3>To :</h3>
            <input type="to" name="to" id="to" placeholder="To" required />
            <h3>Depart. Terminal :</h3>
            <input type="departTerminal" name="departTerminal" id="departTerminal" placeholder="Depart. Terminal" required />
            <h3>Arrival Terminal :</h3>
            <input type="arrivalTerminal" name="arrivalTerminal" id="arrivalTerminal" placeholder="Arrival Terminal" required />
            <h3>Depart. Date :</h3>
            <input type="date" name="departDate" id="departDate" placeholder="Depart. Date" required />
            <h3>Arrival Date :</h3>
            <input type="date" name="arrivalDate" id="arrivalDate" placeholder="Arrival Date" required />
            <br></br>
            <input type="button" value="Add Flight" id="login" />
            <br>
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
            url: '<?php echo Yii::$app->request->baseUrl.'/signin/login'?>',
            type:"POST",
            data: {
              email:$("#email").val(),
              password:$("#password").val()
            },
            success: function (response) {
              console.log(response);
            },
          });
        });
      });
    </script>
  </body>
</html>
<link rel="stylesheet" href="../assets/css/createflight.css" />