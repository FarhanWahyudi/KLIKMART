<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <!-- <a href=""> -->
                        <div class="img-box">
                            <img src="{{asset('/products/' . $product->image)}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{$product->title}}
                            </h6>
                            <h6>
                                Price
                                <span>
                                    Rp.{{$product->price}}
                                </span>
                            </h6>
                        </div>
                        <div class="options-container">
                            <a class="btn btn-danger" href="{{url('/product/detail', $product->id)}}" style="color: white;">Details</a>
                            <a class="btn btn-success" href="{{url('/product/add-cart', $product->id)}}" style="color: white;">Add to Cart</a>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    <!-- </a> -->
                </div>
            </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="">
                View All Products
            </a>
        </div>
    </div>
</section>