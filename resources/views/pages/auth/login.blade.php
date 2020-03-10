@extends('layouts.auth')

@section('title', '| Login')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>SIPMM </b>ADMIN</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @if($errors->any())
        <div class="callout callout-danger">
            @foreach ($errors->all() as $error)
            <h5>{{$error}}</h5>
            @endforeach
        </div>
        @endif
        <p class="login-box-msg">Please Sign In</p>
        <div id="formlogin">
            <form action="/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="loginid" placeholder="Login ID" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="userpassword" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>

                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" name="loginreq" class="btn btn-primary btn-block btn-flat">Sign
                            In</button>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
            </form>
        </div>
        <div id="formreset" style="display:none">
            <form action="login.php" method="post">
                <div class="form-group has-feedback">
                    <input class="form-control" type="email" name="reg_email"
                        placeholder="Enter your registered email id" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" name="resetpass" class="btn btn-primary btn-block btn-flat">Reset</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <a href="/forgot-password">I forgot my password</a><br>
    </div>
</div>
<!-- /.login-box -->
@endsection