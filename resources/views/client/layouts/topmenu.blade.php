<nav id="menu" class="navbar">
    <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
    <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a class="home_link" title="خانه" href="/">خانه</a></li>
                <li class="mega-menu dropdown sub"><a>دسته ها</a>
                    <span class="submore"></span>
                        <div class="dropdown-menu" style="margin-left: -1047.88px; display: none;">
                    @foreach($categories as $category)
                            <div class="column col-lg-2 col-md-3">
                                <a href="category.html">{{$category->title_fa}}</a><span class="submore"></span>
                                <div>
                                    <ul>
                                        @foreach($category->children as $childrenCategory)
                                            <li>
                                                <a href="#">{{$childrenCategory->title_fa}} <span>@if($childrenCategory->children->count()>0)@endif</span></a>
                                                @if($childrenCategory->children->count()>0)
                                                <span class="submore"></span>
                                                <div class="dropdown-menu" style="display: none;">
                                                    <ul>
                                                       @foreach($childrenCategory->children as $ubMenu)
                                                            <li><a href="#">{{$ubMenu->title_fa}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                    @endforeach
                        </div>
                </li>
                <li class="menu_brands dropdown"><a href="#">برند ها</a>
                    <div class="dropdown-menu">
                        @foreach($brands as $brand)
                        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                            <a href="#">
                                <img src="{{str_replace('public','/storage',$brand->image)}}" width="50" title="{{$brand->name}}" alt="{{$brand->name}}" />
                            </a>
                            <a href="#">{{$brand->name}}</a>
                        </div>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
