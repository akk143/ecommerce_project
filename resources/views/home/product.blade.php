<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

        @foreach($products as $product)

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">

              <div class="img-box">
                <img src="products/{{$product->image}}" alt="">
              </div>

              <div class="detail-box">
                <h6>{{$product->title}}</h6>
                <h6>Price :  
                  <span>${{$product->price}}</span>
                </h6>
              </div>

              <div class="d-flex justify-content-center p-2">
                <a href="{{url('product_details',$product->id)}}" class="btn btn-danger text-white mr-3">Details</a>
                <a href="{{url('add_cart',$product->id)}}" class=" btn btn-primary text-white">Add to Cart</a>
              </div>


          </div>
        </div>

        @endforeach

    </div>
  </section>