@extends("layouts.front")

@section("title")
    About
@endsection

@section("sadrzaj")
    <div id="autor">
        <h1 id="aboutTitle">About</h1>
        @isset($autor)
            @foreach($autor as $a)
                <div id="slikaAutora">
                    <img id="slika" src="{{asset($a->image_src)}}" alt="{{asset($a->image_alt)}}"/>
                </div>
                <div id="tekstAutora">
                    <p>{{$a->description}}</p>
                </div>
                @endforeach
            @endisset
    </div>
@endsection

