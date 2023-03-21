<!DOCTYPE html>
<html>
<head>
	<title>Home || Hindkart</title>
	<link rel="icon" type="image/x-icon" href="{{  URL::asset('public/assets/images/favicon.png') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="Hindkart Website & Application">
    <meta name="keywords" content="E-commerce">
    <meta name="author" content="Hindkart">

    @include("frontend.include.source")
</head>
<body>
	@include("frontend.include.header")
	<section class="banner">
		<div class="banner-slider">
			@php
			$banner_row=DB::table('websitebanners')->get();
			@endphp
			@foreach ($banner_row as $banner_details)
			<div class="banner-item d-flex align-items-center">
				<div class="banner-content">
					{{-- <img src="{{ URL::asset('public/category_image/'.$details->image) }}" alt="" style="height: 60px;width: 70px;"> --}}
					<h1>{{ $banner_details->title }}</h1>
					<p>{{ $banner_details->sub_title }}</p>
					{{-- <a href="about.php" title="" class="btn my-btn">read more</a> --}}
				</div>
			</div>
			@endforeach
			
		</div>
	</section>
	<section class="about">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading-box">
						<h2>about us</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">	
				<div class="col-md-6">
					<div class="about-left">
						<img src="{{  URL::asset('public/assets/images/about.jpg') }}" alt="" class="img-fluid">
					</div>
				</div>
				<div class="col-md-6">
					<div class="about-right">
						<h3>about our company</h3>
						<p>Hindkart is a multi vendor platform where you can promotion, sell and purchase any product and service from your nearest marketplace.we help our clients solve their business challenges through digital transformation.The Company brings a wide range digital marketing solutions like e-commerce, Courier Service,Doorstep services,Transportation and medical service.</p>
					</div>
					<div class="subscribe">
					    <h4>Download our app</h4>
						<img src="{{  URL::asset('public/assets/images/play-store.png') }}" style="height:50px;">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mission">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="mission-left">
						<h3>our MISSION & VISION</h3>
						<p>Hindkart is the first company having a mission to deliver excellence in various diverse range
                        of service like ecommerce, Transportation, Courier Service, Food & Grocery delivery,
                        Doorstep service, Medical and Health care service to customer and also for the business
                        merchant to growth their business. Our mission is to provide excellent, qualitative and
                        prompt professional services all the time at a very competitive price with an aim to be the
                        first preference amongst the entrepreneurs <span>our vision is to create a better daily life for the customers, merchants, franchise
                        partners and the employees of the company</span></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mission-right">
						<img src="{{  URL::asset('public/assets/images/mission1.jpg') }}" alt="" class="img-fluid">
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
				@php
			$service_row=DB::table('services')->get();
			@endphp
			@foreach ($service_row as $service_details)
			<div class="col-lg-4 col-md-6">
				<div class="service-box">
					<div class="service-content">
						<img src="{{ URL::asset('public/service_image/'.$service_details->image) }}" alt="" class="img-fluid">
						<span>{{$loop->iteration }}</span>
						<h3>{{ $service_details->service }}</h3>
						<p>{{ $service_details->description }}</p>
						<a href="{{ URL('/services') }}" title="" class="btn my-btn">read more</a>
					</div>
				</div>
			</div>
			@endforeach
				
				
			</div>
			</div>
		</div>
	</section>
	<section class="faq">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading-box">
						<h2>Frequently Asked Question</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-8">
					<div class="faq-inner">
						<div class="accordion" id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h2 class="mb-0">
										<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
											<i class="fa-solid fa-minus"></i> Every easy merchant 
										</button>
									</h2>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
									<div class="card-body">
									Every merchant have a web link and e-shop in hindkart platform</code> class.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h2 class="mb-0">
									<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<i class="fa-solid fa-plus"></i> Delivery service
									</button>
								</h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									Send or booking Product or package to your customer or relatives within the city in 60 mins with prepaid or COD.
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
								<h2 class="mb-0">
									<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<i class="fa-solid fa-plus"></i> TRANSPORTATION
									</button>
								</h2>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									Book a Bike, Toto, Auto, car instantly or hire any type of Commercial car to travel or urgent needs.You can register as a merchant also.
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-header" id="headingFour">
								<h2 class="mb-0">
									<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										<i class="fa-solid fa-plus"></i> Cash on delivery
									</button>
								</h2>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
								<div class="card-body">
									COD and Easy return Policy, Online and offline Support by our team. 
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-header" id="headingFive">
								<h2 class="mb-0">
									<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										<i class="fa-solid fa-plus"></i> Do I need to register on your site to book tickets?
									</button>
								</h2>
							</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
								<div class="card-body">
									No. You can use our service fully without the need to register. You just need to provide your details at the time of booking. 
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-header" id="headingSix">
								<h2 class="mb-0">
									<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
										<i class="fa-solid fa-plus"></i> What if the car doesn't show up?
									</button>
								</h2>
							</div>
							<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
								<div class="card-body">
									In case the vehicle you booked doesn't show up, we will offer you a full refund immediately.
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-header" id="headingSeven">
								<h2 class="mb-0">
									<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
										<i class="fa-solid fa-plus"></i> What if the car shows up late?
									</button>
								</h2>
							</div>
							<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
								<div class="card-body">
									We try our best to ensure our partners reach our customers on time. But in case of delays, do call us and we will help you out by either providing an alternate vehicle or giving you a full refund.
								</div>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="happy-cust">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="heading-box">
					<h2>happy clients</h2>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-lg-3 col-md-6">
				<div class="count-box">
					<h2><span class="counter">869</span>+</h2>
					<span>Projects Complete</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="count-box">
					<h2><span class="counter">317</span>+</h2>
					<span>Happy Customer</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="count-box">
					<h2><span class="counter">98</span>%</h2>
					<span>Success Rate</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="count-box">
					<h2><span class="counter">56</span>+</h2>
					<span>Awards</span>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="clients-say">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="heading-box">
					<h2>What Is clients say</h2>
				</div>
			</div>
		</div>
		<div class="client-slider">
			@php
			$client_row=DB::table('client_reviews')->get();
			@endphp
			@foreach ($client_row as $client_details)
			<div class="row align-items-center d-flex">
				<div class="col-md-2">
					<div class="client-img text-center">
						<img src="{{ URL::asset('public/banner_image/'.$client_details->image) }}" class="img-fluid d-block mx-auto">
					</div>
						<div class="client-info text-center">
							<h5>{{ $client_details->name }}</h5>
							<span>{{ $client_details->designation }}</span>
						</div>
				</div>
				<div class="col-md-10">
					<div class="client-box">
						<p>{{ $client_details->comment }}</p>
					</div>
				</div>
			</div>
			@endforeach
				
				
				
			</div>
	</div>
