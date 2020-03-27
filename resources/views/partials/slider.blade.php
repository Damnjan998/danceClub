<div class="content">
    <div class="wrap">
        <div class="main">
            <div id="page">
                <section>
                    <div id="viewport-shadow">
                        <a href="#" id="prev" title="go to the next slide"></a>
                        <a href="#" id="next" title="go to the next slide"></a>
                        <div id="viewport">
                            <div id="box">
                                <figure class="slide">
                                    <img src="{{ asset("/images/banner1.jpg") }}" alt=""/>
                                </figure>
                                <figure class="slide">
                                    <img src="{{ asset("/images/banner2.jpg") }}" alt=""/>
                                </figure>
                                <figure class="slide">
                                    <img src="{{ asset("/images/banner3.jpg") }}" alt=""/>
                                </figure>
                                <figure class="slide">
                                    <img src="{{ asset("/images/banner4.jpg") }}" alt=""/>
                                </figure>
                                <figure class="slide">
                                    <img src="{{ asset("/images/banner5.jpg") }}" alt=""/>
                                </figure>
                            </div>
                        </div>
                        <div id="time-indicator"></div>

                    </div>
                    <footer>
                        <nav class="slider-controls">
                            <ul id="controls">
                                <li><a class="goto-slide current" href="#" data-slideindex="0"></a></li>
                                <li><a class="goto-slide" href="#" data-slideindex="1"></a></li>
                                <li><a class="goto-slide" href="#" data-slideindex="2"></a></li>
                                <li><a class="goto-slide" href="#" data-slideindex="3"></a></li>
                                <li><a class="goto-slide" href="#" data-slideindex="4"></a></li>
                            </ul>
                        </nav>
                    </footer>
                </section>
            </div>
            <script>window.jQuery || document.write('<script src="{{ asset("/js/lib/jquery-1.7.2.min.js") }}"><\/script>')</script>
            <script src="{{ asset("/js/box-slider.jquery.js") }}"></script>
            <script src="{{ asset("/js/box-slider-fx-scroll-3d.js") }}"></script>
            <script>

                $(function () {

                    var $box = $('#box')
                        , $indicators = $('.goto-slide')
                        , $effects = $('.effect')
                        , $timeIndicator = $('#time-indicator')
                        , slideInterval = 5000
                        , effectOptions = {
                        'blindLeft': {blindCount: 15}
                        , 'blindDown': {blindCount: 15}
                        , 'tile3d': {tileRows: 6, rowOffset: 80}
                        , 'tile': {tileRows: 6, rowOffset: 80}
                    };

                    // This function runs before the slide transition starts
                    var switchIndicator = function ($c, $n, currIndex, nextIndex) {
                        // kills the timeline by setting it's width to zero
                        $timeIndicator.stop().css('width', 0);
                        // Highlights the next slide pagination control
                        $indicators.removeClass('current').eq(nextIndex).addClass('current');
                    };
                    // This function runs after the slide transition finishes
                    var startTimeIndicator = function () {
                        // start the timeline animation
                        var $imgWidth = $("figure.slide").width();
                        $timeIndicator.animate({width: $imgWidth + "px"}, slideInterval);
                    };


                    // initialize the plugin with the desired settings
                    $box.boxSlider({
                        speed: 1000
                        , autoScroll: true
                        , timeout: slideInterval
                        , next: '#next'
                        , prev: '#prev'
                        , pause: '#pause'
                        , effect: 'scrollVert3d'
                        , onbefore: switchIndicator
                        , onafter: startTimeIndicator
                    });

                    startTimeIndicator(); // start the time line for the first slide

                    // Paginate the slides using the indicator controls
                    $('#controls').on('click', '.goto-slide', function (ev) {
                        $box.boxSlider('showSlide', $(this).data('slideindex'));
                        ev.preventDefault();
                    });

                    // This is for demo purposes only, kills the plugin and resets it with
                    // the newly selected effect FIXME clean this up!
                    $('#effect-list').on('click', '.effect', function (ev) {
                        var $effect = $(this)
                            , fx = $effect.data('fx')
                            , extraOptions = effectOptions[fx];

                        $effects.removeClass('current');
                        $effect.addClass('current');
                        switchIndicator(null, null, 0, 0);

                        if (extraOptions) {
                            $.each(extraOptions, function (opt, val) {
                                $box.boxSlider('option', opt, val);
                            });
                        }

                        $box.boxSlider('option', 'effect', $effect.data('fx'));

                        ev.preventDefault();
                    });

                });

            </script>
        </div>
    </div>
</div>
