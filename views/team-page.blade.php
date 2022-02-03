@layout('layouts/master')
<?php /* Template Name: Team */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero-team')

<main id="main" class="bordered-top">
    <section class="team-intro-block container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="intro-holder">
                    <h2>{{ get_field('overview_title') }}</h2>
                    <div>{{ get_field('overview_content') }}</div>
                </div>
            </div>
        </div>
    </section>

    <?php $member_categories = get_terms( 'member-category', array('orderby' => 'term_id') ); ?>
    <div class="team-section-holder">
    	@foreach($member_categories as $key => $category)
        <section class="team-section" id="{{ $category->slug }}">
            <div class="container">
                <h3>{{ $category->name }}</h3>
                <div class="row">
                <?php        
                    $options = array(
                        'post_type' => 'member',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'member-category',
                                'terms' => $category->term_id,
                                'field' => 'term_id'
                            )
                        )
                    );
                
                    $members = new WP_Query( $options );
                    while( $members->have_posts() ) : $members->the_post();
                ?>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                        <div class="img-wrap">
                        {{ Helper::image(get_field('photo'), 'full', array('width' => '345', 'height' => '345', 'alt' => get_field('name'))) }}
                        </div>
                        <div class="content-holder">
                            <strong class="name">{{ get_field('name') }}</strong>

                            @if(get_field('department_subjects'))
                            <div class="dept-sub-row">
                                <strong class="title">{{ _e( 'Department/Subjects:' ) }} </strong>
                                <p>{{ get_field('department_subjects') }}</p>
                            </div>
                            @endif

                            @if(get_field('education'))
                            <div class="education-row">
                                <strong class="title">{{ _e( 'Education:' ) }}</strong>
                                <p>{{ get_field('education') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
                </div>
            </div>
        </section>
        @endforeach
        
    </div>
</main>

<?php endwhile; ?>
@endsection