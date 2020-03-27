<div class="footer">
    <div class="wrap">
        <div class="footer-top">
            <div class="sub-footer1">
                <h2>Visit Us</h2>
                <ul>
                    @isset($social_medias)
                        @foreach($social_medias as $sc)
                            <li><a target="_blank" href="{{asset($sc->href)}}">{{$sc->name}}</a></li>
                        @endforeach
                    @endisset
                </ul>
            </div>
            <div class="sub-footer2">
                <h2>Information</h2>
                <ul>
                    @isset($information)
                        @foreach($information as $inf)
                            <li><a target="_blank" href="{{asset($inf->href)}}">{{$inf->name}}</a></li>
                        @endforeach
                    @endisset
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>
