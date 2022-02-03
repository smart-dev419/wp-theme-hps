@layout('layouts/master')
<?php /* Template Name: Beyond the Classroom */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero-links')

<main id="main" class="bordered-top">
    <section class="athletics-block" id="athletics">
        <div class="container">
            <div class="text-row row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('athletic_title') }}</h2>
                    <div>{{ get_field('athletic_content') }}</div>
                </div>
            </div>
            <div class="team-block">
                <h2>{{ get_field('at_title') }}</h2>
                @if(!empty(get_field('athletic_teams')))
                <div class="row">
                	@foreach(get_field('athletic_teams') as $key => $team)
                	<?php 
                	$col_class = "col-md-3";
                	if ($key%3 == 1) $col_class = "col-md-6 center-col";
                	?>
                    <div class="col-sm-4 {{ $col_class }}">
                        <h4>{{ $team['name'] }}</h4>
                        @if(!empty($team['sports_events']))
                        <ul>
                        	@foreach($team['sports_events'] as $event)
                            <li>{{ $event['event_name'] }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
    <?php $photos = get_field('team_photos') ?>
    @include('partials/gallery')
    <section class="lower-school-activity" id="lower-school-clubs">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('lsc_title') }}</h2>
                    <p>{{ get_field('lsc_description') }}</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection