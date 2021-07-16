<div class="col-12 bg-white">
    <p class="box__title">ایجاد دسته بندی جدید</p>
    @include('admin.layouts.notification')

    @include('admin.layouts.errors')
    <form action="{{route('category.store')}}" method="post" class="padding-30">
        @csrf
        <input value="{{old('title_fa')}}" name="title_fa" type="text" placeholder="نام دسته بندی" class="text">
        <input value="{{old('title_en')}}" name="title_en" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
        <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
        <select name="parent_id">
            <option value selected>دسته پدر ندارد</option>
            @foreach($selectCategory as $parent)
                <option value="{{$parent->id}}">{{$parent->title_fa}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <p class="box__title margin-bottom-15">انتخاب گروه مشخصات</p>
            <div class="row">
                @foreach($propertyGroups as $propertyGroup)
                    <div class="padding-bottom-10" style="margin-right: 8px;">
                        <input type="checkbox" name="propertyGroups[]" value="{{$propertyGroup->id}}">
                        <b>{{$propertyGroup->title}}</b>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
