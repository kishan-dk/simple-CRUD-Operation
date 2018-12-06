<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Store Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{asset('LoginAssets/images/icons/favicon.ico')}}"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('LoginAssets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('LoginAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('LoginAssets/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('LoginAssets/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('LoginAssets/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('LoginAssets/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('LoginAssets/css/main.css')}}">
        <!--===============================================================================================-->
    </head>
    <style>
        .wrap-login100{
            padding: 100px 130px 33px 95px;
        }
    </style>
    <body>
        <div class="limiter">
            <div class="container-login100">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                @endif
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="{{asset('LoginAssets/images/img-01.png')}}" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" action="{{ url('login/check') }}" method="post">
                        <span class="login100-form-title">
                            Admin Login
                        </span>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--===============================================================================================-->	
        <script src="{{asset('LoginAssets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('LoginAssets/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('LoginAssets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('LoginAssets/vendor/select2/select2.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('LoginAssets/vendor/tilt/tilt.jquery.min.js')}}"></script>
        <script >
$('.js-tilt').tilt({
    scale: 1.1
})
        </script>
        <!--===============================================================================================-->
        <script src="{{asset('LoginAssets/s/main.js')}}"></script>

    </body>
</html>