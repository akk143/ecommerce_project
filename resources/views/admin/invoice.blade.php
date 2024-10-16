<!DOCTYPE html>
<html>
<head>
    <title>Document</title>

    <style>

        .center-text {
            text-align: center;

        }

    </style>

</head>
<body>

    <div class="center-text">

        <h3>Customer Name: {{$data->name}}</h3>
        <h3>Customer Address: {{$data->rec_address}}</h3>
        <h3>Customer Phone: {{$data->phone}}</h3>
        <h2>Product Title: {{$data->product->title}}</h2>
        <h2>Price: {{$data->product->price}}</h2>

        <img src="products/{{$data->product->image}}" width="150" />

    </div>
    
</body>
</html>