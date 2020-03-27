<body>
<div class="header">
    <div class="wrap">
        <div class="logo"><a href="{{ url("/") }}"><img src="{{ asset("/images/logo.png") }}" alt=""/></a></div>
        <div class="menu">
            <span class="head-menu"> </span>
            <ul>
                @isset($menus)
                    @foreach($menus as $menu)
                        <li class="navigation"><a href="{{ asset($menu->href) }}">{{ $menu->name }}</a></li>
                    @endforeach
                @endisset
                @if(!session()->has('user'))
                    <li class="navigation"><a href="{{url("/login")}}">Login</a></li>
                    <li class="navigation"><a href="{{url("/register")}}">Register</a></li>
                @endif
                @if(session()->has('user') && session()->get('user')->role_id == 1)
                    <li class="navigation"><a href="{{url("/logout")}}">Logout</a></li>
                @endif
                @if(session()->has('user') && session()->get('user')->role_id == 2)
                    <li class="navigation"><a href="{{url("/admin")}}">Admin Panel</a></li>
                    <li class="navigation"><a href="{{url("/logout")}}">Logout</a></li>
                @endif
            </ul>
        </div>
        <div class="clear"></div>
        <!-- script-for-nav -->
        <script>
            $("span.head-menu").click(function () {
                $(".menu ul").slideToggle(300, function () {
                    // Animation complete.
                });
            });
        </script>
        <!-- script-for-nav -->
    </div>
</div>
