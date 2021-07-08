@extends('client.layouts.app')

@section('content')
    <div id="container" style="background: #ffffff!important; margin-top: 0!important;">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{route('client.home')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{route('client.compare.index')}}">مقایسه محصولات</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">مقایسه محصولات</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td colspan="4"><strong>جزئیات محصول</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>محصولات</td>
                                @foreach($products as $product)
                                    <td>
                                        <a href="">
                                            <strong>{{$product->name}}</strong>
                                        </a>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <td>تصویر</td>
                                @foreach($products as $product)
                                <td class="text-center">
                                    <img class="img-thumbnail" width="200" title="{{$product->name}}" alt="{{$product->name}}" src="{{str_replace('public','/storage',$product->image)}}">
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>قیمت</td>
                                <td>
                                    @foreach($products as $product)
                                        @if($product->discount()->exists())
                                            <span class="price-old">{{number_format($product->priceWithDiscount())}}</span>
                                        @else
                                            <span class="price-new">{{number_format($product->price)}}</span>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
{{--                                <td>-</td>--}}
{{--                                <td>محصولات 17</td>--}}
                            </tr>
                            <tr>
                                <td>برند</td>
                                @foreach($products as $product)
                                    <td>{{$product->brand->name}}</td>
                                @endforeach
                            </tr>
                            <tr>
{{--                                <td>وضعیت موجودی</td>--}}
{{--                                <td>موجود</td>--}}
                            </tr>
                            <tr>
                                <td>رتبه</td>
{{--                                <td class="rating">--}}
{{--                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
{{--                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
{{--                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
{{--                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
{{--                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
{{--                                    <br>--}}
{{--                                    بر اساس 0 بررسی--}}
{{--                                </td>--}}
                            </tr>
                            <tr>
                                <td>خلاصه</td>
                                @foreach($products as $product)
                                <td class="description">
                                    {{$product->discription}}
                                </td>
                                @endforeach
                            </tr>
                            <tr>
{{--                                <td>وزن</td>--}}
{{--                                <td>-</td>--}}
                            </tr>
                            <tr>
{{--                                <td>ابعاد (طول - عرض - ارتفاع)</td>--}}
{{--                                <td>0.00mm x 0.00mm x 0.00mm</td>--}}
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                @foreach($products as $product)
                                    <td>
                                        <input type="button" onclick="" class="btn btn-primary btn-block" value="افزودن به سبد">
                                        <a class="btn btn-danger btn-block" href="{{route('client.compare.remove',['product'=>$product->id])}}">حذف</a>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
@endsection
