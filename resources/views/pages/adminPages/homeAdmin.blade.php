@extends("layouts.admin")

@section("title")
    Home
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h1 class="naslovStrane">Home</h1>
        <p id="welcomeToSite">Welcome to the ADMIN panel of Dance-Club site! Here, you can easily manage the entire
            content of the site. That includes displaying posts, blogs, users and their roles, also categories related
            to blog. You can add new users, delete or modify existing ones. You can also do same with posts and
            blogs.</p>
        <h3 id="podnaslov">Information</h3>
        <ul id="linkovi">
            @isset($information)
                @foreach($information as $inf)
                    <li><a target="_blank" href="{{asset($inf->href)}}"><i class="{{$inf->ikonica}}"></i><span> {{$inf->name}}</span></a></li>
                @endforeach
            @endisset
        </ul>
    </div>
@endsection
