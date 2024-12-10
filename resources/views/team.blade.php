@extends('master')
@section('content')

@if(session('error'))
{{ session('error') }}
@endif
<section id="center" class="centre_o  pt-5 pb-5">
 <div class="container-xl">
  <div class="row centre_o1">
  </div>
 </div>
</section>
 </div>
</div>
<section id="team" class="p_3 mb-5">
 <div class="container-xl">
  <div class="team_1 row">
	@foreach ($designers as $designer)
   <div class="col-md-3 col-sm-6">
    <div class="team_1im">
	    <div class="team_1im1 position-relative">
	     <div class="team_1im1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href=""><img src="upload/{{$designer->image}}" height="250px" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		 </div>


	    </div>
		<div class="team_1im2 text-center shadow_box p-4">
		 <h6 class="text-muted">{{$designer->category_name}} <span> Specialist </span> </h6>
		 <h5 class="mb-3">{{$designer->fname}}</h5>
		  <a href="{{url('profile',$designer->id)}}" class="btn button_2">View Profile</a>
		</div>
	</div>
   </div>
   @endforeach
  </div>
 </div>
</section>
@endsection
