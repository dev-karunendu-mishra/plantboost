<!-- review sliders -->
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
            <h5 class="card-title">John doe</h5>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit.
                    Quidem esse voluptates ex pariatur eveniet debitis. Molestiae adipisci odit dolore ab nam
                    veniam
                    quibusdam tempora, doloribus, ullam consectetur vel impedit sunt?</small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_23.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">John doe</h5>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit.
                    Quidem esse voluptates ex pariatur eveniet debitis. Molestiae adipisci odit dolore ab nam
                    veniam
                    quibusdam tempora, doloribus, ullam consectetur vel impedit sunt?</small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_26.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">John doe</h5>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit.
                    Quidem esse voluptates ex pariatur eveniet debitis. Molestiae adipisci odit dolore ab nam
                    veniam
                    quibusdam tempora, doloribus, ullam consectetur vel impedit sunt?</small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_27.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">John doe</h5>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit.
                    Quidem esse voluptates ex pariatur eveniet debitis. Molestiae adipisci odit dolore ab nam
                    veniam
                    quibusdam tempora, doloribus, ullam consectetur vel impedit sunt?</small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_29.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">John doe</h5>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit.
                    Quidem esse voluptates ex pariatur eveniet debitis. Molestiae adipisci odit dolore ab nam
                    veniam
                    quibusdam tempora, doloribus, ullam consectetur vel impedit sunt?</small></p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/Snapshot_30.PNG" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title">John doe</h5>
            <div class="star">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
            </div>
            <p class="card-text"><small class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit.
                    Quidem esse voluptates ex pariatur eveniet debitis. Molestiae adipisci odit dolore ab nam
                    veniam
                    quibusdam tempora, doloribus, ullam consectetur vel impedit sunt?</small></p>
        </div>
    </div>

</div>
@endif