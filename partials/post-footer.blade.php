<ul class="tags">
{{ wp_list_categories( array( 'title_li' => '' ) ) }}
</ul> 
<ul class="links">
    <li>
    	<a href="javascript:window.print();" class="print">
    		<span class="for-sr">{{ _e( 'Print' ) }}</span>
    	</a>
    </li>
    <li>
    	<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(get_permalink()) }}" class="facebook share">
    		<span class="for-sr">{{ _e( 'Facebook' ) }}</span>
    	</a>
    </li>
    <li>
    	<a href="https://twitter.com/intent/tweet?url={{  urlencode(get_permalink()) }}&text={{ urlencode(get_the_title()) }}" class="twitter share">
    		<span class="for-sr">{{ _e( 'Twitter' ) }}</span>
    	</a>
    </li>
</ul>