@layout('layouts/master')
<?php /* Template Name: GA Private School Tax Credit */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

<?php $hero_width_mode = 'x-wide'; ?>
@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="overview-panel">
        @include('partials/overview')
    </section>
    <section class="commonly-asked-block">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('faq_section_title') }}</h2>
                    <ul class="accordion">
                    <?php
                        $options = array(
                            'post_type' => 'faq',
                            'orderby' => 'post__in',
                            'posts_per_page' => -1,
                            'post__in' => get_field('faqs'),
                        );
                        $faqs = new WP_Query( $options );
                        while( $faqs->have_posts() ) : $faqs->the_post();
                    ?>
                        <li>
                            <a href="#" class="opener">{{ get_field('question') }}</a>
                            <div class="slide">
                                <div class="accordion-content">
                                    {{ get_field('answer') }}
                                </div>
                            </div>
                        </li>
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>    
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection