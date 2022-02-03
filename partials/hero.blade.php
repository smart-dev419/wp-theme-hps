<?php $img = wp_get_attachment_image_src( get_field('hero_image'), 'full'); ?>
<section class="hero-section parallax<?php echo (get_field('full_screen')=='yes')? " win-height":"";?>" data-parallax="scroll" data-image-src="{{ $img[0] }}">
    <div class="hero-content container">
        <div class="hero-frame">
            <div class="row">
                <?php 
                $heading_class="col-md-8 col-md-offset-2";
                if ( isset($hero_width_mode) && $hero_width_mode == 'wide' ) $heading_class="col-md-10 col-md-offset-1";
                elseif ( isset($hero_width_mode) && $hero_width_mode == 'x-wide' ) $heading_class="col-md-8 col-md-offset-2 col-lg-12 col-lg-offset-0";
                ?>
                <div class="{{ $heading_class }}">
                    <h1>{{ get_field('h1_title') }}</h1>
                    @if(get_field('has_detail_link') == 'yes')
                    <div class="btn-wrap">
                        <a href="{{ get_field('detail_link') }}" class="smooth-anchor btn">{{ get_field('detail_link_label') }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="anchor-wrap<?php echo (get_field('full_screen')=='no')? " visible-landscape":"";?>">
        <div class="holder">
            <a href="#main" class="smooth-anchor icon-arrow-down"><span class="for-sr">{{ _e( 'Down' ) }}</span></a>
        </div>
    </div>
</section>