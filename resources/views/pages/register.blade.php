@extends("layouts.front")

@section("title")
    Register
@endsection

@section("sadrzaj")
    <div class="content">
        <div class="wrap">
            <div class="contact">
                <div class="contact-left">
                    <div class="b-box">
                        <h1>Register</h1>
                        <div class="form">
                            <form class="cmxform" id="contactForm" method="post">
                                {{ csrf_field() }}
                                <div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <span><label for="name">Name</label></span>
                                    <span><input type="text" id="tbName" name="tbName" required=""/></span>
                                    <label id="greskaName">Example : John </label>
                                    <span><label for="name">Last Name</label></span>
                                    <span><input type="text" id="tbLastName" name="tbLastName" required=""/></span>
                                    <label id="greskaPrezime">Example : Tompson</label>
                                    <span><label for="email">Email</label></span>
                                    <span><input type="email" id="tbEmail" name="tbEmail" required=""/></span>
                                    <label id="greskaMail">Example : example@gmail.com</label>
                                    <span><label for="password">Password</label></span>
                                    <span><input type="password" id="tbPassword" name="tbPassword" required=""/></span>
                                    <label id="greskaSifra">Example : Lozinka123</label>
                                    <span><label for="password">Confirm Password</label></span>
                                    <span><input type="password" id="tbConfirmPassword" name="tbConfirmPassword" required=""/></span>
                                </div>
                                <div>
                                    <div>
                                        <button class="tsc_c3b_large tsc_c3b_orange tsc_button1" type="submit"
                                                id="btnRegister" name="btnRegister">Register
                                        </button>
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
    <script type="text/javascript" src="{{asset("js/register.js")}}"></script>
@endsection
