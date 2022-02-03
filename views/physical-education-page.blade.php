@layout('layouts/master')
<?php /* Template Name: Physical Education */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="physical-edu-intro container">
        @include('partials/top-block')
    </section>
    <div class="physical-edu-detail">
        <div class="container">
            <div class="top-intro row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('pe_ti_title') }}</h2>
                    <div>{{ get_field('pe_ti_content') }}</div>
                </div>
            </div>
            <div class="content-holder">
                <div class="row">
                    <div class="col-sm-6">
                        {{ get_field('pe_mc_content') }}
                    </div>
                    <div class="col-sm-6">
                    	@if(!empty(get_field('pe_mc_list')))
                        <ul class="points">
                        	@foreach(get_field('pe_mc_list') as $item)
                            <li>{{ $item['item'] }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                @if(!empty(get_field('classes')))
                <div class="row classes">
                	@foreach(get_field('classes') as $class)
                    <div class="col-sm-4">
                        <strong class="class-range">{{ $class['title'] }}</strong>
                        @if(!empty($class['descriptions']))
                        <ul class="points">
                        	@foreach($class['descriptions'] as $description)
                            <li>{{ $description['description'] }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

<?php endwhile; ?>
@endsection