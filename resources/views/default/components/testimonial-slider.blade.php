<!-- review sliders -->

</center>
<h5> SOME REVIEWS FROM OUR HAPPY CUSTOMERS</h5>
</center>
@if(count($testimonials) > 0)

<div class="review-slider mt-3">

    @foreach($testimonials as $testimonial)
    <div class="card">
        <img src="{{ asset('storage/' . $testimonial->images[0]->path) }}" class="card-img-top" alt="..." />
        <div class="card-body text-center">
            <h5 class="card-title">{{$testimonial->name}}</h5>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted">{{$testimonial->description}}</small></p>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="review-slider mt-3">
    <div class="card">
        <img src="assets/img/Snapshot_22.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">Pradeep Singh</h5>
            <p> I had a fantastic experience with plantboost</p>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_23.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">Mukesh Yadav</h5>
            </p>
            <p>Do try out their products for exceptional gardening experience. Great quality!!</p>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_26.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">Sunny</h5>
            <p>the quality is so good and the price is also reasonable!</p>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_27.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">Rohit</h5>
            <p>Exceptional quality grow packs, my plants thrive in them. Highly recommended!!</p>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_29.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">Manoj Mishra</h5>
            <p>Great product nice quality and it is worth to buy these product!</p>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_30.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">Puspa</h5>
            <p>Great product nice quality and it Superb product!</p>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>
</div>
@endif