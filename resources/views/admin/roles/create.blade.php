<div class="col-12 bg-white">
    <p class="box__title">ایجاد نقش جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('role.store')}}" method="post" class="padding-30 mr-5">
        @csrf
        <input name="title" type="text" placeholder="عنوان نقش" class="text" value="{{old('title')}}">
        <div class="form-group">
            <label>انتخاب دسترسی:</label>
            <div class="row">
                @foreach($permissions as $permission)
                    <div class="padding-bottom-10" style="margin-right: 8px;">
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                        <b>{{$permission->label}}</b>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="btn btn-brand">افزودن نقش</button>
    </form>
</div>
