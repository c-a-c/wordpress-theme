<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- 
Theme Name  : C.A.C.Web
Author      : Keisuke Ikeda
Date        : 2020/06/14 (created：2017)
Description : original theme
Version     ： 1.0.0 
-->

<html>
    <head>
        <title> <?php the_title(); ?> | C.A.C. | 京都産業大学 文化団体連盟所属 電子計算機応用部</title>
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
        <!-- ダイアリーのトップ画像 -->
        <div class="diaryBackgroundImage"></div>

        <!-- ダイアリーの説明 -->
        <div class="subPageHeader" style="background-color: rgba(255, 255, 255, 0.8);">
            <div class="subPageTitle" style="color: #545454;">
                ダイアリー
            </div>
            <div class="subPageSentence" style="color: #545454;">
                弊団体の部員の普段の活動をブログ形式で紹介します。
            </div>
        </div>

        <!-- start main contents -->
        <div class="eachDiaryContents--back">
            <div class="eachDiaryContents--frame-single">
                <div class="eachDiaryContents--sentence">
                <div class="diary_Article--info">
                    <div class="diaryAritcle__cell--categoryFrame">
                        <a class="diaryContents__cell_categoryCell_main">活動日誌</a>
                        <h2 class="diary_Article--postdate">
                            <time datetime="<?php echo get_the_date( 'Y/m/d' ); ?>">
                                <?php echo get_the_date( 'Y/m/d' ); ?>
                            </time>
                        </h2>
                    </div>
                </div>
                    <!-- PHPのループ開始　-->

                    <?php if(have_posts()): the_post(); ?>
                        <article <?php post_class( 'article-content' ); ?>>
                        <div class="article-info">

                            <!--タイトル-->
                            <h1><?php the_title(); ?></h1>
                            
                            <!--投稿日を取得-->
                            <time datetime="<?php echo get_the_date( 'Y/m/d' ); ?>">
                                <?php echo get_the_date( 'Y/m/d' ); ?>
                            </time>
                            </span>

                            <!--著者を取得-->
                            
                            <?php the_author(); ?>
                            

                            <!--カテゴリ取得-->
                            <?php if(has_category() ): ?>
                                <?php echo get_the_category_list( ' ' ); ?>
                            <?php endif; ?>

                        </div>
                        
                        <!--アイキャッチ取得-->

                        <!-- サムネイルの表示 --> 
                        <?php if( has_post_thumbnail() ): ?>
                            <?php
                            the_post_thumbnail(
                                [
                                    1000, 1000                              //サムネイル画像の大きさを指定
                                ],
                                [
                                    'class' => "diaryContents__cell--img" //サムネイルのクラスを指定
                                ]
                            );
                            ?>
                        <?php else: ?>
                            <img class="diaryContents__cell--img" src="<?php echo get_template_directory_uri(); ?>/img/diary/SampleImage.jpg"/>
                        <?php endif; ?>

                        <!--本文取得-->
                        <?php the_content(); ?>
                        <!--タグ-->
                        <div class="article-tag">
                            <?php the_tags('<ul><li>タグ： </li><li>','</li><li>','</li></ul>'
                        ); ?>
                        </div>
                        </article>
                    <?php endif; ?>

                    <!-- PHPのループ終了　-->

                    <div class="projectContents__pageMenu--frame">
                        <div class="projectContents__pageMenu--back">
                            <?php
                                if ( function_exists( 'pagination' ) ) :
                                    pagination( $the_query->max_num_pages, get_query_var( 'paged' ), 2);
                                endif; 
                            ?> 
                        </div>
                    </div>

                    <!-- sidebar.phpを読み込む -->
                    <?php get_sidebar('single'); ?>
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