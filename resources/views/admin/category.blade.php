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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        @foreach ($datas as $data)
                            <tr>
                                <td>{{$data->category_name}}</td>

                                <td>
                                    <a href="{{url('edit_category',$data->id)}}" class="btn btn-success">Edit</a>
                                </td>

                                <td>
                                    <a href="{{url('delete_category',$data->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>
    </div>
    
    <!-- JavaScript files-->

    <script type="text/javascript">

        function confirmation(event){

            event.preventDefault();

            let redirectURL = event.currentTarget.getAttribute('href');
            // console.log(redirectURL);

            swal({
                title:"Are you sure want to delete this?",
                text:"This action can't be undone",
                icon:"warning",
                buttons:true,
                dangerMode:true,
            }).then((willDelete)=>{
                if (willDelete) {
                    // Redirect to the URL if confirmed
                    window.location.href = redirectURL;
                }
            });



        // Test SweetAlert
        // swal("Test Alert", "If this shows up, SweetAlert is working", "success");



        // Custom Script for Toastr 
        $(document).ready(function(){
            @if(Session::has('toastr'))
                toastr.success("{{ Session::get('toastr') }}");
            @endif
        });

        }

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

  </body>
</html>
