<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

if(! function_exists('is_mata_kuliah')){
	function is_mata_kuliah(){
		$parent_cat = get_term_by('name', 'Mata Kuliah', 'category');
		$cat = get_the_category();

		print_r($cat);

		return cat_is_ancestor_of($parent_cat->term_id, $cat[0]->cat_ID);
	}
}

add_filter('get_the_archive_title', function($title){
	echo "<h1>The $title is " . $title . "</h1>";
	if(is_mata_kuliah()){
		$title = 'Mata Kuliah: ' . single_cat_title('', false);
	}

	return $title;
});

?>