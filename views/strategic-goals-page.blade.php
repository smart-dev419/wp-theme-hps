@layout('layouts/master')
<?php /* Template Name: Strategic Goals */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <div class="goal-list-block">
        <div class="container">
        	@if(!empty(get_field('strategic_goals')))
            <div class="row">
            	@foreach(get_field('strategic_goals') as $key => $goal)
                <div class="col-sm-6 col-md-4">
                    <div class="heading-block">
                        <div class="img-wrap">
                            <div class="img-frame">
                            {{ Helper::image($goal['icon'], 'full', array('width' => $goal['icon_width'], 'height' => $goal['icon_height'])) }}
                            </div>
                        </div>
                        <div class="goal-list">
                            <strong class="title">{{ _e( 'Goal' ) }} {{ cardinalNumber($key+1) }}:</strong>
                            <span>{{ $goal['title'] }}</span>
                        </div>
                    </div>
                    <div class="text-holder">
                        {{ $goal['description'] }}
                    </div>
                </div>
				@endforeach
            </div>
            @endif
        </div>
    </div>
</main>

<?php endwhile; ?>
@endsection