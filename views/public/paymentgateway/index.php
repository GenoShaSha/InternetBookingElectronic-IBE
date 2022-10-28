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
        <main class="LoginForm">
            <div id="Bla"></div>
        </main>
    </div>
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
                    <input type="text" name="email" id="email" placeholder="Card Name" required />
                    <h3>Card Number:</h3>
                    <input type="text" name="email" id="email" placeholder="Card Number" required />
                    <div class='InnerContainer'>
                        <div class='exp'>
                            <h3>Valid Thru:</h3>
                            <div class="exp-wrapper">
                                <input autocomplete="off" class="exp" id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="MM" type="text" data-pattern-validate />
                                <input autocomplete="off" class="exp" id="year" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="YY" type="text" data-pattern-validate />
                            </div>
                        </div>
                        <div class='exp'>
                            <h3>CVV:</h3>
                            <input type="text" name="password" id="cvv" placeholder="CVV" required />
                        </div>
                    </div>
                    <br></br>
                    <input type="button" value="PAY" id="payment" />
                    <br>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        // Calculating the total price
        var data = localStorage.getItem('selectedBooking')
        var child = localStorage.getItem('childPassengers')
        var infant = localStorage.getItem('infantPassengers')
        var adult = localStorage.getItem('adultPassengers')

        data = JSON.parse(data)
        var singleTicketPrice = 0
        if (localStorage.getItem('seatTypeWanted') == 'economy') {
            singleTicketPrice = data.economy_price
        } else {
            singleTicketPrice = data.business_price
        }
        adultPrice = parseInt(localStorage.getItem('adultPassengers')) * singleTicketPrice
        childPrice = parseInt(localStorage.getItem('childPassengers')) * singleTicketPrice
        iftPrice = singleTicketPrice * 0.5
        infantPrice = (parseInt(localStorage.getItem('infantPassengers')) * singleTicketPrice) * 0.5
        price = adultPrice + childPrice + infantPrice

        for (let i = 0; i < 1; i++) {
            var templateString = '<div class="Price"  id="payment' + i + '"><div class="container"><h1>Price:<h1><h3><b>' + "Adult : " + singleTicketPrice + "x" + adult + '</b></h3><h3><b>' + "Child : " + singleTicketPrice + "x" + child + '</b></h3><h3><b>' + "Infant : " + iftPrice + "x" + infant + '</b></h3><h3><b>' + "Total Price : " + price + '</b></h3></div></div><br>';
            let btn = document.createElement("button");
            btn.innerHTML = "PAYMENT";
            $("#Bla").append(templateString);
            btn.onclick = function() {
                // localStorage.setItem('selectedBooking', JSON.stringify(data[i]));
                window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/paymentPage/index' ?>';
            };

            document.getElementById('payment' + i).appendChild(btn);
        }

        // Adding the passanger to the database
        $("#payment").on("click", function() {
            var passengers = localStorage.getItem('Pasng');
            var passengerObj = JSON.parse(passengers)

            var contact = localStorage.getItem('contact');
            var contactObj = JSON.parse(contact)

            var flight = localStorage.getItem('selectedBooking');
            var flightObj = JSON.parse(flight)


            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/public/paymentgateway/save' ?>',
                type: "POST",
                data: {
                    passengers: passengerObj,
                    email: contactObj.email,
                    flightNr: flightObj.flight_id,
                    user: <?php echo Yii::$app->user->identity->user_id ?>,
                },
                success: function(response) {
                    console.log(response);
                },
            })





        });
    });
</script>