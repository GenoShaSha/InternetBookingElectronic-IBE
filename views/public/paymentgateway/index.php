<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);


$this->registerCssFile("@web/css/payment.css")
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<div class="Background">
    <div class='ProfileForms'>
        <div class="LoginForm1">
            <form method="post" ,action="Login.html">
                <div class="row">
                    <h2 class="LoginTitle" style="text-align: left">
                        My Profile
                    </h2>

                    <div class="col">
                        <div class="hide-md-lg">
                            <!-- <p>Sign Up manually:</p> -->
                        </div>
                        <h3>Card Name:</h3>
                        <input type="text" name="email" id="email" placeholder="Card Number" required />
                        <h3>Card Number:</h3>
                        <input type="text" name="email" id="email" placeholder="Card Number" required />
                            <h3>Valid Thru:</h3>
                            <div class="exp-wrapper">
                                <input autocomplete="off" class="exp" id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="MM" type="text" data-pattern-validate />
                                <input autocomplete="off" class="exp" id="year" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="YY" type="text" data-pattern-validate />
                            </div>

                                <h3>CVV:</h3>
                                <input type="text" name="password" id="cvv" placeholder="CVV" required />
                                <br></br>
                        <input type="button" value="Edit" id="login" />
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#Passanger").on("click", function() {
            
            var ss = <?php echo Yii::$app->user->identity->user_id ?>;
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/public/profile/save' ?>',
                type: "POST",
                data: {
                    user_id: ss,
                    first_name: $("#firstName").val(),
                    last_name: $("#lastName").val(),
                    date_of_birth: $("#dateOfBirth").val(),
                    gender: $("#gender").val(),
                    nationality: $("#nationality").val(),
                    personal_doc_type: $("#documentType").val(),
                    personal_doc_num: $("#documentNumber").val()
                },
                success: function(response) {
                    alert('Passanger added');
                },
            });
        });
    });
</script>