<?php $featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); ?>
<section class="hero-section win-height" data-parallax="scroll" data-image-src="{{ $featured_img[0] }}">
    <div class="hero-content container">
        <div class="hero-frame">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h1>{{ the_title() }}</h1>
                    <div class="meta">
                        <span class="name">{{ _e( 'By' ) }} <a href="{{ get_the_author_link() }}">{{ get_the_author() }}</a></span>
                        <time datetime="{{ get_the_date('Y-m-d') }}">{{ get_the_date('F j, Y') }}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="anchor-wrap">
        <div class="holder">
            <a href="#main" class="smooth-anchor icon-arrow-down"><span class="for-sr">{{ _e( 'Down' ) }}</span></a>
        </div>
    </div>
</section>