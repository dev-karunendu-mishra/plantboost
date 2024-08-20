<x-default-app-layout>
    <div id="ticker" style="max-width: 500px;margin-inline: auto;padding-inline: 14px;">
        {{!empty($siteData->notification) ? $siteData->notification : 'this is a simple scrolling text!'}}

    </div>
    <div class="container">
        @include('default.components.navbar')

        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($products && $products->images)

        <div class="slider">
            @foreach($products->images as $image)
            <img src="{{asset('storage/'.$image->path)}}" alt="" />
            @endforeach
        </div>
        @else
        <div class="slider">
            <img src="https://crazycrafti.shop/cdn/shop/files/You_also_have_back_pain_due_to_weight_gain._600x.jpg?v=1723026073"
                alt="">
            <img src="https://crazycrafti.shop/cdn/shop/files/48_4ec37f7e-ad5b-4c86-af9e-d91a47857438_600x.jpg?v=1722662151"
                alt="">
            <img src="https://crazycrafti.shop/cdn/shop/files/50_5bd4b743-020e-4445-9ede-f7f8cbdab871_600x.jpg?v=1722662152"
                alt="">
            <img src="https://crazycrafti.shop/cdn/shop/files/49_db1fccfb-763f-4c58-912a-f700a662bbcb_600x.jpg?v=1722662151"
                alt="">
            <img src="https://crazycrafti.shop/cdn/shop/files/53_600x.jpg?v=1722661992" alt="">
            <img src="https://crazycrafti.shop/cdn/shop/files/52_7cab0789-6899-40c8-b4cf-521dba6b5e84_600x.jpg?v=1722662151"
                alt="">
            <img src="https://crazycrafti.shop/cdn/shop/files/61_600x.jpg?v=1722661992" alt="">
        </div>
        @endif

        @if(!empty($products))
        <h1 class="h2">{{$products->name}}</h1>
        @else
        <h1 class="h2">Organic Plant Boost (PACK OF 3)</h1>
        @endisset



        <div class="d-flex align-items-center my-3">
            <span class="visually-hidden">Sale price</span><span class="h2 fw-bold text-danger me-3">Rs.
                {{!empty($products->price) ? $products->price : 499.00}}</span>
            <span class="visually-hidden">Regular price</span><span
                class="h2 fw-normal text-decoration-line-through">Rs. {{!empty($products->old_price) ?
                $products->old_price : 1299.00}}</span>
            <span class="badge bg-danger ms-5">Save {{!empty($products->offer) ? $products->offer : 62}}%</span>
        </div>

        <div class="d-grid gap-2 pt-3">
            <button class="btn btn-success fw-bold rounded-pill button-glow" type="button" data-bs-toggle="modal"
                data-bs-target="#contactUs">
                <span>Order Now - Cash on Delivery</span>
            </button>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <img src="assets/img/shield-icon.png" alt="" class="img-fluid">
            </div>
        </div>

        <div class="rte ">
            <p>Transform your garden into a lush paradise with Plant Boost! Our 100% organic and eco-friendly formula is
                designed to enhance soil quality, promote faster root development, and boost overall plant growth.
                Whether you're growing flowers, vegetables, or herbs, Plant Boost is the perfect solution for achieving
                a healthy, thriving garden.</p>
            <p><img alt="" src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_01_1.gif?v=1723019168"
                    width="479" height="479"></p>
            <p><br></p>
            <p>Unlike synthetic fertilizers, Plant Boost is eco-friendly and sustainable, making it the perfect choice
                for environmentally conscious gardeners. Its easy-to-use formula can be effortlessly mixed with water
                and applied directly to your plants, making it suitable for both novice and experienced gardeners alike.
            </p>
            <p><img alt="" src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/57.jpg?v=1722661992" width="485"
                    height="485"></p>
            <p>Experience the joy of gardening with Plant Boost as it transforms your garden into a thriving paradise.
                Our formula not only boosts plant growth but also improves soil aeration, enhances nutrient absorption,
                and increases water retention, reducing the need for frequent watering.</p>
            <p><img alt="" src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_02_1.gif?v=1723019168"
                    width="492" height="492"></p>
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
            <p><img alt=""
                    src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/51_06c7a714-a409-43fa-bbba-cd890e3fe432.jpg?v=1722662152"
                    width="489" height="489"></p>
            <p><img alt="" src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_03_1.gif?v=1723019170"
                    width="488" height="488"></p>
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
                    <img src="assets/img/shield-icon.png" alt="" class="img-fluid">
                </div>
            </div>

            <p><img alt="" src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/60.jpg?v=1722661992" width="466"
                    height="466"></p>
            <p><strong>How to Use Plant Boost:</strong></p>
            <ol>
                <li>Mix the amount of Plant Boost with water.</li>
                <li>Apply the mixture to your plants' roots.</li>
                <li>Water your plants as usual.</li>
                <li>Watch your garden thrive!</li>
            </ol>
            <p><img alt="" src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/55.jpg?v=1722661992" width="473"
                    height="473"></p>
            <h3><strong>FAQs</strong></h3>
            <p><strong>Q1: Is Plant Boost safe for all types of plants?</strong> Yes, Plant Boost is 100% organic and
                safe for all plant types, including flowers, vegetables, and herbs.</p>
            <p><strong>Q2: How often should I use Plant Boost?</strong> For best results, use Plant Boost once every two
                weeks.</p>
            <p><strong>Q3: Can Plant Boost be used in all seasons?</strong> Yes, Plant Boost is effective in all
                seasons, providing year-round care for your garden.</p>
            <p><strong>Q4: How much Plant Boost should I use?</strong> Mix the recommended amount (as per the packaging)
                with water and apply to your plants' roots.</p>
            <p><strong>Q5: Is Plant Boost safe for pets?</strong> Yes, Plant Boost is made from natural ingredients and
                is safe for pets.</p>
            <!---->
        </div>

        <div class="slider-two">
            <img src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_01_1.gif?v=1723019168" alt="" />
            <img src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_02_1.gif?v=1723019168" alt="" />
            <img src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_03_1.gif?v=1723019170" alt="" />
        </div>

        <!-- Modal -->
        <div class="modal fade" id="contactUs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="contactUs" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 align-items-start">
                        <div class="w-100">
                            <h4 class="text-uppercase text-center text-danger">Free Cash On Delivery</h4>
                            <div class="text-center"><img src="{{url('/assets/img/logo2.png')}}" width="100" /></div>
                            <h6 class="text-uppercase text-center text-danger my-2">Enter your Full and Correct Delivery
                                Address</h6>
                        </div>
                        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('placeOrder')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{!empty($products) ? $products->id : ''}}" />
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">@</span>
                                <input name="mobile" type="text" class="form-control" placeholder="Mobile"
                                    aria-label="Mobile" aria-describedby="mobile">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">@</span>
                                <input name="name" type="text" class="form-control" placeholder="Full Name"
                                    aria-label="Full Name" aria-describedby="name">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="address_line_one">@</span>
                                <input name="address_line_one" type="text" class="form-control"
                                    placeholder="House No. & Colony/Apartment" aria-label="House No. & Colony/Apartment"
                                    aria-describedby="address_line_one">
                            </div>


                            <div class="input-group mb-3">
                                <span class="input-group-text" id="address_line_two">@</span>
                                <input name="address_line_two" type="text" class="form-control"
                                    placeholder="Address & Landmark" aria-label="Address & Landmark"
                                    aria-describedby="address_line_two">
                            </div>


                            <div class="input-group mb-3">
                                <span class="input-group-text" id="pin">@</span>
                                <input id="pincode" name="pin" type="text" class="form-control" placeholder="Pincode"
                                    aria-label="Pincode" aria-describedby="pin">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="city">@</span>
                                <input id="cityname" name="city" type="text" class="form-control" placeholder="City"
                                    aria-label="City" aria-describedby="city">
                            </div>

                            <select id="state" name="state" class="form-select mb-3" aria-label="State">
                                <option selected disabled>State</option>
                                @foreach($states as $state)
                                <option value="{{$state->state}}">{{$state->state}}</option>
                                @endforeach
                            </select>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-danger">Buy Now (Free COD)- Rs {{$products->price}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @push('scripts')
        <script>
            $(document).ready(function () {
                @if ($errors -> any())
                    const myModel = new bootstrap.Modal('#contactUs');
                myModel.show();
                @endif
            });
        </script>
        @endpush

        @push('scripts')
        <script type="text/javascript">
            var tWidth = '100%';                  // width (in pixels)
            var tHeight = '50px';                  // height (in pixels)
            var tcolour = '#ffffcc';               // background colour:
            var moStop = true;                     // pause on mouseover (true or false)
            var fontfamily = 'arial,sans-serif'; // font for content
            var tSpeed = 3;                        // scroll speed (1 = slow, 5 = fast)

            // enter your ticker content here (use \/ and \' in place of / and ' respectively)
            var content = 'Are you looking for loads of useful information <a href="http:\/\/javascript.about.com\/">About Javascript<\/a>? Well now you\'ve found it.';

            var cps = -tSpeed;
            var aw, mq;
            var fsz = parseInt(tHeight) - 4;
            function startticker() {
                if (document.getElementById) {
                    var tick = '<div style="position:relative;width:' + tWidth + ';height:' + tHeight + ';overflow:hidden;background-color:' + tcolour + '"';
                    if (moStop) tick += ' onmouseover="cps=0" onmouseout="cps=-tSpeed"'; tick += '><div id="mq" style="position:absolute;right:0px;top:0px;font-family:' + fontfamily + ';font-size:' + fsz + 'px;white-space:nowrap;"><\/div><\/div>'; document.getElementById('ticker').innerHTML = tick; mq = document.getElementById("mq"); mq.style.right = (10 + parseInt(tWidth)) + "px"; mq.innerHTML = '<span id="tx">' + content + '<\/span>'; aw = document.getElementById("tx").offsetWidth; lefttime = setInterval("scrollticker()", 50);
                }
            } function scrollticker() {
                mq.style.right = (parseInt(mq.style.right) > (-10 - aw)) ?
                    mq.style.right = parseInt(mq.style.right) + cps + "px" : parseInt(tWidth) + 10 + "px";
            } window.onload = startticker;
        </script>
        @endpush

        @include('default.components.footer')
    </div>
    @push('scripts')
    <script>
        const product = @json($products);
        const deliveryOptions = @json($deliveryOptions);
        const pinCodeBox = document.getElementById('pincode');
        pinCodeBox.addEventListener('keyup', function () {
            let dOpts = deliveryOptions.filter((dOpt) => dOpt.pin == pinCodeBox.value);
            dOpts = dOpts.length > 0 ? dOpts[0] : {};
            const { pin, city, state } = dOpts;
            document.getElementById('cityname').value = city ?? '';
        });
    </script>
    @endpush

</x-default-app-layout>