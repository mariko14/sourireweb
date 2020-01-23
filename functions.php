<?php
add_action( 'wp_enqueue_scripts', function() {
	if(is_page('contact')) return;
    wp_deregister_script( 'google-recaptcha' );
});
/*	カスタム投稿タイプ
/*---------------------------------------------------------*/
register_post_type(
'news',
  array(
  'label' => '新着情報',
  'hierarchical' => false,
  'public' => true,
  'query_var' => false,
  'menu_position' => 5,
  'has_archive' => true,
  'supports' => array('title','editor','author','thumbnail','description'),
  'thumbnail',
'description' => '',
  )
);
/*
 カスタム投稿で HeadSpace ページモジュールを有効にする
*/
function add_headpspace_custom_box() {
    global $headspace2;
    if (function_exists('add_meta_box') && is_object($headspace2)) {
        add_meta_box('headspacestuff', __('HeadSpace', 'headspace'), array(&$headspace2, 'metabox'), 'news', 'normal', 'high');
    }
}
add_action('wp_print_scripts', 'add_headpspace_custom_box');

//カスタム投稿タイプを登録
function new_post_type() {
  register_post_type(
    'works',//投稿タイプ名（識別子）
    array(
      'label' => '制作実績',
      'labels' => array(
        'add_new_item' => '新規実績を追加',
        'edit_item' => '実績を編集',
        'view_item' => '実績を表示',
        'search_items' => '実績を検索',
      ),
      'public' => true,// 管理画面に表示しサイト上にも表示する
      'hierarchicla' => false,//コンテンツを階層構造にするかどうか(投稿記事と同様に時系列に)
      'has_archive' => true,//trueにすると投稿した記事のアーカイブページを生成
      'supports' => array(//記事編集画面に表示する項目を配列で指定することができる
        'title',//タイトル
        'editor',//本文（の編集機能）
        'thumbnail',//アイキャッチ画像
        'custom-fields',
        'excerpt'//抜粋
      ),
      'menu_position' => 5//「投稿」の下に追加
    )
  );
 
  register_taxonomy(
    'works_cat',
    'works',
    array(
      'label' =>  'worksカテゴリー',
      'labels' => array(
        'popular_items' => 'よく使う実績カテゴリー',
        'edit_item' => '実績カテゴリーを編集',
        'add_new_item' => '新規実績カテゴリーを追加',
        'search_items' =>  '実績カテゴリーを検索',
      ),
      'public' => true,
      'hierarchical' => true,
      'has_archive' => true,//trueにすると投稿した記事のアーカイブページを生成
      'rewrite' => array('slug' => 'works/cat')  //events_cat の代わりに works/cat でアクセス（URL)
    )
  );
 
  register_taxonomy(
    'works_tag',
    'works',
    array(
      'label' => '実績タグ',
      'labels' => array(
        'popular_items' =>  'よく使う実績タグ',
        'edit_item' =>'実績タグを編集',
        'add_new_item' => '新規実績タグを追加',
        'search_items' =>  '実績タグを検索',
      ),
      'public' => true,
      'hierarchical' => false,
      'rewrite' => array('slug' => 'works/tag')
    )
  );
 
  flush_rewrite_rules();
}
add_action('init', 'new_post_type');
 
//カテゴリーとタグの URL のリライトルールを設定
add_rewrite_rule('works/cat/([^/]+)/?$', 'index.php?events_cat=$matches[1]', 'top');
add_rewrite_rule('works/tag/([^/]+)/?$', 'index.php?events_tag=$matches[1]', 'top');


/*	カスタム投稿タイプでhead2
/*---------------------------------------------------------*/
function add_headpspace_snippets_custom_box() {
    global $headspace2;
    if (function_exists('add_meta_box') && is_object($headspace2)) {
        add_meta_box('headspacestuff', __('HeadSpace', 'headspace'), array(&$headspace2, 'metabox'), 'works', 'normal', 'high');
    }
}

add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('works')) {
        $query->set('posts_per_page', 10);
    }
}


add_action('wp_print_scripts', 'add_headpspace_snippets_custom_box');

/*	Register navigation
/*---------------------------------------------------------*/
register_nav_menus( array(
	'primary' => __('Main Navigation', 'cTpl_rwd004_light'),
	));

//アイキャッチ画像
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(200,150,true ); //幅200px 高さ150px 


/*	the_excerpt
/*---------------------------------------------------------*/
add_post_type_support( 'page', 'excerpt' );

