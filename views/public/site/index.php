<?php

/** @var yii\web\View $this */

// $this->registerCssFile("@web/css/createflight.css");


use app\assets\DropdownAsset;

DropdownAsset::register($this);
$this->registerCssFile("@web/css/search.css")

?>

<!--about-us start -->



<!--travel-box start-->
<section class="travel-box">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-travel-boxes">
					<div id="desc-tabs" class="desc-tabs">


					</div>
					<!--/.tabpannel-->

					<div role="tabpanel" class="tab-pane fade in" id="flights">
						<div class="tab-para">
							<div class="trip-circle">
								<div class="single-trip-circle">
									<input type="radio" id="radio01" name="radio" />
									<label for="radio01">
										<span class="round-boarder">
											<span class="round-boarder1"></span>
										</span>Round Trip
									</label>
								</div>
								<!--/.single-trip-circle-->
								<div class="single-trip-circle">
									<input type="radio" id="radio02" name="radio" />
									<label for="radio02">
										<span class="round-boarder">
											<span class="round-boarder1"></span>
										</span>One-Way
									</label>
								</div>
								<!--/.single-trip-circle-->
							</div>
							<!--/.trip-circle-->
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="single-tab-select-box">
										<h2 class="searchTitle">From :</h2>
										<select class="js-example-basic-single" id='dropdownFrom'>
											<option value="placeholder" disabled>Choose Origin</option>
										</select>
									</div>
									<!--/.single-tab-select-box-->
								</div>
								<!--/.col-->

								<div class="col-lg-2 col-md-3 col-sm-4">
									<div class="single-tab-select-box">
										<h2>Departure Date</h2>
										<input type="date" class="datepicker" name="datetime" id="datetime1" />
									</div>
									<!--/.single-tab-select-box-->
								</div>
								<!--/.col-->

								<div class="col-lg-2 col-md-3 col-sm-4">
									<div class="single-tab-select-box">
										<h2>Return Date</h2>
										<input type="date" class="datepicker" name="datetime" id="datetime2" />

									</div>
									<!--/.single-tab-select-box-->
								</div>
								<!--/.col-->

								<div class="col-lg-2 col-md-1 col-sm-4">
									<div class="single-tab-select-box">
										<h2 class="searchTitle">Passangers</h2>
										<div class="qty mt-5">
											<p class='passangerSelectText'>Adults (12+ years)</p>
											<span class="minus bg-dark">-</span>
											<input type="number" class="count" name="qty" value="1">
											<span class="plus bg-dark">+</span>

											<p class='passangerSelectText'>Child (2-11 years)</p>
											<span class="minus1 bg-dark">-</span>
											<input type="number" class="count1" name="qty" value="0">
											<span class="plus1 bg-dark">+</span>

											<p class='passangerSelectText'>Infant (Under 2 years)</p>
											<span class="minus2 bg-dark">-</span>
											<input type="number" class="count2" name="qty" value="0">
											<span class="plus2 bg-dark">+</span>
										</div>

										<!-- <h2>Passangers :</h2>
										<div class="travel-select-icon">
											<select class="form-control ">

												<option value="adult">Adult</option>

												<option value="10">10</option>

												<option value="15">15</option>
												<option value="20">20</option>
											</select>
										</div> -->
									</div>
									<!--/.single-tab-select-box-->
								</div>
								<!--/.col-->

								<!-- <div class="col-lg-2 col-md-1 col-sm-4">
									<div class="single-tab-select-box">
										<h2>childs</h2>
										<div class="travel-select-icon">
											<select class="form-control ">

												<option value="default">Choose</option>

												<option value="economy">Economy Class</option>
												<option value="business">Buisness Class</option>
												<option value="8">8</option>

											</select>
										</div>
									</div>

								</div> -->


							</div>
							<!--/.row-->

							<div class="row">
								<!-- <div class="col-lg-4 col-md-4 col-sm-12">
									<div class="single-tab-select-box">
										<h2 class="searchTitle">To :</h2>
										<select class="js-example-basic-single" id='dropdownTo'>
										<option value="placeholder" disabled>Choose Destination</option>
										</select>
									</div>
								</div> -->
								<!--/.col-->

								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="single-tab-select-box">
										<h2 class="searchTitle">To :</h2>
										<select class="js-example-basic-single" id='dropdownWhere'>
											<option value="placeholder" disabled>Choose Origin</option>
										</select>
									</div>
									<!--/.single-tab-select-box-->
								</div>

								<div class="col-lg-3 col-md-3 col-sm-4">
									<div class="single-tab-select-box">
										<h2 class="searchTitle">Class :</h2>
										<select class="js-example-basic-single" id='dropdownTo'>
											<option value="placeholder" disabled>Choose Seat Type</option>
											<option value="economy">Economy</option>
											<option value="business">Business</option>
										</select>
									</div>
									<!--/.single-tab-select-box-->
								</div>
								<!--/.col-->
								<div class="clo-sm-5">
									<div class="about-btn pull-right">
										<button class="about-view travel-btn">
											search
										</button>
										<!--/.travel-btn-->
									</div>
									<!--/.about-btn-->
								</div>
								<!--/.col-->

							</div>
							<!--/.row-->

						</div>

					</div>
					<!--/.tabpannel-->

				</div>
				<!--/.tab content-->
			</div>
			<!--/.desc-tabs-->
		</div>
		<!--/.single-travel-box-->
	</div>
	<!--/.col-->
	</div>
	<!--/.row-->
	</div>
	<!--/.container-->

