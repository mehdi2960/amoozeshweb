@extends('admin.layouts.app')

@section('content')
    <br>
    <div class="col-12 bg-white">
        <p class="box__title"> ویرایش مشخصات محصول :
            <b class="text-success">{{$propertyGroup->title}}</b>
        </p>
        @include('admin.layouts.errors')
        <form action="{{route('propertyGroup.update',$propertyGroup->id)}}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{$propertyGroup->title}}" name="title" type="text" placeholder="عنوان" class="text">

            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>
@endsection
