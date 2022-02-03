@layout('layouts/master')
<?php /* Template Name: Employment */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="opportunity-block">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-8 col-md-offset-2">
	                <h2>{{ get_field('overview_title') }}</h2>
	                <div>
	                	{{ get_field('overview_content') }}
	                </div>
	                <a href="{{ get_field('job_link') }}" class="btn">{{ get_field('job_link_label') }}</a>
                </div>
            </div>
        </div>
        <?php $photos = get_field('photo_gallery') ?>
        @include('partials/gallery')
        <div class="cols-wrapper">
            <div class="container">
            	@if(!empty(get_field('articles')))
                <div class="row">
                	@foreach(get_field('articles') as $article)
                    <div class="col-sm-4">
                        <h4>{{ $article['title'] }}</h4>
                        <div>{{ $article['description'] }}</div>
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="btn-wrap">
                    <a href="{{ get_field('job_link') }}" class="btn">{{ get_field('job_link_label') }}</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection