@extends('master')
@section('content')
<div class="main_2">
    <section id="center" class="center_home">
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('img/1.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
       <h5 class="text-uppercase col_light">Welcome to wood work</h5>
	   <h1 class="mt-3 mb-3">Beautifully Crafted, <br> Designed to Last</h1>
	   <p>Ac mi duis mollis. Sapiente? Scelerisque quae, penatibus? Suscipit class corporis nostra rem quos <br>
voluptatibus habitant? Fames, vivamus minim nemo enim, gravida lobortis quasi, eum.</p>

      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/2.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
       <h5 class="text-uppercase col_light">Welcome to wood work</h5>
	   <h1 class="mt-3 mb-3">Beautifully Crafted ,  <br> Sit Dolor Amet</h1>
	   <p>Ac mi duis mollis. Sapiente? Scelerisque quae, penatibus? Suscipit class corporis nostra rem quos <br>
voluptatibus habitant? Fames, vivamus minim nemo enim, gravida lobortis quasi, eum.</p>

      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/3.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
       <h5 class="text-uppercase col_light">Welcome to wood work</h5>
	   <h1 class="mt-3 mb-3">Sed Augue, <br> Nulla Quis Porta</h1>
	   <p>Ac mi duis mollis. Sapiente? Scelerisque quae, penatibus? Suscipit class corporis nostra rem quos <br>
voluptatibus habitant? Fames, vivamus minim nemo enim, gravida lobortis quasi, eum.</p>

      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
 </div>
</div>

<section id="about_h" class="p_3">
 <div class="container-xl">
  <div class="row about_h1">
    <div class="col-md-6">
	  <div class="about_h1l">
	    <h1 class="font_50">Premium Flooring</h1>
		<p class="mt-3">We are committed to providing our customers with super exceptional service while offering our employees the best training and a working environment in which they can excel best of all place for more than a half century.</p>
		<p>This company focus has been in place for more than a half century. We are committed to providing our customers with exceptional service while offering our employees the best training best of all and a working environment.</p>
		<h6 class="mb-0 mt-4"><a class="button_1" href="{{url('products')}}">Find more</a></h6>
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="about_h1r position-relative">
	     <div class="about_h1ri text-end">
		   <img alt="abc" src="img/4.jpg" height="400px">
		 </div>
		 <div class="about_h1ri1 position-absolute">
		    <img alt="abc" src="img/5.jpg" height="500px" >
		 </div>
	  </div>
	</div>
  </div>
 </div>
</section>
<section id="proj" class="pb-4 bg-dark">
 <div class="container-fluid">
  <div class="row proj_1">
    <div class="col-md-4 p-0">
	  <div class="proj_1l position-relative">
	   <div class="proj_1l1">
	     <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/6.jpg" class="w-100" alt="abc" height="640px"></a>
				  </figure>
			  </div>
	  </div>
	  <div class="proj_1l2 bg_back px-4  position-absolute w-100 h-100 top-0">
	    <h3><a class="text-white" href="#">Swedish Mega Project</a></h3>
		<h6 class="text-uppercase mb-0 text-light">DESIGN INTERIOR OFFICE</h6>
	  </div>
	  <div class="proj_1l3 px-4 bg_back  position-absolute">
	     <h3><a class="text-white" href="#">Swedish Mega Project</a></h3>
		<h6 class="text-uppercase mb-0 text-light">DESIGN INTERIOR OFFICE</h6>
	  </div>
	  </div>
	</div>
	<div class="col-md-4 p-0">
	  <div class="proj_1l position-relative">
	   <div class="proj_1l1">
	     <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/7.jpg" class="w-100" alt="abc" height="640px"></a>
				  </figure>
			  </div>
	  </div>
	  <div class="proj_1l2 bg_back px-4  position-absolute w-100 h-100 top-0">
	    <h3><a class="text-white" href="#">So to deliberately render</a></h3>
		<h6 class="text-uppercase mb-0 text-light">DESIGN INTERIOR</h6>
	  </div>
	  <div class="proj_1l3 px-4 bg_back  position-absolute">
	     <h3><a class="text-white" href="#">So to deliberately render</a></h3>
		<h6 class="text-uppercase mb-0 text-light">DESIGN INTERIOR</h6>
	  </div>
	  </div>
	</div>
	<div class="col-md-4 p-0">
	  <div class="proj_1l position-relative">
	   <div class="proj_1l1">
	     <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/8.jpg" class="w-100" alt="abc" height="640px"></a>
				  </figure>
			  </div>
	  </div>
	  <div class="proj_1l2 bg_back px-4  position-absolute w-100 h-100 top-0">
	    <h3><a class="text-white" href="#">Frozen Trees In A Lake</a></h3>
		<h6 class="text-uppercase mb-0 text-light">INTERIOR OFFICE</h6>
	  </div>
	  <div class="proj_1l3 px-4 bg_back  position-absolute">
	     <h3><a class="text-white" href="#">Frozen Trees In A Lake</a></h3>
		<h6 class="text-uppercase mb-0 text-light">INTERIOR OFFICE</h6>
	  </div>
	  </div>
	</div>
  </div>
  <div class="row proj_2 mt-4 text-center">
   <div class="col-md-12">
     <h6 class="mb-0"><a class="button" href="{{url('products')}}">Find more</a></h6>
   </div>
  </div>
 </div>
</section>
<section id="serv_h" class="p_3">
 <div class="container-xl">
  <div class="row serv_h1 mb-4">
     <div class="col-md-12">
	  <h1 class="mb-0 font_50">All Categories</h1>
	  <hr class="mb-0 line">
	 </div>
  </div>
  <div class="row about_pgo">
  @foreach ($category as $cate)
  <div class="col-md-3 mt-3">
	 <div class="about_pgoi p-5 px-4 border_1">
		<a href="{{ url('view_category/'.$cate->id) }}">
	  <img src="category/{{$cate->c_image}}" width="100px" alt="abc" height="100px">
	  <h6 class="mt-3 fs-5 fw-bold">{{$cate->c_name}}</h6>
	</a>
	 </div>
	</div>
	@endforeach
  </div>
 </div>
</section>
<section id="fact">
<div class="fact_m bg_back1 pt-5 pb-5">
 <div class="container-xl">
 <div class="row fact_1 text-center mb-4">
   <div class="col-md-12">
    <h1 class="text-white font_50">Interesting facts</h1>
	<hr class="line mx-auto mb-40">
   </div>
 </div>
 <div class="row exep_2">
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i text-center">
	  <span class="font_60 col_light lh-1"><i class="fa fa-user"></i></span>
	  <h1 class="text-white mt-3"> 1480 </h1>
	  <h6 class="mb-0 text-white">Happy Customers</h6>
	</div>
   </div>
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i text-center">
	  <span class="font_60 col_light lh-1"><i class="fa fa-thumbs-o-up"></i></span>
	  <h1 class="text-white mt-3"> 1764 </h1>
	  <h6 class="mb-0 text-white">Peoples Likes</h6>
	</div>
   </div>
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i  text-center">
	  <span class="font_60 col_light lh-1"><i class="fa fa-trophy"></i></span>
	  <h1 class="text-white mt-3"> 1180 </h1>
	  <h6 class="mb-0 text-white">Awards Achieved</h6>
	</div>
   </div>
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i  text-center">
	  <span class="font_60 col_light lh-1"><i class="fa fa-briefcase"></i></span>
	  <h1 class="text-white mt-3"> 36 </h1>
	  <h6 class="mb-0 text-white">Experiences</h6>
	</div>
   </div>
  </div>
</div>
</div>
</section>
<section id="list" class="p_3">
 <div class="container-xl">
  <div class="row serv_h1 mb-4">
     <div class="col-md-12">
	  <h1 class="mb-0 font_50">Latest Products</h1>
	  <hr class="mb-0 line">
	 </div>
  </div>
 <div class="shop_1r1 row">
		@foreach ($product as $prod)
		<div class="col-md-3 col-sm-6 mt-3">
		 <div class="shop_1r1l border_1">
		   <div class="shop_1r1l1 position-relative">
		     <div class="shop_1r1l1i">
			   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href=""><img src="product/{{$prod->p_image}}" class="w-100" alt="abc" height="200px"></a>
				  </figure>
			  </div>
			 </div>
			 <div class="shop_1r1l1i1 position-absolute top-0 text-end w-100 p-4 h-100">
			   <ul class="mb-0">
				 <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{url('view',$prod->id)}}"><i class="fa fa-eye"></i></a></li>
                 @if ($prod->quantity > 0)
				  <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{ route('cart.store', $prod->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                  @endif
			   </ul>
			 </div>
		   </div>
		   <div class="shop_1r1l2 text-center p-4">
		    <h5 class="fw-bold mt-2"><a href="">{{$prod->p_name}}</a></h5>
			<h2 class="col_brow">${{$prod->p_price}}</h2>
			<h6 class="mb-0 mt-3"><a class="button_1 px-4" href="{{url('view',$prod->id)}}">Read More <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
		   </div>
		 </div>
		</div>
	   @endforeach
 </div>

</section>
<section id="find">
 <div class="container-fluid">
   <div class="find_m position-relative">
     <div class="find_m1">
	   <div class="row find_1">
     <div class="col-md-8 p-0">
	   <div class="find_1l">
	     <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="img/18.jpg" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	   </div>
	 </div>
	 <div class="col-md-4 p-0">
	   <div class="find_1r"></div>
	 </div>
   </div>
	 </div>
	  <div class="find_m2 position-absolute w-100">
	    <div class="row find_2">
     <div class="col-md-8">
	   <div class="find_2l">

	   </div>
	 </div>
	 <div class="col-md-4">
	   <div class="find_2r bg-dark">
	     <h1 class="text-white">Best Premium Flooring</h1>
		 <p class="text-light mt-3">Parkett als Landhausdielen bringen mit ihrer ruhigen und edlen oder rustikalen Ausstrahlung eine besondere Atmosphäre in Ihr Zuhause. Der natürliche Charakter entsteht durch großzügige Formate. Eine wahlweise glatte, gebürstete oder gehobelte</p>
		 <h6 class="mb-0 mt-4"><a class="button" href="{{url('products')}}">Find more</a></h6>
	   </div>
	 </div>
   </div>
	  </div>
   </div>
 </div>
</section>
@endsection
