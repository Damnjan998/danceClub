@extends("layouts.front")

@section("title")
    Contact
@endsection

@section("sadrzaj")
    <div class="content">
        <div class="wrap">
            <div class="contact">
                <div class="contact-left">
                    <div class="b-box">
                        <h1>Contact</h1>
                        <div class="form">
                            <form class="cmxform" id="contactForm" method="post">
                                {{ csrf_field() }}
                                <div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <span><label for="name">Name</label></span>
                                    <span><input type="text" id="tbNameContact" name="tbNameContact"/></span>
                                    <span><label for="name">Title</label></span>
                                    <span><input type="text" id="tbTitle" name="tbTitle"/></span>
                                    <label id="greskaSubject">Example : Music</label>
                                </div>
                                <div>
                                    <span><label for="subject">Subject</label></span>
                                    <span><textarea id="tbSubject" name="tbSubject"></textarea></span>
                                    <label id="greskaMessage">Example : Acoustic!</label>
                                </div>
                                <div>
                                    <div>
                                        <button class="tsc_c3b_large tsc_c3b_orange tsc_button1" id="btnSend">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="map">
                <iframe src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=USA+georgia&amp;aq=&amp;sll=37.09024,-95.712891&amp;sspn=48.956293,107.138672&amp;g=USA&amp;ie=UTF8&amp;hq=&amp;hnear=Georgia,+United+States&amp;ll=32.157435,-82.907123&amp;spn=3.293292,6.696167&amp;t=m&amp;z=8&amp;iwloc=A&amp;output=embed"></iframe>
                <br/><small><a
                        href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=USA+georgia&amp;aq=&amp;sll=37.09024,-95.712891&amp;sspn=48.956293,107.138672&amp;g=USA&amp;ie=UTF8&amp;hq=&amp;hnear=Georgia,+United+States&amp;ll=32.157435,-82.907123&amp;spn=3.293292,6.696167&amp;t=m&amp;z=8&amp;iwloc=A"
                        style="color:#c19a31;text-align:left">View Larger Map</a></small>
            </div>
        </div>
    </div>
@endsection

@section("javascript")
    @parent
    <script type="text/javascript" src="{{asset("js/contact.js")}}"></script>
@endsection
