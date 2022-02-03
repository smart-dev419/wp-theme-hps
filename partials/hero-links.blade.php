<?php $img = wp_get_attachment_image_src( get_field('hero_image'), 'full'); ?>
<section class="hero-section parallax<?php echo (get_field('full_screen')=='yes')? " win-height":"";?>" data-parallax="scroll" data-image-src="{{ $img[0] }}">
    <div class="hero-content container">
        <div class="hero-frame">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>{{ get_field('h1_title') }}</h1>
                    @if(!empty(get_field('detail_links')))
                    <ul class="btn-list">
                        @foreach(get_field('detail_links') as $link)
                            <li>
                                <a href="{{ $link['link'] }}" class="smooth-anchor btn">{{ $link['link_label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
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