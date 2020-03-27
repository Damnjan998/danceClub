@extends("layouts.front")

@section("title")
    Home
@endsection

@section("sadrzaj")
<div class="content">
    <div class="wrap">
        <div class="clear"></div>
        <div class="content-bottom">
            <h1 id="galleryTitle">Special Posts</h1>
            @isset($posts)
                @foreach($posts as $post)
            <div class="b-grid">
                <h3 class="namePost">{{$post->name}}</h3>
                <div class="bottom-img">
                    <img class="velicinaSlike" src="{{ asset($post->image_src) }}" alt="{{asset($post->image_alt)}}"/>
                    <p class="postDesc">{{$post->description}}</p>
                </div>
            </div>
                @endforeach
            @endisset
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
    @endsection
