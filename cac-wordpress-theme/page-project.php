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
 Template Name: プロジェクト
*/
?>
<html>
  <head>
    <title>プロジェクト | C.A.C. | 京都産業大学 文化団体連盟所属 電子計算機応用部</title>
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
    <!-- プロジェクトのトップ画像 -->
    <div class="projectBackgroundImage"></div>
    <!-- プロジェクトの説明 -->
    <div class="subPageHeader" style="background-color: rgba(255, 255, 255, 0.8);">
      <div class="subPageTitle" style="color: #545454;">プロジェクト </div>
      <div class="subPageSentence" style="color: #545454;">弊団体の中心の活動である、プロジェクトについて紹介します。 </div>
    </div>
    <!-- start main contents -->
    <div class="projectContents__background">
      <div class="projectContents__background--frame">
        <!-- PHPのループ開始　-->
        <!-- カテゴリ名「プロジェクト」の投稿一覧を表示 -->
        <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $the_query = new WP_Query([
                        'category_name' => 'プロジェクト', //カテゴリー名の指定
                        'posts_per_page' => 12,          //1ページに表示する投稿数
                        'paged' => $paged
                    ]);
                    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                ?>
        <a href="<f4a2ff569febd51f5a2dd51db29ec9b6 />" class="projectContents__cell--base" onmouseover="hoverProjectContents(true, this);" onmouseout="hoverProjectContents(false, this);" style="text-decoration: none;">
          <!-- サムネイルの表示 -->
          <?php if( has_post_thumbnail() ): ?>
          <div class="projectContents__cell--imgBlur" style="background-image: url(<2b4aecc2f169b57e2bab915b76ad0aee />);">
            <div class="projectContents__cell--readMoreButton">ReadMore</div>
            <div class="projectContents__cell--img" style="background-image: url(<f9ef6e5ffa43c0604e075511375399e6 />);"></div>
          </div>
          <?php else: ?>
          <div class="projectContents__cell--imgBlur" style="background-image: url('<cf129a1a796fee5889962aa1c4b4ef9a />/img/project/NoImage.jpg');">
            <div class="projectContents__cell--readMoreButton">ReadMore</div>
            <div class="projectContents__cell--img" style="background-image: url('<76728e0dd7dc8fdef2d82f524e8670dc />/img/project/NoImage.jpg');"></div>
          </div>
          <?php endif; ?>
          <!--　記事タイトルの表示　-->
          <div class="projectContents__cell--title">
            <?php the_title(); ?>
          </div>
          <!--　投稿日とタグを表示　-->
          <div class="projectContents__cell--discription">
            <!-- 投稿日の表示 -->
            <time datetime="<18264cea2570e43d82588d587c003971 />">
              <?php echo get_the_date( 'Y-m-d' ); ?>
            </time>
            <nobr>/</nobr>
            <!-- タグの表示 -->
            <?php if(has_tag()==true) : ?>
            <?php
                                foreach((get_the_tags()) as $tag) {
                                echo $tag->name . ' ';
                                }
                                ?>
            <?php else : ?>
            <nobr>--</nobr>
            <?php endif; ?>
          </div>
        </a>
        <?php endwhile; else : ?>
        <div class="projectContents__noCongtentsMessage__background">
          <div class="projectContents__noCongtentsMessage--frame">現在は掲載中のプロジェクトは御座いません。 </div>
        </div>
        <?php endif; wp_reset_postdata(); ?>
        <!-- PHPのループ終了　-->
        <!-- ページネーションの表示 -->
        <div class="projectContents__pageMenu--frame">
          <div class="projectContents__pageMenu--back">
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