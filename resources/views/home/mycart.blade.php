<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">

        table{
            width: 800px;
            border: 2px solid #000;
            text-align: center;

            margin: 10px;
        }
        th{
            font-size: 20px;
            font-weight: bold;

            background: steelblue;
            color: #fff;
            border: 2px solid #000;
            letter-spacing: 0.8px;

            padding: 5px 20px;
        }
        td{
            font-size: 18px;
            font-weight: 400;
            border: 2px solid #000;
        }
        form{
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 1.3px 1.5px rgba(0,0,0,.3);

            padding: 20px;
            margin: 20px;
        }
        form label{
            width: 150px;
            display: inline-block;
            font-weight: bold;
        }
        .form-group{
            margin-bottom: 15px;
        }

    </style>
</head>

<body>
  <div class="hero_area">

    <!-- header section strats -->
        @include('home.header')
    <!-- end header section -->

  </div>


    <div class="d-flex justify-content-center align-items-center p-3 m-5">

    <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>

        
        <?php
            $value = 0;
        ?>

        @foreach ($carts as $cart)

            <tr>
                <td>{{$cart->product->title}}</td>
                <td>$ {{$cart->product->price}}</td>

                <td>
                    <img src="/products/{{$cart->product->image}}" width="120" height="auto" style="margin: 3px 0px;" />
                </td>

                <td>
                    <a href="{{url('delete_cart',$cart->id)}}" class="btn btn-danger">Remove</a>
                </td>
            </tr>

            <?php
                $value = $value + $cart->product->price;
            ?>
        @endforeach

    </table>
    </div>

    <div style="text-align: center; margin-bottom: 30px;">
        <h3>Total Value of Cart is : ${{$value}}</h3>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <form action="{{url('confirm_order')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Receiver Name</label>
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" />
                </div>
    
                <div class="form-group">
                    <label>Receiver Address</label>
                    <textarea class="form-control" name="address">{{Auth::user()->address}}</textarea>
                </div>
    
                <div class="form-group">
                    <label>Receiver Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" />
                </div>
    
                <div class="form-group">
                    <input type="submit" name="submit" value="Cash On Delivery" class="btn btn-primary" />
                    <a href="{{url('stripe',$value)}}" class="btn btn-success">Pay Using Card</a>
                </div>
            </form>
        </div>
    </div>

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