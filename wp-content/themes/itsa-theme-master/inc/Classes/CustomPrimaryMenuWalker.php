<?php
/**
 * Custom Walker
 *
 * @author Nguyen Anh Tuan
 * @version 1.0
 * @package Custom Primary Menu Walker
 */

class CustomPrimaryMenuWalker extends Walker_Nav_Menu {

    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an
     * @return void
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= "<ul>\n";
    }

    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an
     * @return void
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        // Lấy tất cả class của menu item (bao gồm current-menu-item)
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // Thêm thẻ <li> với các class (bao gồm current-menu-item nếu có)
        $output .= '<li' . $class_names . '>';

        // Tạo _key như mẫu (12 ký tự)
        $random_key = substr(md5($item->ID . $item->title), 0, 12);

        // Class mặc định cho thẻ <a>
        $a_classes = ['flex', 'gap-half', 'items-center', 'hover:underline'];

        // Nếu là trang hiện tại → thêm class active
        if (in_array('current-menu-item', $item->classes) || in_array('current_page_item', $item->classes)) {
            $a_classes[] = 'active';
            $a_classes[] = 'lg:underline';
            $a_classes[] = 'lg:text-dark-green';
        }

        // Ghép class cho thẻ <a>
        $class_attr = implode(' ', $a_classes);

        $atts  = ' class="' . esc_attr($class_attr) . '"';
        $atts .= ' _key="' . esc_attr($random_key) . '"';
        $atts .= ' href="' . esc_url($item->url) . '"';

        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= "<a{$atts}>{$title}</a>";
    }

    

    /**
     * End the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an
     * @return void
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= "</ul>\n";
    }

    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}
?>
