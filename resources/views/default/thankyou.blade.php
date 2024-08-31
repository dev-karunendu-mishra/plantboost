<x-default-app-layout :siteSettings="$siteData">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex mt-4">
                    <figure>
                        <img src="https://i.pinimg.com/564x/fc/a8/cc/fca8ccfc8f4af4188f554b0b0a6e1e3d.jpg"
                            style="height: 40px; width: 40px; object-fit: cover; border-radius: 7px;" alt="">

                    </figure>
                    <div class="ms-3">
                        <div class="h6 fw-normal text-secondary">Order # {{$order->order_id}}</div>
                        <div class="h4 text-dark">Thank You, {{$order->name}}</div>

                    </div>

                </div>

                <!-- second details of customer  -->
                <div class="custmer-details card mt-4">
                    <div class="card-body">
                        <h5 class="text-secondary fw-normal mb-2">Your order is confirmed</h5>
                        <p><small>You will receive an automated CALL as well as SMS to confirm the order.</small></p>
                    </div>
                </div>
                <div class="main-box container-fluid p-0 m-0 d-flex flex-column">
                    <!-- order status and name of the customer section  -->
                    <div class="d-flex justify-content-start gap-3 mt-4 align-items-center">
                        <div>
                        </div>
                        <div class="title-desc d-flex flex-column my-auto">
                        </div>
                    </div>



                    <!-- third section of customer details  -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="text-secondary">Order details</h5>
                            <div class="d-flex">
                                <div class="left-inner-left w-50">
                                    <!-- contact information  -->
                                    <p style="font-size: 14px;" class="fw-semibold mt-1 mb-2">Contact Information</p>
                                    <p style="font-size: 14px;">
                                        {{$order->mobile}} </p>
                                    <!-- shipping address  -->
                                    <p style="font-size: 14px;" class="fw-semibold mb-2">Shipping Address</p>
                                    <p style="font-size: 14px;" class="my-1">
                                        {{$order->name}} </p>
                                    <p style="font-size: 14px;" class="my-1">
                                        {{$order->address_line_one}} </p>
                                    <p style="font-size: 14px;" class="my-1">
                                        {{$order->address_line_two}} {{$order->pin}} </p>
                                    <p style="font-size: 14px;" class="mt-1 mb-3">{{$order->state}}</p>
                                    <!-- Shipping method  -->
                                    <p style="font-size: 14px;" class="fw-semibold mt-1 mb-2">Phone Number</p>
                                    <p style="font-size: 14px;">{{$order->mobile}}</p>
                                </div>
                                <div class="left-inner-right w-50">
                                    <!-- contact information  -->
                                    <p style="font-size: 14px;" class="fw-semibold mt-1 mb-2">Payment Method</p>
                                    <p style="font-size: 14px;text-transform:uppercase;">
                                        cod </p>
                                    <!-- shipping address  -->
                                    <p style="font-size: 14px;" class="fw-semibold mb-2">Billing Address</p>
                                    <p style="font-size: 14px;" class="my-1">
                                        {{$order->name}} </p>
                                    <p style="font-size: 14px;" class="my-1">{{$order->address_line_one}} </p>
                                    <p style="font-size: 14px;" class="my-1">{{$order->address_line_two}}
                                        {{$order->pin}} </p>
                                    <p style="font-size: 14px;" class="mt-1 mb-3">{{$order->state}}</p>
                                    <!-- Shipping method  -->
                                    <p style="font-size: 14px;" class="fw-semibold mt-1 mb-2">Shipping Method</p>
                                    <p style="font-size: 14px;">
                                        Free Shipping
                                    </p>
                                </div>
                            </div>
                            <p class="text-end"><small>Need help ? <span class="text-primary">Contact us</span></small>
                            </p>
                        </div>
                    </div>

                    <div class="card bg-transparent border-0 mt-4">
                        <div class="card-body p-0">
                            <!-- product item section  -->
                            <div class="product-section d-flex justify-content-between align-items-start">
                                <div class="title-desc d-flex flex-column my-auto">
                                    <div style="font-size: 16px;" class="p">{{$product->name}}</div>
                                </div>
                                <div class="price my-auto text-secondary">Rs. {{$product->price}}</div>
                            </div>
                            <!-- subtotal and calculation  -->
                            <div
                                class="text-secondary container-fluid p-0 my-4 py-4 border border-2 border-secondary border-start-0 border-end-0">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <p class="m-0" style="font-size: 14px;">Subtotal</p>
                                    <p class="m-0 fw-semibold text-dark" style="font-size: 14px;">Rs.
                                        {{$product->price}} </p>
                                </div>
                                <!-- <div class="d-flex justify-content-between align-items-center">
                                    <p class="m-0" style="font-size: 14px;">Discount</p>
                                    <p class="m-0 fw-semibold" style="font-size: 14px;">500 </p>
                                </div> -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="m-0" style="font-size: 14px;">Shipping</p>
                                    <p class="m-0 fw-semibold" style="font-size: 14px;">Free</p>
                                </div>
                            </div>
                            <!-- Total Price  -->
                            <div class="text-secondary container-fluid p-0">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <p class="m-0">Total</p>
                                    <h4 class="m-0 fw-semibold text-dark">Rs. {{$product->price}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        const order = @json($order);
        fbq('track', 'Purchase', order);
    </script>
    @endpush
</x-default-app-layout>