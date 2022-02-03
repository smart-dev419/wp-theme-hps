@layout('layouts/master')
<?php /* Template Name: Process */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="deadline-info-block">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('dl_title') }}</h2>
                    <p>{{ get_field('dl_description') }}</p>
                </div>
            </div>
            @if(!empty(get_field('deadlines')))
            <div class="events-row row">
            	@foreach(get_field('deadlines') as $deadline)
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <time>
	                    @if($deadline['month'] != '')
	                    	<span class="month">{{ $deadline['month'] }}</span>
	                    @endif		                    
	                    @if($deadline['day'] != '')
	                    	<span class="day">{{ $deadline['day'] }}</span>
	                    @endif		                    
	                    @if($deadline['year'] != '')
	                    	<span class="year">{{ $deadline['year'] }}</span>
	                    @endif	
                    </time>
                    <p>{{ $deadline['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <section class="process-block">
        <div class="container">
            <h2>{{ get_field('process_title') }}</h2>
            @if(!empty(get_field('processes')))
            <div class="process-row row">
            	@foreach(get_field('processes') as $process)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="ico-wrap">
                        {{ Helper::image($process['icon'], 'full', array('width' => $process['icon_width'], 'height' => $process['icon_height'])) }}
                    </div>
                    <h4>{{ $process['title'] }}</h4>
                    <div>{{ $process['description'] }}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <?php $img = wp_get_attachment_image_src( get_field('fn_bg_image'), 'full'); ?>
    <div class="footnote-block" style="background: url({{ $img[0] }}) no-repeat 50% 50% / cover">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    {{ get_field('fn_content') }}
                </div>
            </div>
        </div>
    </div>
</main>

<?php endwhile; ?>
@endsection