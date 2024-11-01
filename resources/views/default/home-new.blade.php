<x-default-app-layout :siteSettings="$siteData" :seo="$seo">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success {{ session('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @include('default.components.product-slider')

        @if(!empty($products))
        <h1 class="h2">{{$products->name}}</h1>
        <div class="d-flex align-items-center py-2">
            <span class="ms-2">{{ number_format($products->rating, 2) }} </span>
            <div class="star">
                <i class="fa-solid fa-star text-success"></i> |
            </div>
            <span> &nbsp; {{ number_format($products->reviews / 1000, 2) }}k Reviews</span>
        </div>
        <div class="d-flex align-items-center my-3">
            <span class="visually-hidden">Sale price</span><span class="h2 fw-bold text-danger me-2 mb-0">Rs.
                {{$products->price}}</span>
            <span class="visually-hidden">Regular price</span><span
                class="h4 fw-normal text-decoration-line-through mb-0">Rs. {{$products->old_price}}</span>
            <span class="badge bg-danger ms-3">Save {{$products->offer}}%</span>
        </div>
        @else
        <h1 class="h2">Organic Plant Boost (PACK OF 3)</h1>
        <div class="d-flex align-items- py-2">
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <span class="ms-2">(7865 Reviews)</span>
        </div>
        <div class="d-flex align-items-center my-3">
            <span class="visually-hidden">Sale price</span><span class="h2 fw-bold text-danger me-2 mb-0">Rs.
                499.00</span>
            <span class="visually-hidden">Regular price</span><span
                class="h4 fw-normal text-decoration-line-through mb-0">Rs.
                1,299.00</span>
            <span class="badge bg-danger ms-3">Save 62%</span>
        </div>
        @endif

        <!-- Order Now Button -->
        <div class="d-grid gap-2 pt-3">
            @if(count($products->attributes) > 0)
            <button class="btn btn-success fw-bold rounded-pill shake-btn" type="button" data-bs-toggle="modal"
                data-bs-target="#contactUs" style="{{!empty($siteData->cod_button_bg) ? 'background-color:'. $siteData->cod_button_bg.';border-color:'.$siteData->cod_button_bg : ''}}">
                <span>Order Now - Cash on Delivery - {{!empty($products->price) ? $products->price : ''}}</span>
            </button>
            @else
            <button disabled class="btn btn-success fw-bold rounded-pill shake-btn" type="button" data-bs-toggle="modal"
                data-bs-target="#contactUs" style="{{!empty($siteData->cod_button_bg) ? 'background-color:'. $siteData->cod_button_bg.';border-color:'.$siteData->cod_button_bg : ''}}">
                <span>Order Now - Cash on Delivery - {{!empty($products->price) ? $products->price : ''}}</span>
            </button>
            @endif
        </div>

        <!-- Order Track -->
        @include('default.components.order-track')

        @if(!empty($products) && !empty($products->description))
        {!! $products->description !!}
        @else
        <div class="row mt-5">
            <div class="col-12">
                <img src="/assets/img/shield-icon.png" alt="" class="img-fluid">
            </div>
        </div>

        <div class="rte ">
            <p>Transform your garden into a lush paradise with Plant Boost! Our 100% organic and eco-friendly formula is
                designed to enhance soil quality, promote faster root development, and boost overall plant growth.
                Whether
                you're growing flowers, vegetables, or herbs, Plant Boost is the perfect solution for achieving a
                healthy,
                thriving garden.</p>
            <p><img alt="" class="img-fluid"
                    src="/assets/img/Gif_01_1.gif" width="479"
                    height="479"></p>
            <p><br></p>
            <p>Unlike synthetic fertilizers, Plant Boost is eco-friendly and sustainable, making it the perfect choice
                for
                environmentally conscious gardeners. Its easy-to-use formula can be effortlessly mixed with water and
                applied
                directly to your plants, making it suitable for both novice and experienced gardeners alike.</p>
            <p><img alt="" class="img-fluid"
                    src="/assets/img/57.jpg" width="485"
                    height="485"></p>
            <p>Experience the joy of gardening with Plant Boost as it transforms your garden into a thriving paradise.
                Our
                formula not only boosts plant growth but also improves soil aeration, enhances nutrient absorption, and
                increases water retention, reducing the need for frequent watering.</p>
            <p><img alt="" class="img-fluid"
                    src="/assets/img/Gif_02_1.gif" width="492"
                    height="492"></p>
            <h3><strong>Key Features and Benefits</strong></h3>
            <ol>
                <li>🌱 <strong>100% Organic</strong>: Completely natural and safe for your plants.</li>
                <li>🌿 <strong>Boosts Growth</strong>: Ensures rapid and strong plant growth.</li>
                <li>🌍 <strong>Eco-Friendly</strong>: No harmful chemicals, safe for the environment.</li>
                <li>🌾 <strong>Enhanced Soil Quality</strong>: Improves soil fertility and structure.</li>
                <li>💧 <strong>Better Water Retention</strong>: Helps soil retain moisture longer.</li>
                <li>🌻 <strong>Healthier Roots</strong>: Promotes robust root development.</li>
                <li>🌷 <strong>Increased Flower Production</strong>: More vibrant and plentiful blooms.</li>
                <li>🥕 <strong>Perfect for Vegetables</strong>: Boosts the growth of your veggie garden.</li>
                <li>🧑&zwj;🌾 <strong>Easy to Use</strong>: Simple application process.</li>
                <li>🌸 <strong>Year-Round Care</strong>: Effective in all seasons.</li>
            </ol>
            <p><img alt="" class="img-fluid"
                    src="/assets/img/51_06c7a714-a409-43fa-bbba-cd890e3fe432.jpg"
                    width="489" height="489"></p>
            <p><img alt="" class="img-fluid"
                    src="/assets/img/Gif_03_1.gif" width="488"
                    height="488"></p>
            <p><strong>Why Choose Plant Boost?</strong></p>
            <ul>
                <li>🌱 <strong>100% Organic</strong>: Safe for your plants and the environment.</li>
                <li>🌿 <strong>Boosts Plant Growth</strong>: Promotes faster and stronger growth.</li>
                <li>🌼 <strong>Improves Soil Quality</strong>: Enhances soil fertility and structure.</li>
                <li>💧 <strong>Better Water Retention</strong>: Reduces the need for frequent watering.</li>
                <li>🌍 <strong>Eco-Friendly</strong>: Chemical-free formula keeps your garden natural and healthy.</li>
            </ul>

            <div class="row mt-5">
                <div class="col-12">
                    <img src="/assets/img/shield-icon.png" alt="" class="img-fluid">
                </div>
            </div>

            <p><img alt="" class="img-fluid"
                    src="/assets/img/60.jpg" width="466"
                    height="466"></p>
            <p><strong>How to Use Plant Boost:</strong></p>
            <ol>
                <li>Mix the amount of Plant Boost with water.</li>
                <li>Apply the mixture to your plants' roots.</li>
                <li>Water your plants as usual.</li>
                <li>Watch your garden thrive!</li>
            </ol>
            <p><img alt="" class="img-fluid"
                    src="/assets/img/55.jpg" width="473"
                    height="473"></p>
            <h3><strong>FAQs</strong></h3>
            <p><strong>Q1: Is Plant Boost safe for all types of plants?</strong> Yes, Plant Boost is 100% organic and
                safe
                for
                all plant types, including flowers, vegetables, and herbs.</p>
            <p><strong>Q2: How often should I use Plant Boost?</strong> For best results, use Plant Boost once every two
                weeks.</p>
            <p><strong>Q3: Can Plant Boost be used in all seasons?</strong> Yes, Plant Boost is effective in all
                seasons,
                providing year-round care for your garden.</p>
            <p><strong>Q4: How much Plant Boost should I use?</strong> Mix the recommended amount (as per the packaging)
                with
                water and apply to your plants' roots.</p>
            <p><strong>Q5: Is Plant Boost safe for pets?</strong> Yes, Plant Boost is made from natural ingredients and
                is
                safe for pets.</p>
            <!---->
        </div>
        @endif

        @include('default.components.wave-notification')

        <x-slider :sliders="$products->sliders"/>
        <x-testimonial :testimonials="$products->testimonials"/>
    </div>

    @include('default.components.order-form')
    @if(count($products->attributes) > 0)
    <button id="footer_sticky_btn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#contactUs" style="{{!empty($siteData->cod_button_bg) ? 'background-color:'. $siteData->cod_button_bg.';border-color:'.$siteData->cod_button_bg : ''}}">👉 Order
        Now - Cash On Delivery <br />{{!empty($products->price) ? $products->price : ''}} </button>
    @else
    <button disabled id="footer_sticky_btn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#contactUs" style="{{!empty($siteData->cod_button_bg) ? 'background-color:'. $siteData->cod_button_bg.';border-color:'.$siteData->cod_button_bg : ''}}">👉 Order
        Now - Cash On Delivery <br />{{!empty($products->price) ? $products->price : ''}} </button>
    @endif

    @push('scripts')
    <script>
        window.onscroll = function () { buyatcbtnsticky() };

        function buyatcbtnsticky() {
            console.log(document.documentElement.scrollTop > 750);
            if (document.documentElement.scrollTop > 750) {
                document.getElementById("footer_sticky_btn").style.display = "block";
            } else {
                document.getElementById("footer_sticky_btn").style.display = "none";
            }
        }
    </script>
    @endpush

    @push('fb_scripts')
    <!-- Facebook Pixel Code -->
    <script>
        const productInfo = @json($products);
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
        fbq('init', productInfo.pixel_id);
        //fbq('track', 'PageView');
    </script>
    @endpush
</x-default-app-layout>