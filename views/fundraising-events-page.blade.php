@layout('layouts/master')
<?php /* Template Name: Fundraising Events */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="fund-raising-event">
        <div class="container">
            @include('partials/top-block')
            @if(!empty(get_field('fundrais_events')))
            <div class="two-cols-wrap row">
            	@foreach(get_field('fundrais_events') as $event)
                <div class="col-sm-6">
                    <div class="frame">
                        <h4>{{ $event['title'] }}</h4>
                        <p>{{ $event['description'] }}</p>
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