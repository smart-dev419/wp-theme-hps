@layout('layouts/master')
<?php /* Template Name: Tuition & Financial Aid */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

<?php $hero_width_mode = 'wide'; ?>
@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="fee-program container">
    	@if(!empty(get_field('fee_programs')))
        <div class="row">
        	@foreach(get_field('fee_programs') as $program)
            <div class="col-sm-6">
                <div class="content-holder">
                    <h2>{{ $program['title'] }}</h2>
                    <p>{{ $program['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </section>
    <section class="fee-structure-block">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('tuition_title') }}</h2>
                    @if(!empty(get_field('tuitions')))
                    <ul class="fee-structure-row">
                    	@foreach(get_field('tuitions') as $tuition)
                        <li>
                            <span class="title">{{ $tuition['title'] }}</span>
                            <span class="prict">${{ number_format($tuition['price'], 0) }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <span class="note">{{ get_field('tuition_note') }}</span>
                </div>
            </div>
        </div>
    </section>
    <section class="payment-block">
        <div class="container">
            <div class="top-block row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('pay_title') }}</h2>
                    <p>{{ get_field('pay_note') }}</p>
                </div>
            </div>

            @if(!empty(get_field('payments_dates')))
            <div class="row payment-date-info">
            	@foreach(get_field('payments_dates') as $payment_date)
                <div class="col-sm-4">
                    <h4>{{ $payment_date['title'] }}</h4>
                    @if(!empty($payment_date['dates']))
                    <ul class="dates">
                    	@foreach($payment_date['dates'] as $date)
                        <li>{{ $date['date'] }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
         		@endforeach
            </div>
            @endif

            <div class="text-container row">
                <div class="col-md-8 col-md-offset-2">
                    {{ get_field('pay_description') }}
                </div>
            </div>
        </div>
    </section>
    <?php $photos = get_field('photo_gallery') ?>
    @include('partials/gallery')
    <div class="footer-info-block">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('fa_title') }}</h2>
                    <p>{{ get_field('fa_description') }}</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php endwhile; ?>
@endsection