</section>
<!--/.travel-box-->
<!--travel-box end-->

</section>
<!--/.about-us-->
<!--about-us end -->


<!--service start-->
<section id="service" class="service">
	<div class="container">

		<div class="service-counter text-center">

			<div class="col-md-4 col-sm-4">
				<div class="single-service-box">
					<div class="service-img">
						<img src="<?= \Yii::getAlias('@web/images/service/s1.png') ?>" alt="service-icon" />
					</div>
					<!--/.service-img-->
					<div class="service-content">
						<h2>
							<a href="#">
								amazing tour packages
							</a>
						</h2>
						<p>Duis aute irure dolor in velit esse cillum dolore eu fugiat nulla.</p>
					</div>
					<!--/.service-content-->
				</div>
				<!--/.single-service-box-->
			</div>
			<!--/.col-->

			<div class="col-md-4 col-sm-4">
				<div class="single-service-box">
					<div class="service-img">
						<img src="<?= \Yii::getAlias('@web/images/service/s2.png') ?>" alt="service-icon" />
					</div>
					<!--/.service-img-->
					<div class="service-content">
						<h2>
							<a href="#">
								book top class hotel
							</a>
						</h2>
						<p>Duis aute irure dolor in velit esse cillum dolore eu fugiat nulla.</p>
					</div>
					<!--/.service-content-->
				</div>
				<!--/.single-service-box-->
			</div>
			<!--/.col-->

			<div class="col-md-4 col-sm-4">
				<div class="single-service-box">
					<div class="statistics-img">
						<img src="<?= \Yii::getAlias('@web/images/service/s3.png') ?>" alt="service-icon" />
					</div>
					<!--/.service-img-->
					<div class="service-content">

						<h2>
							<a href="#">
								online flight booking
							</a>
						</h2>
						<p>Duis aute irure dolor in velit esse cillum dolore eu fugiat nulla.</p>
					</div>
					<!--/.service-content-->
				</div>
				<!--/.single-service-box-->
			</div>
			<!--/.col-->

		</div>
		<!--/.statistics-counter-->
	</div>
	<!--/.container-->

	<!--service end-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {


			var data = <?= $allFrom ?>;
			select = document.getElementById('dropdownFrom');
			for (let i = 0; i < data.length; i++) {
				var opt = document.createElement('option');
				opt.value = data[i];
				opt.innerHTML = data[i];
				select.appendChild(opt);
			}

			$("#radio02").click(function() {
				$("#datetime2").prop("disabled", true);
			});
			$("#radio01").click(function() {
				$("#datetime2").prop("disabled", false);
			});


			var data1 = <?= $allTo ?>;
			select1 = document.getElementById('dropdownWhere');
			for (let j = 0; j < data1.length; j++) {
				var opt1 = document.createElement('option');
				opt1.value = data1[j];
				opt1.innerHTML = data1[j];
				select1.appendChild(opt1);
			}

			$('.js-example-basic-single').select2();

			$('.count').prop('disabled', true);
			$(document).on('click', '.plus', function() {
				$('.count').val(parseInt($('.count').val()) + 1);
			});
			$(document).on('click', '.minus', function() {
				$('.count').val(parseInt($('.count').val()) - 1);
				if ($('.count').val() == 0) {
					$('.count').val(1);
				}
			});

			$('.count1').prop('disabled', true);
			$(document).on('click', '.plus1', function() {
				$('.count1').val(parseInt($('.count1').val()) + 1);
			});
			$(document).on('click', '.minus1', function() {
				$('.count1').val(parseInt($('.count1').val()) - 1);
				if ($('.count1').val() == -1) {
					$('.count1').val(0);
				}
			});

			$('.count2').prop('disabled', true);
			$(document).on('click', '.plus2', function() {
				$('.count2').val(parseInt($('.count2').val()) + 1);
			});
			$(document).on('click', '.minus2', function() {
				$('.count2').val(parseInt($('.count2').val()) - 1);
				if ($('.count2').val() == -1) {
					$('.count2').val(0);
				}
			});

		});
	</script>
	</body>

	</html>