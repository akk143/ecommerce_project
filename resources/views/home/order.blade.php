<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    @include('home.css')

    <style>

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

    </style>
</head>
<body>

    <div class="hero_area">
        <!-- header section strats -->
            @include('home.header')
        <!-- end header section -->

        <div class="d-flex justify-content-center align-items-center p-3">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Delivery Status</th>
                </tr>

                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>
                            <img src="/products/{{$order->product->image}}" width="100" />
                        </td>
                        <td>{{$order->status}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

      </div>

    <!-- info section -->
        @include('home.info')
    <!-- end info section -->

</body>
</html>