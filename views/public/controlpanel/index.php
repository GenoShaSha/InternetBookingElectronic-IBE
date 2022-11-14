<?php

/** @var yii\web\View $this */

$this->registerCssFile("@web/css/bckgrndClr.css");


use app\assets\DropdownAsset;

DropdownAsset::register($this);
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<head>
    <!-- link -->
</head>

<style>

</style>

<body>
    <div class="containerSignIn">
        <h2 class="LoginTitle">
            Add Flight
        </h2>
        <div class="col">
            <h3>Background Color :</h3>
            <input type="color" name="backgroundColorPalette" id="backgroundColorPalette" require />
            <br></br>
            <input type="button" value="SUBMIT" id="sbmtBtn" onclick="background()" />
            <br>
        </div>

    </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
         function background() {
                let color = document.getElementById('backgroundColorPalette').value
                console.log('works')
                document.getElementById('w0').style.cssText = 'background: ' + color + ' !important;'

            }

        $(document).ready(function() {
           
        });
    </script>