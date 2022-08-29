<?php
/**
 * GMMB functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GMMB
 */

if ( ! function_exists( 'gmmb_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gmmb_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GMMB, use a find and replace
		 * to change 'gmmb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gmmb', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gmmb' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gmmb_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gmmb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gmmb_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gmmb_content_width', 640 );
}
add_action( 'after_setup_theme', 'gmmb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gmmb_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gmmb' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gmmb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gmmb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gmmb_scripts() {
	wp_enqueue_style( 'gmmb-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gmmb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gmmb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if ( is_page( 'every-bottle-back' ) ) {
        wp_enqueue_style('every-bottle-back-style', get_template_directory_uri() .'/assets/css/every-bottle-back.css', array(), null, 'all' );

        wp_enqueue_style( 'gmmb-swiper-css', get_template_directory_uri() .'/assets/swiper/swiper-bundle.min.css', array(), '6.1.2' );
        wp_enqueue_script( 'gmmb-swiper-js', get_template_directory_uri() .'/assets/swiper/swiper-bundle.min.js', array(), '6.1.2', true );

        wp_enqueue_style( 'gmmb-fancybox-css', get_template_directory_uri() .'/assets/fancybox/jquery.fancybox.min.css', array(), '3.5.7' );
        wp_enqueue_script( 'gmmb-fancybox-js', get_template_directory_uri() .'/assets/fancybox/jquery.fancybox.min.js', array(), '3.5.7', true );

        wp_enqueue_script('gmmb-swiper-options', get_template_directory_uri() . '/assets/js/swiper-options.js', array('jquery'), '20151215', true );
    }

    wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script('settings', get_template_directory_uri() . '/js/settings.js', array('jquery'), '1.0.0', true );

    //wp_enqueue_style( 'gmmb-google-fonts', '//fonts.googleapis.com/css?family=Muli:400,700,800', false );

    wp_register_style('owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css', array(), null, 'all' );
    wp_enqueue_style( 'owl-carousel' );

    wp_register_style('font-awesome-5', get_template_directory_uri() .'/css/all.min.css', array(), null, 'all');
    wp_enqueue_style( 'font-awesome-5' );

}
add_action( 'wp_enqueue_scripts', 'gmmb_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function gmmb_pages_shortcode() {
    ob_start();
    global $post;

    // define query parameters based on attributes
    $options = array(
        //'post__not_in' => array(2),
        'post_type' => 'page',
        'order' => 'ASC',
        'orderby' => 'date',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key'     => 'homepage_slider',
                'value'   => 'Yes',
                'compare' => 'LIKE'
            )
        )
    );

    $the_query = new WP_Query( $options );

    if ( $the_query->have_posts() ) {
        echo '<div id="gmmb-posts" class="owl-carousel owl-theme">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $excerpt = get_field('excerpt_field');

            echo '<div class="page-item">';
            echo '<div class="page-title">' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '</div>';
            //echo '<div class="page-content">' . get_the_content() . '</div>';
            showBeforeMore( $excerpt );
            echo '<div class="page-read-more">' . excerpt_readmore() . '</div>';
            echo '</div>';
        }
        echo '</div>';
        /* Restore original Post Data */
        wp_reset_postdata();

        $allpages = ob_get_clean();
        return $allpages;
    }
}
add_shortcode('gmmb_pages', 'gmmb_pages_shortcode');

function excerpt_readmore() {
    global $post;
    return '<a href="'. get_permalink($post->ID) . '" class="readmore">' . 'See how <span>&#10132;</span>' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Footer Settings');
}

function change_empty_alt_to_title( $response ) {
    if ( ! $response['alt'] ) {
        $response['alt'] = sanitize_text_field( $response['title'] );
    }
    return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'change_empty_alt_to_title' );

