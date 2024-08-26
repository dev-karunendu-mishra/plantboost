<!-- Modal -->
<div class="modal slide-modal" id="contactUs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="contactUs" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 align-items-center bg-success text-light">
                <div class="w-100">
                    <div class="text-center">
                        🛍️LIMITED TIME OFFER VALID FOR TODAY ONLY 😯 ⬇️
                    </div>
                    
                </div>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
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
                @if(!empty($products))
                    <div class="d-flex align-items-center my-3 py-3 border border-start-0 border-end-0">
                        <div class="flex-grow-1">
                            <h5 class="text-center m-0">{{$products->name}}</h5>
                        </div>
                        <div><strong>Rs. {{$products->price}}</strong></div>
                    </div>
                    @endif
                <form action="{{route('placeOrder')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{!empty($products) ? $products->id : ''}}" />
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="mobile" style="width: 40px;"><i
                                class="fa fa-mobile"></i></span>
                        <input name="mobile" type="text" class="form-control" placeholder="Mobile" aria-label="Mobile"
                            aria-describedby="mobile" oninput="validateNumber(this)" pattern="\d{1,10}" title="Please enter up to 10 digits" maxlength="10">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name" style="width: 40px;"><i class="fa fa-user"></i></span>
                        <input name="name" type="text" class="form-control" placeholder="Full Name"
                            aria-label="Full Name" aria-describedby="name">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="address_line_one" style="width: 40px;"><i
                                class="fa fa-map-marker"></i></span>
                        <input name="address_line_one" type="text" class="form-control"
                            placeholder="House No. & Colony/Apartment" aria-label="House No. & Colony/Apartment"
                            aria-describedby="address_line_one">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="address_line_two" style="width: 40px;"><i
                                class="fa fa-map-marker"></i></span>
                        <input name="address_line_two" type="text" class="form-control" placeholder="Address & Landmark"
                            aria-label="Address & Landmark" aria-describedby="address_line_two">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="pin" style="width: 40px;"><i
                                class="fa fa-hashtag"></i></span>
                        <input id="pincode" name="pin" type="text" class="form-control" placeholder="Pincode"
                            aria-label="Pincode" aria-describedby="pin" oninput="validateNumber(this)" pattern="\d{1,6}" title="Please enter up to 6 digits" maxlength="6"/>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="city" style="width: 40px;"><i
                                class="fa fa-map-marker"></i></span>
                        <input id="cityname" name="city" type="text" class="form-control" placeholder="City"
                            aria-label="City" aria-describedby="city">
                    </div>

                    <select id="state" name="state" class="form-select mb-3" aria-label="State">
                        <option id="select_state" selected disabled>State</option>
                        @foreach($states as $state)
                        <option id="{{$state->state}}" value="{{$state->state}}">{{$state->state}}</option>
                        @endforeach
                    </select>
                    <!-- Hidden input to submit the value -->
                    <input id='selected_state' type="hidden" name="state" value="">

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Buy Now (Free COD)- Rs
                            {{!empty($products->price) ? $products->price : ''}}
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
        } else {
            selectBox.selectedIndex = 0;
            selectBox.disabled = false;
        }

    });
</script>
@endpush