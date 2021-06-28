@extends('admin.layouts.app')

@section('content')
<div class="col-4 bg-white">
    <p class="box__title">ویرایش تخفیف: <b class="text-info">{{$product->name}}</b></p>
    @include('admin.layouts.errors')
    <form action="{{route('product.discount.update',['product'=>$product,'discount'=>$discount])}}" method="post" class="padding-30">
        @csrf
        @method('patch')
        <input name="value" type="number" placeholder="مقدار تخفیف" class="text" value="{{$discount->value}}">
        <button class="btn btn-brand" type="submit">ویرایش کردن</button>
    </form>
</div>
@endsection
