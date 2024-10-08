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

            <h1 class="text-white">Add Products</h1>

            <div class="d-flex justify-content-center align-items-center">

                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div>
                        <label for="title">Product Title</label>
                        <input type="text" name="title" id="title" required />
                    </div>
            
                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" id="Description" required></textarea>
                    </div>
            
                    <div>
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" required />
                    </div>
            
                    <div>
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" id="qty" required />
                    </div>
            
                    <div>
                        <label>Product Category</label>
                        <select name="category" required>
                            <option value="">Select an option</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div>
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" />
                    </div>
            
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Add Product" class="btn btn-success rounded-2" />
                    </div>
                </form>

            </div>
          </div>
      </div>
    </div>



    
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>