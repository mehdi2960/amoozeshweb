@extends('admin.layouts.app')

@section('content')
    <div class="col-12 bg-white">
        <p class="box__title">ایجاد دسته بندی ویژه</p>
        @include('admin.layouts.errors')
        <form action="{{route('featureCategory.store')}}" method="post" class="padding-30">
            @csrf
            <p class="box__title margin-bottom-15">انتخاب دسته ویژه</p>
            <select name="parent_id">
                <option value selected>..انتخاب دسته ویژه..</option>
                @foreach($categories as $parent)
                    <option value="{{$parent->id}}">{{$parent->title_fa}}</option>
                @endforeach
            </select>
            <button class="btn btn-brand">اضافه کردن</button>
        </form>
    </div>
@endsection
