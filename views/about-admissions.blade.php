@layout('layouts/master')
<?php /* Template Name: About/Admissions */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero')

<main id="main" class="bordered-top">
	<section class="<?php echo (get_field('full_screen')=='yes')? "about-overview-panel":"intro-panel";?>">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<header class="heading">
						<h2>{{ get_field('overview_title') }}</h2>
					</header>
					<div class="text-container">
						{{ get_field('overview_content') }}
						<figure class="signature-job">
							{{ Helper::image(get_field('signature_image'), 'full') }}
							<figcaption>
								<span>{{ get_field('name') }}</span>
								<span>{{ get_field('job_position') }}</span>
							</figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php endwhile; ?>
@endsection