<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'INFORMACIÓN GENERAL', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'E-mail', 'theme-textdomain' ),
		'desc' => __( 'Correo Electrónico del Header y Footer.', 'theme-textdomain' ),
		'id' => 'email-header-footer',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Teléfono', 'theme-textdomain' ),
		'desc' => __( 'Teléfono.', 'theme-textdomain' ),
		'id' => 'telefono-uno',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Teléfono segundario', 'theme-textdomain' ),
		'desc' => __( 'Teléfono segundario.', 'theme-textdomain' ),
		'id' => 'telefono-dos',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Dirección', 'theme-textdomain' ),
		'desc' => __( 'Dirección.', 'theme-textdomain' ),
		'id' => 'direccion',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Google Maps', 'theme-textdomain' ),
		'desc' => __( 'Google maps latitud.', 'theme-textdomain' ),
		'id' => 'google-maps-lat',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Google Maps', 'theme-textdomain' ),
		'desc' => __( 'Google maps longitud.', 'theme-textdomain' ),
		'id' => 'google-maps-lng',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Formulario de contacto', 'theme-textdomain' ),
		'desc' => __( 'Email.', 'theme-textdomain' ),
		'id' => 'email-contact',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Título Formulario de Contacto', 'theme-textdomain' ),
		'desc' => __( 'Título', 'theme-textdomain' ),
		'id' => 'form-contact-title',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Contenido Formulario de Contacto', 'theme-textdomain' ),
		'desc' => __( 'Contenido', 'theme-textdomain' ),
		'id' => 'form-contact-content',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'REDES SOCIALES', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Facebook', 'theme-textdomain' ),
		'desc' => __( 'Url facebook.', 'theme-textdomain' ),
		'id' => 'facebook',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Instagram', 'theme-textdomain' ),
		'desc' => __( 'Url instagram.', 'theme-textdomain' ),
		'id' => 'instagram',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Twitter', 'theme-textdomain' ),
		'desc' => __( 'Url twitter.', 'theme-textdomain' ),
		'id' => 'twitter',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Google +', 'theme-textdomain' ),
		'desc' => __( 'Url google +.', 'theme-textdomain' ),
		'id' => 'googleplus',
		'type' => 'text'
	);

	return $options;
}