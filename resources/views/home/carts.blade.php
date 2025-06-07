<!DOCTYPE html>
<html>

<head>
    @include('home.head')
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

        .order-container {
            display: flex;
            flex-direction: column;
            gap: 30px;
            div {
                display: flex;
                align-items: start;
                gap: 50px;

                label {
                    display: inline-block;
                    width: 150px;
                }

                input {
                    width: 300px;
                    outline: none;
                }

                textarea {
                    width: 300px;
                    height: 100px;
                    outline: none;
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
                <th>Option</th>
            </tr>

            <?php
                $value = 0;
            ?>
            
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
                <td>
                    <a class="btn btn-danger" href="{{url('/product/delete', $cart->id)}}">Delete</a>
                </td>
            </tr>

            <?php
                $value = $cart->product->price + $value;
            ?>

            @endforeach
        </table>
        <h3>Total: Rp. {{$value}}</h3>
        <form action="{{url('confirm-order')}}" method="post" class="order-container">
            @csrf
            <div>
                <label for="name">Receiver Name</label>
                <input type="text" name="name" id="name" value="{{Auth::user()->name}}">
            </div>
            <div>
                <label for="address">Receiver Address</label>
                <textarea name="address" id="address">{{Auth::user()->address }}</textarea>
            </div>
            <div>
                <label for="phone">Receiver Phone</label>
                <input type="number" name="phone" id="phone" value="{{Auth::user()->phone}}">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="submit">
            </div>
        </form>
    </div>

    @include('home.footer')

    <script src="{{asset('/template/home/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/template/home/js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="{{asset('/template/home/js/custom.js')}}"></script>

</body>

</html>