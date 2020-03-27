@extends("layouts.front")

@section("title")
    Blog
@endsection

@section("sadrzaj")
    <div class="content">
        <div class="wrap">
            <div class="blog-content">
                <h1 id="galleryTitle">Blog</h1>

                <div id="blogLevo" class="blog-left">

                </div>

                <div class="blog-right">
                    <div class="right-text">
                        <div class="sidebar-nav">
                            <input type="search" id="poljePretraga" placeholder="Search by name">
                            <h3>Categories</h3>
                            <ul>
                                @isset($categories)
                                    @foreach($categories as $cat)
                                        <li><a class="cat" data-id="{{ $cat->id }}">{{$cat->name}}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                        @if(session()->has('user'))
                        <div class="sidebar-nav">
                            <h3>Insert Blog</h3>
                            <form class="cmxform" action="{{url("/insertBlog")}}" enctype="multipart/form-data" id="insertBlogForm" method="post">
                                {{ csrf_field() }}
                                <div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <span><label for="name">Name</label></span>
                                    <span><input type="text" id="tbNameBlog" name="tbNameBlog" required=""/></span>
                                    <label id="greskaSubject">Example : Music</label>
                                    <span><label for="text">Description</label></span>
                                    <span><textarea id="taDescription" name="taDescription" required=""></textarea></span>
                                    <label id="greskaMessage">Example : Acoustic!</label>
                                    <span><label>Category</label></span>
                                    <span><select id="ddlCategory" name="ddlCategory" required="">
                                            <option value="0">Chose category</option>
                                            @isset($categories)
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </span>
                                    <span><label>Image</label></span>
                                    <span><input id="poljeSlika" name="image" type="file" required=""></span>
                                </div>
                                <div>
                                    <div>
                                        <button type="submit" class="tsc_c3b_large tsc_c3b_orange tsc_button1"
                                                id="btnInsertBlog" name="btnInsertBlog">Insert</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div id="paginacija" class="paging">
                <ul id="stilPaginacijaBlog">

                </ul>
            </div>
        </div>
    </div>
@endsection

@section("javascript")
    @parent
    <script type="text/javascript" src="{{asset("js/blog.js")}}"></script>
@endsection
