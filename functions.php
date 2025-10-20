<?php
//require_once();
function mon_theme_enqueue_styles() {
    wp_enqueue_style( 'mon-theme-style', get_stylesheet_uri() ); // charge style.css
    wp_enqueue_style( 'paccueil-style', get_template_directory_uri() . '/style/paccueil.css' );
    wp_enqueue_style( 'menu-style', get_template_directory_uri() . '/style/menu.css' );
    wp_enqueue_style( 'genre-style', get_template_directory_uri() . '/style/genre.css' );
    wp_enqueue_style( 'accordion-style', get_template_directory_uri() . '/style/accordion.css' );
    wp_enqueue_style( 'reservation-style', get_template_directory_uri() . '/style/reservation.css' );
}
add_action( 'wp_enqueue_scripts', 'mon_theme_enqueue_styles' );
// enregistrer un emplacement de menu
function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Menu principal' ),
            'bas-menu1'      => __( 'Menu Bas 1' ),  
        )
    );
}
//fonction pour rajouter du javascript pour avoir le vardump dans la console
function var2console($var, $name = '', $now = false) {
    if ($var === null)          $type = 'NULL';
    else if (is_bool($var)) $type = 'BOOL';
    else if (is_string($var)) $type = 'STRING[' . strlen($var) . ']';
    else if (is_int($var)) $type = 'INT';
    else if (is_float($var)) $type = 'FLOAT';
    else if (is_array($var)) $type = 'ARRAY[' . count($var) . ']';
    else if (is_object($var)) $type = 'OBJECT';
    else if (is_resource($var)) $type = 'RESOURCE';
    else                        $type = '???';
    if (strlen($name)) {
        str2console("$type $name = " . var_export($var, true) . ';', $now);
    } else {
        str2console("$type = "      . var_export($var, true) . ';', $now);
    }
}

// CPT "film"
add_action('init', function () {
  register_post_type('film', [
    'label' => 'Films',
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'supports' => ['title','editor','thumbnail','excerpt','author','comments'],
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'films'],
  ]);

  // Taxonomie "genre" (Drame, Comédie, etc.)
  register_taxonomy('genre', ['film'], [
    'label' => 'Genres',
    'public' => true,
    'hierarchical' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'genre'],
  ]);
});

function str2console($str, $now = false) {
    if ($now) {
        echo "<script type='text/javascript'>\n";
        echo "//<![CDATA[\n";
        echo "console.log(", json_encode($str), ");\n";
        echo "//]]>\n";
        echo "</script>";
    } else {
        register_shutdown_function('str2console', $str, true);
    }
}
add_action( 'after_setup_theme', 'register_my_menus' );
add_theme_support('woocommerce');
add_theme_support('post-thumbnails');





// Envoi du formulaire vers Make.com
add_action('admin_post_reservation_externe', 'send_to_make');
add_action('admin_post_nopriv_reservation_externe', 'send_to_make');

function send_to_make() {
  if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'reservation_externe')) {
    wp_die('Requête invalide.');
  }

  $name  = sanitize_text_field($_POST['name'] ?? '');
  $email = sanitize_email($_POST['email'] ?? '');
  $qty   = intval($_POST['qty'] ?? 1);

  // 👉 Remplace ici par TON webhook Make :
  $webhook_url = 'https://hook.eu2.make.com/74q71znbprd9vc2woh3r34pjtp7atbq3';

  $body = [
    'name'  => $name,
    'email' => $email,
    'qty'   => $qty,
    'source'=> get_bloginfo('name'),
    'url'   => home_url($_SERVER['REQUEST_URI']),
  ];

  wp_remote_post($webhook_url, [
    'body' => $body,
    'timeout' => 15,
  ]);

  wp_safe_redirect(add_query_arg('sent', '1', wp_get_referer()));
  exit;
}
?>


