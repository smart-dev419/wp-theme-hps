@layout('layouts/master')
@section('content')

<div class="search-result-block">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <strong class="title">{{ _e( 'Search' ) }}</strong>
                <?php if ( have_posts() ) : ?>
                    <span class="result-text">{{ _e( 'Search Results for' ) }}: "{{ get_search_query() }}"</span>
                <?php else : ?>
                    <span class="result-text">{{ _e( 'No results found. Please try your search again.' ) }}</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<main id="main">
    <section class="search-list-container">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                	<form action="{{ get_option('siteurl') }}" class="search-form" method="get" role="search">
                		<strong class="title">
                			<strong class="title">Search for a new keyword</strong>
                			<div class="input-wrap">
                				<input type="search" name="s" value="">
                				<button type="submit"></button>
                			</div>
                		</strong>
                	</form>

                    <?php if ( have_posts() ) : ?>
                        <ul class="search-list">
                        	<?php while ( have_posts() ) : the_post(); ?>
    	                        <li>
    	                            <strong class="title"><a href="{{ get_permalink() }}">{{ the_title() }}</a></strong>
    	                            {{ get_field('search_results_teaser_text') }}
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