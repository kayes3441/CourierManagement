<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ dynamicAsset('public/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset('public/assets/css/login.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset('public/assets/css/toastr.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-title">
                ADMIN PANEL
            </div>
            <div class="col-lg-12 login-form rounded-2">
                <div class="col-lg-12 ">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">EMAIL</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" >
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input show-hide-password">
                            <label class="form-check-label show-hide-text" for="showPassword">Show Password</label>
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12">
                        <div class="col-lg-6 login-btm login-button">
                            <button type="submit" class="btn btn-outline-primary copy-credentials" >Copy Master Credentials</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ dynamicAsset('public/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ dynamicAsset('public/assets/js/toastr.js') }}"></script>
    <script src="{{ dynamicAsset('public/assets/js/login.js') }}"></script>
{!!\Brian2694\Toastr\Facades\Toastr::message() !!}
</body>
</html>
