@extends('admin.layouts.app')

@section('content')
    <br>
    <div class="col-12 bg-white">
        <p class="box__title"> ویرایش برند {{$brand->name}}</p>
        @include('admin.layouts.errors')
        <form action="{{route('brand.update',$brand)}}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input value="{{$brand->name}}"  name="name" type="text" placeholder="نام برند" class="text">
            <div class="col-6">
                <img src="{{str_replace('public','/storage',$brand->image)}}" width="100" alt="{{$brand->name}}">
            </div>
            <label for="images">افزودن عکس:</label>
            <input type="file" class="form-control" name="image"> <br><br>
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>
@endsection
