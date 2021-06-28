@extends('client.layouts.app')

@section('content')
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
            {{--            <li><a href="{{route('login')}}">حساب کاربری</a></li>--}}
            <li><a href="{{route('register')}}">ثبت نام</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <div class="col-sm-9" id="content">
                <h1 class="title">تایید حساب کاربری</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>

                <form class="form-horizontal" method="post" action="{{route('register.verifyOtp',$user)}}">
                    @csrf
                    <fieldset id="account">
                        <legend>کد ارسال شده به ایمیل خود را وارد نمایید.</legend>
                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">کد تایید</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="5" minlength="5" max="999999" min="11111" class="form-control" id="input-email" placeholder="کد تایید" value="" name="otp">
                            </div>
                        </div>

                        <div class="buttons">
                            <div class="pull-right">
                                <input type="submit" class="btn btn-primary" value="تایید ایمیل">
                            </div>
                        </div>
                    </fieldset>
                    @include('admin.layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection
