@layout('layouts/master')
<?php /* Template Name: Blog */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

<?php 
$posts = get_posts( array(
    'posts_per_page'   => -1,    
    'post_type' => 'post',
    'post_status' => 'publish'
) );
 ?>

@include('partials/hero-blog')

<main id="main" class="bordered-top">
    <div class="blogs-row">
   	 	@foreach(array_slice($posts, 1) as $post)
	   	 	<?php 
	   	 	setup_postdata($post); 
	   	 	$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
	   	 	?>
	        <div class="blog-col" style="background: url({{ $featured_img[0] }}) no-repeat 50% 50% / cover">
	            <div class="blog-intro-content">
	                <div class="frame">
	                    <time datetime="{{ get_the_date('Y-m-d') }}">{{ get_the_date('F j, Y') }}</time>
	                    <strong class="title">{{ the_title() }}</strong>
	                    <a href="{{ get_permalink() }}" class="btn">{{ _e( 'Read More' ) }}</a>
	                </div>
	            </div>
	        </div>
        @endforeach
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="load-more-row container">
        <a href="#" class="btn">{{ _e( 'Load More' ) }}</a>
    </div>
</main>

<?php endwhile; ?>
@endsection