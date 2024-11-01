<!-- Modal -->
<style>
    .colordv .actv {
        background: {{!empty($siteData->theme_color) ? $siteData->theme_color : ''}}!important;
    }
</style>
<div class="modal slide-modal" id="contactUs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="contactUs" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 align-items-center text-light"
                style="{{!empty($siteData->theme_color) ? 'background-color:'. $siteData->theme_color : 'background-color:#198754;'}}">
                <div class="w-100">
                    <div class="text-center">
                        🛍️LIMITED TIME OFFER VALID FOR TODAY ONLY 😯 ⬇️
                    </div>

                </div>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(!empty($products))
                <div class="d-flex align-items-center my-3 py-3 border border-start-0 border-end-0">
                    <div class="flex-grow-1">
                        <h5 class="text-center m-0">{{$products->name}}</h5>
                    </div>
                    <div><strong>Rs. <span id="ord_price">{{!empty($products->packages) && count($products->packages)>0
                                ?
                                $products->packages[0]->price
                                :
                                $products->price}}</span></strong></div>
                </div>

                @foreach($products->attributes as $attribute)
                <h4 class="choose-tle">Choose {{$attribute->name}}</h4>
                <div class="colordv">
                    @foreach($attribute->values as $value)
                    <label class="attr-{{$attribute->id}} {{$loop->first?'actv':''}}"
                        onclick="selectAttribute(this, 'attr-{{$attribute->id}}', '{{$value->value}}')">{{$value->value}}</label>
                    @endforeach
                </div>
                @endforeach

                @if(!empty($products->packages) && count($products->packages)>0)
                <div style="margin-bottom: 8%;">
                    {{--@foreach($products->packages as $package)
                    <label class="labels {{$loop->first?'lactive':''}}" data-package="{{$package->id}}"
                        data-price="{{$package->price}}" data-old-price="{{$package->old_price}}"
                        data-offer="{{$package->offer}}"
                        onclick="get_price_value(this, {{$package->id}}, {{$package->price}}, {{$package->old_price}}, {{$package->offer}})">
                        <div class="rdbtn">
                            @if($loop->first)
                            <input type="radio" name="package" value="{{$package->id}}" class="reado" checked />
                            @else
                            <input type="radio" name="package" value="{{$package->id}}" class="reado" />
                            @endif
                        </div>
                        <div class="rdb">
                            <p class="pg1"><strong>BUY {{$package->name}}</strong> - <span>₹ {{$package->price}}</span>
                            </p>
                        </div>
                    </label>
                    @endforeach--}}

                    @if(!empty($products->packages))
                    <div class="row g-1">
                        @foreach($products->packages as $package)
                        <div class="col-4">
                            <div class="card package {{$loop->first?'active-pack':''}} text-center"
                                style="{{!empty($siteData->theme_color) ? 'border-color:'.$siteData->theme_color : 'border-color:#198754;'}}"
                                onclick="get_price_value(this, {{$package->id}}, {{$package->price}}, {{$package->old_price}}, {{$package->offer}})">
                                <div class="card-header border-0 bg-transparent">
                                    <strong>{{$package->name}}</strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text m-0"><strong class="badge"
                                            style="{{!empty($siteData->theme_color) ? 'background-color:'.$siteData->theme_color : 'background-color:#198754;'}}">Save
                                            Rs.{{$package->old_price - $package->price}}</strong></p>
                                    <p class="card-text m-0"><strong>Rs.{{$package->price}}</strong></p>
                                    <p class="card-text m-0"><del><small>Rs.{{$package->old_price}}</small></del></p>
                                </div>
                                @if(!empty($package->seller_message))
                                <div class="card-footer border-0 text-white text-uppercase"
                                    style="{{!empty($siteData->theme_color) ? 'background-color:'. $siteData->theme_color.';border-color:'.$siteData->theme_color : 'background-color:#198754;'}}">
                                    <small>{{$package->seller_message}}</small>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endif

                @endif
                <form action="{{route('placeOrder')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{!empty($products) ? $products->id : ''}}" />

                    @foreach($products->attributes as $attribute)
                    @if(!empty($attribute->values) && count($attribute->values) >0)
                    <input id="attr-{{$attribute->id}}" type="hidden" name="selected_attributes[{{$attribute->name}}]"
                        value="{{$attribute->values[0]->value}}" />
                    @endif
                    @endforeach

                    @if(!empty($products->packages) && count($products->packages) > 0)
                    <input id="pp_id" type="hidden" name="package_id" value="{{$products->packages[0]->id}}" />
                    @endif

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="mobile" style="width: 40px;"><i
                                class="fa fa-mobile"></i></span>
                        <input name="mobile" type="text" class="form-control" placeholder="Mobile" aria-label="Mobile"
                            aria-describedby="mobile" oninput="validateNumber(this)" pattern="\d{1,10}"
                            title="Please enter up to 10 digits" maxlength="10" required />
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name" style="width: 40px;"><i class="fa fa-user"></i></span>
                        <input name="name" type="text" class="form-control" placeholder="Full Name"
                            aria-label="Full Name" minlength="3" aria-describedby="name" required />
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="address_line_one" style="width: 40px;"><i
                                class="fa fa-map-marker"></i></span>
                        <input name="address_line_one" type="text" class="form-control"
                            placeholder="House No. & Colony/Apartment" aria-label="House No. & Colony/Apartment"
                            aria-describedby="address_line_one" minlength="4" required />
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="address_line_two" style="width: 40px;"><i
                                class="fa fa-map-marker"></i></span>
                        <input name="address_line_two" type="text" class="form-control" placeholder="Address & Landmark"
                            aria-label="Address & Landmark" aria-describedby="address_line_two" minlength="5"
                            required />
                    </div>


                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="pin" style="width: 40px;"><i
                                    class="fa fa-hashtag"></i></span>
                            <input id="pincode" name="pin" type="text" class="form-control" placeholder="Pincode"
                                aria-label="Pincode" aria-describedby="pin" oninput="validateNumber(this)"
                                pattern="\d{1,6}" title="Please enter up to 6 digits" maxlength="6" required />
                        </div>
                        <div id="pinError" class="text-danger d-none">
                            <small>Pin Code not available.</small>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="city" style="width: 40px;"><i
                                class="fa fa-map-marker"></i></span>
                        <input id="cityname" name="city" type="text" class="form-control" placeholder="City"
                            aria-label="City" aria-describedby="city" required />
                    </div>

                    <select id="state" name="state" class="form-select mb-3" aria-label="State" required>
                        <option id="select_state" selected disabled>State</option>
                        @foreach($states as $state)
                        <option id="{{$state->state}}" value="{{$state->state}}">{{$state->state}}</option>
                        @endforeach
                    </select>
                    <!-- Hidden input to submit the value -->
                    <input id='selected_state' type="hidden" name="state" value="">

                    <div class="d-grid gap-2">
                        @if(count($products->attributes) > 0)
                        <button id="order_btn" type="submit" class="btn text-light"
                            style="{{!empty($siteData->theme_color) ? 'background-color:'. $siteData->theme_color : 'background-color:#198754;'}}">Buy
                            Now (Free COD)- Rs
                            <span id="place_order_btn">{{!empty($products->price) ? $products->price : ''}}</span>
                        </button>
                        @else
                        <button id="order_btn" type="submit" class="btn text-light"
                            style="{{!empty($siteData->theme_color) ? 'background-color:'. $siteData->theme_color : 'background-color:#198754;'}}"
                            disabled>Buy Now (Free COD)- Rs
                            <span id="place_order_btn">{{!empty($products->price) ? $products->price : ''}}</span>
                        </button>
                        @endif
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
<script>
    const product = @json($products);
    const deliveryOptions = @json($deliveryOptions);
    const pinCodeBox = document.getElementById('pincode');
    const selectBox = document.getElementById('state');

    function validateNumber(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/\D/g, '');
    }


    selectBox.addEventListener('change', function () {
        document.getElementById('selected_state').value = selectBox.value;
    });

    pinCodeBox.addEventListener('keyup', function () {
        let dOpts = deliveryOptions.filter((dOpt) => dOpt.pin == pinCodeBox.value);
        dOpts = dOpts.length > 0 ? dOpts[0] : {};
        const { pin, city, state } = dOpts;
        document.getElementById('cityname').value = city ?? '';

        // Loop through each option in the select box
        if (state) {
            for (let i = 0; i < selectBox.options.length; i++) {
                let optionVal = selectBox.options[i].value.toLowerCase();

                // If the input matches the option value, select it
                if (optionVal === state.toLowerCase()) {
                    selectBox.selectedIndex = i;
                    selectBox.disabled = true;
                    document.getElementById('selected_state').value = selectBox.options[i].value;
                    //selectBox.value = selectBox.options[i].value;
                    break; // Stop the loop once we find a match
                }
            }
            document.getElementById('order_btn').disabled = false;
            document.getElementById('pinError').classList.add('d-none');
            document.getElementById('pinError').classList.remove('d-block');
        } else {
            selectBox.selectedIndex = 0;
            selectBox.disabled = false;
            document.getElementById('order_btn').disabled = true;
            document.getElementById('pinError').classList.add('d-block');
            document.getElementById('pinError').classList.remove('d-none');
        }

    });


    function selectAttribute(element, selector, value) {
        // Remove 'actv' class from all elements with class 'colordv c'
        document.querySelectorAll(`.colordv .${selector}`).forEach(function (el) {
            el.classList.remove('actv');
        });

        // Add 'actv' class to the clicked element (this)
        element.classList.add('actv');
        document.getElementById(selector).value = value;
    }

    function sizec(element, size_id) {
        // Remove 'actv' class from all elements with class 'colordv c'
        document.querySelectorAll('.colordv .s').forEach(function (el) {
            el.classList.remove('actv');
        });

        // Add 'actv' class to the clicked element (this)
        element.classList.add('actv');
        document.getElementById('ps_id').value = size_id;
    }

    function get_price_value(element, package_id, price, old_price, offer) {
        // Remove 'actv' class from all elements with class 'colordv c'
        // document.querySelectorAll('.labels').forEach(function (el) {
        //     el.classList.remove('lactive');
        // });

        document.querySelectorAll(`.package`).forEach(function (el) {
            el.classList.remove('active-pack');
        });

        // Add 'actv' class to the clicked element (this)
        //element.classList.add('lactive');
        element.classList.add('active-pack');
        document.getElementById('pp_id').value = package_id;
        document.getElementById('ord_price').innerHTML = price;
        document.getElementById('place_order_btn').innerHTML = price;
    }
</script>
@endpush