@extends("layouts.front")

@section("title")
    Login
@endsection

@section("sadrzaj")
    <div class="content">
        <div class="wrap">
            <div class="contact">
                <div class="contact-left">
                    <div class="b-box">
                        <h1>Login</h1>
                        <div class="form">
                            <form class="cmxform" id="contactForm" method="post">
                                {{ csrf_field() }}
                                <div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <span><label for="email">Email</label></span>
                                    <span><input type="email" id="tbEmail" name="tbEmail" required=""/></span>
                                    <span><label for="password">Password</label></span>
                                    <span><input type="password" id="tbPassword" name="tbPassword" required=""/></span>
                                </div>
                                <div>
                                    <div>
                                        <button type="submit" class="tsc_c3b_large tsc_c3b_orange tsc_button1"
                                               id="btnLogin" name="btnLogin">Login</button>
                                    </div>
                                    <div id="information">If you don't have account, you can register <a
                                            href="{{url("/register")}}">HERE</a>!
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endsection

@section("javascript")
    @parent
    <script type="text/javascript" src="{{asset("js/login.js")}}"></script>
@endsection
