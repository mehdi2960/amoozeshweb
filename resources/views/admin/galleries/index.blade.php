@extends('admin.layouts.app')

@section('links')
    <link rel="stylesheet" href="/admin/css/dropzone.css">
@endsection

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">ایجاد گالری برای: <b class="text-warning">{{$product->name}}</b></p>
                <div class="table__box">
                    <form action="{{route('product.gallery.store',$product)}}" method="post" class="dropzone">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple/>
                        </div>
                    </form>
                </div>
                <div class="text-info">این محصول دارای {{$product->galleries->count()}}  تصویر میباشد.</div>
            </div>
            @foreach($product->galleries as $gallery)
            <div class="col-4 bg-white box__title text-center">
                    <div class="card" style="height: 105px !important;">
                        <img width="100" src="{{str_replace('public','/storage',$gallery->path)}}" alt="{{$gallery->product->name}}">
                    </div>
                    <div class="card-body" style="text-align: center !important;">
                        <form action="{{route('product.gallery.destroy',['product'=>$product,'gallery'=>$gallery])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="item-delete" style="color: red;padding: 5px;width: 75px;cursor: pointer;">حذف</button>
                        </form>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/admin/js/dropzone.js"></script>
@endsection
