@extends('layout.front')

@section('title', 'Frego Ride')

@section('style')
<style>
	/* banner section	*/
	.banner img {
		border-radius: 25px;
	}
	/* simple process	*/
    .simple-process {
	    background-image: url({{ asset('uploads/banner-3.jpg') }}); /* Replace with your image URL */
	    background-size: cover;
	    background-position: center;
	    background-repeat: no-repeat;
	    color: white; /* Ensure text is readable over the background */
	    position: relative;
	    z-index: 1;
	}

	.simple-process::before {
	    content: "";
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background-color: rgba(0, 0, 0, 0.5); /* Adds a dark overlay for better text visibility */
	    z-index: -1;
	}

	.simple-process h2 {
	    color: #ffcc00; /* Yellow color for 'How It Works' */
	}

	.simple-process h3 {
	    font-size: 2.5rem;
	    font-weight: bold;
	    color: white;
	}

	.process-box {
	    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white box */
	    border-radius: 10px;
	    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
	    color: #333; /* Change the text color inside the box */
	    position: relative;
	    z-index: 1;
	}

	.process-box img {
	    width: 80px;
	    height: auto;
	}

	.process-box h4 {
	    font-size: 1.5rem;
	    font-weight: bold;
	    margin-top: 10px;
	}

	.process-box p {
	    color: #666;
	    font-size: 1rem;
	    line-height: 1.5;
	}

	/* 3rd section	*/
	.order-247 {
	    background-color: #f8f9fa; /* Light grey background */
	}

	.order-247 h6 {
	    letter-spacing: 2px;
	    font-weight: bold;
	}

	.order-247 h1 {
	    font-size: 2.5rem;
	    font-weight: bold;
	    line-height: 1.2;
	    color: #333;
	}

	.order-247 p {
	    font-size: 1rem;
	    color: #666;
	}

	.order-247 .btn-warning {
	    background-color: #ffcc00;
	    color: #333;
	    border: none;
	}

	.order-247 .btn-dark {
	    background-color: #333;
	    color: white;
	    border: none;
	}

	.order-247 .img-fluid {
	    max-width: 100%;
	    height: auto;
	    object-fit: cover;
	}

	/* restaurants section	*/

	.logos-section img {
	    max-width: 100%;
	    height: auto;
	}

	.logos-section h6 {
	    font-size: 1rem;
	    font-weight: bold;
	    margin-top: 10px;
	    color: #333;
	}

	@media (max-width: 576px) {
	    .logos-section img {
	        max-width: 80px; /* Reduce size of logos for small devices */
	    }
	}

	/* healthy food section	*/

	.healthy-foods h1 {
	    font-size: 2.5rem;
	    line-height: 1.2;
	}

	.healthy-foods .btn-danger {
	    background-color: #e74c3c;
	    color: white;
	    border: none;
	}

	.healthy-foods ul {
	    padding-left: 0;
	}

	.healthy-foods ul li {
	    font-size: 1.2rem;
	    color: #333;
	}

	.healthy-foods ul li i {
	    margin-right: 10px;
	    font-size: 1.5rem;
	}

	/* Media query to adjust layout on smaller screens */
	@media (max-width: 768px) {
	    .healthy-foods .d-flex {
	        flex-direction: column;
	        align-items: center;
	    }

	    .healthy-foods img {
	        max-width: 100%;
	        margin-bottom: 20px;
	    }

	    .healthy-foods ul {
	        text-align: center;
	    }
	}
</style>
@endsection

@section('content')
<div class="banner container-fluid my-5">
	<div class="row">
		<div class="col-sm-6 d-flex flex-column justify-content-center">
			<h1 class="text-uppercase text-warning mb-3">Frego Ride</h1>
			<h2 class="mb-3">The food you love</h2>
			<form class="d-flex" action="" method="POST">
				@csrf
				<input type="text" class="form-control" placeholder="Your address" required>
				{{-- <button type="submit" class="btn btn-primary ml-3">Find</button> --}}
				<a href="{{ route('website.foods') }}" class="btn btn-primary ml-3">Find</a>
			</form>
		</div>
		<div class="col-sm-6">
			<img class="w-100 rounded rounded-lg" src="{{ asset('uploads/banner-1.jpg') }}" alt="Banner Image">
		</div>
	</div>
