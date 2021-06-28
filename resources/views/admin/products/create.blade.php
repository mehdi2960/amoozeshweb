<div class="col-4 bg-white">
    <p class="box__title">ایجاد محصول</p>
    @include('admin.layouts.errors')
    <form action="{{route('product.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <input name="name" type="text" placeholder="نام محصول" class="text" value="{{old('name')}}">
        <label for="category">افزودن دسته بندی :</label>
        <select name="category_id">
            <option value disabled selected>انتخاب دسته بندی:</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title_fa}}</option>
            @endforeach
        </select>
        <label for="category">افزودن برند :</label>
        <select name="brand_id">
            <option value disabled selected>انتخاب برند:</option>
            @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>
        <input name="price" type="text" placeholder="قیمت" class="text" value="{{old('price')}}">
        <input name="slug" type="text" placeholder="اسلاگ" class="text" value="{{old('slug')}}">
        <textarea name="description" id="" cols="30" rows="10" placeholder="توضیحات ">{{old('description')}}</textarea>
        <label>انتخاب عکس:</label>
        <input name="image" type="file" placeholder="نام عکس">
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
