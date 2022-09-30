<?php

/** @var yii\web\View $this */


use app\assets\FlightAsset;

FlightAsset::register($this);

$this->registerCssFile("@web/css/flightmanagement.css")

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
                <th>Flight Number</th>
                <th>To</th>
                <th>From</th>
                <th>Departure date</th>
                <th>Arrival date</th>
                <th>Economy class price</th>
                <th>Business class price</th>

            </tr>
        </thead>
        <tbody>
        </tbody>

    </table>

    </div>

</body>

</html>
<script src="scripts/jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $(document).ready(function() {
        var data = <?= $allFlights ?>;
        for (var i = 0; i < data.length; i++) {
            html += '<tr><td>' + data[i].flight_nr + '</td><td>' + data[i].to + '</td></td>' + data[i].from + '</td></td>' + data[i].departure_date + '</td></td>' + data[i].arrival_date + '</td></td>' + data[i].economy_price + '</td></td>' + data[i].business_price + '</td></tr>';
        }
        $('#example tr:last').after(html);
    });
</script>