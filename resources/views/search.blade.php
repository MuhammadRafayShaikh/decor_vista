@extends('master')
@section('content')

 <br><br><br>
<section id="list" class="p_3">
 <div class="container-xl">
  <div class="row serv_h1 mb-4">
     <div class="col-md-12">
	  <h1 class="mb-0 font_50">Search Products</h1>
      <div class="col-md-6">
	<div class="form-group">
		<form action="{{url('search')}}" role="search" method="get">
			<div class="input-group">
				<input class="form-control" name="search" value="" placeholder="Search...">
				<button type="submit" class="btn button_2">Search</button>
			</div>
		</form>
	</div>
  </div>
	  <hr class="mb-0 line">
	 </div>
  </div>
 <div class="shop_1r1 row">
		@foreach ($searchpro as $prod)
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
			    <li><a class="border_1 rounded-circle text-center" href=""><i class="fa fa-heart-o"></i></a></li>
				 <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{url('view',$prod->id)}}"><i class="fa fa-eye"></i></a></li>
                 @if ($prod->quantity > 0)
				  <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{ route('cart.store', $prod->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                  @endif
			   </ul>
			 </div>
		   </div>
		   <div class="shop_1r1l2 text-center p-4">
		    <span class="col_brow font_14">
			 <i class="fa fa-star"></i>
			 <i class="fa fa-star"></i>
			 <i class="fa fa-star"></i>
			 <i class="fa fa-star"></i>
			 <i class="fa fa-star"></i>
			</span>
		    <h5 class="fw-bold mt-2"><a href="">{{$prod->p_name}}</a></h5>
			<h5 class="fw-bold mt-2"><a href="">Quantity {{$prod->quantity}}</a></h5>
			<h2 class="col_brow">{{$prod->p_price}}</h2>
			<h6 class="mb-0 mt-3"><a class="button_1 px-4" href="{{url('view',$prod->id)}}">Read More <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
		   </div>
		 </div>
		</div>

	   @endforeach
 </div>

</section>

@endsection
