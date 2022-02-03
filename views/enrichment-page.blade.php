@layout('layouts/master')
<?php /* Template Name: Enrichment */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="enrichment-block">
        <div class="container">
            <div class="top-block row">
                <div class="text-frame">
                    <h2>{{ get_field('overview_title') }}</h2>
                    <div>
                    	{{ get_field('overview_content') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(!empty(get_field('enrichments')))
    <div class="enrichment-blocks-holder">
    	@foreach(get_field('enrichments') as $enrichment)
        <div class="enrichment-row">
            <div class="img-wrap">
                <div class="img-holder" style="background: url({{ $enrichment['photo'] }}) no-repeat 50% 50% / cover"></div>
            </div>
            <div class="content-holder">
                <div class="content-frame">
                    <h2>{{ $enrichment['title'] }}</h2>
                    @if(!empty($enrichment['contents']))
                        @foreach($enrichment['contents'] as $content)
	                        @if($content['acf_fc_layout'] == 'text')
	                            {{ $content['text'] }}
	                        @elseif($content['acf_fc_layout'] == 'list')
	                        	@if(!empty($content['list']))
		                        <ul class="enrichment-list">
		                        	@foreach($content['list'] as $item)
		                            <li>{{ $item['item'] }}</li>
		                            @endforeach
		                        </ul>
		                        @endif
	                        @elseif($content['acf_fc_layout'] == 'schedules')
                            	@if(!empty($content['schedules']))
    	                        	@foreach($content['schedules'] as $schedule)
    	                            <div class="enrichment-sechedule-row">
    	                                <strong class="title">{{ $schedule['topic'] }}</strong>
    	                                <p>{{ $schedule['time_description'] }}</p>
    	                            </div>
    	                            @endforeach
    	                        @endif
	                        @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</main>

<?php endwhile; ?>
@endsection