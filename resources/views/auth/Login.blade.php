<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <title>{{ config('app.name', 'Laravel') }}</title>
         
     <link rel="icon" href="{{ asset('images/Laravel.png') }}" />
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     <link rel="stylesheet" href="{{ asset('vendor/coreui/css/coreui.min.css') }}">
     <link rel="stylesheet" href="{{ asset('vendor/coreui/fontawesome/css/fontawesome.css') }}">

     <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
     <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
     <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
     <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
     <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <style>
         .card text-white py-5 d-md-down-none{
             background-color:#292B36;
         }
        .reload {
            font-family: Lucida Sans Unicode
        }
     </style>
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Login</h1>
                            <br>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                @if(session('errors'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Something it's wrong:
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="cil-user"></i>        
                                    </div>
                                    <input class="form-control" name="email" type="text" placeholder="Email">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="cil-lock-locked"></i>
                                    </div>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                </div>
                                <div class="form-group mt-4 mb-4">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger reload-captha" id="reload-captha">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn px-4" style="background-color: #292B36;color:#ffff;">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('register') }}">Register</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white py-5 d-md-down-none" style="width:44%;background-color: #373a49;">
                        <div class="card-body text-center">
                            <img src="{{asset('images/Laravel.png')}}" style="vertical-align: middle;width:200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>    
<script type="application/javascript" src="{{ asset('vendor/coreui/js/jquery.slim.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/bootstrap.bundle.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui-utilities.min.js') }}"></script>
{{-- @section('script') --}}
<script type="text/javascript">
    $('#reload-captha').on('click', function (event) {
        $.ajax({
            type: 'GET',
            url: '/reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
{{-- @endsection --}}
</body>

</html>
