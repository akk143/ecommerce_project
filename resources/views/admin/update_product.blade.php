<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

        label{
            width: 200px;
            font-size: 20px;
            color: #fff !important;

            display: inline-block;
        }
        input[type='text']{
            width: 350px;
            height: 40px;
        }
        textarea{
            width: 450px;
            height: 80px;
        }
        form div{
            padding: 15px;
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

            <h1 class="text-white">Update Products</h1>

            <div class="d-flex justify-content-center align-items-center">

            <form action="{{url('edit_product',$datas->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
                  
                <div>
                  <label for="title">Product Title</label>
                  <input type="text" name="title" value="{{$datas->title}}" />
                </div>
          
                <div>
                  <label for="description">Description</label>
                  <textarea name="description">{{$datas->description}}</textarea>
                </div>
          
                <div>
                  <label for="price">Price</label>
                    <input type="text" name="price" value="{{$datas->price}}" />
                </div>
          
                  <div>
                    <label for="qty">Quantity</label>
                    <input type="number" name="quantity" value="{{$datas->quantity}}" />
                </div>

                <div>
                  <label for="category">Product Category</label>
                  <select name="category">
                    <option value="{{$datas->category}}">{{$datas->category}}</option>

                    @foreach ($categories as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
                
            
                <div>
                    <label>Current Image</label>
                    <img src="/products/{{$datas->image}}" width="100" height="100" />
                </div>

                <div>
                  <label for="newimg">New Image</label>
                  <input type="file" name="newimg" />
                </div>
        
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Update Product" class="btn btn-success rounded-2" />
                </div>

            </form>

          </div>
        </div>
      </div>
    </div>

    
    <!-- JavaScript files-->
    @include('admin.js')
    
  </body>
</html>