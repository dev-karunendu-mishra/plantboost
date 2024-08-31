<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(!empty($siteSettings) && !empty($siteSettings->icon))
    <link rel="icon" href="{{asset('storage/'.$siteSettings->icon)}}" />
    @else
    <link rel="icon" href="{{url('assets/img/logo.png')}}" />
    @endif

    <title>{{ $seo['title'] ?? 'Organic Plant Boost (PACK OF 3)' }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Organic Plant Boost' }}" />
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'Organic Plant Boost' }}" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->

    <link href="assets/css/app.css" rel="stylesheet">



    <!-- <script type="text/javascript">
        var tWidth='100%';                  // width (in pixels)
        var tHeight='45px';                  // height (in pixels)
        var tcolour='#ffffcc';               // background colour:
        var moStop=true;                     // pause on mouseover (true or false)
        var fontfamily = 'arial,sans-serif'; // font for content
        var tSpeed=3;                        // scroll speed (1 = slow, 5 = fast)
        
        // enter your ticker content here (use \/ and \' in place of / and ' respectively)
        var contentOne='WELCOME!   The Best Shop for your Plants!!!   Delivering Happiness, Health and Growth for your PLANTS All Over INDIA!!!';
        var contentTwo='WELCOME!   The Best Shop for your Plants!!!   Delivering Happiness, Health and Growth for your PLANTS All Over INDIA!!!';
        
        var cps=-tSpeed; 
        var aw, mq; 
        var fsz = parseInt(tHeight) - 20; 
        function startticker() {
            if(document.getElementById) {
                var tick = '<div style="position:relative;width:'+tWidth+';height:'+tHeight+';overflow:hidden;background-color:'+tcolour+'"'; 
                if (moStop) tick += ' onmouseover="cps=0" onmouseout="cps=-tSpeed"'; 
                tick +='><div id="mq" style="position:absolute;right:0px;top:0px;font-family:'+fontfamily+';font-size:'+fsz+'px;white-space:nowrap;font-weight: bold;"><\/div><\/div>'; 

                document.getElementById('ticker').innerHTML = tick; mq = document.getElementById("mq"); mq.style.right=(10+parseInt(tWidth))+"px"; mq.innerHTML='<span id="tx">'+contentOne+'<\/span>';
                  
                document.getElementById('ticker').innerHTML = tick; mq = document.getElementById("mq"); mq.style.right=(10+parseInt(tWidth))+"px"; mq.innerHTML='<span id="tx">'+contentOne+'<\/span>';

                aw = document.getElementById("tx").offsetWidth; lefttime=setInterval("scrollticker()",50);}} function scrollticker(){mq.style.right = (parseInt(mq.style.right)>(-10 - aw)) ?
                mq.style.right = parseInt(mq.style.right)+cps+"px": parseInt(tWidth)+10+"px";} window.onload=startticker;
    </script> -->

    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return; n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
            n.queue = []; t = b.createElement(e); t.async = !0;
            t.src = v; s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '799814715643086');
        //fbq('track', 'PageView');
    </script>
    <!-- <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=799814715643086&ev=PageView&noscript=1" />
    </noscript> -->
    <!-- End Facebook Pixel Code -->
</head>

<body>
    @if (Route::is('index'))
    {{-- Your component goes here --}}
    <marquee class="h5 fw-bold text-white position-relative mb-0 py-2" behavior="scrolling" direction="left"
        style="max-width: 500px;left: 50%;transform: translateX(-50%);background-color: #60bb2a;">
        {{!empty($siteData) ? $siteData->notification : 'WELCOME! The Best Shop
        for your Plants!!! Delivering Happiness, Health and Growth for your PLANTS All Over INDIA!!!'}}</marquee>
    @endif

    @include('default.components.navbar')
    {{ $slot }}
    @include('default.components.footer')

    <!-- Optional JavaScript; choose one of the two! -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>