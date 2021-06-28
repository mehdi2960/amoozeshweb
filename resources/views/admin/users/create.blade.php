<div class="col-4 bg-white">
    <p class="box__title">ایجاد کاربر جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('user.store')}}" method="post" class="padding-30 mr-5">
        @csrf
        <input name="name" type="text" placeholder="نام کاربر" class="text" value="{{old('name')}}">
        <input name="email" type="email" placeholder="ایمیل کاربر" class="text" value="{{old('email')}}">
        <button class="btn btn-brand">افزودن کاربر</button>
    </form>
</div>
