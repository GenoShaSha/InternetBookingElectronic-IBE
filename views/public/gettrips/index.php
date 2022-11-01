<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);


$this->registerCssFile("@web/css/gettrips.css")
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<div class="Background">
    <div class='ProfileForms'>
    </div>
    <div class="LoginForm1">
        <form method="post" ,action="Login.html">
            <div class="row">
                <h2 class="LoginTitle" style="text-align: left">
                    My Profile
                </h2>

                <div class="col">
                    <div class='InnerContainer'>
                        <div class='exp'>
                            <h3>Email:</h3>
                            <input type="text" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class='exp'>
                            <h3>Booking Number:</h3>
                            <input type="text" name="bookNumber" id="bookNumber" placeholder="Booking Number" required />
                        </div>
                    </div>
                    <br></br>
                    <br>
                    <input type="button" value="SEARCH" id="search" />

                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search").on("click", function () {
          $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl.'/public/gettrips/search'?>',
            type:"POST",
            data: {
              email:$("#email").val(),
              bookingNr:$("#bookNumber").val()
            },
            success: function (response) {
                localStorage.setItem('retrieveBooking',response)
                response = JSON.parse(response)
                console.log(response);
                window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/trips/index' ?>';

            },
          });
        });
    });
</script>