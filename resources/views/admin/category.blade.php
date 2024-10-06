<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <link rel="stylesheet" href="{{ asset('node_modules/toastr/build/toastr.min.css') }}">

    <style type="text/css">
    
        input[type='text'] {
            width: 400px;
            height: 50px;
        }
        .divdesign {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .tbdesign{
            width: 500px;
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

                <h1 class="text-white">Add Category</h1>

                <div class="divdesign">
                    <form action="{{url('add_category')}}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="category" />
                            <input class="btn btn-primary rounded-0" type="submit" value="Add Category" />
                        </div>
                    </form>
                </div>

                <div>
                    <table class="tbdesign">
                        <tr>
                            <th>Category Name</th>
                        </tr>

                        @foreach ($datas as $data)
                            <tr>
                                <td>{{$data->category_name}}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>
    </div>
    
    <!-- JavaScript files-->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
    
    <!-- Toastr JS -->
    <script src="{{ asset('node_modules/toastr/build/toastr.min.js') }}"></script>
    
    <!-- Custom Script for Toastr -->
    <script>
        $(document).ready(function(){
            @if(Session::has('toastr'))
                toastr.success("{{ Session::get('toastr') }}");
            @endif
        });
    </script>
  </body>
</html>
