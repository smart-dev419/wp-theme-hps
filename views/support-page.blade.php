@layout('layouts/master')
<?php /* Template Name: Support Heritage */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero-links')

<main id="main" class="bordered-top">
    <section class="overview-panel">
        @include('partials/overview')
    </section>
    <section class="highlight-block" id="heritage-fund">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('hf_title') }}</h2>
                    <div>{{ get_field('hf_content') }}</div>
                </div>
            </div>
        </div>
    </section>
    <?php $img = wp_get_attachment_image_src( get_field('events_bg_image'), 'full'); ?>
    <section class="events-block" id="events" style="background: url({{ $img[0] }}) no-repeat 50% 50% / cover">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>{{ get_field('events_title') }}</h2>
                    @if(!empty(get_field('events')))
                    	@foreach(get_field('events') as $event)
	                    <div class="event-row">
	                        <strong class="title">{{ $event['title'] }}</strong>
	                        <p>{{ $event['description'] }}</p>
	                    </div>
	                    @endforeach
                    @endif
                    @if( get_field('events_detail_link') != "" && get_field('events_detail_link_label') != "" )
                    <div class="btn-wrap">
                        <a target="_blank" href="{{ get_field('events_detail_link') }}" class="btn">{{ get_field('events_detail_link_label') }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection