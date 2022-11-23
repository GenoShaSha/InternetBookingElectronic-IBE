<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);


$this->registerCssFile("@web/css/profile.css")
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>
<!-- <head>
    <div class="LoginForm">
    <title>Login page with jQuery and AJAX</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head> -->

<body>
    <div class="Background">
        <div class='ProfileForms'>
            <div class="LoginForm">
                <form method="post" ,action="Login.html">
                    <div class="row">

                        <div class="col">
                        <h2 class="LoginTitle" style="text-align: left">
                        <?php echo Yii::t('app', 'My Account') ?>
                        </h2>

                            <h3><?php echo Yii::t('app', 'Email') ?> :</h3>
                            <input type="text" name="email" id="email" placeholder="Email" required />
                            <h3><?php echo Yii::t('app', 'Confirm Password') ?> :</h3>
                            <input type="password" name="password" id="password" placeholder="Password" required />
                            <br></br>
                            <input type="button" value=<?php echo Yii::t('app', 'Edit') ?> id="login" />
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
</body>

</html>
<link rel="stylesheet" href="../assets/css/Login.css" />