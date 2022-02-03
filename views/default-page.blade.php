@layout('layouts/master')
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
	<section class="<?php echo (get_field('full_screen')=='yes')? "about-overview-panel":"intro-panel";?>">
		@include('partials/overview')
	</section>
</main>

<?php endwhile; ?>
@endsection