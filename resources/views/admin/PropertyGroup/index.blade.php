@extends('admin.layouts.app')

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">گروه مشخصات</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>عنوان</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($propertyGroup as $group)
                            <tr role="row" class="">
                                <td><a href="#">{{$group->id}}</a></td>
                                <td><a href="#">{{$group->title}}</a></td>
                                <td>
                                    <a href="{{route('propertyGroup.edit',$group)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('propertyGroup.destroy',$group)}}" method="post">
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
            {{--            {{$PropertyGroup->links()}}--}}
            @include('admin.PropertyGroup.create')
        </div>
    </div>
@endsection