</div>
<section class="simple-process text-center py-5">
    <div class="container">
        <h2 class="text-uppercase mb-4">How It Works</h2>
        <h3 class="mb-5">Simple Process</h3>
        <div class="row">
            <!-- Your Order Section -->
            <div class="col-md-4 mb-3">
                <div class="process-box p-4">
                    <img src="{{ asset('uploads/checklist.png') }}" alt="Your Order Icon" class="mb-3">
                    <h4>Your Order</h4>
                    <p>Thank you for being a valued customer. We are so grateful to serve our honored clients and hope to continue meeting your needs.</p>
                </div>
            </div>

            <!-- Cash On Delivery Section -->
            <div class="col-md-4 mb-3">
                <div class="process-box p-4">
                    <img src="{{ asset('uploads/salary.png') }}" alt="Cash On Delivery Icon" class="mb-3">
                    <h4>Cash On Delivery</h4>
                    <p>Online food delivery with Food Foodota. We appreciate your business and strive to continue delivering the best service.</p>
                </div>
            </div>

            <!-- Receive Order Section -->
            <div class="col-md-4 mb-3">
                <div class="process-box p-4">
                    <img src="{{ asset('uploads/box.png') }}" alt="Receive Order Icon" class="mb-3">
                    <h4>Receive Order</h4>
                    <p>We truly appreciate your business and trust. We sincerely hope you are satisfied with our service.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="order-247 py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Section -->
            <div class="col-md-6 mb-5">
                <h6 class="text-uppercase text-warning mb-3">Dine In or Take Away</h6>
                <h1 class="display-4 font-weight-bold">Get Your Order 24/7 Right At Your Doorsteps</h1>
                <p class="mt-4">Plant-based diets may offer an advantage over those that are not plant-based with respect to prevention and management of diabetes. The Adventist health studies found that vegetarians have approximately half the risk of developing diabetes.</p>
                
                <div class="mt-4">
                    <a href="#" class="btn btn-warning btn-lg me-3">Order Food</a>
                    <a href="#" class="btn btn-dark btn-lg">Search Now</a>
                </div>
            </div>

            <!-- Right Column: Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('uploads/Online-delivery-1.png') }}" alt="Delivery Scooter" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="logos-section py-5">
    <div class="container">
    	<h2 class="text-center mb-5 font-weight-bold">Our Restaurants</h2>
        <div class="row text-center justify-content-center">
        	@foreach($restaurants as $restaurant)
	            <div class="col-6 col-md-2">
	                <img src="{{ asset('uploads/restaurants/' . $restaurant->photo) }}" alt="Chef Ganteng" class="img-fluid mb-2">
	                <h6>{{ $restaurant->name }}</h6>
	            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="healthy-foods border-top py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Section -->
            <div class="col-md-6">
                <h1 class="font-weight-bold">Healthy and tasty foods <br>with <span class="text-success">natural ingredients</span></h1>
                <p class="mt-4">Quisque pretium dolor turpis, quis blandit turpis semper ut. Nam malesuada eros nec luctus laoreet. Fusce sodales consequat velit eget dictum. Integer ornare magna vitae ex eleifend congue.</p>
                <a href="#" class="btn btn-danger btn-lg mt-3">Read more</a>
            </div>

            <!-- Right Column: Image and Benefits List -->
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="{{ asset('uploads/health-bottle-cut.jpg') }}" alt="Healthy Food" class="img-fluid">
                    <ul class="list-unstyled ml-5">
                        <li class="mb-3"><i class="text-success fa fa-check-circle"></i> Reduces weight</li>
                        <li class="mb-3"><i class="text-success fa fa-check-circle"></i> Exact calorie content</li>
                        <li class="mb-3"><i class="text-success fa fa-check-circle"></i> Improves health</li>
                        <li class="mb-3"><i class="text-success fa fa-check-circle"></i> No sugar and gluten</li>
                        <li class="mb-3"><i class="text-success fa fa-check-circle"></i> Adds strength and energy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    
</script>
@endsection