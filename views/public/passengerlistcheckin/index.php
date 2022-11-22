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
                <th><?php echo Yii::t('app','ID')?></th>
                <th><?php echo Yii::t('app','Passanger Name')?></th>
                <th><?php echo Yii::t('app','Check-In')?></th>
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
                defaultContent: '<button class="CheckInbtn" role="button"><?php echo Yii::t('app','Select')?></button>',
            }, ],
        });

        var data = localStorage.getItem('retrieveBooking')
        data = JSON.parse(data)
        var passengers = data[2]
        for (let i = 0; i < passengers.length; i++) {
            const table = document.getElementById("example");
            mergeName = passengers[i].first_name + " " + passengers[i].last_name;

            t.row.add([passengers[i].person_id, mergeName, ]).draw(false);
        }

        $('#example tbody').on('click', 'button', function() {
            var t = $('#example').DataTable()
            var data = t.row($(this).parents('tr')).data();
            localStorage.setItem('passengerBeeingCheckedIn',data[0])
            window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/checkin/index' ?>';
        });

    });
</script>
<script>
    $(document).ready(function() {
        var data = localStorage.getItem('retrieveBooking')
        data = JSON.parse(data)
        var passengers = data[2]
        mergeName = passengers[i].first_name + passengers[i].last_name;



        for (let i = 0; i < passengers.length; i++) {
            html += '<tr><td>' + passengers[i].person_id + '</td></td>' + mergeName + '</td></tr>';
        }
        $('#example tr:last').after(html);
    });
</script>