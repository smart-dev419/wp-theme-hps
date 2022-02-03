@layout('layouts/master')
<?php /* Template Name: Statement of Faith */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="statement-intro-content">
        <div class="container">

			@include('partials/top-block')

			@if(!empty(get_field('articles')))
            <article class="row article-list">
            	@foreach(get_field('articles') as $article)
                <div class="col-xs-6 col-md-4 col-lg-3 list">
                    <p>{{ $article['article'] }}</p>
                </div>
                @endforeach
            </article>
            @endif
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection