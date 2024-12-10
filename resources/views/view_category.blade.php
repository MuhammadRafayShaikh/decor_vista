@extends('master')
@section('content')

<br><br><br>
    <section id="list" class="p_3">
        <div class="container-xl">
         <div class="row serv_h1 mb-4">
            <div class="col-md-12">
             <h1 class="mb-0 font_50">Latest Products Of {{ $category->c_name}} </h1>
             <hr class="mb-0 line">
            </div>
         </div>
        <div class="shop_1r1 row">
               @foreach ($products as $prod)
               <div class="col-md-3 col-sm-6">
                <div class="shop_1r1l border_1">
                  <div class="shop_1r1l1 position-relative">
                    <div class="shop_1r1l1i">
                      <div class="grid clearfix">
                         <figure class="effect-jazz mb-0">
                           <a href=""><img src="{{ asset('product/' . $prod->p_image) }}" width="100%" height="200px" alt="{{ $prod->name }}">
                           </a>
                         </figure>
                     </div>
                    </div>
                    <div class="shop_1r1l1i1 position-absolute top-0 text-end w-100 p-4 h-100">
                      <ul class="mb-0">
                       <li><a class="border_1 rounded-circle text-center" href="detail.html"><i class="fa fa-heart-o"></i></a></li>
                        <li class="mt-2"><a class="border_1 rounded-circle text-center" href="detail.html"><i class="fa fa-eye"></i></a></li>
                         <li class="mt-2"><a class="border_1 rounded-circle text-center" href="detail.html"><i class="fa fa-share-alt"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="shop_1r1l2 text-center p-4">
                  <h6 class="fw-bold mt-2"><a href="">{{$prod->category->c_name}}</a></h6>
                   <h5 class="fw-bold mt-2"><a href="">{{$prod->p_name}}</a></h5>
                   <h2 class="col_brow">${{$prod->p_price}}</h2>
                   <h6 class="mb-0 mt-3"><a class="button_1 px-4" href="{{url('view',$prod->id)}}">Read More <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
                  </div>
                </div>
               </div>

              @endforeach
        </div>

       </section>

@endsection
