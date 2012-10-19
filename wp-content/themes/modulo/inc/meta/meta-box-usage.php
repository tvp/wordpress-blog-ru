<?php

/********************* BEGIN EXTENDING CLASS ***********************/

class RW_Meta_Box_Taxonomy extends RW_Meta_Box {
	
	function add_missed_values() {
		parent::add_missed_values();
		
		// add 'multiple' option to taxonomy field with checkbox_list type
		foreach ($this->_meta_box['fields'] as $key => $field) {
			if ('taxonomy' == $field['type'] && 'checkbox_list' == $field['options']['type']) {
				$this->_meta_box['fields'][$key]['multiple'] = true;
			}
		}
	}
	
	// show taxonomy list
	function show_field_taxonomy($field, $meta) {
		global $post;
		
		if (!is_array($meta)) $meta = (array) $meta;
		
		$this->show_field_begin($field, $meta);
		
		$options = $field['options'];
		$terms = get_terms($options['taxonomy'], $options['args']);
		
		// checkbox_list
		if ('checkbox_list' == $options['type']) {
			foreach ($terms as $term) {
				echo "<input type='checkbox' name='{$field['id']}[]' value='$term->slug'" . checked(in_array($term->slug, $meta), true, false) . " /> $term->name<br/>";
			}
		}
		// select
		else {
			echo "<select name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";
		
			foreach ($terms as $term) {
				echo "<option value='$term->slug'" . selected(in_array($term->slug, $meta), true, false) . ">$term->name</option>";
			}
			echo "</select>";
		}
		
		$this->show_field_end($field, $meta);
	}
}

/********************* END EXTENDING CLASS ***********************/

/********************* BEGIN DEFINITION OF META BOXES ***********************/
$prefix = 'rw_';

$meta_boxes[] = array(
	'id' => 'portfolio media',
	'title' => 'Testimonials details',
	'pages' => array('testimonials'),

	'fields' => array(
                array(
			'name' => 'Author',					// field name
			'id' => $prefix . 'author',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',                                            // default value, optional
			'style' => 'width: 220px'				// custom style for field, added in v3.1
			
		),
                array(
			'name' => 'Company/Position',					// field name
			'id' => $prefix . 'position',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 220px'				// custom style for field, added in v3.1

		),
                array(
			'name' => 'Url',					// field name
			'id' => $prefix . 'urllink',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 220px'				// custom style for field, added in v3.1

		)
)

);

$meta_boxes[] = array(
	'id' => 'Additionaly media',
	'title' => 'Additionaly images or videos',
	'pages' => array('portfolio'),

	'fields' => array(
		array(
			'name' => 'Additionaly images',
			'desc' => 'Choose more images',
			'id' => $prefix . 'addpict',
			'type' => 'image'						// image upload
		),
                array(
			'name' => 'Video code',					// field name
			'id' => $prefix . 'addvideo',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',                                            // default value, optional
			'style' => 'width: 220px'				// custom style for field, added in v3.1

		),
                array(
			'name' => 'Lightbox Video code',					// field name
			'id' => $prefix . 'lightbox_addvideo',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',                                            // default value, optional
			'style' => 'width: 220px'				// custom style for field, added in v3.1

		)
)

);

$meta_boxes[] = array(
	'id' => 'icons',
	'title' => 'Featured icons',
	'pages' => array('practice-areas'),

	'fields' => array(
		array(
			'name' => 'icons',
			'desc' => 'Choose image/icon that will be (eventually) displayed at home page',
			'id' => $prefix . 'icon',
			'type' => 'image'						// image upload
		),
                array(
			'name' => 'Description',
			'desc' => 'Short page description that will be shown below page title, and next to featured icon',
			'id' => $prefix . 'fidescription',
			'type' => 'textarea',					// textarea
			'std' => '',
			'style' => 'width: 450px; height: 200px'
		)
	)
);

foreach ($meta_boxes as $meta_box) {
	$my_box = new RW_Meta_Box_Taxonomy($meta_box);
}

/********************* END DEFINITION OF META BOXES ***********************/

/********************* BEGIN VALIDATION ***********************/

class RW_Meta_Box_Validate {
	function check_name($text) {
		if ($text == 'Anh Tran') {
			return 'He is Rilwis';
		}
		return $text;
	}
}

/********************* END VALIDATION ***********************/
?>
