<?php

/** @var yii\web\View $this */

use app\assets\TableAsset;

TableAsset::register($this);

use yii\bootstrap5\Html;

$this->registerCssFile("@web/css/passangerListCheckIn.css")
?>


<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<head>
    <div class="AllFlights">
        <!-- <title>Login page with jQuery and AJAX</title> -->
        <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th><?php echo Yii::t('app', 'ID') ?></th>
                <th><?php echo Yii::t('app', 'Passanger Name') ?></th>
                <th><?php echo Yii::t('app', 'Flight Number') ?></th>
                <th><?php echo Yii::t('app', 'Departure Date') ?></th>
                <th><?php echo Yii::t('app', 'Departure Time') ?></th>
                <th><?php echo Yii::t('app', 'Check-In') ?></th>
            </tr>
        </thead>
    </table>
    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {

        var t = $('#example').DataTable({
            columnDefs: [{
                targets: -1,
                data: null,
                defaultContent: '<button class="CheckInbtn" role="button"><?php echo Yii::t('app', 'Select') ?></button>',
            }, ],
        });

        var data = localStorage.getItem('retrieveBooking')
        data = JSON.parse(data)
        var flights = data[1]
        var passengers = data[2]
        var checkin = data[6]

        var currentPassenger;
        var currentFlight;
        
        var flightBeeingCheckedIn;
        var departDate;
        var planeNr;

        function getByPersonId(item) {
            if (item.person_id == personId) {
                currentPassenger = item;
            }
        }

        function getByPersonIdAndFlightNrAndDepartDate(item) {
            if (item.plane_nr == planeNr && item.departure_date == departDate) {
                flightBeeingCheckedIn = item;
            }
        }

        function getByFlightId(item) {
            if (item.flight_id == flighId) {
                currentFlight = item;
            }
        }

        for (let i = 0; i < checkin.length; i++) {
            var flighId = checkin[i].flight_id
            var personId = checkin[i].person_id

            passengers.forEach(getByPersonId)
            flights.forEach(getByFlightId)

            departureDateSplit = currentFlight.departure_date
            const departureDateArray = departureDateSplit.split(" ");

            const table = document.getElementById("example");
            mergeName = currentPassenger.first_name + " " + currentPassenger.last_name;

            var currentDate = new Date()
            var flightDate = new Date(currentFlight.departure_date)

            var TimeDifference = flightDate.getTime() - currentDate.getTime()

            var Difference_In_Days = TimeDifference / (1000 * 3600 * 24);
            
            if(checkin[i].check_in == 0 && Difference_In_Days < 1){
                t.row.add([currentPassenger.person_id, mergeName, currentFlight.plane_nr, departureDateArray[0], departureDateArray[1]]).draw(false);
            }
        }


        $('#example tbody').on('click', 'button', function() {
            var t = $('#example').DataTable()
            var data = t.row($(this).parents('tr')).data();
            localStorage.setItem('passengerBeeingCheckedIn', data[0])

            departDate = data[3] + " " + data[4]
            planeNr = data[2]
            flights.forEach(getByPersonIdAndFlightNrAndDepartDate)
            localStorage.setItem('flightBeeingCheckedIn', flightBeeingCheckedIn.flight_id)
            window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/checkin/index' ?>';
        });

    });
</script>