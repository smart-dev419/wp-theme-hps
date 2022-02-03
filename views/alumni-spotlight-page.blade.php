@layout('layouts/master')
<?php /* Template Name: Alumni Spotlight */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <div class="spotlights-holder">
	    <?php
	        $options = array(
	            'post_type' => 'alumni',
	            'orderby' => 'post__in',
	            'posts_per_page' => -1,
	            'post__in' => get_field('alumnis'),
	        );
	        $alumnis = new WP_Query( $options );
	        while( $alumnis->have_posts() ) : $alumnis->the_post();
	    ?>
        <div class="spotlight-row">
            <div class="img-wrap">
            	<?php $img = wp_get_attachment_image_src( get_field('photo'), 'full'); ?>
                <div class="img-holder" style="background: url({{ $img[0] }}) no-repeat 50% 50% / cover"></div>
            </div>
            <div class="content-holder">
                <div class="content-frame">
                    <header class="header">
                        <h2>{{ get_field('name') }}</h2>
                        <span class="heritage-class">{{ get_field('class_year') }}</span>
                    </header>
                    @if(!empty(get_field('spotlights')))
                    <ul class="spotlight-list">
                    	@foreach(get_field('spotlights') as $spotlight)
                        <li>
                            <strong class="title">{{ $spotlight['title'] }}</strong>
                            <p>{{ $spotlight['description'] }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <?php
            endwhile;
            wp_reset_query();
        ?>
    </div>
</main>

<?php endwhile; ?>
@endsection