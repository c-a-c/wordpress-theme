<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!-- 
Theme Name  : C.A.C.Web
Author      : Keisuke Ikeda, Naoki Okamoto, Hikaru Suzuki
Date        : 2020/06/13 (created：2017)
Description : original theme
Version     ： 1.0.0 
-->
<?php
/**
 Template Name: メディア
*/
?>
<html>
  <head>
    <title>メディア | C.A.C. | 京都産業大学 文化団体連盟所属 電子計算機応用部</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- import bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--システム・プラグイン用-->
    <?php wp_head(); ?>
  </head>
  <body>
    <!-- header-mini.phpを読み込む -->
    <?php get_header("mini"); ?>
    <!-- メディアのトップ画像 -->
    <div class="mediaBackgroundImage"></div>
    <!-- メディアの説明 -->
    <div class="subPageHeader" style="background-color: rgba(255, 255, 255, 0.8);">
      <div class="subPageTitle" style="color: #545454;">メディア </div>
      <div class="subPageSentence" style="color: #545454;">弊団体が出場したコンテストや、取り上げられた媒体についての紹介を行います。 </div>
    </div>
    <!-- start main contents -->
    <div class="announceContents__background">
      <div class="announceContents__cell--frame">
        <!-- PHPのループ開始　-->
        <!-- カテゴリ名「メディア」の投稿一覧を表示 -->
        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $the_query = new WP_Query([
                            'category_name' => 'メディア', //カテゴリー名の指定
                            'posts_per_page' => 6,        //1ページに表示する投稿数
                            'paged' => $paged
                        ]);
                        if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
        <div class="mediaContents__cell--base" >
          <a href="<0dc516c9e3cdb5fee43183b74b105db6 />">
            <!-- サムネイルの表示 -->
            <?php if( has_post_thumbnail() ): ?>
            <?php 
                                    the_post_thumbnail(
                                        [
                                            260, 200                              //サムネイル画像の大きさを指定
                                        ],
                                        [
                                            'class' => "mediaContents__cell--img" //サムネイルのクラスを指定
                                        ]
                                    ); 
                                    ?>
            <?php else: ?>
            <div class="mediaContents__cell--img" style="background-image: url('<7724c27ae9549deb46e02146c7ab0186 />/img/media/NoImage.jpg');"></div>
            <?php endif; ?>
            <div>
              <!--　記事タイトルの表示　-->
              <div class="mediaContents__cell--title">
                <?php the_title(); ?>
              </div>
              <!-- 投稿日の表示　-->
              <div class="mediaContents__cell--discription">
                <time datetime="<098b834d8edf3dfa023d62c9076fadeb />">
                  <?php echo get_the_date(); ?>
                </time>
                <br>
                <!-- 文章の一部を表示 -->
                <?php add_new_line_on_except( get_the_excerpt(), 48); ?>
              </div>
            </div>
          </a>
        </div>
        <?php endwhile; else : ?>
        <div class="mediaContents__noCongtentsMessage__background">
          <div class="mediaContents__noCongtentsMessage--frame">現在は掲載中のメディアは御座いません。 </div>
        </div>
        <?php endif; wp_reset_postdata(); ?>
        <!-- PHPのループ終了　-->
        <!-- ページネーションの表示 -->
        <div class="mediaContents__pageMenu--frame">
          <div class="mediaContents__pageMenu--back">
            <?php
                            if ( function_exists( 'pagination' ) ) :
                                pagination( $the_query->max_num_pages, get_query_var( 'paged' ), 2);
                            endif; 
                        ?>
          </div>
        </div>
      </div>
    </div>
    <!-- end main contents -->
    <!-- footer.phpを読み込む -->
    <?php get_footer(); ?>
    <!--システム・プラグイン用-->
    <?php wp_footer(); ?>
  </body>
</html>