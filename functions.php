<?php
	
define( 'NAKED_VERSION', 1.0 );


if ( ! isset( $content_width ) ) $content_width = 900;

add_theme_support( 'automatic-feed-links' );


register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ), 
	)
);

function naked_register_sidebars() {
	register_sidebar(array(				
		'id' => 'sidebar', 					
		'name' => 'Sidebar',				
		'description' => 'Take it on the side...', 
		'before_widget' => '<div>',
		'after_widget' => '</div>',	
		'before_title' => '<h3 class="side-title">',	
		'after_title' => '</h3>',		
		'empty_title'=> '',					
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 


	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	

	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	

	wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' );

require_once('wp_bootstrap_navwalker.php');
register_nav_menus( array(
    'primary' => __( 'Menu Principal', 'quatrorodas' ),
) );
	add_action('init', 'type_post_destaques');
 
	function type_post_destaques() { 
		$labels = array(
			'name' => _x('Destaques', 'post type general name'),
			'singular_name' => _x('Destaque', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Itens'),
			'not_found' =>  __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Destaque Principal'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,			
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'taxonomies' => array('post_tag'),
			'supports' => array('title','editor','thumbnail')
          );
 
register_post_type( 'destaques' , $args );
flush_rewrite_rules();
}
register_taxonomy(
"categorias", 
      "destaques", 
      array(            
      	"label" => "Categorias", 
            "singular_label" => "Categoria", 
            "rewrite" => true,
            "hierarchical" => true
)
);
add_action('init', 'type_post_destaques_secondary');
 
	function type_post_destaques_secondary() { 
		$labels = array(
			'name' => _x('Destaques Secundários', 'post type general name'),
			'singular_name' => _x('Destaque Secundário', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Itens'),
			'not_found' =>  __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Destaques Secundários'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,			
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'taxonomies' => array('post_tag'),
			'supports' => array('title','editor','thumbnail')
          );
 
register_post_type( 'Destaques Secundários' , $args );
flush_rewrite_rules();
}
register_taxonomy(
"categorias", 
      "destaques secundários", 
      array(            
      	"label" => "Categorias", 
            "singular_label" => "Categoria", 
            "rewrite" => true,
            "hierarchical" => true
)


);
add_theme_support( 'post-thumbnails' ); 

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Notícias';
    $submenu['edit.php'][5][0] = 'Notícias';
    $submenu['edit.php'][10][0] = 'Add Notícias';
    echo '';
}
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Notícias';
        $labels->singular_name = 'Notícia';
        $labels->add_new = 'Add Notícia';
        $labels->add_new_item = 'Add Notícia';
        $labels->edit_item = 'Edit Notícia';
        $labels->new_item = 'Notícia';
        $labels->view_item = 'View Notícia';
        $labels->search_items = 'Search Notícias';
        $labels->not_found = 'No Notícias found';
        $labels->not_found_in_trash = 'No Notícias found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-login2.png);
            padding-bottom: 30px;
                background-size: 283px;
                    width: 303px;
                        height: 52px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );