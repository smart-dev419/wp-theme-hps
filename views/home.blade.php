@layout('layouts/master')
<?php /* Template Name: Home */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

@include('partials/hero-home')

<main id="main" class="bordered-top">
    <section class="overview-panel">
        <div class="container">
            <h2>{{ get_field('tc_title') }}</h2>
            @if(!empty(get_field('train_child')))
            <div class="three-columns">
                @foreach(get_field('train_child') as $child)
                <div class="column">
                    <div class="img-wrap">
                        <div class="img-frame">
                            {{ Helper::image($child['icon'], 'full', array('width' => $child['icon_width'], 'height' => $child['icon_height'])) }}
                        </div>
                    </div>
                    <strong class="title">{{ $child['title'] }}</strong>
                    <div class="text-wrap">
                        <p>{{ $child['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <section class="mission-panel">
        @if(!empty(array_slice(get_field('classical_educations'), 0, 1)))
        <div class="column">
            @foreach(array_slice(get_field('classical_educations'), 0, 1) as $education)
            <a class="block-wrap full" style="background: url({{ $education['image'] }}) no-repeat 50% 50% / cover" href="{{ $education['page_link'] }}">
                <div class="content-holder">
                    <div class="content-wrap">
                        <span class="txt">{{ get_field('ce_title') }}</span>
                    </div>
                </div>
                <div class="block-link">
                    <span>{{ $education['page_link_label'] }}</span>
                </div>
            </a>
            @endforeach
        </div>
        @endif
        @if(!empty(array_slice(get_field('classical_educations'), 1)))
        <div class="column">
            @foreach(array_slice(get_field('classical_educations'), 1) as $education)
            <a class="block-wrap half" style="background: url({{ $education['image'] }}) no-repeat 50% 50% / cover" href="{{ $education['page_link'] }}">
                <div class="block-link">
                    <span>{{ $education['page_link_label'] }}</span>
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </section>
    <section class="alumni-spotlight parallax" data-parallax="scroll" data-image-src="{{ get_field('fa_bg_image') }}">
        <h3>{{ get_field('fa_title') }}</h3>
        <div class="spotlight-slider">
            <?php
                $original_post_id = $post->ID;
                $options = array(
                    'post_type' => 'alumni',
                    'orderby' => 'post__in',
                    'posts_per_page' => -1,
                    'post__in' => get_field('alumnis'),
                );
                $alumnis = new WP_Query( $options );
                while( $alumnis->have_posts() ) : $alumnis->the_post();
            ?>
            <div class="slide">
                <blockquote>
                    <q><span class="text-wrap">{{ get_field('bio') }}</span></q>
                    <cite>
                <span class="img-wrap">
                    <a href="{{ get_field('alumni_spotlight_page_link', $original_post_id) }}">
                        {{ Helper::image(get_field('small_photo'), 'full', array('width' => '182', 'height' => '182')) }}
                    </a>
                </span>
                <span class="name">{{ get_field('name') }}</span>
                <span class="short-info">{{ get_field('class_year') }}</span>
              </cite>
                </blockquote>
            </div>
           <?php
               endwhile;
               wp_reset_query();
           ?>
        </div>
    </section>
    <section class="whats-happening-block">
        <div class="container">
            <h2>{{ get_field('ne_section_title') }}</h2>
            <div class="three-columns">
                <div class="column">
                    <h3>{{ get_field('ne_news_title') }}</h3>
                    <div class="text-holder">
                        {{ get_field('new_news_content')  }}
                    </div>
                    <a href="{{ get_field('ne_news_link_url') }}" class="btn">{{ get_field('ne_news_link_label') }}</a>
                </div>
                <div class="column">
                    <h3>{{ get_field('ne_events_title') }}</h3>
                    <ul class="news-list">

                        @foreach(hps_pull_from_google_calendar(get_field('google_calendar_url'), get_field('google_calendar_number_of_entries'), get_field('custom_event_entries')) as $event)

                        <li>
                       
                            <time ><span class="month">{{ date("M", $event['unix']) }}</span><span class="num">{{ date("d", $event['unix']) }}</span></time>
                            <span class="txt">
                            @if($event['is_google'])
                            <a target="_blank" href="https://calendar.google.com/calendar/embed?src={{ get_field('google_calendar_url') }}&ctz=America/New_York">
                            @endif
                            {{ $event['description'] }}
                            @if($event['is_google'])
                            </a>
                            @endif
                            <br />{{ date("g:i A", strtotime($event['start_time'])) }}
                            @if($event['end_time'])
                            - {{ date("g:i A", strtotime($event['end_time'])) }}
                            @endif
                            @if($event['link'])
                            <br /><a href="{{ $event['link'] }}" style="text-decoration: underline" target="_blank">{{ $event['button_text'] }}</a>
                            @endif
                            </span>
                        </li>
           
                        @endforeach

                    </ul>
                </div>
                <div class="column">
                    <h3>{{ get_field('ne_post_title') }}</h3>

                    <div class="text-holder">
                        {{ get_field('new_post_content') }}
                    </div>
                    <a href="{{ get_field('ne_post_link_label_url') }}" class="btn">{{ get_field('ne_post_link_label') }}</a>
                </div>
            </div>
        </div>
    </section>
    <div class="motto-bar">
        <div class="container">
            <strong class="title">{{ get_field('motto_title') }}</strong>
            <span class="txt">{{ get_field('motto_description') }}</span>
        </div>
    </div>
</main>    

<?php endwhile; ?>
@endsection
    