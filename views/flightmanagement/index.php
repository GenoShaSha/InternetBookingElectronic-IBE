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
            <tr>
                <td>Sq583</td>
                <td>Amsterdam</td>
                <td>Edinburgh</td>
                <td>2011-04-25</td>
                <td>2009-01-12</td>
                <td>1000</td>
                <td>1000000</td>

            </tr>
            <tr>
                <td>Sq583</td>
                <td>Amsterdam</td>
                <td>Edinburgh</td>
                <td>2011-04-25</td>
                <td>2009-01-12</td>
                <td>1000</td>
                <td>5</td>

            </tr>
            <tr>
                <td>Sq583</td>
                <td>Amsterdam</td>
                <td>Edinburgh</td>
                <td>2011-04-25</td>
                <td>2009-01-12</td>
                <td>1000</td>
                <td>10</td>

            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Flight Number</th>
                <th>To</th>
                <th>From</th>
                <th>Departure date</th>
                <th>Arrival date</th>
                <th>Economy class price</th>
                <th>Business class price</th>
            </tr>
        </tfoot>
    </table>



    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>


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