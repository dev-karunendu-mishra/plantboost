@if(!empty($products) && count($products->images) > 0 )
<div id="carouselExampleSlidesOnly" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($products->images as $image)
    <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
      <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
    </div>
    @endforeach
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@else
<div id="carouselExampleSlidesOnly" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
   <div class="carousel-item active">
      <img src="https://crazycrafti.shop/cdn/shop/files/You_also_have_back_pain_due_to_weight_gain._600x.jpg?v=1723026073" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://crazycrafti.shop/cdn/shop/files/48_4ec37f7e-ad5b-4c86-af9e-d91a47857438_600x.jpg?v=1722662151" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://crazycrafti.shop/cdn/shop/files/50_5bd4b743-020e-4445-9ede-f7f8cbdab871_600x.jpg?v=1722662152" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://crazycrafti.shop/cdn/shop/files/49_db1fccfb-763f-4c58-912a-f700a662bbcb_600x.jpg?v=1722662151" class="d-block w-100" alt="...">
    </div>
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endif