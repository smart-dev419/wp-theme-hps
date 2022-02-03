<?php $img = wp_get_attachment_image_src( get_field('hero_image'), 'full'); ?>
<section class="hero-section parallax<?php echo (get_field('full_screen')=='yes')? " win-height":"";?>" data-parallax="scroll" data-image-src="{{ $img[0] }}">
    <div class="hero-content container">
        <div class="hero-frame">
            <h1>{{ get_field('h1_title') }}</h1>
            <?php $member_categories = get_terms( 'member-category', array('orderby' => 'term_id') ); ?>
            <ul class="btn-list">
                @foreach($member_categories as $key => $category)
                    <li>
                        <a href="#{{ $category->slug }}" class="smooth-anchor btn">{{ $category->name }}</a>
                    </li>
                @endforeach    
            </ul>
        </div>
    </div>
    <div class="anchor-wrap<?php echo (get_field('full_screen')=='no')? " visible-landscape":"";?>">
        <div class="holder">
            <a href="#main" class="smooth-anchor icon-arrow-down"><span class="for-sr">{{ _e( 'Down' ) }}</span></a>
        </div>
    </div>
</section>