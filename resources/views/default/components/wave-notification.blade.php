<div class="marquee-two position-relative" style="height: 100px;">
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(96, 187, 42,0.7" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(96, 187, 42,0.5)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(96, 187, 42,0.3)" />
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#60bb2a" />
        </g>
    </svg>
    <marquee class="text-white fw-bold position-relative" behavior="scrolling" direction="left" style="bottom: -55px;">
        {{!empty($siteData) ? $siteData->notification_2nd : 'Plant Boost’s Organic Plant Booster is the best choice for
        your Pet!!'}}</marquee>
</div>