</section>


{{-- <section class="clients-say">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="heading-box">
					<h2>Meet With Our Team</h2>
				</div>
			</div>
		</div>
		<div class="client-slider">
		    
				<div class="row align-items-center d-flex">
					<div class="col-md-12">
						<div class="client-img text-center">
							<img src="{{  URL::asset('public/assets/images/t1.jpeg') }}" class="img-fluid d-block mx-auto">
						</div>
							<div class="client-info text-center">
								<h5>Mrs. Aarti Negi</h5>
								<span style="margin-bottom:10px;">Head of Tele calling Department.</span>
							</div>
					</div>
				</div>
				
				<div class="row align-items-center d-flex">
					<div class="col-md-12">
						<div class="client-img text-center">
							<img src="{{  URL::asset('public/assets/images/t2.jpeg') }}" class="img-fluid d-block mx-auto">
						</div>
						<div class="client-info text-center">
								<h5>Mr. Probir Biswas</h5>
								<span style="margin-bottom:10px;">Marketing Manager</span>
							</div>
					</div>
				</div>
				
				<div class="row align-items-center d-flex">
					<div class="col-md-12">
						<div class="client-img text-center">
							<img src="{{  URL::asset('public/assets/images/t3.jpeg') }}" class="img-fluid d-block mx-auto">
						</div>
						<div class="client-info text-center">
								<h5>Mr. Abhinash Agarwalla</h5>
								<span style="margin-bottom:10px;">Regional Manager</span>
							</div>
					</div>
				</div>
				
				<div class="row align-items-center d-flex">
					<div class="col-md-12">
						<div class="client-img text-center">
							<img src="{{  URL::asset('public/assets/images/t4.jpeg') }}" class="img-fluid d-block mx-auto">
						</div>
						<div class="client-info text-center">
								<h5>Mr. Imran Mondal</h5>
								<span style="margin-bottom:10px;">District Franchise</span>
							</div>
					</div>
				</div>
				
				<div class="row align-items-center d-flex">
					<div class="col-md-12">
						<div class="client-img text-center">
							<img src="{{  URL::asset('public/assets/images/t5.jpeg') }}" class="img-fluid d-block mx-auto">
						</div>
						<div class="client-info text-center">
								<h5>Mr. Goutam Das</h5>
								<span style="margin-bottom:10px;">Block Franchise</span>
							</div>
					</div>
				</div>
				
				<div class="row align-items-center d-flex">
					<div class="col-md-12">
						<div class="client-img text-center">
							<img src="{{  URL::asset('public/assets/images/t6.jpeg') }}" class="img-fluid d-block mx-auto">
						</div>
						<div class="client-info text-center">
								<h5>Mr. Partha Biswas</h5>
								<span style="margin-bottom:10px;">Back office Staff</span>
							</div>
					</div>
				</div>
				
			</div>
	</div>
</section> --}}

<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="heading-box">
					<h2>contact us</h2>
				</div>
			</div>
		</div>
		<div class="row mt-md-5 align-items-center">
			<div class="col-md-6">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29368.915441609326!2d88.74803636705165!3d23.056266007295413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8cb11828b28fb%3A0x1a789fcb8a430b06!2sGopalnagar%2C%20West%20Bengal%20743262!5e0!3m2!1sen!2sin!4v1674361708721!5m2!1sen!2sin" style="border:0; width: 100%; height: 450px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contact-form">
					<form action="{{ URL('/submit_contact') }}" method="POST">
						@csrf
						<div class="form-group">
							<label>name *</label>
							<input type="text" name="name" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>email *</label>
							<input type="email" name="email" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Phone No *</label>
							<input type="tel" name="phone" class="form-control"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" onkeypress="if(this.value.length==10) return false;"  required="">
						</div>
						<div class="form-group">
							<label>message *</label>
							<textarea class="form-control" name="message" required=""></textarea>
						</div>
						<button class="btn my-btn text-white mt-4">send message</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@include("frontend.include.footer")
</body>
</html>