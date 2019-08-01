@php
    $carts = \Helper::getListCart();
@endphp
        <!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link type="image/x-icon" rel="shortcut icon"
          href="{{ asset(SITE_THEME_ASSET.'/images/1543500805-Phan-Phoi-Tra-Giam-Can-Golean-Detox-Tai-Ha-Noi.png')}}"/>
    <title>{{$title??$configsGlobal['title']}}</title>
    <meta name="description" content="{{ $description??$configsGlobal['description'] }}">
    <meta name="keyword" content="{{ $keyword??$configsGlobal['keyword'] }}">
    <meta name="robots" content="index,follow"/>
    <link rel="canonical" href="{{ \Request::fullUrl() }}"/>
    <meta name="geo.region" content="VN-HN"/>
    <meta name="geo.position" content="21.03867;105.807037"/>
    <meta name="ICBM" content="21.03867, 105.807037"/>
    <!-- Dublin Core-->
    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
    <meta name="DC.title" content="{{$title??$configsGlobal['title']}}">
    <meta name="DC.identifier" content="{{ \Request::fullUrl() }}">
    <meta name="DC.description"
          content="{{ $description??$configsGlobal['description'] }}">
    <meta name="DC.subject" content="{{$title??$configsGlobal['title']}}">
    <meta name="DC.language" scheme="UTF-8" content="vi">

    <meta itemprop="name" content="{{$title??$configsGlobal['title']}}">
    <meta itemprop="description"
          content="{{ $description??$configsGlobal['description'] }}">
    <meta itemprop="image"
          content="{{ asset(SITE_THEME_ASSET.'/images/1543500805-Phan-Phoi-Tra-Giam-Can-Golean-Detox-Tai-Ha-Noi.png')}}">

    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:url" content="{{ \Request::fullUrl() }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$title??$configsGlobal['title']}}"/>
    <meta property="og:description"
          content="{{ $description??$configsGlobal['description'] }}"/>
    <meta property="og:image"
          content="{{ asset(SITE_THEME_ASSET.'/images/1543500805-Phan-Phoi-Tra-Giam-Can-Golean-Detox-Tai-Ha-Noi.png')}}"/>
    <meta property="og:site_name" content="{{ \Request::fullUrl() }}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="{{$title??$configsGlobal['title']}}">
    <meta name="twitter:site" content="{{$title??$configsGlobal['title']}}">
    <meta name="twitter:title" content="{{$title??$configsGlobal['title']}}">
    <meta name="twitter:description"
          content="{{ $description??$configsGlobal['description'] }}">
    <meta name="twitter:creator" content="{{$title??$configsGlobal['title']}}">

    <!--    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Module meta -->
    <script type="application/ld+json">
                    {
                      "@context"        :    "{!! $scheama['@context'] ??'' !!}",
                      "@type"           : "{!! $scheama['@type'] ??'' !!}",
                      "name"            : "{!! $scheama['name'] ??'' !!}",
                      "alternateName"   : "{!! $scheama['contactPoint']['areaServed'] ??'' !!}",
                      "url":  "{!! $scheama['url'] ??'' !!}",

                    }
                </script>
@isset ($layouts['meta'])
    @foreach ( $layouts['meta']  as $layout)
        @if ($layout->page == null ||  $layout->page =='*' || $layout->page =='' || (isset($layout_page) && in_array($layout_page, $layout->page) ) )
            @if ($layout->page =='html')
                {{$layout->text }}
            @endif
        @endif
    @endforeach
@endisset
<!--//Module meta -->

    <link href="{{ asset(SITE_THEME_ASSET.'/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>

    <link href="{{ asset(SITE_THEME_ASSET.'/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=vietnamese"
          rel="stylesheet">
    <link rel='stylesheet' id='owl.carousel-css' href='{{ asset(SITE_THEME_ASSET.'/css/owl.carousel.min.css')}}'
          type='text/css' media=''/>
    <link href="{{ asset(SITE_THEME_ASSET.'/css/skdslider.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset(SITE_THEME_ASSET.'/css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
    <!--Module header -->
@isset ($layouts['header'])
    @foreach ( $layouts['header']  as $layout)
        @if ($layout->page == null ||  $layout->page =='*' || $layout->page =='' || (isset($layout_page) && in_array($layout_page, $layout->page) ) )
            @if ($layout->page =='html')
                {{$layout->text }}
            @endif
        @endif
    @endforeach
