<!-- Order Track -->
@if(!empty($siteData))
<div class="order-track row mt-4">
    <div class="col">
        <div class="text-center">
            <div class="icon">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <p><strong>{{ currentDate() }}</strong></p>
            <p class="text-muted">Ordered</p>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <div class="icon">
                <i class="fa-solid fa-truck"></i>
            </div>
            <p><strong>{{ upcomingDateRange($siteData->estimate_order_ready) }}</strong></p>
            <p class="text-muted">Order Ready</p>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <div class="icon">
                <i class="fa-solid fa-gift"></i>
            </div>
            <p><strong>{{ upcomingDateRange($siteData->estimate_order_delivery) }}</strong></p>
            <p class="text-muted">Delivered</p>
        </div>
    </div>
</div>
@else
<div class="order-track row mt-4">
    <div class="col">
        <div class="text-center">
            <div class="icon">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <p><strong>Aug 21st</strong></p>
            <p class="text-muted">Ordered</p>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <div class="icon">
                <i class="fa-solid fa-truck"></i>
            </div>
            <p><strong>Aug 22nd - Aug 24th</strong></p>
            <p class="text-muted">Order Ready</p>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <div class="icon">
                <i class="fa-solid fa-gift"></i>
            </div>
            <p><strong>Aug 24th - Aug 28th</strong></p>
            <p class="text-muted">Delivered</p>
        </div>
    </div>
</div>
@endif