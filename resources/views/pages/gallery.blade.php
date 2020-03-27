@extends("layouts.front")

@section("title")
    Gallery
@endsection

@section("sadrzaj")
    <div class="content">
        <div class="wrap">
            <h1 id="galleryTitle">Gallery</h1>
            <select id="selectProductSort">
                <option value="0">Sort</option>
                <option value="1">Name A-Z</option>
                <option value="2">Name Z-A</option>
            </select>
            <div id="galleryLoad" class="gallery-top">

            </div>
            <div id="paginacija" class="paging">
                <ul id="stilPaginacija">

                </ul>
            </div>
        </div>
    </div>
@endsection

@section("javascript")
    @parent
    <script type="text/javascript" src="{{asset("js/gallery.js")}}"></script>
@endsection
