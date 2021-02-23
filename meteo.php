<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */
/*
Plugin Name: meteo pikachu
Plugin URI: http://wordpress.org/plugins/meteopikachu/
Description: this is meteo plugin from pikachu
Author: Kieran pikachu
Version: 1.0.0
Author URI: http://ma.tt/
*/


// function meteo() {

// 	printf('<p>hello pikachu</p>',
// 	);
// 	$data=file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=rodez&appid=9d63106b0003583259d7d973d5addfa9&lang=fr&units=metric');
// 	$plouf=json_decode($data);
// 	$desc=$plouf ->weather[0]->description;
// 	$temp=$plouf->main->temp;
// 	//print_r($plouf);
// 	print $desc.PHP_EOL;
// 	print $temp.'°C';

// }

// Now we set that function up to execute when the admin_notices action is called.
//add_action( 'admin_notices', 'meteo' );

/**
 * Register a custom menu page.
 */
/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page(){
    add_menu_page( 
        __( 'Custom Menu Title', 'textdomain' ),
        'pikachu',
        'manage_options',
        'custompage',
        'my_custom_menu_page',
        plugins_url( 'myplugin/images/icon.png' ),
        6
    ); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
 
/**
 * Display a custom menu page
 */
function my_custom_menu_page(){
	printf('<p>hello pikachu</p>',
	);
	$city=$_POST['city'];
	if($_POST['metric']){
		switch ($_POST['metric']){
			case 1:
				$metric="metric";
			break;
			case 2:
				$metric="imperial";
			break;
			case 3:
				$metric="kelvin";
			break;
			default:
				$metric="metric";
		}
	}
	if($_POST['lang']){
		switch ($_POST['lang']){
			case 1:
				$lang="fr";
			break;
			case 2:
				$lang="en";
			break;
			default:
				$lang="fr";
		}
	}
	if($_POST['city']){
		$data=file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=9d63106b0003583259d7d973d5addfa9&lang='.$lang.'&units='.$metric.'');
		$plouf=json_decode($data);
		$desc=$plouf->weather[0]->description;
		$temp=$plouf->main->temp;
		//print_r($plouf);
		print $desc.PHP_EOL;
		print $temp.'°C';  
	}
	
	print "<div>Bienvenu(e) sur la météo pikachu ! </div>";
	print PHP_EOL;
	print "<form method=\"post\">
			<div>Veuillez rentrer le nom d'une ville</div>
			<input type=\"text\"name=\"city\">
			<div>Veuillez choisir une unite</div>
			<select name=\"metric\">
			<option value=\"1\">Celsius</option>
			<option value=\"2\">Fahrenheit</option>
			<option value=\"3\">Kelvin</option>
			</select>
			<div>Veuillez choisir en quel langue </div>
			<select name=\"lang\">
			<option value=\"1\">Français</option>
			<option value=\"2\">English</option>
			</select>
			<button>Go Pikachu</button>
		   </form>" ;	
}
