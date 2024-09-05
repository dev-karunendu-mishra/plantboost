<!-- sliders -->
@if(count($sliders) > 0)
<div id="carouselReviewControlsSlider" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
      @foreach($sliders as $slider)
    <div class="carousel-item {{$loop->first?'active':''}}">
      <img src="{{ asset('storage/' . $slider->file_path) }}" class="d-block w-100" alt="...">
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselReviewControlsSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselReviewControlsSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@else
<div id="carouselReviewControlsSlider" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/img/Gif_01_1.gif?v=1723019168" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/assets/img/Gif_02_1.gif?v=1723019168" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/assets/img/Gif_03_1.gif?v=1723019170" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselReviewControlsSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselReviewControlsSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endif