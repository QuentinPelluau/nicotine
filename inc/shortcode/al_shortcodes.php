<?php 

function al_conference_link($atts, $content=null)
{
	$defaults = [
		'title' => '',
		'className' => 'link_conf'
	];

	$a = shortcode_atts($defaults, $atts);

	return '<a href="#" class="'.$a['className'].'">'.$content.'</a>';

}

add_shortcode('conference_link', 'al_conference_link'); //


 ?>