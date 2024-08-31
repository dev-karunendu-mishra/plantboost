@if(!empty($products) && count($products->images) > 0 )
<div class="slider">
    @foreach($products->images as $image)
    <img class="img-fluid" src="{{ asset('storage/' . $image->path) }}" alt="">
    @endforeach
</div>
@else
<div class="slider">
    <img class="img-fluid" src="https://crazycrafti.shop/cdn/shop/files/You_also_have_back_pain_due_to_weight_gain._600x.jpg?v=1723026073"
        alt="">
    <img class="img-fluid" src="https://crazycrafti.shop/cdn/shop/files/48_4ec37f7e-ad5b-4c86-af9e-d91a47857438_600x.jpg?v=1722662151"
        alt="">
    <img class="img-fluid" src="https://crazycrafti.shop/cdn/shop/files/50_5bd4b743-020e-4445-9ede-f7f8cbdab871_600x.jpg?v=1722662152"
        alt="">
    <img class="img-fluid" src="https://crazycrafti.shop/cdn/shop/files/49_db1fccfb-763f-4c58-912a-f700a662bbcb_600x.jpg?v=1722662151"
        alt="">
    <img class="img-fluid" src="https://crazycrafti.shop/cdn/shop/files/53_600x.jpg?v=1722661992" alt="">
    <img class="img-fluid" src="https://crazycrafti.shop/cdn/shop/files/52_7cab0789-6899-40c8-b4cf-521dba6b5e84_600x.jpg?v=1722662151"
        alt="">
    <img class="img-fluid" src="https://crazycrafti.shop/cdn/shop/files/61_600x.jpg?v=1722661992" alt="">
</div>
@endif