function inc11_wp_trim_excerpt($excerpt) {
    global $post;
   // return $excerpt.'<a href="'.get_permalink($post->ID).'" class="more-link"><span>続きを読む</span></a>';
    return $excerpt.'<p class="more-link"><span>続きを読む</span></p>';

}
add_filter('wp_trim_excerpt', 'inc11_wp_trim_excerpt');

/*	Register sidebars
/*---------------------------------------------------------*/
register_sidebar(array(
	'name' => __( 'sidebar-1' ),
	'id' =>'sidebar-1',
  'before_widget' => '<section class="widget %2$s">',
  'after_widget' => '</section>',
  'before_title' => '<h3><span>',
  'after_title' => '</span></h3>',
	));

add_filter( 'wp_list_categories', 'cTpl_rwd004_light_list_categories', 10, 2 );
function cTpl_rwd004_light_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
  return $output;
}
add_filter( 'get_archives_link', 'cTpl_rwd004_light_archives_link' );
function cTpl_rwd004_light_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
  return $output;
}


/*	Custom Excerpt "more" Link
/*---------------------------------------------------------*/
function change_excerpt_more($post) {
  return ' ...';    
}    
add_filter('excerpt_more', 'change_excerpt_more');



/*	Load up the theme options
/*---------------------------------------------------------*/
require( dirname( __FILE__ ) . '/inc/theme-options.php' );


/*	Add admin CSS
/*---------------------------------------------------------*/
function cTpl_rwd004_light_admin_css(){
	$adminCssPath = get_template_directory_uri().'/cTpl_admin.css';
	wp_enqueue_style( 'theme', $adminCssPath , false, '2012');
}
add_action('admin_head', 'cTpl_rwd004_light_admin_css', 11);


/*	Display navigation to next/previous pages when applicable
/*---------------------------------------------------------*/
function cTpl_rwd004_light_content_nav( $nav_id ) {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="pagenav">
			<div class="prev"><?php previous_posts_link('前のページ'); ?></div>
			<div class="next"><?php next_posts_link('次のページ'); ?></div>
		</div>
	<?php endif;
	wp_reset_query();
} 




