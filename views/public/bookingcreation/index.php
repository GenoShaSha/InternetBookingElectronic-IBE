<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);


$this->registerCssFile("@web/css/bookingcreation.css")
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<html>
<!-- <head>
    <div class="LoginForm">
    <title>Login page with jQuery and AJAX</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head> -->

<body>
    <div class="Background">

        <div class='ProfileForms' id='ProfileForms'>

            <main class="LoginForm10">
                <div class="Flight"></div>
            </main>
        </div>
        <main class="LoginForm">
            <div id="Bla"></div>
        </main>
        <div class="LoginForm2">
            <form method="post" ,action="Login.html">
                <div class="row">
                    <div class="col">
                        <h2 class="LoginTitle" style="text-align: left">
                            <?php echo Yii::t('app', 'Contact Details') ?>
                        </h2>
                        <h3><?php echo Yii::t('app', 'Email') ?> :</h3>
                        <input type="text" name="email" id="email" placeholder="Email" required />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {


            var data = localStorage.getItem('selectedBooking')
            var child = localStorage.getItem('childPassengers')
            var infant = localStorage.getItem('infantPassengers')
            var adult = localStorage.getItem('adultPassengers')

            data = JSON.parse(data)

            if (!JSON.parse(localStorage.getItem('roundTrip'))) {
                data = [data]
            }

            var singleTicketPrice = 0
            for (let i = 0; i < data.length; i++) {
                if (localStorage.getItem('seatTypeWanted') == 'economy') {
                    singleTicketPrice = singleTicketPrice + parseInt(data[i].economy_price)
                } else {
                    singleTicketPrice = singleTicketPrice + parseInt(data[i].business_price)
                }
            }


            adultPrice = parseInt(localStorage.getItem('adultPassengers')) * singleTicketPrice
            childPrice = parseInt(localStorage.getItem('childPassengers')) * singleTicketPrice
            infantPrice = (parseInt(localStorage.getItem('infantPassengers')) * singleTicketPrice) * 0.5
            iftPrice = singleTicketPrice * 0.5
            price = adultPrice + childPrice + infantPrice


            // Showing the selected plane
            for (let i = 0; i < data.length; i++) {
                var templateString = '<div class="LoginForm1"  id="pls' + i + '"><div class="container2"><h3>' + data[i].plane_nr + '</h3> <h3><?php echo Yii::t('app', 'From') ?>' + " :" + "  " + data[i].from + '</h3> <h3><?php echo Yii::t('app', 'To') ?>' + " :" + "  " + data[i].to + '</h3> <h3><?php echo Yii::t('app', 'Departure') ?>' + " :" + "  " + data[i].departure_date + '</h3> <h3><?php echo Yii::t('app', 'Arrival') ?>' + " :" + "  " + data[i].arrival_date + '</h3></div><br>';
                $(".Flight").append(templateString);
            }
            // Showing the total of the plane tickets
            for (let i = 0; i < 1; i++) {
                var templateString = '<div class="Price"  id="payment' + i + '"><div class="container1"><h1><?php echo Yii::t('app', 'Price') ?> :<h1><h3><?php echo Yii::t('app', 'Adult') ?>' + " : " + singleTicketPrice + "x" + adult + '</h3><h3><?php echo Yii::t('app', 'Child') ?>' + " : " + singleTicketPrice + "x" + child + '</h3><h3><?php echo Yii::t('app', 'Infant') ?>' + " : " + iftPrice + "x" + infant + '</h3><h3><?php echo Yii::t('app', 'Total Price') ?>' + " : " + price + '</h3></div></div><br>';
                let btn = document.createElement("button");
                btn.innerHTML = "<?php echo Yii::t('app', 'Payment') ?>";
                $("#Bla").append(templateString);
                btn.onclick = function() {
                    Passengers = []
                    var passengers = parseInt(localStorage.getItem('adultPassengers')) + parseInt(localStorage.getItem('childPassengers')) + parseInt(localStorage.getItem('infantPassengers'));
                    if (ValidateEmail($("#email").val())) {
                        var contact = {
                            "email": $("#email").val()
                        }
                        for (let i = 0; i < passengers; i++) {
                            if (NullIdentity($("#firstName" + i).val(), $("#lastName" + i).val(), $("#gender" + i).val(), $("#dateOfBirth" + i).val(), $("#nationality" + i).val(), $("#documentNumber" + i).val(), $("#documentType" + i).val())) {
                                var passenger = {
                                    "first_name": $("#firstName" + i).val(),
                                    "last_name": $("#lastName" + i).val(),
                                    "date_of_birth": $("#dateOfBirth" + i).val(),
                                    "gender": $("#gender" + i).val(),
                                    "nationality": $("#nationality" + i).val(),
                                    "personal_doc_type": $("#documentType" + i).val(),
                                    "personal_doc_num": $("#documentNumber" + i).val()
                                }
                                Passengers.push(passenger)
                                localStorage.setItem('Pasng', JSON.stringify(Passengers))
                            }
                        };
                        localStorage.setItem('contact', JSON.stringify(contact))
                        window.location.href = '<?php echo Yii::$app->request->baseUrl . '/public/paymentgateway/index' ?>';
                    }

                }
                document.getElementById('payment' + i).appendChild(btn);
            }

            function ValidateEmail(inputText) {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (inputText.match(mailformat)) {
                    return true;
                } else {
                    alert("You have entered an invalid email address!");
                    return false;
                }
            }

 

            function NullIdentity(fName, lName, gender, dob, nat, docId, docType) {
                if (fName != "" && lName != "" && gender != "" && dob != "" && nat != "" && docId != "" && docType != "") {
                    alert("Valid data");
                    return true;
                } else {
                    alert("you must filled in all the fields");
                    throw new FatalError("Something went badly wrong!");
                    return false;
                }
            }

            function FatalError(){ Error.apply(this, arguments); this.name = "FatalError"; }
FatalError.prototype = Object.create(Error.prototype);
            // Make a fileds for passenger based on the amount of the passanger
            var passengers = parseInt(localStorage.getItem('adultPassengers')) + parseInt(localStorage.getItem('childPassengers')) + parseInt(localStorage.getItem('infantPassengers'));
            for (let i = 0; i < passengers; i++) {
                var templateString = '<div class="LoginForm3"  id="pls' + i + '"><form method="post" ,action="Login.html"> <div class="row"> <div class="title"> <h2 class="LoginTitle" style="text-align: left"> <?php echo Yii::t('app', 'Add Passenger') ?> ' + i + ' </h2> </div> </div> <div class="col"> <h3><?php echo Yii::t('app', 'First Name') ?> :</h3> <input type="text" name="firstName" id="firstName' + i + '" placeholder="First Name" required /> <h3><?php echo Yii::t('app', 'Last Name') ?> :</h3> <input type="text" name="lastName" id="lastName' + i + '" placeholder="Last Name" required /> <h3><?php echo Yii::t('app', 'Date Of Birth') ?> :</h3> <input type="date" name="dateOfBirth" id="dateOfBirth' + i + '" placeholder="Date of Birth" required /> <h3><?php echo Yii::t('app', 'Gender') ?> :</h3> <select type="text" name="gender" id="gender' + i + '" placeholder="Gender" required> <option value="">---</option> <option value="Male"><?php echo Yii::t('app', 'Male') ?></option> <option value="Female"><?php echo Yii::t('app', 'Female') ?></option> </select> <h3><?php echo Yii::t('app', 'Nationality') ?> :</h3> <select type="text" name="nationality" id="nationality' + i + '" placeholder="Nationality" required> <option value="">---</option> <option value="afghan">Afghan</option> <option value="albanian">Albanian</option> <option value="algerian">Algerian</option> <option value="american">American</option> <option value="andorran">Andorran</option> <option value="angolan">Angolan</option> <option value="antiguans">Antiguans</option> <option value="argentinean">Argentinean</option> <option value="armenian">Armenian</option> <option value="australian">Australian</option> <option value="austrian">Austrian</option> <option value="azerbaijani">Azerbaijani</option> <option value="bahamian">Bahamian</option> <option value="bahraini">Bahraini</option> <option value="bangladeshi">Bangladeshi</option> <option value="barbadian">Barbadian</option> <option value="barbudans">Barbudans</option> <option value="batswana">Batswana</option> <option value="belarusian">Belarusian</option> <option value="belgian">Belgian</option> <option value="belizean">Belizean</option> <option value="beninese">Beninese</option> <option value="bhutanese">Bhutanese</option> <option value="bolivian">Bolivian</option> <option value="bosnian">Bosnian</option> <option value="brazilian">Brazilian</option> <option value="british">British</option> <option value="bruneian">Bruneian</option> <option value="bulgarian">Bulgarian</option> <option value="burkinabe">Burkinabe</option> <option value="burmese">Burmese</option> <option value="burundian">Burundian</option> <option value="cambodian">Cambodian</option> <option value="cameroonian">Cameroonian</option> <option value="canadian">Canadian</option> <option value="cape verdean">Cape Verdean</option> <option value="central african">Central African</option> <option value="chadian">Chadian</option> <option value="chilean">Chilean</option> <option value="chinese">Chinese</option> <option value="colombian">Colombian</option> <option value="comoran">Comoran</option> <option value="congolese">Congolese</option> <option value="costa rican">Costa Rican</option> <option value="croatian">Croatian</option> <option value="cuban">Cuban</option> <option value="cypriot">Cypriot</option> <option value="czech">Czech</option> <option value="danish">Danish</option> <option value="djibouti">Djibouti</option> <option value="dominican">Dominican</option> <option value="dutch">Dutch</option> <option value="east timorese">East Timorese</option> <option value="ecuadorean">Ecuadorean</option> <option value="egyptian">Egyptian</option> <option value="emirian">Emirian</option> <option value="equatorial guinean">Equatorial Guinean</option> <option value="eritrean">Eritrean</option> <option value="estonian">Estonian</option> <option value="ethiopian">Ethiopian</option> <option value="fijian">Fijian</option> <option value="filipino">Filipino</option> <option value="finnish">Finnish</option> <option value="french">French</option> <option value="gabonese">Gabonese</option> <option value="gambian">Gambian</option> <option value="georgian">Georgian</option> <option value="german">German</option> <option value="ghanaian">Ghanaian</option> <option value="greek">Greek</option> <option value="grenadian">Grenadian</option> <option value="guatemalan">Guatemalan</option> <option value="guinea-bissauan">Guinea-Bissauan</option> <option value="guinean">Guinean</option> <option value="guyanese">Guyanese</option> <option value="haitian">Haitian</option> <option value="herzegovinian">Herzegovinian</option> <option value="honduran">Honduran</option> <option value="hungarian">Hungarian</option> <option value="icelander">Icelander</option> <option value="indian">Indian</option> <option value="indonesian">Indonesian</option> <option value="iranian">Iranian</option> <option value="iraqi">Iraqi</option> <option value="irish">Irish</option> <option value="israeli">Israeli</option> <option value="italian">Italian</option> <option value="ivorian">Ivorian</option> <option value="jamaican">Jamaican</option> <option value="japanese">Japanese</option> <option value="jordanian">Jordanian</option> <option value="kazakhstani">Kazakhstani</option> <option value="kenyan">Kenyan</option> <option value="kittian and nevisian">Kittian and Nevisian</option> <option value="kuwaiti">Kuwaiti</option> <option value="kyrgyz">Kyrgyz</option> <option value="laotian">Laotian</option> <option value="latvian">Latvian</option> <option value="lebanese">Lebanese</option> <option value="liberian">Liberian</option> <option value="libyan">Libyan</option> <option value="liechtensteiner">Liechtensteiner</option> <option value="lithuanian">Lithuanian</option> <option value="luxembourger">Luxembourger</option> <option value="macedonian">Macedonian</option> <option value="malagasy">Malagasy</option> <option value="malawian">Malawian</option> <option value="malaysian">Malaysian</option> <option value="maldivan">Maldivan</option> <option value="malian">Malian</option> <option value="maltese">Maltese</option> <option value="marshallese">Marshallese</option> <option value="mauritanian">Mauritanian</option> <option value="mauritian">Mauritian</option> <option value="mexican">Mexican</option> <option value="micronesian">Micronesian</option> <option value="moldovan">Moldovan</option> <option value="monacan">Monacan</option> <option value="mongolian">Mongolian</option> <option value="moroccan">Moroccan</option> <option value="mosotho">Mosotho</option> <option value="motswana">Motswana</option> <option value="mozambican">Mozambican</option> <option value="namibian">Namibian</option> <option value="nauruan">Nauruan</option> <option value="nepalese">Nepalese</option> <option value="new zealander">New Zealander</option> <option value="ni-vanuatu">Ni-Vanuatu</option> <option value="nicaraguan">Nicaraguan</option> <option value="nigerien">Nigerien</option> <option value="north korean">North Korean</option> <option value="northern irish">Northern Irish</option> <option value="norwegian">Norwegian</option> <option value="omani">Omani</option> <option value="pakistani">Pakistani</option> <option value="palauan">Palauan</option> <option value="panamanian">Panamanian</option> <option value="papua new guinean">Papua New Guinean</option> <option value="paraguayan">Paraguayan</option> <option value="peruvian">Peruvian</option> <option value="polish">Polish</option> <option value="portuguese">Portuguese</option> <option value="qatari">Qatari</option> <option value="romanian">Romanian</option> <option value="russian">Russian</option> <option value="rwandan">Rwandan</option> <option value="saint lucian">Saint Lucian</option> <option value="salvadoran">Salvadoran</option> <option value="samoan">Samoan</option> <option value="san marinese">San Marinese</option> <option value="sao tomean">Sao Tomean</option> <option value="saudi">Saudi</option> <option value="scottish">Scottish</option> <option value="senegalese">Senegalese</option> <option value="serbian">Serbian</option> <option value="seychellois">Seychellois</option> <option value="sierra leonean">Sierra Leonean</option> <option value="singaporean">Singaporean</option> <option value="slovakian">Slovakian</option> <option value="slovenian">Slovenian</option> <option value="solomon islander">Solomon Islander</option> <option value="somali">Somali</option> <option value="south african">South African</option> <option value="south korean">South Korean</option> <option value="spanish">Spanish</option> <option value="sri lankan">Sri Lankan</option> <option value="sudanese">Sudanese</option> <option value="surinamer">Surinamer</option> <option value="swazi">Swazi</option> <option value="swedish">Swedish</option> <option value="swiss">Swiss</option> <option value="syrian">Syrian</option> <option value="taiwanese">Taiwanese</option> <option value="tajik">Tajik</option> <option value="tanzanian">Tanzanian</option> <option value="thai">Thai</option> <option value="togolese">Togolese</option> <option value="tongan">Tongan</option> <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option> <option value="tunisian">Tunisian</option> <option value="turkish">Turkish</option> <option value="tuvaluan">Tuvaluan</option> <option value="ugandan">Ugandan</option> <option value="ukrainian">Ukrainian</option> <option value="uruguayan">Uruguayan</option> <option value="uzbekistani">Uzbekistani</option> <option value="venezuelan">Venezuelan</option> <option value="vietnamese">Vietnamese</option> <option value="welsh">Welsh</option> <option value="yemenite">Yemenite</option> <option value="zambian">Zambian</option> <option value="zimbabwean">Zimbabwean</option> </select> <h3><?php echo Yii::t('app', 'Document Type') ?>  :</h3> <select type="text" name="documentType" id="documentType' + i + '" placeholder="Document Type" required> <option value="">---</option> <option value="passport">Passport</option> <option value="IDCard">Id Card</option> </select> <h3><?php echo Yii::t('app', 'Document Number') ?> :</h3> <input type="text" name="documentNumber" id="documentNumber' + i + '" placeholder="Document Number" required /> <br> </div> </form> </div><br>';

                $("#ProfileForms").append(templateString);
            }
        });
    </script>