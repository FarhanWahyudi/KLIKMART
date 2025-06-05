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
            margin-top: 60px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;

            div {
                display: flex;
            }

            .submit-container {
                display: flex;
                justify-content: end;
                margin-top: 10px;
            }
        }

        label {
            display: inline-block;
            width: 230px;
            font-size: 15px!important;
        }

        input[type='text'] {
            width: 350px;
            height: 50px;
        }

        input[type='number'] {
            width: 350px;
            height: 50px;
        }

        textarea {
            width: 450px;
            height: 80px;
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
                    <h1>Add Product</h1>
                </div>
            </div>
            <div class="div-deg">
                <form action="{{url('/admin/add-product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Product Title</label>
                        <input type="text" name="title" id="title" require>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" require></textarea>
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input id="price" type="number" name="price" require>
                    </div>
                    <div>
                        <label for="quantity">Quantity</label>
                        <input id="quantity" type="number" name="quantity" require>
                    </div>
                    <div>
                        <label for="category">Product Category</label>
                        <select id="category" name="category" id="category">
                            @foreach($categories as $category)
                            <option value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="image">Product Image</label>
                        <input id="image" type="file" name="image" require>
                    </div>
                    <div class="submit-container">
                        <input class="btn btn-success" type="submit" value="Add Prooduct" >
                    </div>
                </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>