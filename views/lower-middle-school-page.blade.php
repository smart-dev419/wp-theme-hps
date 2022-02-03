@layout('layouts/master')
<?php /* Template Name: Lower/Middle School */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

<?php $hero_width_mode = 'wide'; ?>
@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="school-intro-block">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('overview_title') }}</h2>
                    <div class="text-frame">
                        {{ get_field('overview_content') }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                    <h2>{{ get_field('sch_title') }}</h2>
                    @if(!empty(get_field('schedules')))
	                    @foreach(get_field('schedules') as $schedule)
	                    <div class="schedule-row">
	                        <strong class="title">{{ $schedule['title'] }}</strong>
	                        @if(!empty($schedule['times']))
		                        @foreach($schedule['times'] as $time)
		                        	<span class="time">{{ $time['time'] }}</span>
		                        @endforeach
	                        @endif
	                    </div>
	                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="school-curriculum-block">
        <div class="container">
            <h2>{{ get_field('cur_title') }}</h2>
            @if(!empty(get_field('curriculums')))
            <div class="row">
            	@foreach(get_field('curriculums') as $curriculum)
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <h4>{{ $curriculum['title'] }}</h4>
                    @if(!empty($curriculum['contents']))
                        @foreach($curriculum['contents'] as $content)
	                        @if($content['acf_fc_layout'] == 'text')
	                            {{ $content['text'] }}
	                        @elseif($content['acf_fc_layout'] == 'list')
	                        	@if(!empty($content['list']))
		                        <ul class="points-list">
		                        	@foreach($content['list'] as $item)
		                            <li>{{ $item['item'] }}</li>
		                            @endforeach
		                        </ul>
		                        @endif
	                        @elseif($content['acf_fc_layout'] == 'classes')
                            	@if(!empty($content['classes']))
    	                        	@foreach($content['classes'] as $class)
    	                            <p>
    	                                <strong class="class">{{ $class['class'] }}</strong>{{ $class['description'] }}
    	                            </p>
    	                            @endforeach
    	                        @endif
	                        @endif
                        @endforeach
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection