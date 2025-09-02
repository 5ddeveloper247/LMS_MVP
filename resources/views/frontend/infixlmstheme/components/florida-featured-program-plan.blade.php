@if($programplan)
<div class="need_to_learn py-5" @if($florida_programplan_bg != '') style="background-image:url({{asset($florida_programplan_bg)}})" @endif>
    <div class="row justify-content-center px-3 px-lg-5 position-relative" style="z-index:9">
        <div class="col-md-8 text-center px-xl-5">
        <h2 class="text-white mb-4" style="font-size: clamp(1.6rem, 4vw, 3rem); font-weight: 600">
                <a href="{{route('programs.detail',$programplan->programName->id)}}" class="text-white">
                    {{ $programplan->programName->programtitle }}
                </a>
            </h2>
            <p class="text-white mb-3">{!! Str::limit(strip_tags($programplan->programName->discription), 250, '...') !!}</p>
            <p class="text-white mb-3"><span class="text-white">Duration: {{ $programplan->sdate }} to {{ $programplan->edate }}</span></p>
            <p class="text-white mb-3"><span class="text-white">Price: {{ showPrice($programplan->amount) }}</span></p>
        <a href="{{route('programs.detail',$programplan->programName->id)}}" class="py-2 mt-3 px-5 theme_btn">Enroll Now</a>
        </div>
    </div>
</div>
@endif