function get_calendar_custom($catid, $initial = true) {  
    global $wpdb, $m, $monthnum, $year, $wp_locale, $posts; 
    $key = md5( $m . $monthnum . $year ); 
    if ( $cache = wp_cache_get( 'get_calendar_custom', 'calendar_custom' ) ) { 
        if ( isset( $cache[ $key ] ) ) { 
            echo $cache[ $key ]; 
            return; 
        } 
    } 
     
    ob_start(); 
    if ( !$posts ) { 
        $gotsome = $wpdb->get_var("SELECT ID from $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 1"); 
        if ( !$gotsome ) 
        return; 
    } 
     
    if ( isset($_GET['w']) ) 
        $w = ''.intval($_GET['w']); 
     
    $week_begins = intval(get_option('start_of_week')); 
     
    if ( !empty($monthnum) && !empty($year) ) { 
        $thismonth = ''.zeroise(intval($monthnum), 2); 
        $thisyear = ''.intval($year); 
    } elseif ( !empty($w) ) { 
        $thisyear = ''.intval(substr($m, 0, 4)); 
        $d = (($w - 1) * 7) + 6; 
        $thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('${thisyear}0101', INTERVAL $d DAY) ), '%m')"); 
    } elseif ( !empty($m) ) { 
        $thisyear = ''.intval(substr($m, 0, 4)); 
        if ( strlen($m) < 6 ) 
            $thismonth = '01'; 
        else 
            $thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2); 
    } else { 
        $thisyear = gmdate('Y', current_time('timestamp')); 
        $thismonth = gmdate('m', current_time('timestamp')); 
    } 
     
    $unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear); 
     
    $previous = $wpdb->get_row("SELECT DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year FROM $wpdb->posts LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id) LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) WHERE post_date < '$thisyear-$thismonth-01' AND $wpdb->term_taxonomy.term_id IN ($catid) AND $wpdb->term_taxonomy.taxonomy = 'category' AND post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 1"); 
    $next = $wpdb->get_row("SELECT DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year FROM $wpdb->posts LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id) LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) WHERE post_date > '$thisyear-$thismonth-01' AND $wpdb->term_taxonomy.term_id IN ($catid) AND $wpdb->term_taxonomy.taxonomy = 'category' AND MONTH( post_date ) != MONTH( '$thisyear-$thismonth-01' ) AND post_type = 'post' AND post_status = 'publish' ORDER BY post_date ASC LIMIT 1"); 
 
    echo '<div id="calendar_wrap"><table id="wp-calendar" summary="' . __('Calendar') . '"> <caption>' . sprintf(_x('%1$s %2$s', 'calendar caption'), $wp_locale->get_month($thismonth), date('Y', $unixmonth))  . '</caption> <thead> <tr>'; 
    $myweek = array(); 
    for ( $wdcount=0; $wdcount<=6; $wdcount++ ) { 
        $myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);  
    } 
    foreach ( $myweek as $wd ) { 
        $day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd); 
        echo "<th abbr=\"$wd\" scope=\"col\" title=\"$wd\">$day_name</th>"; 
    } 
     
    echo ' </tr> </thead><tfoot> <tr>'; 
     
    if ( $previous ) { 
        echo '<td abbr="' . $wp_locale->get_month($previous->month) . '" colspan="3" id="prev"><a href="' . calendar_custom_link(get_month_link($previous->year, $previous->month), $catid) . '" title="' . sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($previous->month), date('Y', mktime(0, 0 , 0, $previous->month, 1, $previous->year))) . '">&laquo; ' . $wp_locale->get_month_abbrev($wp_locale->get_month($previous->month)) . '</a></td>'; 
    } else { 
        echo '<td colspan="3" id="prev">&nbsp;</td>';  
    } 
    echo '<td>&nbsp;</td>'; 
    if ( $next ) { 
        echo '<td abbr="' . $wp_locale->get_month($next->month) . '" colspan="3" id="next"><a href="' . calendar_custom_link(get_month_link($next->year, $next->month), $catid) . '" title="' . sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($next->month), date('Y', mktime(0, 0 , 0, $next->month, 1, $next->year))) . '">' . $wp_locale->get_month_abbrev($wp_locale->get_month($next->month)) . ' &raquo;</a></td>'; 
    } else { 
        echo '<td colspan="3" id="next">&nbsp;</td>';  
    } 
    echo ' </tr> </tfoot><tbody> <tr>'; 
     
    $dyp_sql = "SELECT DISTINCT DAYOFMONTH(post_date) FROM $wpdb->posts LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id) LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) WHERE MONTH(post_date) = '$thismonth' AND $wpdb->term_taxonomy.term_id IN ($catid) AND $wpdb->term_taxonomy.taxonomy = 'category' AND YEAR(post_date) = '$thisyear' AND post_type = 'post' AND post_status = 'publish' AND post_date < '" . current_time('mysql') . "'"; 
    $dayswithposts = $wpdb->get_results($dyp_sql, ARRAY_N); 
    if ( $dayswithposts ) { 
        foreach ( (array) $dayswithposts as $daywith ) { 
            $daywithpost[] = $daywith[0]; 
        } 
    } else { 
        $daywithpost = array();  
    } 
     
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'camino') !== false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'safari') !== false) 
        $ak_title_separator = "\n"; 
    else 
        $ak_title_separator = ', '; 
     
    $ak_titles_for_day = array(); 
    $ak_post_titles = $wpdb->get_results("SELECT post_title, DAYOFMONTH(post_date) as dom FROM $wpdb->posts " . "LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id) LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) WHERE YEAR(post_date) = '$thisyear' AND $wpdb->term_taxonomy.term_id IN ($catid) AND $wpdb->term_taxonomy.taxonomy = 'category' AND MONTH(post_date) = '$thismonth' AND post_date < '" . current_time('mysql') . "' AND post_type = 'post' AND post_status = 'publish'"); 
    if ( $ak_post_titles ) { 
        foreach ( (array) $ak_post_titles as $ak_post_title ) { 
            $post_title = apply_filters( "the_title", $ak_post_title->post_title ); 
            $post_title = str_replace('"', '&quot;', wptexturize( $post_title )); 
            if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) ) 
                $ak_titles_for_day['day_'.$ak_post_title->dom] = ''; 
            if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one 
                $ak_titles_for_day["$ak_post_title->dom"] = $post_title; 
            else 
                $ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title; 
        } 
    } 
 
    $pad = calendar_week_mod(date('w', $unixmonth)-$week_begins); 
    if ( 0 != $pad ) 
        echo '<td colspan="'.$pad.'">&nbsp;</td>'; 
     
    $daysinmonth = intval(date('t', $unixmonth)); 
     
    for ( $day = 1; $day <= $daysinmonth; ++$day ) { 
        if ( isset($newrow) && $newrow ) 
            echo "</tr><tr>"; 
             
        $newrow = false; 
        if ( $day == gmdate('j', (time() + (get_option('gmt_offset') * 3600))) && $thismonth == gmdate('m', time()+(get_option('gmt_offset') * 3600)) && $thisyear == gmdate('Y', time()+(get_option('gmt_offset') * 3600)) ) 
            echo '<td id="today">'; 
        else 
            echo '<td>'; 
             
        if ( in_array($day, $daywithpost) ) // any posts today? 
            echo '<a href="' . calendar_custom_link(get_day_link($thisyear, $thismonth, $day), $catid) . "\">$day</a>"; 
        else 
            echo $day; 
         
        echo '</td>'; 
        if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) ) 
            $newrow = true;  
    } 
    $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins); 
    if ( $pad != 0 && $pad != 7 ) 
        echo '<td colspan="'.$pad.'">&nbsp;</td>'; 
     
    echo "</tr></tbody></table></div>"; 
    $output = ob_get_contents(); 
    ob_end_clean(); 
    echo $output; 
    $cache[ $key ] = $output; 
    wp_cache_set( 'get_calendar_custom', $cache, 'calendar_custom' ); 
} 
 
