<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

update_option( 'flatsome_wup_purchase_code', 'B5E0B5F8DD8689E6ACA49DD6E6E1A930' );
update_option( 'flatsome_wup_supported_until', '01.01.2050' );
update_option( 'flatsome_wup_buyer', 'GPL' );

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */

 // Numbered Pagination
if ( !function_exists( 'flatsome_posts_pagination' ) ) {

    function  flatsome_posts_pagination() {

        $prev_arrow = is_rtl() ? get_flatsome_icon('icon-angle-right') : get_flatsome_icon('icon-angle-left');
        $next_arrow = is_rtl() ? get_flatsome_icon('icon-angle-left') : get_flatsome_icon('icon-angle-right');

        global $wp_query;
        $total = $wp_query->max_num_pages;
        $big = 999999999; // need an unlikely integer
        if( $total > 1 )  {

             if( !$current_page = get_query_var('paged') )
                 $current_page = 1;
             if( get_option('permalink_structure') ) {
                 $format = 'page/%#%/';
             } else {
                 $format = '&paged=%#%';
             }
            $pages = paginate_links(array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => $format,
                'current'       => max( 1, get_query_var('paged') ),
                'total'         => $total,
                'mid_size'      => 3,
                'type'          => 'array',
                'prev_text'     => $prev_arrow,
                'next_text'     => $next_arrow,
             ) );

            if( is_array( $pages ) ) {
                $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                echo '<ul class="page-numbers nav-pagination links text-center">';
                foreach ( $pages as $page ) {
                        $page = str_replace("page-numbers","page-number",$page);
                        echo "<li>$page</li>";
                }
               echo '</ul>';
            }
        }
    }

}

// numbered pagination
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

function swiper_js() {
    wp_enqueue_script( 'swiper_js_code', get_template_directory_uri() .'/assets/js/swiper.js', array(), '1.0.0', true );
} 
add_action('wp_enqueue_scripts', 'swiper_js');

add_theme_support( 'post thumbnails' );
add_image_size( 'imagen_destacada_carrusel', 374, 370 );

add_filter( 'redirect_canonical', 'custom_disable_redirect_canonical' );
function custom_disable_redirect_canonical( $redirect_url ) {
    if ( is_paged() && is_singular() ) $redirect_url = false; 
    return $redirect_url; 
}

?>