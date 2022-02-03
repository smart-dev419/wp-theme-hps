@layout('layouts/master')
<?php /* Template Name: Come Visit */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="tour-info-block">
        <div class="container">
            <div class="content-row row">
                <div class="col-sm-4">
                    <h2>{{ get_field('tc_title') }}</h2>
                </div>
                <div class="col-sm-8">
                    <div class="text-container">
                        {{ get_field('tc_content') }}
                    </div>
                </div>
            </div>
            @if(!empty(get_field('tc_date_list')))
            <div class="row date-list">
            	@foreach(get_field('tc_date_list') as $date)
                <div class="col-xs-3">
                    <div class="date">
                        <span class="month">{{ $date['month'] }}</span>
                        <span class="day">{{ $date['day'] }}</span>
                        <span class="year">{{ $date['year'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <section class="open-house-block">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="frame">
                        <h2>{{ get_field('oh_title') }}</h2>
                        <p>{{ get_field('oh_description') }}</p>
                        <ul>
                        	@if(!empty(get_field('oh_date_time_list')))
                        		@foreach(get_field('oh_date_time_list') as $date)
	                            <li>
	                                <time datetime="{{ $date['date_time'] }}">
	                                	{{ date("l, F j, Y", strtotime($date['date_time'])) }} at {{ date("g:i A", strtotime($date['date_time'])) }} 
	                                </time>
	                            </li>
	                            
	                            @endforeach
	                        @endif    
	                        <li>{{ get_field('oh_note') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection