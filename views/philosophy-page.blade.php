@layout('layouts/master')
<?php /* Template Name: Philosophy */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <div class="philosophy-panel container">
        <div class="container">
        	@if(!empty(get_field('ov_articles')))
            <div class="columns-holder row">
           		@foreach(get_field('ov_articles') as $article)
                <div class="col-sm-4">
                    <h2>{{ $article['title'] }}</h2>
                    <p>{{ $article['description'] }}</p>
                    @if($article['has_detail_link'] == 'yes')
                    <a href="{{ $article['detail_link'] }}" class="learn">{{ $article['detail_link_label'] }}</a>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <?php $photos = get_field('photo_gallery') ?>
    @include('partials/gallery')
    <section class="think-with-block">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('te_title') }}</h2>
                    <p>{{ get_field('te_description') }}</p>
                </div>
            </div>
            @if(!empty(get_field('te_articles')))
            <div class="carousel">
            	@foreach(get_field('te_articles') as $article)
                <div class="slide">
                    <strong class="title">{{ $article['title'] }}</strong>
                    <p>{{ $article['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <section class="description-list-block">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('bc_title') }}</h2>
                    <p>{{ get_field('bc_description') }}</p>
                </div>
            </div>
            @if(!empty(get_field('bc_articles')))
            <div class="list-container row">
            	@foreach(get_field('bc_articles') as $article)
                <div class="col-sm-4">
                    <div class="img-wrap">
                        <div class="img-frame">
                        	{{ Helper::image($article['icon'], 'full', array('width' => $article['icon_width'], 'height' => $article['icon_height'])) }}
                        </div>
                    </div>
                    <strong class="title">{{ $article['title'] }}</strong>
                    <div class="text-wrap">
                        <p>{{ $article['description'] }}</p>
                        @if($article['has_detail_link'] == 'yes')
                        <a href="{{ $article['detail_link'] }}" class="learn">{{ $article['detail_link_label'] }}</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <section class="live-with-block">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>{{ get_field('lc_title') }}</h2>
                    <p>{{ get_field('lc_description') }}</p>
                </div>
            </div>
            <?php 
            $data_slides = get_field('lc_articles'); 
            $style_class = "";
            ?>
            @include('partials/slide-about')
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection