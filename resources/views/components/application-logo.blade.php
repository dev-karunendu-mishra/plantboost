@if(!empty($siteData))
    <img src="{{ asset('storage/' . $siteData->logo) }}" class="img-fluid" alt="" style="height: 50px;">
@else
    <img src="{{url('/assets/img/logo.png')}}" class="img-fluid" alt="" style="height: 50px;">
@endif