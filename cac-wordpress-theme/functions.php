<!-- 
Theme Name  : C.A.C.Web
Author      : Keisuke Ikeda, Hikaru Suzuki
Date        : 2020/06/13 (created：2017)
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

//カスタムメニューの設定
add_theme_support( 'menus' );
register_nav_menu( 'main-nav',  ' メインナビゲーション ' );
register_nav_menu( 'diary-nav',  ' ダイアリーナビゲーション ' );

//wp_enqueue_scripts（JSファイルを求めらた時に呼び出されるアクションフックタグ=イベント）にload_javascript_file関数を紐づける。
add_action( 'wp_enqueue_scripts', 'load_javascript_file' );

// header_front_tag（header-frontのナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にrun_add_class_on_link_front_header関数を紐づける。
add_filter('header_front_tag', 'run_add_class_on_link_front_header', 10, 0);

// header_mini_tag（header-miniのナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にrun_add_class_on_link_mini_header関数を紐づける。
add_filter('header_mini_tag', 'run_add_class_on_link_mini_header', 10, 0);

// footer_tag（footerのナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にrun_add_class_on_link_footer関数を紐づける。
add_filter('footer_tag', 'run_add_class_on_link_footer', 10, 0);

// diary_nav_tag（diaryのナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にrun_add_class_on_link_diary関数を紐づける。
add_filter('diary_nav_tag', 'run_add_class_on_link_diary', 10, 0);

/**
 * JSファイルをロードする関数
 */
function load_javascript_file() 
{
    wp_enqueue_style( 'style-name', get_template_directory_uri() . 'style.css', array(), '1.0.0', 'all' );
    wp_deregister_script('jquery');
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/jquery.easing.1.3.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/jqueryColorPlugin.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/main.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . 'js/project.js', array( 'jquery' ), '1.0.0', true );
}

/**
* add_class_on_link_front_header関数を起動する関数
*/
function run_add_class_on_link_front_header()
{
    // walker_nav_menu_start_el（ナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にadd_class_on_link_front_header関数を紐づける。
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_front_header', 10, 5);
    return 0;
}

/**
 * add_class_on_link_mini_header関数を起動する関数
 */
function run_add_class_on_link_mini_header()
{
    // walker_nav_menu_start_el（ナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にadd_class_on_link_mini_header関数を紐づける。
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_mini_header', 10, 5);
    return 0;
}

/**
 * add_class_on_link_footer関数を起動する関数
 */
function run_add_class_on_link_footer()
{
    // walker_nav_menu_start_el（ナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にadd_class_on_link_footer関数を紐づける。
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_footer', 10, 5);
    return 0;
}

/**
 * add_class_on_link_diary関数を起動する関数
 */
function run_add_class_on_link_diary()
{
    // walker_nav_menu_start_el（ナビゲーション起動時に呼び出されるフィルターフックタグ=イベント）にadd_class_on_link_diary関数を紐づける。
    add_filter('walker_nav_menu_start_el', 'add_class_on_link_diary', 10, 5);
    return 0;
}

/**
* header-frontのナビゲーションの<a>タグにクラスを付加する関数
* $item_output : 出力する文字列
*/
function add_class_on_link_front_header($item_output)
{
    return preg_replace('/(<a.*?)/', '$1' . " class='header__Link'", $item_output);
}

/**
* header-miniのナビゲーションの<a>タグにクラスを付加する関数
* $item_output : 出力する文字列
*/
function add_class_on_link_mini_header($item_output)
{
    return preg_replace('/(<a.*?)/', '$1' . " class='miniHeader__Link'", $item_output);
}

/**
* footerのナビゲーションの<a>タグにクラスを付加する関数
* $item_output : 出力する文字列
*/
function add_class_on_link_footer($item_output)
{
    return preg_replace('/(<a.*?)/', '$1' . " class='footer__contents--link'", $item_output);
}

/**
* diaryのナビゲーションの<a>タグにクラスを付加する関数
* $item_output : 出力する文字列
*/
function add_class_on_link_diary($item_output)
{
    return preg_replace('/(<a.*?)/', '$1' . " class='diaryContents__menuBar--cell'", $item_output);
}

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

/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
*/
function pagination( $pages, $paged, $range = 2) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "« First";
    $text_before  = "‹ Prev";
    $text_next    = "Next ›";
    $text_last    = "Last »";

    //全ページ数の表示
    echo '<a class="projectContents__pageMenu--cellRecNotButton">', $paged ,' / ', $pages ,'</a>';

    //「First」の表示
    if ( $paged == 1 ) {
        echo '<a class="projectContents__pageMenu--cellRec" style="background-color: #dddddd">', $text_first ,'</a>';
    } else {
        echo '<a href="', get_pagenum_link(1) ,'" class="projectContents__pageMenu--cellRec">', $text_first ,'</a>';
    }

    //「Prev」の表示
    if ( $paged == 1 ) {
        echo '<a class="projectContents__pageMenu--cellRec" style="background-color: #dddddd">', $text_before ,'</a>';
    } else {
        echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="projectContents__pageMenu--cellRec">', $text_before ,'</a>';
    }

    //ページの表示
    for ( $i = 1; $i <= $pages; $i++ ) {
        if ( $i <= $paged + $range && $i >= $paged - $range ) {
            // $paged +- $range 以内であればページ番号を出力
            if ( $paged === $i ) {
                echo '<a class="projectContents__pageMenu--cellSquare" style="background-color: #dddddd">', $i ,'</a>';
            } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="projectContents__pageMenu--cellSquare">', $i ,'</a>';
            }
        }
    }

    //「Next」の表示
    if ( $paged == $pages ) {
        echo '<a class="projectContents__pageMenu--cellRec" style="background-color: #dddddd">', $text_next ,'</a>';
    } else {
        echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="projectContents__pageMenu--cellRec">', $text_next ,'</a>';
    }

    //「Last」の表示
    if ( $paged == $pages ) {
        echo '<a " class="projectContents__pageMenu--cellRec" style="background-color: #dddddd">', $text_last ,'</a>';
    } else {
        echo '<a href="', get_pagenum_link( $pages ) ,'" class="projectContents__pageMenu--cellRec">', $text_last ,'</a>';
    }

    echo '</div>';
}
