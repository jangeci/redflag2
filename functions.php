<?php
/**
 * Red FLag functions and definitions
 */

require_once 'custom-blocks/Blocks.php';

if ( ! function_exists( 'red_fLag_setup' ) ) :

	function red_fLag_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 750 );
		add_image_size( 'mediumSquare', 449, 449, true );
		add_image_size( 'postThumbnail', 362, 196, true );

		register_nav_menus(
			array(
				'primary' => __( 'Primary', 'red_fLag' ),
				'footer'  => __( 'Footer Menu', 'red_fLag' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logos
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 'auto',
				'width'       => 'auto',
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'red_fLag' ),
					'shortName' => __( 'S', 'red_fLag' ),
					'size'      => 14,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'red_fLag' ),
					'shortName' => __( 'N', 'red_fLag' ),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Medium', 'red_fLag' ),
					'shortName' => __( 'M', 'red_fLag' ),
					'size'      => 22,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'red_fLag' ),
					'shortName' => __( 'L', 'red_fLag' ),
					'size'      => 30,
					'slug'      => 'large',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'red_fLag_setup' );


/**
 * Enqueue scripts and styles.
 */
function red_flag_scripts() {
	wp_enqueue_style( 'slickcss', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );

	wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1', true );

	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/functions.js', [ 'jquery' ], filemtime( get_template_directory() . '/js/functions.js' ), true );

}

add_action( 'wp_enqueue_scripts', 'red_flag_scripts' );

function admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css' );
}

add_action( 'admin_enqueue_scripts', 'admin_style' );

//$people = [
//    'public' => true,
//    'label' => 'People',
//    'labels' => [
//        'name' => 'People',
//        'singular_name' => 'Person'
//    ],
//    'menu_icon' => 'dashicons-groups',
//    'show_in_rest' => true,
//    'template' => [
//        ['jg-blocks/columns-a', [], [
//            ['jg-blocks/single-column', ['colClass' => 'left-col'], [['jg-blocks/person-header'], ['core/paragraph']]
//            ],
//            ['jg-blocks/single-column', ['colClass' => 'right-col'], [['jg-blocks/person-featured-image']]
//            ]
//        ]
//        ],
//        ['jg-blocks/person-pagination'],
//        ['jg-blocks/single-background-block']
//    ],
//    'supports' => [
//        'title',
//        'editor',
//        'thumbnail',
//        'custom-fields'
//    ]
//];
//register_post_type('people', $people);

//$schoolCategory = [
//    'public' => true,
//    'label' => 'School Category',
//    'labels' => [
//        'name' => 'School Categories',
//        'singular_name' => 'School Category'
//    ],
//    'hierarchical' => true,
//    'show_in_rest' => true,
//    'rewrite' => array('slug' => 'regions')
//];
//register_taxonomy('school_category', ['school'], $schoolCategory);

/*Template for default posts*/
function be_post_block_template() {
	$post_type_object           = get_post_type_object( 'post' );
	$post_type_object->template = [
		[ 'jg-blocks/page-header' ],
		[ 'core/paragraph' ]
	];
}

add_action( 'init', 'be_post_block_template' );

//
//function wp_ajax_fetchAutocompleteResults()
//{
//    if (isset($_GET['keyword'])) {
//        $key = $_GET['keyword'];
//        $key = sanitize_text_field($key);
//        global $wpdb;
//
//        $sql = "SELECT * FROM wp_posts LEFT JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id WHERE (post_title LIKE '%" . $key . "%'
//        OR REPLACE (post_title, '''', '') LIKE '%" . $key . "%' OR post_content LIKE '%" . $key . "%' OR meta_value LIKE '%" . $key . "%') AND post_status = 'publish'
//        AND ( post_type = 'people' OR post_type = 'school' OR post_type = 'post' OR post_type = 'page' )
//        ORDER BY CASE
//        WHEN post_title LIKE '" . $key . "%' OR REPLACE (post_title, '''', '') LIKE '%" . $key . "%' THEN 1
//        WHEN post_title LIKE '%" . $key . "%' THEN 2
//        WHEN post_content LIKE '%" . $key . "%' THEN 3
//        WHEN meta_value LIKE '%" . $key . "%' THEN 4
//        ELSE 5
//        END";
//
//        $query = $wpdb->get_results($sql);
//        $checkingduplicities = array();
//        $results = array();
//
//        if (count($query) > 0):
//            foreach ($query as $single) :
//                $returnTitle = $single->post_title;
//                $returnUrl = get_permalink($single->ID);
//                if (!in_array($returnUrl, $checkingduplicities)):
//                    $results [] = [
//                        'title' => $returnTitle,
//                        'url' => $returnUrl,
//                    ];
//                    $checkingduplicities[] = $returnUrl;
//                endif;
//            endforeach;
//        endif;
//        echo json_encode($results);
//    }
//    exit;
//}
//
//add_action('wp_ajax_fetchAutocompleteResults', 'wp_ajax_fetchAutocompleteResults');
//add_action('wp_ajax_nopriv_fetchAutocompleteResults', 'wp_ajax_fetchAutocompleteResults');
