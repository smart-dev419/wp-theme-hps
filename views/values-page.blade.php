@layout('layouts/master')
<?php /* Template Name: Values */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
    <div class="core-value-block">

        @include('partials/intro-two-columns')
        
        <div class="values-slider">
            <?php 
            $data_slides = get_field('values'); 
            $style_class = "style-1";
            ?>
            @include('partials/slide-about')
        </div>
        
    </div>
</main>

<?php endwhile; ?>
@endsection