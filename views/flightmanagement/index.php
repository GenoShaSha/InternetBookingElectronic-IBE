<?php

/** @var yii\web\View $this */

use app\assets\FlightAsset;

FlightAsset::register($this);

use yii\bootstrap5\Html;

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
            <th>ID</th>
                <th>Flight Number</th>
                <th>From</th>
                <th>To</th>
                <th>Departure date</th>
                <th>Departure time</th>
                <th>Arrival date</th>
                <th>Arrival time</th>
                <th>Economy class price</th>
                <th>Business class price</th>
            </tr>
        </thead>
    </table>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('#example').on('click', 'tbody tr', function() {
            iden = table.row(this).data()[0]
            $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/flightmanagement/search' ?>',
                    type: "POST",
                    data: {
                        iden: iden,
                    },
                    success: function(response) {
                        localStorage.setItem('flight',response)
                        window.location.href = '<?php echo Yii::$app->request->baseUrl.'/editflight/index'?>';
                    },
                });
        })

        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });
        var data = <?= $allFlights ?>;
        for (let i = 0; i < data.length; i++) {
            const table = document.getElementById("example");

            var t = $('#example').DataTable();
            departureDateSplit = data[i].departure_date
            const departureDateArray = departureDateSplit.split(" ");
            arrivalDateSplit = data[i].departure_date
            const arrivalDateArray = arrivalDateSplit.split(" ");

            t.row.add([data[i].flight_id,data[i].flight_nr, data[i].from, data[i].to,
                departureDateArray[0], departureDateArray[1], arrivalDateArray[0],
                arrivalDateArray[1], data[i].economy_price, data[i].business_price,
            ]).draw(false);
        }
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>