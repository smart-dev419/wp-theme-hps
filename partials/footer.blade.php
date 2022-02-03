<footer id="footer">
	<div class="footer-t">
		<div class="container">
			<div class="three-columns">
				<div class="column">
					<div class="content-holder">
						<?php
						  wp_nav_menu (array(
						    'theme_location' => 'footer_nav',
						    'container' => false,
						    'container_class' => '',
						    'menu_id' => '',
						    'menu_class' => 'footer-nav'
						  ));
						?>
						@if(!empty(get_field('social_nav', 'option')))
						<ul class="social-networks">
							@foreach(get_field('social_nav', 'option') as $social)
							    @if($social['social_link'])
								<li>
									<a onClick="ga('send', 'event', { eventCategory: 'Button Click', eventAction: 'Click', eventLabel: 'Social Icons'});" target="_blank" href="{{ $social['social_link'] }}" class="icon-{{ strtolower($social['social_name']) }}">
										<span class="for-sr">{{ strtolower($social['social_name']) }}</span>
									</a>
								</li>
							    @endif
							@endforeach
						</ul>
						@endif
					</div>
				</div>
				<div class="column">
					<div class="content-holder">
						<div class="logo-wrap">
							<a href="{{ home_url('/') }}">
								{{ Helper::image(get_field('footer_logo', 'option'), 'full', array('width' => '226', 'height' => '225', 'alt' => 'HPS')) }}
							</a>
						</div>
					</div>
				</div>
				<div class="column">
					<div class="content-holder">
						<address>
							<span>
								{{ get_bloginfo('name') }} <br>
								{{ get_field('address', 'option') }}
							</span>
							<span>{{ _e( 'T' ) }}: <a onClick="ga('send', 'event', { eventCategory: 'Phone Number Click', eventAction: 'Click', eventLabel: 'Mobile Click to Call'});" href="tel:{{ get_field('phone', 'option') }}">{{ get_field('phone', 'option') }}</a></span>
							<span>{{ _e( 'F' ) }}: {{ get_field('fax', 'option') }}</span>
						</address>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-b">
		<div class="container">
			<span class="copyright">{{ get_field('copyright', 'option') }}</span>
		</div>
	</div>
</footer>
