<?php
if ( ! class_exists( 'ALVFF_Bootstrap_Walker' ) ) :

class ALVFF_Bootstrap_Walker extends Walker_Nav_Menu {

    // Add Bootstrap classes to the <li> elements
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );

        $li_classes = array( 'nav-item' );
        if ( $has_children ) {
            $li_classes[] = 'dropdown';
        }

        $output .= '<li class="' . implode( ' ', $li_classes ) . '">';

        // Build the link
        $atts = array();
        $atts['href']   = ! empty( $item->url ) ? $item->url : '#';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';

        if ( $has_children ) {
            // Top-level dropdown toggle — clicking opens the menu, not the link
            $atts['class']         = $depth === 0 ? 'nav-link dropdown-toggle' : 'dropdown-item dropdown-toggle';
            $atts['data-bs-toggle']  = 'dropdown';
            $atts['aria-expanded']   = 'false';
            $atts['role']            = 'button';
            // Keep the href so it's still accessible but prevent navigation on click
            $atts['href']            = '#';
        } else {
            $atts['class'] = $depth === 0 ? 'nav-link' : 'dropdown-item';
        }

        // Active state
        if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes ) ) {
            $atts['class'] .= ' active';
            $atts['aria-current'] = 'page';
        }

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        $title  = apply_filters( 'the_title', $item->title, $item->ID );
        $output .= '<a' . $attributes . '>' . $title . '</a>';
    }

    // Open the dropdown <ul>
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="dropdown-menu">';
    }

    // Close the dropdown <ul>
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    // Close the <li>
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

endif;

// Fallback when no menu is assigned
function alvff_fallback_menu() {
    echo '<ul class="navbar-nav mx-auto mb-2 mb-lg-0">';
    echo '<li class="nav-item me-5"><a class="nav-link me-5" href="' . esc_url( home_url( '/' ) ) . '">Accueil</a></li>';
    echo '</ul>';
}