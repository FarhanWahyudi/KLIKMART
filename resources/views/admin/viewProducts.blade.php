<!DOCTYPE html>
<html>
  <head> 
    @include('admin.head')
    <style type="text/css">
        h1 {
            color: white;
        }

        .div-deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
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
                    <h1>Products</h1>
                    <form action="{{url('/admin/product-search')}}" method="get">
                        @csrf
                        <input type="text" name="search" value="{{$search}}">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
            <div class="div-deg">
                <table>
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Options</th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            @php
                                $imageUrl = asset('products/' . $product->image);
                            @endphp
                            <div class="image-container" style="background-image: url('{{$imageUrl}}')"></div>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('/admin/update-product', $product->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{url('/admin/delete-product', $product->id)}}" onclick="confirmation(event)" >Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="div-deg">
                {{$products->onEachSide(1)->links()}}
            </div>
        </div>
    </div>

    
    <!-- JavaScript files-->

    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            
            var urlToRedirect = ev.currentTarget.getAttribute('href');

            swal({
                title: 'Are You Sure to Delete This',
                text: 'This Delete will be Permanent',
                icon: 'warning',
                buttons: true,
                dengerMode: true
            }).then((willCancel)=>{
                if (willCancel) {
                    window.location.href=urlToRedirect;
                }
            });
        }
    </script>

    <script src="{{asset('/template/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/template/admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/template/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/template/admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/template/admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/template/admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/template/admin/js/charts-home.js')}}"></script>
    <script src="{{asset('/template/admin/js/front.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>