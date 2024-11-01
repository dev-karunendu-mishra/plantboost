<nav class="navbar navbar-light justify-content-between bg-light position-sticky shadow-sm py-0"
    style="max-width: 500px;margin-inline: auto;top:0;z-index: 9999;">
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">
        @if(!empty($siteData))
        <img src="{{ asset('storage/' . $siteData->logo) }}" class="img-fluid" alt="" style="height: 50px;">
        @else
        <img src="assets/img/logo.png" class="img-fluid" alt="" style="height: 50px;">
        @endif
    </a>

    <svg class="icon icon-cart-empty" height="2.6em" width="2.6em" aria-hidden="true" focusable="false"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none">
        <path
            d="m15.75 11.8h-3.16l-.77 11.6a5 5 0 0 0 4.99 5.34h7.38a5 5 0 0 0 4.99-5.33l-.78-11.61zm0 1h-2.22l-.71 10.67a4 4 0 0 0 3.99 4.27h7.38a4 4 0 0 0 4-4.27l-.72-10.67h-2.22v.63a4.75 4.75 0 1 1 -9.5 0zm8.5 0h-7.5v.63a3.75 3.75 0 1 0 7.5 0z"
            fill="currentColor" fill-rule="evenodd"></path>
    </svg>

    <div class="collapse navbar-collapse p-3" id="navbarSupportedContent">
        <div class="text-end">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa fa-times fa-2x"></i>
            </button>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link h2 fw-bold text-dark mb-3" href="{{url('about')}}">About us</a>
                <a class="nav-link h2 fw-bold text-dark mb-3" href="{{url('faqs')}}">Faqs
                    <a class="nav-link h2 fw-bold text-dark" href="{{url('contact')}}">Contact us</a>
            </li>
        </ul>
    </div>
</nav>