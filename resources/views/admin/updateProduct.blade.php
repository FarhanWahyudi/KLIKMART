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
                gap: 10px;
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
        .image-container {
            width: 120px;
            height: 120px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 8px;
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
                    <h1>Edit Product</h1>
                </div>
            </div>
            <div class="div-deg">
                <form action="{{url('/admin/update-product', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Product Title</label>
                        <input type="text" name="title" id="title" value="{{$product->title}}">
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description">{{$product->description}}</textarea>
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input id="price" type="number" name="price" value="{{$product->price}}">
                    </div>
                    <div>
                        <label for="quantity">Quantity</label>
                        <input id="quantity" type="number" name="quantity" value="{{$product->quantity}}">
                    </div>
                    <div>
                        <label for="category">Product Category</label>
                        <select id="category" name="category" id="category" value="{{$product->category}}">
                            @foreach($categories as $category)
                            <option value="{{$category->category}}"
                            {{ $product->category === $category->category ? 'selected' : '' }}>{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        @php
                            $imageUrl = asset('products/' . $product->image);
                        @endphp
                        <label>Current Image</label>
                        <div class="image-container" style="background-image: url('{{$imageUrl}}')"></div>
                    </div>
                    <div>
                        <label for="image">New Image</label>
                        <input id="image" type="file" name="image" require>
                    </div>
                    <div class="submit-container">
                        <a href="{{url('/admin/view-products')}}" class="btn btn-danger" type="submit">Cancel</a>
                        <input class="btn btn-success" type="submit" value="Update" >
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
  </body>
</html>