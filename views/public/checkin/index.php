<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\assets\SeatAsset;

AppAsset::register($this);
SeatAsset::register($this);
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<html>
<div class="backgroundCard">
    <div class="firstGrid">
        <ul class="showcase">
            <li>
                <div class="seat"></div>
                <small>N/A</small>
            </li>
            <li>
                <div class="seat selected"></div>
                <small>Selected</small>
            </li>
            <li>
                <div class="seat occupied"></div>
                <small>Occupied</small>
            </li>
        </ul>

        <div class="seatContainer" id = 'seatCon'>
        </div>
    </div>
    <div class="secondGrid">
        <p class="text">
            You have selected <span id="count">0</span> seats for a price of $<span id="total">0</span>
        </p>
        <br>
        <button class="selectBtn" role="button">SELECT</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {

        var booking = JSON.parse(localStorage.getItem('retrieveBooking'));

        var seats = booking[3];
        var plane =booking[4];

        var firstFlight = seats[0];
        var firstPlane = plane[0];

        var Prows =firstPlane.seat_rows
        var Pcolumns =  firstPlane.seat_columns
        let index = 0;


        

        for (let columns = 0; columns < Prows; columns++) {
            var templateString = '<div class="seatRow" id = "seatR'+ columns+'"></div>';
            $("#seatCon").append(templateString);

            for (let rows = 0; rows < Pcolumns; rows++) {
                var templateString = '<div class="seat" id = "'+index+'"></div>';
                $("#seatR" + columns).append(templateString);
                var elem = document.getElementById(index);
                elem.innerText= firstFlight[index].seat_nr;
                index++;
            }
        }

    });
</script>