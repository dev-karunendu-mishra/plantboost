@if(!empty($images) && count($images) > 0)
<div class="product-view-box text-center">
    <!-- Main Image -->
    <img id="mainProductImage" src="{{asset('storage/'.$images[0]->path)}}" class="main-image mb-3" alt="Product Image">

    <!-- Thumbnails Slider with Arrows -->
    <div class="thumbnails-container">
        <button class="carousel-control-prev arrow-btn left" type="button" onclick="scrollLeftSide()">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <div class="thumbnails-wrapper">
            @foreach($images as $image)
            <div class="thumbnail-item">
                <img src="{{asset('storage/'.$image->path)}}" class="img-fluid" onclick="changeImage(this)"
                    alt="{{asset('storage/'.$image->path)}}">

                <!-- Delete Button -->
                <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this image?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <!-- <button type="submit" class="delete-btn" title="Delete Image">×</button> -->
                    <button type="submit" class="delete-btn" onclick="deleteThumbnail(this)"><i
                            class="fa fa-trash"></i></button>
                </form>
            </div>
            @endforeach
        </div>
        <!-- <button class="arrow-btn right" onclick="scrollRight()">&gt;</button> -->
        <button class="carousel-control-next arrow-btn right" type="button" onclick="scrollRightSide()">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@else
<div class="product-view-box text-center">
    <!-- Main Image -->
    <img id="mainProductImage" src="https://via.placeholder.com/450x450" class="main-image mb-3" alt="Product Image">

    <!-- Thumbnails Slider with Arrows -->
    <div class="thumbnails-container">
        <button class="carousel-control-prev arrow-btn left" type="button" onclick="scrollLeftSide()"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <div class="thumbnails-wrapper">
            <!-- Thumbnail Item -->
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 1">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
            <!-- Repeat for more thumbnails -->
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 2">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 3">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 4">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 4">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 4">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 4">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
            <div class="thumbnail-item">
                <img src="https://via.placeholder.com/100x100" class="img-fluid" onclick="changeImage(this)"
                    alt="Thumbnail 4">
                <button class="delete-btn" onclick="deleteThumbnail(this)">×</button>
            </div>
        </div>
        <button class="carousel-control-next arrow-btn right" type="button" onclick="scrollRightSide()"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@endif

@push('scripts')
<!-- Custom Script -->
<script>
    const thumbnailsWrapper = document.querySelector('.thumbnails-wrapper');

    function changeImage(element) {
        // Change main image to clicked thumbnail
        const mainImage = document.getElementById('mainProductImage');
        mainImage.src = element.src;

        // Remove active class from all thumbnails
        const thumbnails = document.querySelectorAll('.thumbnails-wrapper img');
        thumbnails.forEach(img => img.classList.remove('active'));

        // Add active class to the clicked thumbnail
        element.classList.add('active');
    }

    function scrollLeftSide() {
        thumbnailsWrapper.scrollBy({
            top: 0,
            left: -200, // Scroll 200px to the left
            behavior: 'smooth'
        });
    }

    function scrollRightSide() {
        thumbnailsWrapper.scrollBy({
            top: 0,
            left: 200, // Scroll 200px to the right
            behavior: 'smooth'
        });
    }
</script>
@endpush