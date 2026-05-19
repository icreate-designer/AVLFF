<?php
/**
 * ALVFF Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load Bootstrap nav walker
require_once get_template_directory() . '/inc/class-bootstrap-walker.php';

// ─── Theme Setup ────────────────────────────────────────────────────────────
function alvff_theme_setup() {
    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable featured images
    add_theme_support( 'post-thumbnails' );

    // HTML5 markup
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'alvff-theme' ),
        'footer'  => __( 'Menu Pied de Page', 'alvff-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'alvff_theme_setup' );


// ─── Enqueue Scripts & Styles ────────────────────────────────────────────────
function alvff_enqueue_assets() {
    $ver = wp_get_theme()->get( 'Version' );

    // Boxicons
    wp_enqueue_style(
        'boxicons',
        'https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css',
        array(),
        '2.1.4'
    );

    // Google Fonts – Inter
    wp_enqueue_style(
        'alvff-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap',
        array(),
        null
    );

    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        array(),
        '5.3.0'
    );

    // Custom CSS
    wp_enqueue_style(
        'alvff-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array( 'bootstrap' ),
        $ver
    );

    // Main theme stylesheet (style.css – required by WP)
    wp_enqueue_style(
        'alvff-style',
        get_stylesheet_uri(),
        array( 'alvff-custom' ),
        $ver
    );

    // Bootstrap JS
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/assets/js/bootstrap.min.js',
        array(),
        '5.3.0',
        true
    );

    // Custom JS
    wp_enqueue_script(
        'alvff-custom',
        get_template_directory_uri() . '/assets/js/custom.js',
        array( 'bootstrap' ),
        $ver,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'alvff_enqueue_assets' );



// ─── Widget Areas ────────────────────────────────────────────────────────────
function alvff_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Barre Latérale', 'alvff-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Ajoutez des widgets ici.', 'alvff-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Pied de Page', 'alvff-theme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Zone widget pied de page.', 'alvff-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="fw-bold text-white">',
        'after_title'   => '</p>',
    ) );
}
add_action( 'widgets_init', 'alvff_widgets_init' );


// ─── Custom Image Sizes ───────────────────────────────────────────────────────
add_image_size( 'alvff-card',     800, 500, true );
add_image_size( 'alvff-carousel', 1920, 800, true );


// ─── Excerpt Length ──────────────────────────────────────────────────────────
function alvff_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'alvff_excerpt_length' );

function alvff_excerpt_more( $more ) {
    return '…';
}
add_filter( 'excerpt_more', 'alvff_excerpt_more' );


require_once get_template_directory() . '/acf-field-groups.php';


/**
 * ─────────────────────────────────────────────────────────────
 * ADD THIS ENTIRE BLOCK TO YOUR THEME'S functions.php
 * ─────────────────────────────────────────────────────────────
 */

/* ── 1. Register the 'projet' Custom Post Type ── */
add_action( 'init', 'alvff_register_projet_cpt' );
function alvff_register_projet_cpt() {
    register_post_type( 'projet', array(
        'labels' => array(
            'name'               => __( 'Projets',           'alvff-theme' ),
            'singular_name'      => __( 'Projet',            'alvff-theme' ),
            'add_new'            => __( 'Ajouter',           'alvff-theme' ),
            'add_new_item'       => __( 'Ajouter un Projet', 'alvff-theme' ),
            'edit_item'          => __( 'Modifier le Projet','alvff-theme' ),
            'new_item'           => __( 'Nouveau Projet',    'alvff-theme' ),
            'view_item'          => __( 'Voir le Projet',    'alvff-theme' ),
            'search_items'       => __( 'Rechercher',        'alvff-theme' ),
            'not_found'          => __( 'Aucun projet',      'alvff-theme' ),
            'not_found_in_trash' => __( 'Aucun projet dans la corbeille', 'alvff-theme' ),
            'menu_name'          => __( 'Projets',           'alvff-theme' ),
        ),
        'public'            => true,
        'has_archive'       => true,          // enables /projets/ archive URL
        'rewrite'           => array( 'slug' => 'projets' ),
        'show_in_rest'      => true,          // enables Gutenberg editor
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'         => 'dashicons-clipboard',
        'menu_position'     => 5,
    ) );
}


/* ── 2. ACF field group for 'projet' single posts ── */
add_action( 'acf/init', 'alvff_register_projet_acf_fields' );
function alvff_register_projet_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( array(
        'key'    => 'group_projet_meta',
        'title'  => '📋 Détails du Projet',
        'fields' => array(
            array(
                'key'          => 'field_project_location',
                'label'        => 'Localisation',
                'name'         => 'project_location',
                'type'         => 'text',
                'instructions' => 'Ex : Maroua, Mokolo, Yagoua',
            ),
            array(
                'key'          => 'field_project_beneficiaries',
                'label'        => 'Bénéficiaires',
                'name'         => 'project_beneficiaries',
                'type'         => 'text',
                'instructions' => 'Ex : 5 000 bénéficiaires',
            ),
            array(
                'key'          => 'field_project_progress',
                'label'        => 'Progression (%)',
                'name'         => 'project_progress',
                'type'         => 'number',
                'min'          => 0,
                'max'          => 100,
                'instructions' => 'Entre 0 et 100',
            ),
            array(
                'key'          => 'field_project_duration',
                'label'        => 'Durée',
                'name'         => 'project_duration',
                'type'         => 'text',
                'instructions' => 'Ex : Janvier 2024 – Décembre 2025',
            ),
            array(
                'key'          => 'field_project_partner',
                'label'        => 'Partenaire principal',
                'name'         => 'project_partner',
                'type'         => 'text',
                'instructions' => 'Ex : ONU Femmes, Union Européenne',
            ),
            array(
                'key'          => 'field_project_budget',
                'label'        => 'Budget',
                'name'         => 'project_budget',
                'type'         => 'text',
                'instructions' => 'Ex : 150 000 €',
            ),
            array(
                'key'     => 'field_project_status',
                'label'   => 'Statut',
                'name'    => 'project_status',
                'type'    => 'select',
                'choices' => array(
                    'En cours'   => 'En cours',
                    'Terminé'    => 'Terminé',
                    'Planifié'   => 'Planifié',
                    'En pause'   => 'En pause',
                ),
                'default_value' => 'En cours',
                'return_format' => 'value',
            ),
        ),
        /* Show these fields on 'projet' post type only */
        'location' => array( array( array(
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'projet',
        ) ) ),
        'menu_order' => 0,
    ) );
}