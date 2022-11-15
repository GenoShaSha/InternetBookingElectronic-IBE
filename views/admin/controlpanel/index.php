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
                    <input type="button" value="Navigation Bar" id="navChange" />
                    <h3>Background Color (Body) :</h3>
                    <input type="color" name="backgroundColorBdy" id="backgroundColorBdy" />
                    <br></br>
                    <input type="button" value="SUBMIT" id="sbmtBtn" onclick="background()" />
                    <h3>Background Image :</h3>
                    <input type="file" name="backgroundImg" id="backgroundImg" />
                    <br></br>
                    <input type="button" value="SUBMIT" id="sbmtBtn" onclick="background()" />
                    <h3>Logo :</h3>
                    <input type="url" name="logoImg" id="logoImg" placeholder="input the URL here" />
                    <br></br>
                    <input type="button" value="SUBMIT" id="sbmtBtn" onclick="background()" />
                    <h3>Font Color :</h3>
                    <input type="color" name="fontColor" id="fontColor" />


                    <br></br>
                    <input type="button" value="SUBMIT" id="sbmtBtn" onclick="background()" />
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
                url: '<?php echo Yii::$app->request->baseUrl . '/admin/controlpanel/update' ?>',
                type: "POST",
                data: {
                    navbar_color: color_val,
                },
                success: function(response) {
                    console.log(response)
                },
            });
            console.log(color_val);   
        })
    });
</script>