function showBeforeMore($fullText){
    if(@strpos($fullText, '<!--more-->')) {
        $morePos = strpos($fullText, '<!--more-->');
        echo '<div class="page-content">';
        echo substr($fullText,0, $morePos);
        echo "<span class=\"read-more\"><a href=\"". get_permalink() . "\" class=\"read-more-link\" target='_blank'>...</a></span>";
        echo '</div>';
    } else {
        echo '<div class="page-content">'.$fullText.'</div>';
    }
}

function gmmb_posts_shortcode() {
    ob_start();

    if( have_rows('news') ): ?>
        <div id="news" class="owl-carousel owl-theme">
            <?php while ( have_rows('news') ) : the_row();
                $news_title = get_sub_field('news_title');
                $news_url = get_sub_field('news_url');
                echo '<div class="news-item">';
                echo '<p>'. $news_title .'</p>';
                echo '<a href="'. $news_url .'" target="_blank">Read More <span>&#10132;</span></a>';
                echo '</div>';
            endwhile; ?>
        </div>
    <?php else :
        ?> <h5 style="text-align: center">No News Found</h5> <?php
    endif;

    $allposts = ob_get_clean();
    return $allposts;
}
add_shortcode('gmmb_posts', 'gmmb_posts_shortcode');

function gmmb_videos_shortcode() {
    ob_start();

    if( have_rows('videos') ): ?>
        <div id="big" class="owl-carousel owl-theme">
        <?php while ( have_rows('videos') ) : the_row();
            $videoTitle = get_sub_field('video_title');
            $videoDescription = get_sub_field('video_description');
            $videoUrl = get_sub_field('video_url');
            $ytID = get_sub_field('youtube_id');
            $vmID = get_sub_field('vimeo_id');
            $hosted = get_sub_field('hosted_video_url');

            if ($videoUrl == 'youtube') {
                $videosrc = 'https://www.youtube.com/embed/'.$ytID.'';
            }
            if ($videoUrl == 'vimeo') {
                $videosrc = 'https://player.vimeo.com/video/'.$vmID.'/';
            }
            if ($videoUrl == 'hosted_video_url'){
                $videosrc = $hosted;
            } ?>

            <div class="item">
                <iframe type="text/html"
                        width="445"
                        height="270"
                        src="<?php echo $videosrc; ?>"
                        frameborder="0"
                        allowfullscreen>
                </iframe>
                <div class="video-content">
                    <h3><?php echo $videoTitle; ?></h3>
                    <p><?php echo $videoDescription; ?></p>
                </div>
            </div>
        <?php endwhile; ?>
        </div>

        <div id="thumbs" class="owl-carousel owl-theme">
        <?php while ( have_rows('videos') ) : the_row(); ?>
            <div class="item">
                <h5><?php the_sub_field('video_title');?></h5>
            </div>
        <?php endwhile; ?>
        </div>
    <?php else :
        ?> <h5 style="text-align: center">No Videos Found</h5> <?php
    endif;

    $allposts = ob_get_clean();
    return $allposts;
}
add_shortcode('gmmb_videos', 'gmmb_videos_shortcode');

//Disable Guttenberg
add_filter('use_block_editor_for_post', '__return_false');

function gmmb_resources_shortcode() {
    ob_start();

    if( have_rows('resources') ): ?>
        <div class="resources-container">
            <?php while ( have_rows('resources') ) : the_row();
                echo '<div class="resources-item">';
                $resource_name = get_sub_field('resource_name');
                $resource_file = get_sub_field('resource_file');
                echo '<div class="res__name">'. $resource_name. '</div>';
                echo '<a href="'. $resource_file. '" class="res__dwn" target="_blank"><i class="fas fa-download"></i></a>';

                // the next row is temporarily hide
                //echo '<div class="res__share"><i class="fas fa-share-alt"></i></div>';
                echo '</div>';
            endwhile; ?>
        </div>
    <?php else :
        ?> <h5 style="text-align: left;color: #ffffff">No Resources Found</h5> <?php
    endif;

    $allposts = ob_get_clean();
    return $allposts;
}
add_shortcode('gmmb_resources', 'gmmb_resources_shortcode');
