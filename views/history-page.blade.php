@layout('layouts/master')
<?php /* Template Name: History */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <div class="history-block">
        @include('partials/intro-two-columns')

        <?php $photos = get_field('photo_gallery') ?>
        @include('partials/gallery')
        <section class="description-list-block">
            <div class="container">
                <div class="top-block row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2>{{ get_field('hc_title') }}</h2>
                        <p>{{ get_field('hc_description') }}</p>
                    </div>
                </div>
                <div class="crest-quadrant-block row">
                    <div class="col-md-5 col-lg-6">
                        <div class="logo-wrap">
                            {{ Helper::image(get_field('hc_logo'), 'full', array('width' => 675, 'height' => 611, 'alt' => 'HERITAGE ESSE QUAM VIDERI')) }}
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6">
                        @if(!empty(get_field('quadrants')))
                        <div class="quadrant-block row">
                            @foreach(get_field('quadrants') as $key => $quadrant)
                            <div class="col-sm-6">
                                <h4>{{ ordinalNumber($key+1) }} {{ get_field('hc_quadrant_titles') }}</h4>
                                <p>{{ $quadrant['quadrant'] }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php endwhile; ?>
@endsection