<?php

/** @var yii\web\View $this */
$this->registerCssFile("@web/css/editflight.css");
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
            Update Flight
        </h2>
        <div class="row">
            <div class="col">
                <h3>Flight Number :</h3>
                <input type="text" name="flightNumber" id="flightNumber" placeholder="Flight Number" required />
            </div>
        </div>

    </div>
    <div class="containerSignIn">
        <div class="row">
            <div class="col">
                <!-- <h3>Flight Number :</h3>
                    <input type="text" name="flightNumber" id="flightNumber" placeholder="Flight Number" required /> -->
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
                <input type="button" value="Update Flight" id="login" />
                <br>
                <br>
                <div class="poppingup" style="display:none;font-size:14px;font-family: 'Poppins', sans-serif;color:rgb(33, 207, 27)">
                    The flight is sucessfuly updated!
                </div>
            </div>
        </div>
    </div>

    <!-- &times; -->

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            foundFlight = localStorage.getItem('flight')
            foundFlight = JSON.parse(foundFlight)

            document.getElementById("flightNumber").value = foundFlight.flight_nr;
            document.getElementById("to").value = foundFlight.to;
            document.getElementById("from").value = foundFlight.from;
            document.getElementById("departTerminal").value = foundFlight.departure_terminal;
            document.getElementById("arrivalTerminal").value = foundFlight.arrival_terminal;
            document.getElementById("departDate").value = foundFlight.departure_date;
            document.getElementById("arrivalDate").value = foundFlight.arrival_date;
            document.getElementById("economy_price").value = foundFlight.economy_price;
            document.getElementById("business_price").value = foundFlight.business_price;
            document.getElementById("from").value = foundFlight.from;

            $("#login").on("click", function() {
                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/admin/editflight/update' ?>',
                    type: "POST",
                    data: {
                        flight_id: foundFlight.flight_id,
                        flight_nr: $("#flightNumber").val(),
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