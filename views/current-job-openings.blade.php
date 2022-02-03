@layout('layouts/master')
<?php /* Template Name: Current Job Openings */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    @include('partials/intro-two-columns')
    <section class="job-opening-block">
        <div class="container">
            <div class="job-opening-intro row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>{{ get_field('job_section_title') }}</h2>
                    <p>{{ get_field('job_section_intro') }}</a>
                    </p>
                </div>
            </div>
            <div class="job-descriptions-wrap row">
            	<?php
            	    $options = array(
            	        'post_type' => 'job',
            	        'orderby' => 'post__in',
            	        'posts_per_page' => -1,
            	        'post__in' => get_field('jobs'),
            	    );
            	    $jobs = new WP_Query( $options );
            	    while( $jobs->have_posts() ) : $jobs->the_post();
            	?>
                <div class="job-item">
                    <div class="frame">
                        <h4>{{ the_title() }}</h4>
                        <div>{{ the_content() }}</div>
                        <div class="btn-wrap">
                            <a href="{{ get_field('cta_file') }}" class="btn" target="_blank">{{ get_field('cat_butto_label') }}</a>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection