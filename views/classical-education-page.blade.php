@layout('layouts/master')
<?php /* Template Name: Classical Education */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="intro-block">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('overview_title') }}</h2>
                    <div>{{ get_field('overview_content') }}</div>
                </div>
            </div>
        </div>
    </section>
    <?php $photos = get_field('photo_gallery') ?>
    @include('partials/gallery')
    <section class="trivium-panel">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('tr_title') }}</h2>
                    <p>{{ get_field('tr_description') }}</p>
                </div>
            </div>
            @if(!empty(get_field('tr_articles')))
            <div class="columns-holder row">
            	@foreach(get_field('tr_articles') as $article)
                <div class="col-sm-4">
                    <strong class="title">{{ $article['title'] }}</strong>
                    <p>{{ $article['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
            <div class="text-container row">
                <div class="col-md-10 col-md-offset-1">
                    {{ get_field('tr_content') }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
            		@if(!empty(get_field('tr_detail_links')))
                    <ul class="more-info-block">
                    	@foreach(get_field('tr_detail_links') as $link)
                        <li>
                            <p>{{ $link['description'] }}</p>
                            <a onClick="ga('send', 'event', { eventCategory: 'Button Click', eventAction: 'Click', eventLabel: 'Learn More Buttons'});" target="_blank" href="{{ $link['detail_link'] }}" class="btn ga-classical-education">{{ $link['link_label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
            		@endif
                </div>
            </div>
        </div>
    </section>
    <section class="description-list-block" id="section-2">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>{{ get_field('cmi_title') }}</h2>
                    <p>{{ get_field('cmi_description') }}</p>
                </div>
            </div>
            <div class="text-container row">
                <div class="col-md-10 col-md-offset-1">
                    {{ get_field('cmi_content') }}
                </div>
            </div>
            @if(!empty(get_field('cmi_articles')))
            <div class="columns-holder row">
            	@foreach(get_field('cmi_articles') as $article)
                <div class="col-sm-4">
                    <div class="img-wrap">
                        <div class="img-frame">
                        	{{ Helper::image($article['icon'], 'full', array('width' => $article['icon_width'], 'height' => $article['icon_height'])) }}
                        </div>
                    </div>
                    <strong class="title">{{ $article['title'] }}</strong>
                    <div class="text-wrap">
                        <p>{{ $article['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection