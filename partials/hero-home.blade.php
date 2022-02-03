@if(get_field('hero_background') == 'video')
<?php $poster_image = wp_get_attachment_image_src( get_field('video_poster_image'), 'full'); ?>
<section class="hero-section<?php echo (get_field('full_screen')=='yes')? " win-height":"";?>">
    <div class="bg-video">
        <video autoplay loop muted preload="auto" poster="{{ $poster_image[0] }}">
          <source src="{{ get_field('hero_video') }}" type="video/mp4">
        </video>
    </div>
@else
<?php $hero_image = wp_get_attachment_image_src( get_field('hero_image'), 'full'); ?>
<section class="hero-section parallax<?php echo (get_field('full_screen')=='yes')? " win-height":"";?>" data-parallax="scroll" data-image-src="{{ $hero_image[0] }}">
@endif

    <div class="hero-content container">
        <div class="hero-frame">
            <h1>{{ get_field('h1_title') }}</h1>
            <div class="text-holder">
                <p>{{ get_field('intro') }}</p>
                @if(get_field('has_detail_link') == 'yes')
                <div class="btn-wrap">
                    <a href="{{ get_field('detail_link') }}" class="smooth-anchor btn">{{ get_field('detail_link_label') }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="anchor-wrap<?php echo (get_field('full_screen')=='no')? " visible-landscape":"";?>">
        <div class="holder">
            <a href="#main" class="smooth-anchor icon-arrow-down"><span class="for-sr">{{ _e( 'Down' ) }}</span></a>
        </div>
    </div>
</section>


