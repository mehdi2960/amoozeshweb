@extends('admin.layouts.app')

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr role="row" class="">
                            <td><a href="#">{{$category->id}}</a></td>
                            <td><a href="#">{{$category->title_fa}}</a></td>
                            <td>{{$category->title_en}}</td>
                            @if(!optional($category->parent)->title_fa)
                                <td>
                                    <b class="text-warning">والد</b>
                                </td>
                            @else
                                <td>
                                    {{optional($category->parent)->title_fa}}
                                </td>
                            @endif

                            <td>
                                <form action="{{route('category.destroy',$category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                   <button class="item-delete bg-white" type="submit"></button>
                                </form>
                                <a href="{{route('category.edit',$category->id)}}" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$categories->links()}}
     @include('admin.categories.create')
        </div>
    </div>
@endsection
