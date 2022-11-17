<?php

/** @var yii\web\View $this */

$this->registerCssFile("@web/css/bckgrndClr.css");
?>


<!DOCTYPE html>
<html>

<div class="Background">

    <div class="LoginForm1">
        <form method="post" ,action="Login.html">
            <div class="row">
                <h2 class="LoginTitle" style="text-align: left">
                    Control Panel
                </h2>
                <div class="col">
                    <h3>Background Color (Navbar) :</h3>
                    <input type="text" name="backgroundColorNvbrTxt" id="backgroundColorNvbrTxt" disabled />
                    <input type="color" name="backgroundColorNvbr" id="backgroundColorNvbr" />
                    <br></br>
                    <input type="button" value="SUBMIT - NAVBAR" id="navChange" />
                    <h3>Background Image :</h3>
                    <input type="url" name="backgroundImg" id="backgroundImg" placeholder="input the URL here" />
                    <br></br>
                    <input type="button" value="SUBMIT - BG IMG" id="bgImgChange" />
                    <h3>Logo :</h3>
                    <input type="url" name="logoImg" id="logoImg" placeholder="input the URL here" />
                    <br></br>
                    <input type="button" value="SUBMIT - LOGO" id="logoChange" />
                    <h3>Font Color :</h3>
                    <input type="text" name="fontColorTxt" id="fontColorTxt" disabled />
                    <input type="color" name="fontColor" id="fontColor" />
                    <br></br>
                    <input type="button" value="SUBMIT - FONT" id="fontChange" />
                    <br>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#navChange").on("click", function() {
            let color = document.getElementById('backgroundColorNvbr').value
            let color_val = document.getElementById('backgroundColorNvbrTxt').value = color
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/admin/controlpanel/updatenavcolor' ?>',
                type: "POST",
                data: {
                    navbar_color: color_val,
                },
                success: function(response) {
                    console.log(response)
                    response = JSON.parse(response)
                    document.getElementById('w0').style.cssText = 'background: ' + response.navbar_color + ' !important;'
                },
            });
            console.log(color_val);
        })

        $("#bgImgChange").on("click", function() {
            let color = document.getElementById('backgroundImg').value
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/admin/controlpanel/updatebgimg' ?>',
                type: "POST",
                data: {
                    background_img: color,
                },
                success: function(response) {
                    response = JSON.parse(response)
                    const s = document.getElementById('home')
                    document.getElementById('home').style.backgroundImage = 'url(' + response.background_img + ')'
                },
            });
        })

        $("#logoChange").on("click", function() {
            let img = document.getElementById('logoImg').value
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/admin/controlpanel/updatelogo' ?>',
                type: "POST",
                data: {
                    icon_img: img,
                },
                success: function(response) {
                    console.log(response)
                    response = JSON.parse(response)
                    document.getElementById('logo').src = response.icon_img
                },
            });
        })

        $("#fontChange").on("click", function() {
            let color = document.getElementById('fontColor').value
            let color_val = document.getElementById('fontColorTxt').value = color
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/admin/controlpanel/updatefontcolor' ?>',
                type: "POST",
                data: {
                    font_color: color_val,
                },
                success: function(response) {
                    console.log(response)
                    response = JSON.parse(response)
                    document.querySelectorAll('.nav-link').forEach(function(el) {
                        el.style.color = response.font_color
                    });
                },
            });
        })
    });
</script>