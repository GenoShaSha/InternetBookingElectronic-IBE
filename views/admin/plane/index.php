<?php

/** @var yii\web\View $this */

$this->registerCssFile("@web/css/createPlane.css")

?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<head>
    <div class="LoginForm">
        <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="containerSignIn">
        <form method="post" ,action="Login.html">
        <h2 class="LoginTitle">
                    Add Plane
                </h2>
            <div class="row">
                

                <div class="col">
                    <h3>Plane Number :</h3>
                    <input type="text" name="planeNumber" id="planeNumber" placeholder="Plane Number" required />
                    <h3>Plane Type :</h3>
                    <input type="planeType" name="planeType" id="planeType" placeholder="Plane Type" required />
                    <h3>Column of the seat :</h3>
                    <input type="column" name="column" id="column" placeholder="Column" required />
                    <h3>Row of the seat :</h3>
                    <input type="row" name="row" id="row" placeholder="Row" required />
                    <h3>Row of the business seat :</h3>
                    <input type="businessRow" name="businessRow" id="businessRow" placeholder="Business Row" required />
                    <br></br>
                    <input type="button" value="Add Plane" id="addPlane" />

                </div>
            </div>
        </form>
    </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#addPlane").on("click", function() {
                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/admin/plane/create' ?>',
                    type: "POST",
                    data: {
                        plane_nr: $("#planeNumber").val(),
                        plane_name: $("#planeType").val(),
                        seat_columns: $("#column").val(),
                        seat_rows: $("#row").val(),
                        seat_rows_business: $("#businessRow").val(),
                    },
                    success: function(response) {
                        alert('Plane Added !!!')
                    },
                });
            });
        });
    </script>
</body>

</html>
<link rel="stylesheet" href="../assets/css/createflight.css" />