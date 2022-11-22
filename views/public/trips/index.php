<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);


$this->registerCssFile("@web/css/trips.css")
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<div class="Background">
    <div class='ProfileForms'>
        <main class="BookingInfo">
            <div id="BookingInfo"></div>
        </main>
        <main class="Passengers">
            <div id="Passengers"></div>
        </main>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var data = localStorage.getItem('retrieveBooking')
        data = JSON.parse(data)

        var flights = data[1]
        var passengers = data[2]

        // Showing the selected plane
        for (let i = 0; i < 1; i++) {
            var templateString = '<div class="LoginForm"  id="pls' + i + '"><div class="container"><h3><?php echo Yii::t('app','Booking Number')?>: ' + data[0].booking_nr + '</h3> <h3><b><?php echo Yii::t('app','Email')?>: ' + data[0].email + '</b></h3> </div><br></div><br>';
            $("#BookingInfo").append(templateString);
        }

        for (let i = 0; i < passengers.length; i++) {
            var passengerString = '<div class="LoginForm2"  id="bps' + i + '"><div class="container"><h3>' + passengers[i].first_name + ' ' + passengers[i].last_name + '</h3></div><br></div>';
            $("#Passengers").append(passengerString);

            for (let y = 0; y < flights.length; y++) {
                var flightsString = '<div class="container2"><h3>' + flights[y].plane_nr + '</h3> <h3><b><?php echo Yii::t('app','From')?>' + " :"+"  " +flights[y].from + '</b></h3> <h3><b> <?php echo Yii::t('app','To')?>' + " :" +"  "+ flights[y].to + '</b></h3> <h3><b><?php echo Yii::t('app','Departure Date')?>' + " :" +"  "+ flights[y].departure_date + '</b></h3> <h3><b><?php echo Yii::t('app','Arrival Date')?>' + " :" +"  "+ flights[y].arrival_date + '</b></h3></div>';
                $('#bps' + i).append(flightsString);
            }

        }
    });
</script>