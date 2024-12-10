@extends('master')
@section('content')
<br><br><br>
<section id="list" class="p_3">
 <div class="container-xl">
  <div class="row serv_h1 mb-4">
     <div class="col-md-12">
	  <h1 class="mb-0 font_50">Latest Products</h1>
	  <hr class="mb-0 line">
	 </div>
  </div>

  <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <form id="searchForm" role="search" method="get">
            <div class="input-group">
              <input class="form-control" name="search" id="search" placeholder="Search Product Here">
              <button type="submit" class="btn button_2">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <select class="form-select" name="category" id="category">
            <option value="">Search By Category</option>
            @foreach ($category as $categori)
              <option value="{{ $categori['id'] }}">{{ $categori->c_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="middle">
          <div class="multi-range-slider	">
            <select name="sort_by" id="sort_by" class="form-control form-select">
              <option value="">Sort By Price</option>
              <option value="highest_price">Highest Price</option>
              <option value="lowest_price">Lowest Price</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="shop_1r1 row" id="productList">
    @foreach ($product as $prod)
      <div class="col-md-3 col-sm-6 mt-3">
        <div class="card border_1">
          <div class="position-relative">
            <a href=""><img src="product/{{ $prod->p_image }}" class="card-img-top" alt="Product Image" height="200px"></a>
            <div class="shop_1r1l1i1 position-absolute top-0 text-end w-100 p-2">
              <ul class="mb-0">
                <li><a class="border_1 rounded-circle text-center" href=""><i class="fa fa-heart-o"></i></a></li>
                <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{ url('view', $prod->id) }}"><i class="fa fa-eye"></i></a></li>
                @if ($prod->quantity > 0)
                  <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{ route('cart.store', $prod->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                @endif
              </ul>
            </div>
          </div>
          <div class="card-body text-center">
          <h6 class="fw-bold mt-2"><a href="">{{$prod->category->c_name}}</a></h6>
          <h5 class="fw-bold mt-2"><a href="">{{ $prod->p_name }}</a></h5>
            <h2 class="col_brow">${{ $prod->p_price }}</h2>
            <h6 class="mb-0 mt-3"><a class="button_1 px-4" href="{{ url('view', $prod->id) }}">Read More <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>

<script>
  $(document).ready(function() {
    // Handle category change for filtering products
    $("#category").on('change', function() {
        fetchProducts();
    });

    // Handle search form submission
    $("#searchForm").on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        fetchProducts();
    });

    // Handle sort by change
    $("#sort_by").on('change', function() {
        fetchProducts();
    });

    // Function to fetch products based on selected filters
    function fetchProducts() {
        var searchQuery = $("#search").val();
        var category = $("#category").val();
        var sortBy = $("#sort_by").val();

        $.ajax({
            url: "{{ url('search') }}",
            type: "GET",
            data: {
                'search': searchQuery,
                'category': category,
                'sort_by': sortBy // Add sort_by parameter
            },
            success: function(data) {
                updateProductList(data.products);
            }
        });
    }

    // Function to update the product list
    function updateProductList(products) {
        var html = '';
        if (products.length > 0) {
            for (let i = 0; i < products.length; i++) {
                html += '<div class="col-md-3 col-sm-6 mt-3">\
                            <div class="card border_1">\
                                <div class="position-relative">\
                                    <a href=""><img src="product/' + products[i]['p_image'] + '" class="card-img-top" alt="Product Image" height="200px"></a>\
                                    <div class="shop_1r1l1i1 position-absolute top-0 text-end w-100 p-2">\
                                        <ul class="mb-0">\
                                            <li><a class="border_1 rounded-circle text-center" href=""><i class="fa fa-heart-o"></i></a></li>\
                                            <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{ url('view') }}/' + products[i]['id'] + '"><i class="fa fa-eye"></i></a></li>\
                                            <li class="mt-2"><a class="border_1 rounded-circle text-center" href="{{ route('cart.store', '') }}/' + products[i]['id'] + '"><i class="fa fa-shopping-cart"></i></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                                <div class="card-body text-center">\
                                    \
                                    <h5 class="fw-bold mt-2"><a href="">' + products[i]['p_name'] + '</a></h5>\
                                    <h5 class="fw-bold mt-2"><a href="">Stock ' + products[i]['quantity'] + '</a></h5>\
                                    <h2 class="col_brow">' + products[i]['p_price'] + '</h2>\
                                    <h6 class="mb-0 mt-3"><a class="button_1 px-4" href="{{ url('view') }}/' + products[i]['id'] + '">Read More <i class="fa fa-long-arrow-right ms-1"></i></a></h6>\
                                </div>\
                            </div>\
                        </div>';
            }
        } else {
            html += '<div class="col-md-12">\
                        <p>No Products Found</p>\
                    </div>';
        }
        $("#productList").html(html);
    }
});
</script>
@endsection
