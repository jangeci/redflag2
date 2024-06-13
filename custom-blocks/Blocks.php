<?php
/**
 *  Gutenberg assets
 */

require_once 'Renderer.php';

function register_red_flag_blocks() {
    wp_register_style(
        'jg-blocks',
        get_theme_file_uri('custom-blocks/css/gutenberg-blocks.css'),
        [],
        filemtime( get_template_directory ().'/custom-blocks/css/gutenberg-blocks.css' )
    );

    wp_register_script(
        'jg-blocks',
        get_theme_file_uri('custom-blocks/js/block.build.js'),
        ['wp-blocks', 'wp-element', 'wp-editor' ],
        filemtime( get_template_directory ().'/custom-blocks/js/block.build.js' )
    );

    register_block_type ('jg-blocks/widget-image', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks'
    ]);

    register_block_type ('jg-blocks/home-featured-posts', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'HomeFeaturedPosts']
    ]);

    register_block_type ('jg-blocks/featured-posts-slider-single-post', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'FeaturedPostsSliderSinglePost']
    ]);

    register_block_type ('jg-blocks/custom-posts-section', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'CustomPostsSection']
    ]);

    register_block_type ('jg-blocks/slider-section', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'SliderSection']
    ]);

    register_block_type ('jg-blocks/slider-section-single-slide', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'SliderSectionSingleSLide']
    ]);

    register_block_type ('jg-blocks/slider-section-item', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'SliderSectionItem']
    ]);

	register_block_type ('jg-blocks/page-header', [
		'editor_style' => 'jg-blocks',
		'editor_script' => 'jg-blocks',
		'render_callback' => ['Renderer', 'PageHeader']
	]);

    register_block_type ('jg-blocks/large-slider', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'LargeSlider']
    ]);

    register_block_type ('jg-blocks/large-slider-item', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'LargeSliderItem']
    ]);

    register_block_type ('jg-blocks/google-map', [
        'editor_style' => 'jg-blocks',
        'editor_script' => 'jg-blocks',
        'render_callback' => ['Renderer', 'GoogleMap']
    ]);
}
add_action( 'init', 'register_red_flag_blocks' );

function my_custom_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'jg-blocks',
                'title' => 'Theme blocks',
            ),
        )
    );
}
add_filter( 'block_categories', 'my_custom_block_category', 10, 2);

function wp_ajax_get_custom_size_img() {
    $id = $_GET ['imgid'];
    $size = $_GET ['imgsize'];
    $img = wp_get_attachment_image_src($id, $size);
    $url = $img[0];
    echo json_encode($url);
    exit;
}
add_action ('wp_ajax_get_custom_size_img', 'wp_ajax_get_custom_size_img');
add_action ('wp_ajax_nopriv_get_custom_size_img', 'wp_ajax_get_custom_size_img');

function wp_ajax_jg_get_posts() {
    $data = get_posts();
    $array = [];
    foreach($data as $post){
        $postData = [];
        $postData['title'] = $post->post_title;
        $postData['id'] = $post->ID;
        array_push($array, $postData);
    }
    echo json_encode($array);
    exit;
}
add_action ('wp_ajax_jg_get_posts', 'wp_ajax_jg_get_posts');
add_action ('wp_ajax_nopriv_jg_get_posts', 'wp_ajax_jg_get_posts');

function wp_ajax_jg_get_categories() {
    //get options for select
    $data = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    $array = [];
    foreach($data as $category){
        $catData = [];
        $catData['label'] = $category->name;
        $catData['value'] = $category->term_id ;
        array_push($array, $catData);
    }
    echo json_encode($array);
    exit;
}
add_action ('wp_ajax_jg_get_categories', 'wp_ajax_jg_get_categories');
add_action ('wp_ajax_nopriv_jg_get_categories', 'wp_ajax_jg_get_categories');