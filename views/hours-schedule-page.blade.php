@layout('layouts/master')
<?php /* Template Name: Hours / Schedule */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="schedule-block">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="text-frame">
                        <h2>{{ get_field('overview_title') }}</h2>
                        <div>
                        	{{ get_field('overview_content') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="schedule-list-row row">
                <div class="col-md-10 col-md-offset-1">
                	@if(!empty(get_field('schedules')))
                    <ul class="schedule-lsit">
                    	@foreach(get_field('schedules') as $schedule)
                        <li>
                            <span class="topic">{{ $schedule['topic'] }}</span>
                            @if(!empty($schedule['times']))
                            <ul class="time-list">
                            	@foreach($schedule['times'] as $time)
                                <li>{{ $time['time'] }}</li>
                                @endforeach
                            </ul>
                             @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="gallery-list-style-1">
        	@if(!empty(array_slice(get_field('photo_gallery'), 0, 2)))
            <div class="column-sm">
            	@foreach(array_slice(get_field('photo_gallery'), 0, 2) as $photo)
                	{{ Helper::image($photo['ID'], 'full') }}
                @endforeach
            </div>
            @endif
            @if(!empty(array_slice(get_field('photo_gallery'), 2, 1)))
            <div class="column-lg">
            	@foreach(array_slice(get_field('photo_gallery'), 2, 1) as $photo)
                	{{ Helper::image($photo['ID'], 'full') }}
                @endforeach
            </div>
            @endif
            @if(!empty(array_slice(get_field('photo_gallery'), 3)))
            <div class="column-sm">
            	@foreach(array_slice(get_field('photo_gallery'), 3) as $photo)
                	{{ Helper::image($photo['ID'], 'full') }}
                @endforeach
            </div>
            @endif
        </div>
        <div class="activities-block">
            <div class="container">
                <div class="row">
                @if(!empty(get_field('activities')))
                    <div class="col-md-10 col-md-offset-1">
                    	@foreach(get_field('activities') as $activity)
                        <div class="activity-row">
                            <h2>{{ $activity['title'] }}</h2>
                            <p>{{ $activity['description'] }}</p>
                        </div>
						@endforeach
                    </div>
                @endif
                </div>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection