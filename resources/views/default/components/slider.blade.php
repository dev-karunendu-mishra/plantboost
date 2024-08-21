<!-- sliders -->
@if(count($sliders) > 0)
<div class="slider-two pt-5">
    @foreach($sliders as $slider)
    <img src="{{ asset('storage/' . $slider->file_path) }}" alt="" />
    @endforeach
</div>
@else
<div class="slider-two pt-5">
    <img src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_01_1.gif?v=1723019168" alt="" />
    <img src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_02_1.gif?v=1723019168" alt="" />
    <img src="https://cdn.shopify.com/s/files/1/0877/9828/4604/files/Gif_03_1.gif?v=1723019170" alt="" />
</div>
@endif