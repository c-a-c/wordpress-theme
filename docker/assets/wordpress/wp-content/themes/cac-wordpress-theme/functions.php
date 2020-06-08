<!-- 
Theme Name  : C.A.C.Web
Author      : Keisuke Ikeda, Hikaru Suzuki
Date        : 2020/06/08 (created：2017)
Description : original theme
Version     ： 1.0.0 
-->

<?php

//テーマのセットアップ
// titleタグをhead内に生成する
add_theme_support( 'title-tag' );
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );

add_filter( 'show_admin_bar', '__return_false' );

//カスタムメニュー
add_theme_support( 'menus' );
register_nav_menu( 'main-nav',  ' メインナビゲーション ' );
register_nav_menu( 'diary-nav',  ' ダイアリーナビゲーション ' );

/**
 * JSファイルをロードする関数
 */
function loadJavaScriptFile() {
    wp_enqueue_style( 'style-name', get_template_directory_uri() . 'style.css', array(), '1.0.0', 'all' );
    wp_deregister_script('jquery');
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/jquery.easing.1.3.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/jqueryColorPlugin.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/main.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/project.js', array( 'jquery' ), '1.0.0', true );
}

//loadJavaScriptFile関数を実行する
add_action( 'wp_enqueue_scripts', 'loadJavaScriptFile' );


// 人気記事出力用
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
	}
	return $count.' Views';
}

function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
	}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_filter('header_front_tag', 'aaa', 10, 0);
add_filter('header_mini_tag', 'ccc', 10, 0);
add_filter('footer_tag', 'bbb', 10, 0);
add_filter('diary_nav_tag', 'ddd', 10, 0);

function aaa(){
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_1', 10, 5);
    return 0;
}

function bbb(){
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_2', 10, 5);
    return 0;
}

function ccc(){
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_3', 10, 5);
    return 0;
}

function ddd(){
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_4', 10, 5);
    return 0;
}

function add_class_on_link_1($item_output, $item, $depth, $args){
    return preg_replace('/(<a.*?)/', '$1' . " class='header__Link'", $item_output);
}

function add_class_on_link_2($item_output, $item, $depth, $args){
    return preg_replace('/(<a.*?)/', '$1' . " class='footer__contents--link'", $item_output);
}

function add_class_on_link_3($item_output, $item, $depth, $args){
    return preg_replace('/(<a.*?)/', '$1' . " class='miniHeader__Link'", $item_output);
}

function add_class_on_link_4($item_output, $item, $depth, $args){
    return preg_replace('/(<a.*?)/', '$1' . " class='diaryContents__menuBar--cell'", $item_output);
}

/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "« First";
    $text_before  = "‹ Prev";
    $text_next    = "Next ›";
    $text_last    = "Last »";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            
            echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<span class="current pager">', $i ,'</span>';
                } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        if ( $paged + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}