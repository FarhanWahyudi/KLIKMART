<!DOCTYPE html>
<html>
  <head> 
    @include('admin.head')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

        .div-deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;

        }

        h1 {
            color: white;
        }

        .table-deg {
            text-align: center;
            margin: 50px auto;
            border: 2px solid white;

            th {
                color: white;
                font-weight: bold;
                padding: 20px;
                border-bottom: 1px solid rgb(196, 196, 196);
            }

            td {
                padding: 10px;
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
                    <h1>Add Category</h1>
                    <div class="div-deg">
                        <form action="{{ url('/admin/add-category') }}" method="post">
                            @csrf
                            <div>
                                <input type="text" name="category">
                                <input class="btn btn-primary" type="submit" value="Add Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <table class="table-deg">
                    <tr>
                        <th>Category Name</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->category}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('/delete-category', $category->id) }}" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
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