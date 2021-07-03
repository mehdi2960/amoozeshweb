<div class="col-4 bg-white">
    <p class="box__title">ایجاد اسلایدر جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('slider.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <input name="link" type="text" placeholder="لینک" class="text" value="{{old('link')}}">
        <label>انتخاب عکس:</label>
        <input name="image" type="file" placeholder="نام عکس" class="form-control">
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>

