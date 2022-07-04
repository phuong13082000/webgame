@extends('layout')
@section('content')
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-box-body box-custom">
            <p class="login-box-msg">Đăng ký thành viên</p>

            <span class="help-block" style="text-align: center;color: #dd4b39">
                       <strong></strong>
                </span>

            <form action="https://nick.vn/register" method="POST" data-hs-cf-bound="true">
                <input type="hidden" name="_token" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
                <div class="form-group has-feedback  ">
                    <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" value="" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control number" maxlength="11" name="phone" value=""
                           placeholder="Số điện thoại">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password_confirmation"
                           placeholder="Xác nhận mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>


                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng
                            ký
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <div class="social-auth-links text-center">
                <p style="margin-top: 5px">- HOẶC -</p>


                <a href="https://nhapnick.com/nick_vn" class="btn  btn-social btn-facebook btn-flat d-inline-block"><i
                        class="fa fa-facebook"></i>Login FB</a>
            </div>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <style>
        .login-box, .register-box {
            width: 400px;
            margin: 7% auto;
            padding: 20px;;
        }

        @media (max-width: 767px) {
            .login-box, .register-box {
                width: 100%;
            }
        }

        .login-box-msg, .register-box-msg {
            margin: 0;
            text-align: center;
            padding: 0 20px 20px 20px;
            text-align: center;
            font-size: 20px;;
            font-weight: bold;
        }

        .box-custom {
            border: 1px solid #cccccc;
            padding: 20px;
            color: #666;
        }
    </style>
    <!-- END: PAGE CONTENT -->
</div>
<!-- Begin: Testimonals 1 component -->
</div>

<style type="text/css">
    .news_image, .image, .news_title, .a-more, .news_description {
        position: relative;
        z-index: 200;
    }

    span.sale {
        position: absolute;
        z-index: 1000;
        right: -1px;
        top: -1px;
        background: rgba(255, 212, 36, .9);
        padding: 5px;
        text-align: center;
        color: #ee4d2d;
        width: 50px;
        font-weight: 700;
        font-size: 15px;
    }

    .sale:after {
        content: "";
        width: 0;
        height: 0;
        left: 0;
        bottom: -4px;
        position: absolute;
        border-color: transparent rgba(255, 212, 36, .9);
        border-style: solid;
        border-width: 0 25px 4px;
    }

    .outPrice {
        padding-top: 20px;
        text-align: center;
        width: 100px;
        margin: 0 auto;
        margin-top: 10px;
        display: flex;
        justify-content: center;
    }

    .oldPrice {
        text-decoration: line-through;
        color: #3f0;
        border: 2px solid;
        padding: 5px 15px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
    }

    .newPrice {
        border: 2px solid red;
        padding: 5px 15px;
        color: red;
        display: inline;
        border-radius: 5px;
        margin-left: 10px;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .game-list .a-more .view {
        margin-top: 20px;
    }

    @media (max-width: 550px) {
        .outPrice {
            flex-direction: column;
        }

        .newPrice {
            margin-left: 0;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    }
</style>
<!-- END: PAGE CONTENT -->
@endsection
