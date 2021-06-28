<div class="col-4 bg-white">
    <p class="box__title">ایجاد برند</p>
    @include('admin.layouts.errors')
    <form action="{{route('brand.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <input name="name" type="text" placeholder="نام برند" class="text" value="{{old('name')}}">
        <label>انتخاب عکس:</label>
        <input name="image" type="file" placeholder="نام عکس" class="form-control">
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
