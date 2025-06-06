<!DOCTYPE html>
<html>

<head>
    @include('home.head')
    <style type="text/css">
        .img-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;

            img {
                width: 500px;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')

    </div>

    <section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <a href="">
                        <div class="img-container">
                            <img src="{{asset('/products/' . $productDetail->image)}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{$productDetail->title}}
                            </h6>
                            <h6>
                                Price
                                <span>
                                    Rp.{{$productDetail->price}}
                                </span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>
                                Category: {{$productDetail->category}}
                            </h6>
                            <h6>
                                Price
                                <span>
                                    Available Quantity: {{$productDetail->quantity}}
                                </span>
                            </h6>
                        </div>
                        <div>
                            <p style="text-align: center;">{{$productDetail->description}}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

  @include('home.footer')

  <script src="{{asset('/template/home/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('/template/home/js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('/template/home/js/custom.js')}}"></script>

</body>

</html>