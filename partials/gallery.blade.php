@if(!empty($photos))
<ul class="gallery-list<?php echo (count($photos)==3)? " style-1":"";?>">
    @foreach($photos as $photo)
    <li>
        <div class="img-holder" style="background: url({{ $photo['url'] }}) no-repeat 50% 50% / cover"></div>
    </li>
    @endforeach
</ul>
@endif