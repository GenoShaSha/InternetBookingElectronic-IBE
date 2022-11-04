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
                <div class="seat" id='Seat'></div>
                <small>Available</small>
            </li>
            <li>
                <div class="seat selected" id='seatSelect'></div>
                <small>Selected</small>
            </li>
            <li>
                <div class="seat occupied"></div>
                <small>Occupied</small>
            </li>
        </ul>

        <div class="seatContainer" id='seatCon'>
        </div>
    </div>
    <div class="secondGrid">
        <p class="text">
            You have selected <span id="count">0</span> seats for a price of $<span id="total">0</span>
        </p>
        <br>
        <button class="selectBtn" role="button" id="selectedBtn">SELECT</button>
        <!-- <input type="button" value="SELECT" id="selectBtn" /> -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        var booking = JSON.parse(localStorage.getItem('retrieveBooking'));
        if (booking[0].seat_types == 'business') {
            document.getElementById("seatSelect").style.backgroundColor = 'purple';
            document.getElementById("Seat").style.backgroundColor = 'orange';
        }
        var seats = booking[3];
        var plane = booking[4];
        var firstFlight = seats[0];
        var firstPlane = plane[0];
        var Prows = firstPlane.seat_rows
        var Pcolumns = firstPlane.seat_columns
        var PBusinessRows = firstPlane.seat_rows_business
        var PEconomyRows = Prows - PBusinessRows
        var BusinessSeats = PBusinessRows * Pcolumns
        let index = 0;

        for (let rows = 0; rows < Prows; rows++) {
            var templateString = '<div class="seatRow" id = "seatR' + rows + '"></div>';
            $("#seatCon").append(templateString);

            for (let columns = 0; columns < Pcolumns; columns++) {
                var templateString = '<div class="seat" id = "' + index + '"></div>';
                $("#seatR" + rows).append(templateString);
                var elem = document.getElementById(index);
                elem.innerText = firstFlight[index].seat_nr;
                index++;
            }
        }
        for (let rows = 0; rows < BusinessSeats; rows++) {
            document.getElementById(rows).style.backgroundColor = 'orange';
        }

        $(".selectBtn").on("click", function() {
            var pass_id = localStorage.getItem('passengerBeeingCheckedIn');
            var passIdObj = JSON.parse(pass_id)

            var flightIdObj = JSON.parse(localStorage.getItem('selectedBooking'));
            var flightId = flightIdObj.flight_id;

            console.log(flightId);

            var booking = JSON.parse(localStorage.getItem('retrieveBooking'));
            var seats = booking[3];
            var seats = seats[0];
            for (i = 0; i < seats.length; i++) {
                if (JSON.parse(localStorage.getItem('selectedSeats'))[0] == seats[i].seat_nr) {
                    var selectedSeat = seats[i].seat_id;
                    alert(selectedSeat);
                }
            }
            $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/public/checkin/save' ?>',
            type: "POST",
            data: {
              seatID: selectedSeat,
              personID: passIdObj,
              flightID: flightId,
            },
            success: function(response) {
              alert("Register sucessful")
            },
          });
        });
    });
</script>