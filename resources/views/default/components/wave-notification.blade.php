<div class="marquee-two position-relative" style="height: 100px;">
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
            <use id="w1" xlink:href="#gentle-wave" x="48" y="0" fill="rgba(96, 187, 42,0.7" />
            <use id="w2" xlink:href="#gentle-wave" x="48" y="3" fill="rgba(96, 187, 42,0.5)" />
            <use id="w3" xlink:href="#gentle-wave" x="48" y="5" fill="rgba(96, 187, 42,0.3)" />
            <use id="w4" xlink:href="#gentle-wave" x="48" y="7" fill="#60bb2a" />
        </g>
    </svg>
    <marquee class="text-white fw-bold position-relative" behavior="scrolling" direction="left" style="bottom: -55px;">
        {{!empty($siteData) ? $siteData->notification_2nd : 'Plant Boost’s Organic Plant Booster is the best choice for
        your Pet!!'}}</marquee>
</div>

@push('scripts')
<script>
    var colorName = "{{ !empty($siteData->theme_color) ? $siteData->theme_color : '#198754' }}";
    var rgbaColorW1 = tinycolor(colorName).setAlpha(0.7).toRgbString();
    var rgbaColorW2 = tinycolor(colorName).setAlpha(0.5).toRgbString();
    var rgbaColorW3 = tinycolor(colorName).setAlpha(0.3).toRgbString();
    document.getElementById('w1').setAttribute('fill', rgbaColorW1);
    document.getElementById('w2').setAttribute('fill', rgbaColorW2);
    document.getElementById('w3').setAttribute('fill', rgbaColorW3);
    document.getElementById('w4').setAttribute('fill', colorName);
</script>
@endpush