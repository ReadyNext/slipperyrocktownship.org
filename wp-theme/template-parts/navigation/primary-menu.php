<?php

class BootstrapMenuWalker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
    
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
    
        // Filters the arguments for a single nav menu item
        $args = apply_filters('nav_menu_item_args', $args, $item, $depth );
    
        // Filters the CSS class(es) applied to a menu item's list item element
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter($classes), $item, $args, $depth ) );
        // $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // this basically overrides the default classes
        $class_names = in_array('current_page_item', $classes) ? 'active' : '';
    
        // Filters the ID applied to a menu item's list item element
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
        // it would be better to enter the class in Appearance -> Menus -> Screen Options -> CSS classes
        // $output .= $indent . '<li' . $id . $class_names .'>';
        $output .= $indent . '<li ' . $id . 'class="nav-item ' . $class_names . '">';
    
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
    
        // Filters the HTML attributes applied to a menu item's anchor element
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth );
    
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
            $value = ('href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID );
    
        // Filters a menu item's title
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth );
    
        $item_output = $args->before;
        $item_output .= '<a class="nav-link js-scroll-trigger"'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
    
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
}

if (has_nav_menu('primary')) {
    wp_nav_menu(array(
        'container'  => '',
        'items_wrap' => '<ul id="%1$s" class="d-flex justify-content-center navbar-nav w-100 %2$s">%3$s</ul>',
        'theme_location' => 'primary',
        'walker' => new BootstrapMenuWalker()
        ));
}