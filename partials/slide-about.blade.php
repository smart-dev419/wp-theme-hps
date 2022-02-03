<div class="carousel-wrap">
    @if(!empty($data_slides))
        <div class="carousel-panel {{ $style_class }}">
        	@foreach($data_slides as $slide)
                <div class="slide">
                    <div class="two-cols">
                        <div class="col img-wrap" style="background: url({{ $slide['photo'] }}) no-repeat 50% 50% / cover"></div>
                        <div class="col text-wrap">
                            <strong class="title">{{ $slide['title'] }}</strong>
                            <p>{{ $slide['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
