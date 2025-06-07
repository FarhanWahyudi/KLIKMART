<!DOCTYPE html>
<html>
    <head> 
        @include('admin.head')
        <style type="text/css">
            .div-deg {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 30px;
            gap: 30px;
        }

        table {
            width: 80%;

            tr {
                text-align: center;
                
                th {
                    background-color:rgb(46, 46, 46);
                    padding: 20px;
                    border: 1px solid grey;
                    color: white;
                }

                td {
                    padding: 10px;
                    border: 1px solid grey;

                }
                .row-image-container {
                    display: flex;
                    justify-content: center;

                    .image-container {
                        width: 120px;
                        height: 120px;
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        border-radius: 8px;
                    }
                }
            }
        }
        </style>
    </head>
    <body>
        @include('admin.header')
        <div class="d-flex align-items-stretch">

        @include('admin.sidebar')

            <div class="page-content">
                <div class="page-header">
                    <div class="content-fluid">

                        <div class="div-deg">
                            <table>
                                <tr>
                                    <th>customer Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Change Status</th>
                                </tr>                                
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->rec_address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product->title}}</td>
                                    <td>{{$order->product->price}}</td>
                                    <td class="row-image-container">
                                        @php
                                            $imageUrl = asset('products/' . $order->product->image);
                                        @endphp
                                        <div class="image-container" style="background-image: url('{{$imageUrl}}')"></div>
                                    </td>
                                    <td>
                                        @if($order->status == 'in progress')
                                        <span style="color: red">{{$order->status}}</span>
                                        @elseif($order->status == 'On the Way')
                                        <span style="color: yellow">{{$order->status}}</span>
                                        @else
                                        <span style="color: green">{{$order->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="{{url('/on-the-way', $order->id)}}">On the Way</a>
                                        <a class="btn btn-success" href="{{url('/delivered', $order->id)}}">Delivered</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- JavaScript files-->
        <script src="{{asset('/template/admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/template/admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
        <script src="{{asset('/template/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/template/admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
        <script src="{{asset('/template/admin/vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('/template/admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('/template/admin/js/charts-home.js')}}"></script>
        <script src="{{asset('/template/admin/js/front.js')}}"></script>
    </body>
</html>