@extends('admin.layouts.app')

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">اسلایدرها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام</th>
                            <th>تصویر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr role="row" class="">
                                <td><a href="#">{{$slider->id}}</a></td>
                                <td><a href="#">{{$slider->link}}</a></td>
                                <td><a href="#"><img src="{{str_replace('public','/storage',$slider->image)}}" width="80" alt="brand"></a></td>
                                <td>
                                    <a href="{{route('slider.edit',$slider)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('slider.destroy',$slider)}}" method="post">
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
            @include('admin.sliders.create')
        </div>
    </div>
@endsection

