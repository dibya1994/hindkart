<!DOCTYPE html>
<html>
<head>
	<title>Services || Hindkart</title>
	<link rel="icon" type="image/x-icon" href="{{  URL::asset('public/assets/images/favicon.png')}}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="Hindkart Website & Application">
    <meta name="keywords" content="E-commerce">
    <meta name="author" content="Hindkart">
    @include("frontend.include.source")
</head>
<body>
	@include("frontend.include.header")
	<section class="redirect-page">
		<div class="container">
			<div class="row">
				<div class="col-8">
					<div class="redirect-content">
						<h3>our services</h3>
						<ul class="d-flex">
							<li><a href="#" title="">Home</a></li>
							<li><i class="fa fa-chevron-right"></i></li>
							<li>service</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
		<section class="service">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading-box">
						<h2>our services</h2>
						<p>Being a online service provider, we offer a very diverce range of services that cover the
                            startups and estebelished business owner growth their business and service to the customers. And also
                            fullfill the user requirments to get there product, food, medicine or doorstape service at one place.
                        </p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="service-content">
						    <img src="{{  URL::asset('public/assets/images/1.jpeg')}}" alt="" class="img-fluid">
							<h3>e-COMMERCE</h3>
							<p>You can sales or purchase anythin nearest marketplace, with COD and instant delivery.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="service-content">
						     <img src="{{  URL::asset('public/assets/images/6.jpeg')}}" alt="" class="img-fluid">
							<h3>DELIVERY AND COURIER</h3>
							<p>Send or booking Product or package to your customer or relatives within the city in 60 mins with prepaid or COD.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="service-content">
						    <img src="{{  URL::asset('public/assets/images/2.jpeg')}}" alt="" class="img-fluid">
							<h3>TRANSPORTATION</h3>
							<p>Book a Bike, Toto, Auto, car instantly or hire any type of Commercial car to travel or urgent needs.You can register as a merchant also.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="service-content">
						    <img src="{{  URL::asset('public/assets/images/4.jpeg')}}" alt="" class="img-fluid">
							<h3>DOOR to doorstep service</h3>
							<p>A to Z doorstep service book instantly and also you can register as a service merchant with us.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="service-content">
						    <img src="{{  URL::asset('public/assets/images/3.jpeg')}}" alt="" class="img-fluid">
							<h3>MEDICAL SERVICE</h3>
							<p>Get online appointment and consultation with verified doctors and lab test for your family at your family at
your locality for emergency or regularly.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="service-content">
						    <img src="{{  URL::asset('public/assets/images/5.jpeg')}}" alt="" class="img-fluid">
							<h3>APPOINTMENTS</h3>
							<p>Get online appointment an consultation with Civil Engineers, Lawyers, Astrologers etc. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include("frontend.include.footer")
</body>
</html>