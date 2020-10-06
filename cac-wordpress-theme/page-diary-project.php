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
 Template Name: ダイアリー_プロジェクト
*/
?>

<html>
    <head>
        <title>ダイアリー_プロジェクト | C.A.C. | 京都産業大学 文化団体連盟所属 電子計算機応用部</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- import bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <?php wp_head(); ?><!--システム・プラグイン用-->
        
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
            
            <!-- ダイアリーメニュー -->
            <div class="diaryContents__menuBar--base">
                <div class="diaryContents__menuBar--frame">
                    <div class="diaryContents__menuBar--cell">
                        <?php
                            apply_filters('diary_nav_tag', 0, 0);
                            wp_nav_menu(
                                [
                                    'menu' => 'ダイアリーナビゲーション',
                                    'menu_class' => '',
                                    'menu_id' => 'menu',
                                    'container' => false,
                                    'container_class' => '',
                                    'container_id' => '',
                                    'theme_location' => 'diary-nav',
                                    'items_wrap' => '%3$s'
                                ] 
                            ); 
                        ?>
                    </div>
                    <nav class="navbar navbar-light">
                        <select class="pulldown_size_diary" onChange="location.href=value;">
                            <option value="http://localhost:8080/diary/">トップ</option>
                            <option value="http://localhost:8080/diary/event/">行事</option>
                            <option value="http://localhost:8080/diary/activity/">活動日誌</option>
                            <option value="http://localhost:8080/diary/project/">プロジェクト</option>
                            <option value="http://localhost:8080/diary/members/">部員向け情報</option>
                        </select>
                    </nav>
                </div>
            </div>
            
            <div class="eachDiaryContents--frame">
                <div class="eachDiaryContents--sentence">
                    <h2 class="diary">「プロジェクト」記事一覧</h2>
                    <!-- PHPのループ開始　-->
                    <!-- カテゴリ名「プロジェクト」の投稿一覧を表示 -->
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $the_query = new WP_Query([
                            'category_name' => 'プロジェクト進捗', //カテゴリー名の指定
                            'posts_per_page' => 6,          //1ページに表示する投稿数
                            'paged' => $paged
                        ]);
                        if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                        <div class="diaryContents__cell--frame"> 
                            <a href="<?php the_permalink(); ?>">  
                                <!-- サムネイルの表示 --> 
                                <?php if( has_post_thumbnail() ): ?>
                                    <?php
                                    the_post_thumbnail(
                                        [
                                            500, 380                              //サムネイル画像の大きさを指定
                                        ],
                                        [
                                            'class' => "diaryContents__cell--img" //サムネイルのクラスを指定
                                        ]
                                    );
                                    ?>
                                <?php else: ?>
                                    <img class="diaryContents__cell--img" src="<?php echo get_template_directory_uri(); ?>/img/diary/NoImage.jpg"/>
                                <?php endif; ?>
                                <!-- カテゴリを表示（複数可） -->
                                <div class="diaryContents__cell--categoryFrame">
                                    <?php if (!is_category()): ?>
                                        <?php if( has_category() ): ?>
                                            <a class="diaryContents__cell_categoryCell">
                                                <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <!-- 記事タイトルを表示 -->
                                <h1 class="cellTitle"><?php the_title(); ?></h1>
                                <!-- タグを表示（複数可） -->
                                <a href="" class="diaryContents__cell--tag">
                                    <?php the_tags(''); ?>
                                </a>
                                <!-- 文章の一部を表示 -->
                                <p class="diary"><?php add_new_line_on_except( get_the_excerpt(), 23); ?></p>
                            </a>
                        </div>
                    <?php endwhile; else : ?>
                        <div class="diaryContents__noCongtentsMessage__background">
                            <div class="diaryContents__noCongtentsMessage--frame">
                                現在は掲載中の「プロジェクト」は御座いません。
                            </div>
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

                    <!-- sidebar.phpを読み込む -->
                    <?php get_sidebar(); ?>
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