function calendar_custom_link($url, $catid){ 
 
 if (isset($catid)){ 
  $url .= strpos($url, '?') === false ? '?' : '&'; 
  $url .= 'cat=' . $catid; 
 } 
 
 return $url; 
} 


/*	pタグ自動挿入関連
/*---------------------------------------------------------*/
add_action('init', function() {
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function($init) {
$init['wpautop'] = false;
$init['apply_source_formatting'] = ture;
return $init;
});




//Google fontsを解除
function deregister_googlefonts() {
     wp_deregister_style('sng-googlefonts');//初期設定を解除
}
add_action('wp_enqueue_scripts', 'deregister_googlefonts', 9999);
//END Google Fontsを解除


//パンくず
if ( ! function_exists( 'custom_breadcrumb' ) ) {
    function custom_breadcrumb( $wp_obj = null ) {

        // トップページでは何も出力しない
        if ( is_home() || is_front_page() ) return false;

        //そのページのWPオブジェクトを取得
        $wp_obj = $wp_obj ?: get_queried_object();

        echo '<div id="breadcrumb" class="pan">'.  //id名などは任意で
                '<ul>'.
                    '<li>'.
                        '<a href="'. home_url() .'"><span>ホーム</span></a>'.
                    '</li>';

        if ( is_attachment() ) {

            /**
             * 添付ファイルページ ( $wp_obj : WP_Post )
             * ※ 添付ファイルページでは is_single() も true になるので先に分岐
             */
            echo '<li><span>'. $wp_obj->post_title .'</span></li>';

        } elseif ( is_single() ) {

            /**
             * 投稿ページ ( $wp_obj : WP_Post )
             */
            $post_id    = $wp_obj->ID;
            $post_type  = $wp_obj->post_type;
            $post_title = $wp_obj->post_title;

            // カスタム投稿タイプかどうか
            if ( $post_type !== 'post' ) {

                $the_tax = "";  //そのサイトに合わせ、投稿タイプごとに分岐させて明示的に指定してもよい

                // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
                $tax_array = get_object_taxonomies( $post_type, 'names');
                foreach ($tax_array as $tax_name) {
                    if ( $tax_name !== 'post_format' ) {
                        $the_tax = $tax_name;
                        break;
                    }
                }

                //カスタム投稿タイプ名の表示
                echo '<li>'.
                        '<a href="'. get_post_type_archive_link( $post_type ) .'">'.
                            '<span>'. get_post_type_object( $post_type )->label .'</span>'.
                        '</a>'.
                     '</li>';

            } else {
                $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示
            }

            // タクソノミーが紐づいていれば表示
            if ( $the_tax !== "" ) {

                $child_terms = array();   // 子を持たないタームだけを集める配列
                $parents_list = array();  // 子を持つタームだけを集める配列

                // 投稿に紐づくタームを全て取得
                $terms = get_the_terms( $post_id, $the_tax );

                if ( !empty( $terms ) ) {

                    //全タームの親IDを取得
                    foreach ( $terms as $term ) {
                        if ( $term->parent !== 0 ) $parents_list[] = $term->parent;
                    }

                    //親リストに含まれないタームのみ取得
                    foreach ( $terms as $term ) {
                        if ( ! in_array( $term->term_id, $parents_list ) ) $child_terms[] = $term;
                    }

                    // 最下層のターム配列から一つだけ取得
                    $term = $child_terms[0];

                    if ( $term->parent !== 0 ) {

                        // 親タームのIDリストを取得
                        $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );

                        foreach ( $parent_array as $parent_id ) {
                            $parent_term = get_term( $parent_id, $the_tax );
                            echo '<li>'.
                                    '<a href="'. get_term_link( $parent_id, $the_tax ) .'">'.
                                      '<span>'. $parent_term->name .'</span>'.
                                    '</a>'.
                                 '</li>';
                        }
                    }

                    // 最下層のタームを表示
                    echo '<li>'.
                            '<a href="'. get_term_link( $term->term_id, $the_tax ). '">'.
                              '<span>'. $term->name .'</span>'.
                            '</a>'.
                         '</li>';
                }
            }

            // 投稿自身の表示
            echo '<li><span>'. $post_title .'</span></li>';

        } elseif ( is_page() ) {

            /**
             * 固定ページ ( $wp_obj : WP_Post )
             */
            $page_id    = $wp_obj->ID;
            $page_title = $wp_obj->post_title;

            // 親ページがあれば順番に表示
            if ( $wp_obj->post_parent !== 0 ) {
                $parent_array = array_reverse( get_post_ancestors( $page_id ) );
                foreach( $parent_array as $parent_id ) {
                    echo '<li>'.
                            '<a href="'. get_permalink( $parent_id ).'">'.
                                '<span>'.get_the_title( $parent_id ).'</span>'.
                            '</a>'.
                         '</li>';
                }
            }
            // 投稿自身の表示
            echo '<li><span>'. $page_title .'</span></li>';

        } elseif ( is_post_type_archive() ) {

            /**
             * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
             */
            echo '<li><span>'. $wp_obj->label .'</span></li>';

        } elseif ( is_date() ) {

            /**
             * 日付アーカイブ ( $wp_obj : null )
             */
            $year  = get_query_var('year');
            $month = get_query_var('monthnum');
            $day   = get_query_var('day');

            if ( $day !== 0 ) {
                //日別アーカイブ
                echo '<li><a href="'. get_year_link( $year ).'"><span>'. $year .'年</span></a></li>'.
                     '<li><a href="'. get_month_link( $year, $month ). '"><span>'. $month .'月</span></a></li>'.
                     '<li><span>'. $day .'日</span></li>';

            } elseif ( $month !== 0 ) {
                //月別アーカイブ
                echo '<li><a href="'. get_year_link( $year ).'"><span>'.$year.'年</span></a></li>'.
                     '<li><span>'.$month . '月</span></li>';

            } else {
                //年別アーカイブ
                echo '<li><span>'.$year.'年</span></li>';

            }

        } elseif ( is_author() ) {

            /**
             * 投稿者アーカイブ ( $wp_obj : WP_User )
             */
            echo '<li><span>'. $wp_obj->display_name .' の執筆記事</span></li>';

        } elseif ( is_archive() ) {

            /**
             * タームアーカイブ ( $wp_obj : WP_Term )
             */
            $term_id   = $wp_obj->term_id;
            $term_name = $wp_obj->name;
            $tax_name  = $wp_obj->taxonomy;

            /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */

            // 親ページがあれば順番に表示
            if ( $wp_obj->parent !== 0 ) {

                $parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
                foreach( $parent_array as $parent_id ) {
                    $parent_term = get_term( $parent_id, $tax_name );
                    echo '<li>'.
                            '<a href="'. get_term_link( $parent_id, $tax_name ) .'">'.
                                '<span>'. $parent_term->name .'</span>'.
                            '</a>'.
                         '</li>';
                }
            }

            // ターム自身の表示
            echo '<li>'.
                    '<span>'. $term_name .'</span>'.
                '</li>';


        } elseif ( is_search() ) {

            /**
             * 検索結果ページ
             */
            echo '<li><span>「'. get_search_query() .'」で検索した結果</span></li>';

        
        } elseif ( is_404() ) {

            /**
             * 404ページ
             */
            echo '<li><span>お探しの記事は見つかりませんでした。</span></li>';

        } else {

            /**
             * その他のページ（無いと思うが一応）
             */
            echo '<li><span>'. get_the_title() .'</span></li>';
        }

        echo '</ul></div>';  // 冒頭に合わせて閉じタグ

    }
}
?>