@endisset
<!--//Module header -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142639977-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-142639977-1');
    </script>
</head><!--/head-->
<body>
<div id="fb-root"></div>
<script type="text/javascript">(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=351401302047617&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "2274204152815534", // Facebook page ID

            company_logo_url: "//storage.whatshelp.io/widget/b7/b7a7/b7a7e55dee3decc35485d7a0d58d07ca/47202074_1233805586758970_14023549257777152_n.png", // URL of company logo (png, jpg, gif)
            greeting_message: "Chat tại đây để NHẬN ƯU ĐÃI.", // Text of greeting message
            call_to_action: "Chat nhận ưu đãi", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->


@if ($configs['site_status'])

    <!--Module top -->
    @isset ($layouts['top'])
        @foreach ( $layouts['top']  as $layout)
            @if ($layout->page == null ||  $layout->page =='*' || $layout->page =='' || (isset($layout_page) && in_array($layout_page, $layout->page) ) )
                @if ($layout->type =='html')
                    {!! $layout->text !!}
                @elseif($layout->type =='view')
                    @if (view()->exists('blockView.'.$layout->text))
                        @include('blockView.'.$layout->text)
                    @endif
                @elseif($layout->type =='module')
                    {!! (new $layout->text)->render() !!}
                @endif
            @endif
        @endforeach
    @endisset
    <!--//Module top -->
    <div id="wrap">
        <h1 style="display: none">{{$title??$configsGlobal['title']}}</h1>
        @include(SITE_THEME.'.header')
        @yield('breadcrumb')
        @section('main')
            @include(SITE_THEME.'.center')
        @show
    </div>
@else
    <section>
        <div class="container">
            <div class="row">
                <div id="columns" class="container" style="color:red;text-align: center;">
                    <img src="{{ asset('images/maintenance.png') }}"><br>
                    <h3><i class="fas fa-exclamation"></i>{{ trans('language.maintenance') }}</h3>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </section>
@endif

@include(SITE_THEME.'.footer')
@stack('scripts')
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.post-gallery').magnificPopup({
            delegate: '.item-gallery',
            type: 'image',
            tLoading: '',
            mainClass: 'ew-popup mfp-zoom-in',
            removalDelay: 300,
            callbacks: {
                /*beforeOpen: function() {
                 // just a hack that adds mfp-anim class to markup
                 this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                 this.st.mainClass = this.st.el.attr('data-effect');
                 },*/
                open: function () {
                    //overwrite default prev + next function. Add timeout for css3 crossfade animation
                    jQuery.magnificPopup.instance.next = function () {
                        var self = this;
                        self.wrap.removeClass('mfp-image-loaded');
                        setTimeout(function () {
                            jQuery.magnificPopup.proto.next.call(self);
                        }, 120);
                    }
                    jQuery.magnificPopup.instance.prev = function () {
                        var self = this;
                        self.wrap.removeClass('mfp-image-loaded');
                        setTimeout(function () {
                            jQuery.magnificPopup.proto.prev.call(self);
                        }, 120);
                    }
                },
                imageLoadComplete: function () {
                    var self = this;
                    setTimeout(function () {
                        self.wrap.addClass('mfp-image-loaded');
                    }, 16);
                }
            },
            closeOnContentClick: true,
            midClick: true, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            image: {
                //cursor: 'mfp-zoom-out-cur',
                cursor: null,
                titleSrc: 'title'
            },
            gallery: {
                enabled: true,
                preload: [1, 1], // Will preload 0 - before current, and 1 after the current image
                navigateByImgClick: true,
                tPrev: 'Previous (Left arrow key)', // title for left button
                tNext: 'Next (Right arrow key)', // title for right button
            },
            /*retina: {
             ratio: 2 // can also be function that should retun this number
             }*/
        });

        // H m active tab n o ?
        function activeTab(obj) {
            // X a class active t?t c? c c tab
            jQuery('.tab-wrapper ul li').removeClass('active');

            // Th m class active v a tab ?ang click
            jQuery(obj).addClass('active');

            // L?y href c?a tab ?? show content t??ng ?ng
            var id = jQuery(obj).find('a').attr('href');

            // ?n h?t n?i dung c c tab ?ang hi?n th?
            jQuery('.tab-item').hide();

            // Hi?n th? n?i dung c?a tab hi?n t?i
            jQuery(id).show();
        }

        // S? ki?n click ??i tab
        jQuery('.tab li').click(function () {
            activeTab(this);
            return false;
        });

        // Active tab ??u ti n khi trang web ???c ch?y
        activeTab(jQuery('.tab li:first-child'));
    });
    var _rys = jQuery.noConflict();
    _rys("document").ready(function () {

        _rys(window).scroll(function () {
            if (_rys(this).scrollTop() > 90) {
                _rys('.wrap_menu').addClass("f-nav");
            } else {
                _rys('.wrap_menu').removeClass("f-nav");
            }
        });

    });
    jQuery(document).ready(function () {
        jQuery('#demo1').skdslider({
            delay: 6000,
            animationSpeed: 1000,
            showNextPrev: true,
            showPlayButton: true,
            autoSlide: true,
            animationType: 'sliding'
        });
        jQuery('#responsive').change(function () {
            jQuery('#responsive_wrapper').width(jQuery(this).val());
        });
    });
    jQuery(document).ready(function () {

        var sync1 = jQuery("#sync1");
        var sync2 = jQuery("#sync2");

        sync1.owlCarousel({
            singleItem: true,
            slideSpeed: 1000,
            navigation: true,
            pagination: false,
            afterAction: syncPosition,
            responsiveRefreshRate: 200,
            autoHeight: true,
            navigationText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
        });

        sync2.owlCarousel({
            items: 5,
            itemsDesktop: [1199, 5],
            itemsDesktopSmall: [979, 5],
            itemsTablet: [768, 5],
            itemsMobile: [479, 5],
            pagination: false,
            responsiveRefreshRate: 100,
            afterInit: function (el) {
                el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        function syncPosition(el) {
            var current = this.currentItem;
            jQuery("#sync2")
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced")
            if (jQuery("#sync2").data("owlCarousel") !== undefined) {
                center(current)
            }
        }

        jQuery("#sync2").on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = jQuery(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
        });

        function center(number) {
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for (var i in sync2visible) {
                if (num === sync2visible[i]) {
                    var found = true;
                }
            }

            if (found === false) {
                if (num > sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                } else {
                    if (num - 1 === -1) {
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if (num === sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", sync2visible[1])
            } else if (num === sync2visible[0]) {
                sync2.trigger("owl.goTo", num - 1)
            }

        }

    });
    jQuery('.open-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        mainClass: 'mfp-fade'
    });

    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (100000 * 60 * 60)) % 24);
        var days = Math.floor(t / (100000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    initializeClock('clockdiv', deadline);
</script>
<!--message-->
@if(Session::has('message'))
    <script type="text/javascript">
        $.notify({
            icon: 'glyphicon glyphicon-star',
            message: "{!! Session::get('message') !!}"
        }, {
            type: 'success'
        });
    </script>
@endif
@if(Session::has('error'))
    <script type="text/javascript">
        $.notify({
            icon: 'glyphicon glyphicon-warning-sign',
            message: "{!! Session::get('error') !!}"
        }, {
            type: 'danger'
        });
    </script>
@endif
@if(Session::has('warning'))
    <script type="text/javascript">
        $.notify({
            icon: 'glyphicon glyphicon-warning-sign',
            message: "{!! Session::get('warning') !!}"
        }, {
            type: 'warning'
        });
    </script>
@endif
<!--//message-->


<!--Module bottom -->
@isset ($layouts['bottom'])
    @foreach ( $layouts['bottom']  as $layout)
        @if ($layout->page == null ||  $layout->page =='*' || $layout->page =='' || (isset($layout_page) && in_array($layout_page, $layout->page) ) )
            @if ($layout->type =='html')
                {!! $layout->text !!}
            @elseif($layout->type =='view')
                @if (view()->exists('blockView.'.$layout->text))
                    @include('blockView.'.$layout->text)
                @endif
            @elseif($layout->type =='module')
                {!! (new $layout->text)->render() !!}
            @endif
        @endif
    @endforeach
@endisset
<!--//Module bottom -->
</body>
</html>
