@extends('admin.layouts.app')

@section('content')
    <br>
    <div class="col-12 bg-white">
        <p class="box__title"> ویرایش کاربر:<b class="text-warning">{{$user->name}}</b>
        </p>
        @include('admin.layouts.errors')
        <form action="{{route('user.update',$user)}}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{$user->name}}" name="name" type="text" placeholder="نام کاربر" class="text">
            <input value="{{$user->email}}" name="email" type="text" placeholder="ایمیل کاربر" class="text">

            <select name="role_id">
                <option value disabled>انتخاب نقش:</option>
                @foreach($roles as $role)
                    <option
                        @if($role->id==$user->role_id) selected @endif
                        value="{{$role->id}}">{{$role->title}}
                    </option>
                @endforeach
            </select>

            <button class="btn btn-brand">ویرایش کاربر</button>
        </form>
    </div>
@endsection
