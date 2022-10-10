<?php

/** @var yii\web\View $this */

$this->registerCssFile("@web/css/createflight.css");


use app\assets\DropdownAsset;

DropdownAsset::register($this);
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<head>
    <div class="LoginForm">
        <!-- <title>Login page with jQuery and AJAX</title> -->
        <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="containerSignIn">
        <form method="post" ,action="Login.html">
            <h2 class="LoginTitle">
                Add Flight
            </h2>
            <div class="row">


                <div class="col">
                    <h3>Plane Number :</h3>
                    <select class="js-example-basic-single" id='dropdown'>
                    </select>
                    <h3>From :</h3>
                    <input type="from" name="from" id="from" placeholder="From" required />
                    <h3>To :</h3>
                    <input type="to" name="to" id="to" placeholder="To" required />
                    <h3>Depart. Terminal :</h3>
                    <input type="departTerminal" name="departTerminal" id="departTerminal" placeholder="Depart. Terminal" required />
                    <h3>Arrival Terminal :</h3>
                    <input type="arrivalTerminal" name="arrivalTerminal" id="arrivalTerminal" placeholder="Arrival Terminal" required />
                </div>
                <div class="col">
                    <h3>Depart. Date :</h3>
                    <input type="datetime-local" name="departDate" id="departDate" placeholder="Depart. Date" required />
                    <h3>Arrival Date :</h3>
                    <input type="datetime-local" name="arrivalDate" id="arrivalDate" placeholder="Arrival Date" required />
                    <h3>Price of 1 economy seat :</h3>
                    <input type="number" name="economy_price" id="economy_price" placeholder="Economy price" required />
                    <h3>Price of 1 business seat :</h3>
                    <input type="number" name="business_price" id="business_price" placeholder="Business price" required />
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
        $(document).ready(function() {

            var data = <?= $allPlaneNrs ?>;
            select = document.getElementById('dropdown');
            for (let i = 0; i < data.length; i++) {
                var opt = document.createElement('option');
                opt.value = data[i];
                opt.innerHTML = data[i];
                select.appendChild(opt);

            }

            $('.js-example-basic-single').select2();

            $("#login").on("click", function() {
                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/admin/createflight/create' ?>',
                    type: "POST",
                    data: {
                        plane_nr: $("#dropdown").val(),
                        from: $("#from").val(),
                        to: $("#to").val(),
                        arrival_terminal: $("#departTerminal").val(),
                        arrival_date: $("#arrivalDate").val(),
                        departure_terminal: $("#departTerminal").val(),
                        departure_date: $("#departDate").val(),
                        economy_price: $("#economy_price").val(),
                        business_price: $("#business_price").val()
                    },
                    success: function(response) {
                        alert('Flight created !!!')
                    },
                });
            });
        });
    </script>
</body>

</html>
<link rel="stylesheet" href="../assets/css/createflight.css" />