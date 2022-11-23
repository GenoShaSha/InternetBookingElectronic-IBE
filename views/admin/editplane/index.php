<?php

/** @var yii\web\View $this */
$this->registerCssFile("@web/css/createPlane.css");
$this->registerCssFile("@web/css/popup.css")
?>


<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="popModal.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="popModal.js"></script>


<html>

<head>
    <div class="LoginForm">
        <!-- <title>Login page with jQuery and AJAX</title> -->
        <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="containerSignIn">
        <h2 class="LoginTitle">
        <?php echo Yii::t('app', 'Update Plane') ?>
        </h2>
        <div class="row">
            <div class="col">
                <h3><?php echo Yii::t('app', 'Plane Number') ?> :</h3>
                <input type="text" name="planeNumber" id="planeNumber" placeholder="Plane Number" disabled />
                <h3><?php echo Yii::t('app', 'Plane Type') ?> :</h3>
                <input type="planeType" name="planeType" id="planeType" placeholder="Plane Type" required/>
                <h3><?php echo Yii::t('app', 'Column of the seat') ?> :</h3>
                <input type="column" name="column" id="column" placeholder="Column" required />
                <h3><?php echo Yii::t('app', 'Row of the seat') ?> :</h3>
                <input type="row" name="row" id="row" placeholder="Row" required />
                <h3><?php echo Yii::t('app', 'Row of the business seat') ?> :</h3>
                <input type="businessRow" name="businessRow" id="businessRow" placeholder="Business Row" required />
                <br></br>
                <input type="button" value=<?php echo Yii::t('app', 'Update Plane') ?> id="updatePlane" />
                <br>
                <br>
                <div class="poppingup" style="display:none;font-size:14px;font-family: 'Poppins', sans-serif;color:rgb(33, 207, 27)">
                <?php echo Yii::t('app', 'The plane is sucessfuly updated!') ?>
                </div>

            </div>
        </div>    

    <!-- &times; -->

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            foundPlane = localStorage.getItem('plane')
            foundPlane = JSON.parse(foundPlane)

            document.getElementById("planeNumber").value = foundPlane.plane_nr;
            document.getElementById("planeType").value = foundPlane.plane_name;
            document.getElementById("column").value = foundPlane.seat_columns;
            document.getElementById("row").value = foundPlane.seat_rows;
            document.getElementById("businessRow").value = foundPlane.seat_rows_business;
            $("#updatePlane").on("click", function() {
                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/admin/editplane/update' ?>',
                    type: "POST",
                    data: {
                        plane_nr: $("#planeNumber").val(),
                        plane_name: $("#planeType").val(),
                        seat_columns: $("#column").val(),
                        seat_rows: $("#row").val(),
                        seat_rows_business: $("#businessRow").val(),
                    },
                    success: function(response) {
                        $(".poppingup").fadeIn();
                    },
                });
            });
            $(".poppingup").on("click", function() {
                if ($(event.target).is("#close")) {
                    $(".poppingup").fadeOut('slow');
                }
            })
        });
    </script>
</body>

</html>
<link rel="stylesheet" href="../assets/css/createflight.css" />