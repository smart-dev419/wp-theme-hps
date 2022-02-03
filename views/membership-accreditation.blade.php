@layout('layouts/master')
<?php /* Template Name: Membership & Accreditation */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

<?php $hero_width_mode = 'wide'; ?>
@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="members-block">
        <div class="container">
            @include('partials/top-block')
            <div class="logos-holder">
            	@if(!empty(get_field('logos')))
                <ul>
                	@foreach(get_field('logos') as $logo)
                    <li>
                        <a target="_blank" href="{{ $logo['logo_link'] }}" onClick="ga('send', 'event', { eventCategory: 'Link Click', eventAction: 'Click', eventLabel: 'Membership Links'});">
                            <div class="logo-wrap">
                                {{ Helper::image($logo['logo_image'], 'full', array('width' => $logo['logo_width'], 'height' => $logo['logo_height'], 'alt' => $logo['logo_name'])) }}
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="accreditation-block row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>{{ get_field('acc_title') }}</h2>
                    <p>{{ get_field('acc_description') }}</p>

                    @if(get_field('acc_report_link'))
                    <div class="btn-wrap">
                        <a target="_blank" onClick="ga('send', 'event', { eventCategory: 'Link Click', eventAction: 'Click', eventLabel: 'Accreditation Report'});" href="{{ get_field('acc_report_link') }}" class="btn">{{ get_field('acc_link_label') }}</a>
                    </div>
                    @endif
                    <div class="text-wrap">
                        <p>{{ get_field('acc_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php endwhile; ?>
@endsection