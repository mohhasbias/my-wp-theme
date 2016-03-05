<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

if(! function_exists('is_mata_kuliah')){
	function is_mata_kuliah(){
		$parent_cat = get_term_by('name', 'Mata Kuliah', 'category');
		$cat = get_the_category();

		var_dump($cat);

		return cat_is_ancestor_of($parent_cat->term_id, $cat[0]->cat_ID);
	}
}

?>