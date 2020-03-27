@extends("layouts.admin")

@section("title")
    Tables POSTS
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Tables Posts</h2>
        <div class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Posts</h4>
            </div>
            <table id="tabelaPostovi" class="table table-bordered">
                <thead>
                @csrf
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Special</th>
                    <th>Image SRC</th>
                    <th>Image ALT</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @isset($allPosts)
                    @foreach($allPosts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->name}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->special}}</td>
                            <td>{{$post->image_src}}</td>
                            <td>{{$post->image_alt}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td><a href="{{url("/admin/updatePost/$post->id")}}" class="updPost">
                                    <button type="button" class="btn btn-primary">Update</button>
                                </a></td>
                            <td><a href="#" class="delPost" data-id="{{$post->id}}">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                </a></td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
        <div class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Blog</h4>
            </div>
            <table id="tabelaPostovi" class="table table-bordered">
                <thead>
                @csrf
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image SRC</th>
                    <th>Image ALT</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Category Id</th>
                    <th>User Id</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @isset($blogs)
                    @foreach($blogs as $blog)
                        <tr>
                            <th scope="row">{{$blog->id}}</th>
                            <td>{{$blog->name}}</td>
                            <td>{{$blog->description}}</td>
                            <td>{{$blog->image_src}}</td>
                            <td>{{$blog->image_alt}}</td>
                            <td>{{$blog->created_at}}</td>
                            <td>{{$blog->updated_at}}</td>
                            <td>{{$blog->category_id}}</td>
                            <td>{{$blog->user_id}}</td>
                            <td><a href="{{url("/admin/updateBlog/$blog->id")}}" class="updBlog">
                                    <button type="button" class="btn btn-primary">Update</button>
                                </a></td>
                            <td><a href="#" class="delBlog" data-id="{{$blog->id}}">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                </a></td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
        <div id="kategorijeTabela" class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Categories</h4>
            </div>
            <table id="tabelaKategorije" class="table table-bordered">
                <thead>
                @csrf
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @isset($categories)
                    @foreach($categories as $cat)
                        <tr>
                            <th scope="row">{{$cat->id}}</th>
                            <td>{{$cat->name}}</td>
                            <td><a href="#" class="delCat" data-id="{{$cat->id}}">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                </a></td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section("js")
    @parent
    <script type="text/javascript" src="{{ asset("/js/adminJs/adminPost.js") }}"></script>
@endsection
