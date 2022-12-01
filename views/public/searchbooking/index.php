<?php

/** @var yii\web\View $this */


$this->registerCssFile("@web/css/card.css")
?>


<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>

<head>

    <!-- <title>Login page with jQuery and AJAX</title> -->
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <main class="cards">
        <div id="AllFlights"></div>
    </main>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        var data = localStorage.getItem('filteredFlights')
        if(JSON.parse(localStorage.getItem('roundTrip'))){
            data = JSON.parse(data)[localStorage.getItem('tripSelection')]
        }
        else{
            data = JSON.parse(data)
        }

        for (let i = 0; i < data.length; i++) {

            var templateString = '<div class="LoginForm2"  id="pls' + i + '"><div class="container2" id="' + i + '"><h3>' + data[i].plane_nr + '</h3> <h3><b>' + "From :" + "  " + data[i].from + '</b></h3> <h3><b>' + "To :" + "  " + data[i].to + '</b></h3> <h3><b>' + "Departure :" + "  " + data[i].departure_date + '</b></h3> <h3><b>' + "Arrival :" + "  " + data[i].arrival_date + '</b></h3></div><br>';
            let btn = document.createElement("button");
            if(localStorage.getItem('seatTypeWanted') == "economy"){
                btn.innerHTML = "€" + " " + data[i].economy_price;
            }
            else{
                btn.innerHTML = "€" + " " + data[i].business_price;
            }
            $("#AllFlights").append(templateString);
            btn.onclick = function() {
                if (JSON.parse(localStorage.getItem('roundTrip'))) {
                    if (localStorage.getItem('tripSelection') == 0) {
                        localStorage.setItem('tripSelection',1)
                        localStorage.setItem('selectedBooking', JSON.stringify(data[i]));
                        if(JSON.parse(localStorage.getItem('filteredFlights'))[1].length == 0){
                            window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/error/index' ?>';
                            return
                        }
                        window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/searchbooking/index' ?>';
                    } else {
                        var booking = JSON.parse(localStorage.getItem('selectedBooking'));
                        var items = data[i]
                        var info = [booking,items]
                        var booking = JSON.stringify(info)
                        localStorage.setItem('selectedBooking', booking);
                        window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/bookingcreation/index' ?>';
                    }
                } else {
                    localStorage.setItem('selectedBooking', JSON.stringify(data[i]));
                    window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/bookingcreation/index' ?>';
                }
            };

            document.getElementById(i).appendChild(btn);



        }
    });
</script>