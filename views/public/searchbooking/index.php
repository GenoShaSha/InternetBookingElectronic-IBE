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
        data = JSON.parse(data)

        for (let i = 0; i < data.length; i++) {
            var templateString = '<div class="card"><img src="img_avatar.png" alt="Shanessa has the best pussy in the world" style="width:100%"><div class="container"><h4><b>' + data[i].plane_nr +'</b></h4>  <p>'+data[i].departure_date +'</p></div></div><br>';
            $("#AllFlights").append(templateString);

        }


    });
</script>