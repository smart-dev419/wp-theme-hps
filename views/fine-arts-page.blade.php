@layout('layouts/master')
<?php /* Template Name: Fine Arts */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <section class="fine-arts-block">
        <div class="container">
        	@if(!empty(get_field('fine_arts')))
            <div class="list-container row">
            	@foreach(get_field('fine_arts') as $art)
                <div class="col-sm-6 col-md-4">
                    <div class="img-wrap">
                        <div class="img-frame">
                        {{ Helper::image($art['icon'], 'full', array('width' => $art['icon_width'], 'height' => $art['icon_height'])) }}
                        </div>
                    </div>
                    <strong class="title">{{ $art['title'] }}</strong>
                    <div class="text-wrap">
                        {{ $art['description'] }}
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <?php $photos = get_field('photo_gallery') ?>
    @include('partials/gallery')
</main>

<?php endwhile; ?>
@endsection