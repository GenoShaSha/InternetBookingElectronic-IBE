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

                <div class="col">
                    <h2 class="LoginTitle" style="text-align: left">
                        <?php echo Yii::t('app', 'My Profile') ?> :
                    </h2>
                    <h3><?php echo Yii::t('app', 'Card Name') ?> :</h3>
                    <input type="text" name="email" id="email" placeholder="Card Name" required />
                    <h3><?php echo Yii::t('app', 'Card Number') ?>r:</h3>
                    <input type="text" name="email" id="email" placeholder="Card Number" required />
                    <div class='InnerContainer'>
                        <div class='exp'>
                            <h3><?php echo Yii::t('app', 'Valid Thru') ?>:</h3>
                            <div class="exp-wrapper">
                                <input autocomplete="off" class="exp" id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="MM" type="text" data-pattern-validate />
                                <input autocomplete="off" class="exp" id="year" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="YY" type="text" data-pattern-validate />
                            </div>
                        </div>
                        <div class='exp'>
                            <h3><?php echo Yii::t('app', 'CVV') ?>:</h3>
                            <input type="text" name="password" id="cvv" placeholder="CVV" required />
                        </div>
                    </div>
                    <br></br>
                    <input type="button" value=<?php echo Yii::t('app', 'Pay') ?> id="payment" />
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
        for (let i = 0; i < data.length; i++) {
            if (localStorage.getItem('seatTypeWanted') == 'economy') {
                singleTicketPrice = singleTicketPrice + parseInt(data[i].economy_price)
            } else {
                singleTicketPrice = singleTicketPrice + parseInt(data[i].business_price)
            }
        }

        adultPrice = parseInt(localStorage.getItem('adultPassengers')) * singleTicketPrice
        childPrice = parseInt(localStorage.getItem('childPassengers')) * singleTicketPrice
        iftPrice = singleTicketPrice * 0.5
        infantPrice = (parseInt(localStorage.getItem('infantPassengers')) * singleTicketPrice) * 0.5
        price = adultPrice + childPrice + infantPrice

        for (let i = 0; i < 1; i++) {
            var templateString = '<div class="Price"  id="payment' + i + '"><div class="container1"><h1><?php echo Yii::t('app', 'Price') ?>:<h1><h3><?php echo Yii::t('app', 'Adult') ?>' + " : " + singleTicketPrice + "x" + adult + '</h3><h3><?php echo Yii::t('app', 'Child') ?>' + " : " + singleTicketPrice + "x" + child + '</h3><h3><?php echo Yii::t('app', 'Infant') ?>' + " : " + iftPrice + "x" + infant + '</h3><h3><?php echo Yii::t('app', 'Total Price') ?>' + " : " + price + '</h3></div></div><br>';
            $("#Bla").append(templateString);
        }

        // Adding the passanger to the database
        $("#payment").on("click", function() {
            var passengers = localStorage.getItem('Pasng');
            var passengerObj = JSON.parse(passengers)

            var contact = localStorage.getItem('contact');
            var contactObj = JSON.parse(contact)

            var flight = localStorage.getItem('selectedBooking');
            var flightObj = JSON.parse(flight)

            if(!JSON.parse(localStorage.getItem('roundTrip'))){
                flightObj = [flightObj]
            }

            var usr = <?php if (Yii::$app->user->identity != null) {
                            echo Yii::$app->user->identity->user_id;
                        } else {
                            echo -1;
                        }; ?>

            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/public/paymentgateway/save' ?>',
                type: "POST",
                data: {
                    passengers: passengerObj,
                    email: contactObj.email,
                    flightNr: flightObj,
                    seatType: localStorage.getItem('seatTypeWanted'),
                    user: usr,
                },
                success: function(response) {
                    window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/success/index' ?>';
                },
            })
        });
    });
</script>