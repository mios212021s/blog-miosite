<?php 

/**
 * サイドバーカスタマイズできる 
 * */ 
function my_theme_widgets_init() {
  register_sidebar( array(
    'name' => 'Main-Sidebar',
    'id' => 'main-sidebar',
  ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );

/**
 * アイキャッチ画像に対応する
 */
function my_after_setup_theme(){
  // アイキャッチ画像を有効にする
  add_theme_support( 'post-thumbnails' ); 
  // アイキャッチ画像サイズを指定する（横：640px 縦：384）
  // 画像サイズをオーバーした場合は切り抜き
  set_post_thumbnail_size( 640, 384, true ); 
 }
 add_action( 'after_setup_theme', 'my_after_setup_theme' );

/**
 * カスタムメニュー実装
 */
if ( ! function_exists( 'lab_setup' ) ) :

function lab_setup() {

  register_nav_menus( array(
    'global' => 'グローバルナビ',
    'header' => 'ヘッダーナビ',
    'footer' => 'フッターナビ',
  ) );
}
endif;
add_action( 'after_setup_theme', 'lab_setup' );

// 人気記事出力用関数
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
// 記事viewカウント用関数
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
