<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        .tbdesign{
            width: 100rem;
            text-align: center;
            border: 2px solid yellowgreen;

            margin: auto;
            margin-top: 50px;
        }
        th{
            background-color: skyblue;
            color: #fff;
            font-size: 20px;
            font-weight: bold;

            padding: 15px;
        }
        td{
            color: #fff;
            border: 1px solid skyblue;

            padding: 10px;
        }
        input[type="search"]{
            width: 500px;
            height: 40px;
            border: none;
            outline: none;
        }
        input[type="search"]:focus{
          border: 2px solid blue;
        }

    </style>

  </head>
  <body>
    
        @include('admin.header')

        <!-- Sidebar Navigation-->
        @include('admin.sidebar') 
        <!-- Sidebar Navigation end-->
        
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{url('product_search')}}" method="GET" class="d-flex justify-content-center align-items-center p-0 mt-5">
              @csrf
              <input type="search" name="search" class="fa-solid fa-magnifying-glass mr-2" autocomplete="off" autofocus />
              <input type="submit" value="search" class="btn btn-secondary" />
            </form>

            <div class="d-flex justify-content-center align-items-center mt-5">
                <table class="tbdesign">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{!!Str::limit($product->description,20)!!}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>

                        <td>
                            <img src="products/{{$product->image}}" width="100" height="100" />
                        </td>

                          <td><a class="btn btn-success" href="{{url('update_product',$product->slug)}}">Edit</a></td>

                        <td><a class="btn btn-danger" href="{{url('delete_product',$product->id)}}"  onclick="confirmation(event)">Delete</a></td>
                    </tr>
                    @endforeach

                </table>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                {{$products->onEachSide(1)->links()}}
            </div>

          </div>
      </div>
    </div>

    @include('admin.js');
    
  </body>
</html>