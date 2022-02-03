@layout('layouts/master')
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/post-header')

<main id="main" class="bordered-top">
    <div class="article-block container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="frame">
                    <article class="article">
                        <div class="article-text">
                            {{ the_content() }}
                        </div>
                    </article>
                    @if(get_post_type() == 'post')
                        @include('partials/post-footer')
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

<?php endwhile; ?>
@endsection