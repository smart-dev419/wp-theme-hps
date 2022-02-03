@layout('layouts/master')
<?php /* Template Name: Blog */ ?>
@section('content')

<div class="search-result-block">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <strong class="title">{{ _e( 'Search' ) }}</strong>
                <span class="result-text">Search Results for: "{{ single_cat_title( '', false ) }}"</span>
            </div>
        </div>
    </div>
</div>

<main id="main">
    <section class="search-list-container">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <?php if ( have_posts() ) : ?>
                        <ul class="search-list">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <li>
                                    <strong class="title">{{ the_title() }}</strong>
                                    <p>{{ the_excerpt() }}</p>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <div class="load-more-row container btn-load-more-ajax" data-target=".search-list li" data-append-to=".search-list" data-load-more=".btn-load-more-ajax a">
                            {{ next_posts_link('Load More') }}
                        </div>
                    <?php endif; ?>

                    

                </div>
            </div>
        </div>
    </section>
</main>
@endsection