@extends('admin.layouts.app')

@section('content')
    <br>
    <div class="col-12 bg-white">
        <p class="box__title"> ویرایش دسته بندی
            <b>{{$category->title_fa}}</b>
        </p>
        @include('admin.layouts.errors')
        <form action="{{route('category.update',$category->id)}}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{$category->title_fa}}" name="title_fa" type="text" placeholder="نام دسته بندی" class="text">
            <input value="{{$category->title_en}}" name="title_en" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
            <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
            <select name="parent_id">
                <option selected>دسته پدر ندارد</option>
                @foreach($categories as $parent)
                    <option
                        @if($parent->id==$category->parent_id)
                        selected
                        @endif
                        value="{{$category->id}}">{{$category->title_fa}}
                    </option>
                @endforeach
            </select>
            <div class="form-group">
                <p class="box__title margin-bottom-15">ویرایش گروه مشخصات</p>
                <div class="row">
                    @foreach($propertyGroups as $propertyGroup)
                        <div class="padding-bottom-10" style="margin-right: 8px;">
                            <input @if($category->hasPropertyGroup($propertyGroup)) checked @endif type="checkbox" name="propertyGroups[]" value="{{$propertyGroup->id}}">
                            <b>{{$propertyGroup->title}}</b>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>
@endsection
