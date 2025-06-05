<!DOCTYPE html>
<html>

<head>
    @include('home.head')
</head>

<body>
  <div class="hero_area">
    @include('home.header')

    @include('home.slider')
  </div>

  @include('home.product')

  @include('home.contact')

  @include('home.footer')

  <script src="{{asset('/template/home/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('/template/home/js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('/template/home/js/custom.js')}}"></script>

</body>

</html>