<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        table{
            width: 100%;
            color: #fff;
            font-size: 16px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-collapse: collapse;

            margin: 20px 0;
        }

        th,td{
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th{
            background-color: #5cb85c;
            color: white;
            font-size: 18px;
        }

        td{
            background-color: #333;
            color: #ddd;
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

            <h3 class="text-white m-4">All Orders</h3>

          <div class="d-flex justify-content-center align-items-center table_div">
              <table>
                  <tr>
                      <th>Customer Name</th>
                      <th>Customer Address</th>
                      <th>Customer Phone</th>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Product Price</th>
                      <th>Paymetn Status</th>
                      <th>Status</th>
                      <th>Change Status</th>
                      <th>Print PDF</th>
                  </tr>
                
                @foreach($datas as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->rec_address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->product->title}}</td>
                        <td>
                            <img src="products/{{$data->product->image}}" width="100" />
                        </td>
                        <td>${{$data->product->price}}</td>
                        <td>{{$data->payment_status}}</td>

                        <td>
                            @if($data->status === 'in progress')
                                <span class="text-danger">{{$data->status}}</span>
                            @elseif($data->status === 'On The Way')
                                <span class="text-warning">{{$data->status}}</span>
                            @else
                                <span class="text-success">{{$data->status}}</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{url('on_the_way',$data->id)}}" class="btn btn-primary mb-2">On The Way</a>
                            <a href="{{url('delivered',$data->id)}}" class="btn btn-success">Delivered</a>
                        </td>

                        <td>
                            <a href="{{url('print_pdf',$data->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>
                    </tr>
                  @endforeach
              </table>
          </div>

        </div>
      </div>
    </div>

    <!-- JavaScript files-->
    @include('admin.js')

  </body>
</html>
