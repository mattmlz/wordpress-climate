<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */


/********************
 * TIMBER FUNCTIONS *
 *******************/

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	});

	add_filter('template_include', function( $template ) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'add_thematics' ) );
		add_action( 'init', array( $this, 'add_team_members' ) );
		add_action( 'init', array( $this, 'add_articles' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	public function add_thematics() {
       $post_type = 'thematics';

       $labels = array (
           'name'               => 'Thematics',
           'singular_name'      => 'Thematic',
           'all_items'          => __('All thematics'),
           'add_new'            => __('New thematic'),
           'add_new_item'       => __('Add new thematic'),
           'edit_item'          => __("Edit thematic"),
           'new_item'           => __('New thematic'),
           'view_item'          => __('View thematic'),
           'search_items'       => __('Find thematic'),
           'not_found'          => __("No result"),
           'not_found_in_trash' => __("No result"),
           'parent_item_colon'  => __("Thematic parent"),
           'menu_name'          => 'Site Thematics',
       );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'supports'            => array( 'title','thumbnail','editor', 'revisions'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 4,
            'menu_icon'           => 'dashicons-format-aside',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => array( 'slug' => $post_type ),
            'show_in_rest'        => true,
        );

        register_post_type($post_type, $args );
    }

    public function add_articles() {
       $post_type = 'articles';

       $labels = array (
           'name'               => 'Articles',
           'singular_name'      => 'Article',
           'all_items'          => __('All articles'),
           'add_new'            => __('New article'),
           'add_new_item'       => __('Add new article'),
           'edit_item'          => __("Edit article"),
           'new_item'           => __('New article'),
           'view_item'          => __('View article'),
           'search_items'       => __('Find article'),
           'not_found'          => __("No result"),
           'not_found_in_trash' => __("No result"),
           'parent_item_colon'  => __("Article parent"),
           'menu_name'          => 'Site Articles',
       );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'supports'            => array( 'title','thumbnail','editor', 'revisions'),
            'taxonomies'          => array('category', 'post_tag'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 4,
            'menu_icon'           => 'dashicons-align-left',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => array( 'slug' => $post_type ),
            'show_in_rest'        => true,
        );

        register_post_type($post_type, $args );
    }

    public function add_team_members() {
       $post_type = 'team';

       $labels = array (
           'name'               => 'Team',
           'singular_name'      => 'Team',
           'all_items'          => __('All team members'),
           'add_new'            => __('New team member'),
           'add_new_item'       => __('Add new team member'),
           'edit_item'          => __("Edit team member"),
           'new_item'           => __('New team member'),
           'view_item'          => __('View team member'),
           'search_items'       => __('Find team member'),
           'not_found'          => __("No result"),
           'not_found_in_trash' => __("No result"),
           'parent_item_colon'  => __("Team members parent"),
           'menu_name'          => 'Team members',
       );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'supports'            => array( 'title','thumbnail','editor', 'revisions'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-networking',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => array( 'slug' => $post_type )
        );

        register_post_type($post_type, $args );
    }

    public function add_scripts() {
        wp_enqueue_script( 'testimonials', get_template_directory_uri() . '/assets/js/testimonials.js', array(), '1.0.0', true );
    }


	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['menu'] = new Timber\Menu();
		$context['site'] = $this;
		//Homepage thematics
        $args_thematics = array(
            'posts_per_page' => -1,
            'post_type' => 'thematics',
            'orderby' => array(
                'date' => 'ASC',
            ),
        );
        //Team members
        $args_team = array(
            'posts_per_page' => -1,
            'post_type' => 'team',
        );
        //Articles
        $args_articles = array(
            'posts_per_page' => -1,
            'post_type' => 'articles',
        );

        //send datas ton context
        $context['thematics'] = Timber::get_posts($args_thematics);
        $context['team'] = Timber::get_posts($args_team);
        $context['articles'] = Timber::get_posts($args_articles);
		return $context;

    }

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();
