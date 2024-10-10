<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    <!-- end header section -->
  </div>
  <!-- end hero area -->



  <!-- Start Product Details -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">


        <div class="col-md-12 col-sm-6">
          <div class="box">

              <div class="d-flex justify-content-center align-items-center p-4">
                <img src="/products/{{$datas->image}}" width="350" alt="">
              </div>

              <div class="detail-box p-3">
                <h6>{{$datas->title}}</h6>
                <h6>Price :  
                  <span>${{$datas->price}}</span>
                </h6>
              </div>

              <div class="detail-box p-3">
                <h6>Category : {{$datas->category}}</h6>
                <h6>Available Quantity :  
                  <span>{{$datas->quantity}}</span>
                </h6>
              </div>

              <div class="detail-box p-3">
                  <p>{{$datas->description}}</p>
              </div>

          </div>
        </div>
    </div>

  </section>

  <!-- End Product Details -->


  
  <!-- info section -->
        @include('home.info')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>