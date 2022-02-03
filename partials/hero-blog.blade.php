<?php 
$post = $posts[0];
setup_postdata($post);
$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
?>
<section class="hero-section win-height blog-style parallax" data-parallax="scroll" data-image-src="{{ $featured_img[0] }}">
    <div class="hero-content container">
        <div class="article-frame">
            <time datetime="{{ get_the_date('Y-m-d') }}">{{ get_the_date('F j, Y') }}</time>
            <strong class="article-title">{{ the_title() }}</strong>
            <a href="{{ get_permalink() }}" class="btn">{{ _e( 'Read More' ) }}</a>
        </div>
    </div>
    <div class="anchor-wrap">
        <div class="holder">
            <a href="#main" class="smooth-anchor icon-arrow-down"><span class="for-sr">{{ _e( 'Down' ) }}</span></a>
        </div>
    </div>
</section>
<?php wp_reset_postdata(); ?>