@layout('layouts/master')
<?php /* Template Name: Ways to Partner */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="donation-block">
        <div class="container">
            <div class="heading-block row">
                <div class="col-md-4 col-md-offset-4">
                    <h2>{{ get_field('od_title') }}</h2>

                    @if(get_field('od_online_link'))
                    <a href="{{ get_field('od_online_link') }}" onClick="ga('send', 'event', { eventCategory: 'Button Click', eventAction: 'Click', eventLabel: 'Donate Online'});" class="btn">{{ get_field('od_online_link_label') }}</a>
                    @endif
                </div>
            </div>
            @if(!empty(get_field('online_donations')))
            <div class="method-row row">
            	@foreach(get_field('online_donations') as $donation)
                <div class="col-sm-6 col-md-4">
                    <div class="column-wrap">
                        <h4>{{ $donation['title'] }}</h4>
                        <p>{{ $donation['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <section class="give-by-shopping-block">
        <div class="container">
            <div class="top-row">
                <h2>{{ get_field('gs_title') }}</h2>
                <p>{{ get_field('gs_description') }}</p>
            </div>
            @if(!empty(get_field('give_shopping')))
            <div class="row">
            	@foreach(get_field('give_shopping') as $shopping)
                <div class="col-sm-4">
                    <div class="frame">
                        <div class="heading-wrap">
                            <div class="tbl">
                                <div class="tc">
                                    <h4>{{ $shopping['title'] }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="text-container">
                            {{ $shopping['description'] }}
                        </div>
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