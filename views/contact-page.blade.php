@layout('layouts/master')
<?php /* Template Name: Contact */ ?>
@section('content')
<?php while ( have_posts() ) : the_post(); ?>

<?php $img = wp_get_attachment_image_src( get_field('hero_image'), 'full'); ?>
<section class="hero-section contact win-height parallax" data-parallax="scroll" data-image-src="{{ $img[0] }}">
    <div class="hero-content container">
        <div class="hero-frame">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>{{ get_field('h1_title') }}</h1>
                    <address>
	                	<div class="address">{{ get_field('address', 'option') }}</div>
		                <span class="contact-info">{{ _e( 'Phone' ) }}: <a href="tel:{{ get_field('phone', 'option') }}">{{ get_field('phone', 'option') }}</a></span>
		                <span class="contact-info">{{ _e( 'Fax' ) }}: {{ get_field('fax', 'option') }}</span>
		                <span class="contact-info">{{ _e( 'Email' ) }}: <a onClick="ga('send', 'event', { eventCategory: 'Email Link', eventAction: 'Click', eventLabel: 'Contact Email'});" href="mailto:{{ get_field('email', 'option') }}">{{ get_field('email', 'option') }}</a></span>
              		</address>
                    <div class="btn-wrap">
                        <a href="#main" onClick="ga('send', 'event', { eventCategory: 'Link Click', eventAction: 'Click', eventLabel: 'Map Click'});" class="btn smooth-anchor">{{ _e( 'Directions' ) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<main id="main" class="bordered-top">
    <section class="map-container">
        <div id="map"></div>
        <?php $map_info = get_field('google_map'); ?>
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCaWsgDJv6JN_2sMD9OZ54E3lZ0SSziDoo&libraries=geometry,places,drawing"></script>    
        <script>
            var lat = {{$map_info['lat']}}+0.00135;
            var lng = {{$map_info['lng']}}-0.00017;
            var options = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 18,
                scrollwheel: false,
                mapTypeControl: false,
                streetViewControl: false,
                panControl: false,
                zoomControl: true,
                zoomControlOptions: {
                  style: google.maps.ZoomControlStyle.SMALL,
                  position: google.maps.ControlPosition.RIGHT_BOTTOM
                }
            };
            var div = document.getElementById('map'),
                map = new google.maps.Map(div, options),
                marker = new google.maps.Marker({
                  position: new google.maps.LatLng(lat, lng),
                  map: map,
                  title: '{{ get_bloginfo('name') }}'
                });


            var infoContent = document.createElement('div');
                infoContent.innerHTML = '<h5>{{ get_bloginfo('name') }}</h5><span>{{ $map_info['address'] }}</span>';
                infoContent.className = 'infoBox';

            var infoWindow = new google.maps.InfoWindow({
              content: infoContent
            });

            google.maps.event.addListener(marker, 'mouseover', function (e) {
              infoWindow.open(map,this);
            });

        </script>
    </section>
</main>

<?php endwhile; ?>
@endsection