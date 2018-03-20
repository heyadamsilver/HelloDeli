<?php
/**
 * @package Hello_deli
 * @version 1.6
 */
/*
Plugin Name: Hello Deli
Plugin URI: http://wordpress.org/extend/plugins/hello-deli/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation who watched Joey from Friends love to eat, and his love for the sandwich. 
Author: Adam Silver
Version: 1
Author URI: http://kitchensinkwp.com
*/

function hello_deli_get_sandwich() {
	/** These are the sandwiches to Hello deli */
	$sandwich = "Hello, deli
French Dip
Hero
Po’Boy
Hoagie
Grinder
Wedge
Spuckie
Blimpie
Torpedo
Spiedie
Gondola
Zeppelin
Sarnie
Italian
Sub
Bomber";

	// Here we split it into lines
	$sandwich = explode( "\n", $sandwich );

	// And then randomly choose a line
	return wptexturize( $sandwich[ mt_rand( 0, count( $sandwich ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_deli() {
	$chosen = hello_deli_get_sandwich();
	echo "<p id='deli'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_deli' );

// We need some CSS to position the paragraph
function deli_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#deli {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'deli_css' );

?>