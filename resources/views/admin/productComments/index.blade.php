@extends('admin.layouts.app')

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">کامنت های مربوط به محصول <b>{{$product->name}}</b></p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>متن نظر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product->comments as $comment)
                            <tr role="row" class="">
                                <td><a href="#">{{$brand->id}}</a></td>
                                <td><a href="#">{{$brand->name}}</a></td>
                                <td><a href="#"><img src="{{str_replace('public','/storage',$brand->image)}}" width="50" alt="brand"></a></td>
                                <td>
                                    <a href="{{route('brand.edit',$brand->id)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('brand.destroy',$brand->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="item-delete bg-white" type="submit"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
{{--            @include('admin.brands.create')--}}
        </div>
    </div>
@endsection
