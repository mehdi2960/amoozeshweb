<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href=""></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="{{asset('/admin/img/pro.jpg')}}" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
{{--        <span class="profile__name">کاربر : <b class="text-success">{{$user->name}}</b></span>--}}
    </div>
    <ul>
{{--        <li class="item-li i-dashboard is-active"><a href="/">پیشخوان</a></li>--}}
        {{--        <li class="item-li i-courses "><a href="courses.html">دوره ها</a></li>--}}
        <li class="item-li i-users @if(request()->routeIs('user.create')) is-active @endif"><a href="{{route('user.create')}}">کاربران</a></li>
        <li class="item-li i-categories @if(request()->routeIs('category.create')) is-active @endif"><a href="{{route('category.create')}}">دسته بندی ها</a></li>
        <li class="item-li i-categories @if(request()->routeIs('featureCategory.create')) is-active @endif"><a href="{{route('featureCategory.create')}}">ایجاد دسته بندی ویژه</a></li>
        <li class="item-li i-categories @if(request()->routeIs('brand.create')) is-active @endif"><a href="{{route('brand.create')}}"> برند ها</a></li>
        <li class="item-li i-categories @if(request()->routeIs('product.create')) is-active @endif"><a href="{{route('product.create')}}">محصولات</a></li>
        <li class="item-li i-categories @if(request()->routeIs('offer.create')) is-active @endif"><a href="{{route('offer.create')}}">تخفیف ها</a></li>
        <li class="item-li i-categories @if(request()->routeIs('slider.create')) is-active @endif"><a href="{{route('slider.create')}}">اسلایدر</a></li>
        <li class="item-li i-categories @if(request()->routeIs('propertyGroup.create')) is-active @endif"><a href="{{route('propertyGroup.create')}}">گروه مشخصات</a></li>
        <li class="item-li i-categories @if(request()->routeIs('properties.create')) is-active @endif"><a href="{{route('properties.create')}}">مشخصات</a></li>
        <li class="item-li i-categories @if(request()->routeIs('role.create')) is-active @endif"><a href="{{route('role.create')}}">نقش ها</a></li>

    </ul>

</div>
