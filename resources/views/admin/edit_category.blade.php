<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

        .eddesign{
            display: flex;
            justify-content: center;
            align-items: center;

            margin: 60px;
        }
        input[type='text']{
            width: 400px;
            height: 50px;
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

            <h1 class="text-white">Edit Category</h1>

            <div class="eddesign">
                <form action="{{url('update_category',$data->id)}}" method="POST">
                    @csrf
                    <input type="text" name="category" value="{{$data->category_name}}" />
                    <input type="submit" value="Update Category" class="btn btn-primary" />
                </form>
            </div>

          </div>
      </div>
    </div>




    @include('admin.js');

  </body>
</html>