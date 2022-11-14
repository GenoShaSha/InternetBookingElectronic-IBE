<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;

AppAsset::register($this);


$this->registerCssFile("@web/css/error.css")
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>
<div class="LoginForm">
    <div  class="Container">
        <div class="Background" src="@web/images/payment-success.png"></div>
        <h3 >Your payment is complete! Thank You!</h3>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        var image = new Image();
        image.src = '../../../web/images/payment-success.png';
        var t = document.getElementsByClassName('Background')
        t[0].appendChild(image);
    });
</script>