@extends('client.layouts.app')

@section('titleWeb')
    ثبت نام کاربری
@endsection

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
                <h1 class="title">ثبت نام حساب کاربری</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>
                <form action="{{route('register.sendmail')}}" class="form-horizontal" method="post">
                    @csrf
                    <fieldset id="account">
                        <legend>برای ارسال کد تایید ایمیل خود را وارد نمایید.</legend>
                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email">
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="pull-right">
                                <input type="submit" class="btn btn-primary" value="ارسال">
                            </div>
                        </div>
                    </fieldset>
                        @include('admin.layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection
