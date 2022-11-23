<?php

/** @var yii\web\View $this */

use app\assets\TableAsset;

TableAsset::register($this);

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
    <input type="button" value=<?php echo Yii::t('app', 'Create New Plane') ?> id="createFlight" />
    <br></br>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th><?php echo Yii::t('app', 'Plane Number') ?></th>
                <th><?php echo Yii::t('app', 'Plane Type') ?></th>
                <th><?php echo Yii::t('app', 'Number of Seat Columns')?></th>
                <th><?php echo Yii::t('app', 'Number of Seat Rows') ?></th>
                <th><?php echo Yii::t('app', 'Number of Business Seat Rows') ?></th>
            </tr>
        </thead>
    </table>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $("#createFlight").on('click', function() {
            window.location.href = '<?php echo Yii::$app->request->baseUrl . '/admin/plane/index' ?>';
        });

        $('#example').on('click', 'tbody tr', function() {
            idenentity = table.row(this).data()[0]
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/admin/planemanagement/search' ?>',
                type: "POST",
                data: {
                    iden: idenentity,
                },
                success: function(response) {
                    localStorage.setItem('plane', response)
                    window.location.href = '<?php echo Yii::$app->request->baseUrl . '/admin/editplane/index' ?>';
                },
            });
        })

        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        var data = <?= $allPlane ?>;
        for (let i = 0; i < data.length; i++) {
            const table = document.getElementById("example");

            var t = $('#example').DataTable();
            // departureDateSplit = data[i].departure_date
            // const departureDateArray = departureDateSplit.split(" ");
            // arrivalDateSplit = data[i].departure_date
            // const arrivalDateArray = arrivalDateSplit.split(" ");

            t.row.add([data[i].plane_nr, data[i].plane_name, data[i].seat_columns,
            data[i].seat_rows, data[i].seat_rows_business,]).draw(false);
        }
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $(document).ready(function() {
        var data = <?= $allPlane ?>;
        for (var i = 0; i < data.length; i++) {
            html += '<tr><td>' + data[i].plane_nr + '</td><td>' + data[i].plane_name + '</td></td>' + data[i].seat_columns + '</td></td>' + data[i].seat_rows + '</td></td>' + data[i].seat_business_rows + '</td></tr>';
        }
        $('#example tr:last').after(html);
    });
</script>