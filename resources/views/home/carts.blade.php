<!DOCTYPE html>
<html>

<head>
    @include('home.head')
    <style type="text/css">

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
    <div class="hero_area">
        @include('home.header')

    </div>

    <div class="div-deg">
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            @foreach($carts as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td class="row-image-container">
                    @php
                        $imageUrl = asset('products/' . $cart->product->image);
                    @endphp
                    <div class="image-container" style="background-image: url('{{$imageUrl}}')"></div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @include('home.footer')

    <script src="{{asset('/template/home/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/template/home/js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="{{asset('/template/home/js/custom.js')}}"></script>

</body>

</html>