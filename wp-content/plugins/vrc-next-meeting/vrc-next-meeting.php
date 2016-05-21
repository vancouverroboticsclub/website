<?php
/*
Plugin Name: VRC Next Meeting
Plugin URI: http://www.vancouverroboticsclub.org/
Description: A "shortcode" plug-in that displays the next VRC meeting date.
Version: 1.0
Author: Bob Cook
Author URI: http://www.vancouverroboticsclub.org/
License: Not for public disclosure.
*/

/* Copyright 2011 Robert Cook. All rights reserved. */

// [vrc-next-meeting format="l F j, Y"]
function vrc_next_meeting_func( $atts )
{
	$vrc_meetings = array(
        new DateTime( "2015-03-08T13:00:00-0800" ),
        new DateTime( "2015-05-17T13:00:00-0800" ),
        new DateTime( "2015-06-14T13:00:00-0800" ),
        new DateTime( "2015-07-12T13:00:00-0800" ),
        new DateTime( "2015-08-09T13:00:00-0800" ),
        new DateTime( "2015-09-13T13:00:00-0800" ),
        new DateTime( "2015-10-18T13:00:00-0800" ),
        new DateTime( "2015-11-08T13:00:00-0800" ),
        new DateTime( "2015-12-13T13:00:00-0800" ),
        new DateTime( "2016-01-10T13:00:00-0800" ),
        new DateTime( "2016-02-21T13:00:00-0800" ),
        new DateTime( "2016-03-13T13:00:00-0800" ),
        new DateTime( "2016-04-10T13:00:00-0800" ),
        new DateTime( "2016-05-08T13:00:00-0800" ),
        new DateTime( "2016-06-12T13:00:00-0800" ),
        new DateTime( "2016-07-10T13:00:00-0800" ),
        new DateTime( "2016-08-14T13:00:00-0800" ),
        new DateTime( "2016-09-11T13:00:00-0800" ),
        new DateTime( "2016-10-09T13:00:00-0800" ),
        new DateTime( "2016-11-13T13:00:00-0800" ),
        new DateTime( "2016-12-11T13:00:00-0800" ),
	);
	
	extract( shortcode_atts( array( 'format' => 'l F j, Y' ), $atts ) );
	
	$compare_to = new DateTime();
	// make this valid until four hours after meeting start
	$compare_to->modify( '-4 hour' );

	foreach ( $vrc_meetings as $this_meeting )
	{
	    if ( $compare_to < $this_meeting )
	    {
	        return $this_meeting->format( $format );
	    }
	}
	
	return "(unknown meeting date)"; // this shouldn't really happen
}

add_shortcode( 'vrc-next-meeting', 'vrc_next_meeting_func' );

?>
