@extends('admin.layouts.app')

@section('content')
<div class="col-4 bg-white">
    <p class="box__title">ایجاد تخفیف: <b class="text-info">{{$product->name}}</b></p>
    @include('admin.layouts.errors')
    <form action="{{route('product.discount.store',$product)}}" method="post" class="padding-30">
        @csrf
        <input name="value" type="number" placeholder="مقدار تخفیف" class="text" value="{{old('value')}}">
        <button class="btn btn-brand" type="submit">اضافه کردن</button>
    </form>
</div>
@endsection
