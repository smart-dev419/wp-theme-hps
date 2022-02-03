<?php
date_default_timezone_set('America/New_York');
require( 'theme-config.php' );  


/**
 * Customize the classes added to next/prev post links
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="btn btn-load"';
}

function hps_pull_from_google_calendar($calendar_url, $count, $custom_events) {


    $transient = 'hps_cache_calendar_' . $count .'_' . $calendar_url;

    if(get_transient($transient)) {
        return hps_combine_events_with_custom($custom_events, get_transient($transient));
    }

    $yesterday = \DateTime::createFromFormat("Y-m-d H:i:s", date('Y-m-d H:i:s',strtotime("-1 days")));
    
    $url = 'https://www.googleapis.com/calendar/v3/calendars/'. $calendar_url .'/events?key=AIzaSyCJioJoOua562F5mKuHEssqjG1S8-lqorU&maxResults='. $count .'&orderBy=startTime&showDeleted=false&singleEvents=true&timeMin=' . urlencode($yesterday->format(\DateTime::RFC3339));
    $request = wp_remote_get($url);

    if(!is_wp_error($request)) {
        
        $eventData = json_decode($request['body']);

        set_transient( $transient, $eventData->items, 60*2 );

        return hps_combine_events_with_custom($custom_events, $eventData->items);
    }

    return hps_combine_events_with_custom($custom_events, array());
}

function hps_combine_events_with_custom($custom_events, $google_events) {

    $eventItems = array();

    foreach($custom_events as $event) {
        $eventItems[] = array(
            'unix' => $event['date'],
            'description' => $event['description'],
            'link' => $event['cta_link'],
            'button_text' => $event['cta_button'],
            'start_time' => $event['start_time'],
            'end_time' => $event['end_time'],
            'is_google' => false
        );
    }

    foreach($google_events as $event) {
        if(property_exists($event,'start')) {
            $eventItems[] = array(
                'unix' => strtotime($event->start->dateTime),
                'description' => $event->summary,
                'link' => false,
                'button_text' => false,
                'is_google' => true,
                'start_time' => $event->start->dateTime,
                'end_time' => property_exists($event,'end') ? $event->end->dateTime : false
            );
        }
    }

    return hps_array_sort($eventItems, 'unix');

}

function hps_array_sort($array, $on, $order=SORT_ASC){

    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

/**
 * Adds the ability for v-card to be uploaded to media uploader.  Add additional mime types here as needed.
 */
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
    // add your extension to the array
    $existing_mimes['vcf'] = 'text/x-vcard';
    $existing_mimes['svg'] = 'image/svg+xml';
    return $existing_mimes;
}


/**
 *  add page or post name to body class
 */
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


/**
 * class for customizing sub nav
 */
class WPSE_KEW_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $level_index = $depth + 1;
        if( $depth == 0 ) $output .= '<span class="arrow-mobile"></span>';
        $output .= "\n$indent<ul class='drop-level-$level_index'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}


/**
 * add 'active' class to current menu item
 */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if ( in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}


/**
 * add search item to main menu
 */
add_filter( 'wp_nav_menu_items', 'add_search_menu_item', 10, 2 );
function add_search_menu_item ( $items, $args ) {
    if ( $args->theme_location == 'main_nav' ) {
        $items .= '<li class="search"><a href="#" class="icon-search search-opener"><span class="for-sr">Search</span></a></li>';
    }
    return $items;
}


/**
 * get ordinalNumber function
 */
function ordinalNumber($number)
{
    $ordinal = array('zeroth', 'first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth', 'eleventh',   'twelfth', 'thirteenth', 'fourteenth', 'fifteenth', 'sixteenth', 'seventeenth', 'eighteenth', 'nineteenth', 'twentieth');
    return $ordinal[$number];
}


/**
 * get cardinalNumber function
 */
function cardinalNumber($number)
{
    $cardinal = array('zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen', 'twenty' );
    return $cardinal[$number];
}

