<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- 
Theme Name  : C.A.C.Web
Author      : Keisuke Ikeda, Naoki Okamoto, Hikaru Suzuki
Date        : 2020/06/07 (created：2017)
Description : original theme
Version     ： 1.0.0 
-->

<?php
/**
 Template Name: ダイアリー
*/
?>

<html>
    <head>
        <title>ダイアリー | C.A.C. | 京都産業大学 文化団体連盟所属 電子計算機応用部</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- links for css-->
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />

        <!-- import fonts -->
        <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

        <!-- import bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <?php wp_head(); ?><!--システム・プラグイン用-->
        
    </head>
    <body>
        
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
        
        <!-- end header, start main contents -->
        
        <div class="eachDiaryContents--back">
            
            <!-- ダイアリーメニュー -->
            <div class="diaryContents__menuBar--base">
                <div class="diaryContents__menuBar--frame">
                    <a href="http://localhost/wordpress/diary/" class="diaryContents__menuBar--cell">トップ</a>
                    <a href="http://localhost/wordpress/diary/diary-event" class="diaryContents__menuBar--cell">行事</a>
                    <a href="http://localhost/wordpress/diary//diary-activity" class="diaryContents__menuBar--cell">活動日誌</a>
                    <a href="http://localhost/wordpress/diary//diary-project" class="diaryContents__menuBar--cell">プロジェクト</a>
                    <a href="http://localhost/wordpress/diary//diary-members" class="diaryContents__menuBar--cell">部員向け情報</a>
                </div>
            </div>
            
            <div class="eachDiaryContents--frame">
                
                <div class="eachDiaryContents--sentence">
                    <h2 class="diary">最新記事一覧</h2>
                    
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <?php
                            $the_query = new WP_Query( 'category_name=ダイアリー' );
                            while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        ?>
                            <div class="diaryContents__cell--frame"> 
                                <!-- メイン画像を指定 -->     
                                <?php if( has_post_thumbnail() ): ?>
                                    <?php
                                    the_post_thumbnail(
                                        [
                                            500, 380
                                        ],
                                        [
                                            'class' => "diaryContents__cell--img"
                                        ]
                                    );
                                    ?>
                                <?php else: ?>
                                    <img class="diaryContents__cell--img" src="<?php echo get_template_directory_uri(); ?>/img/diary/NoImage.jpg"/>
                                <?php endif; ?>
                                <!-- カテゴリを指定（複数可） -->
                                <div class="diaryContents__cell--categoryFrame">
                                    <?php if (!is_category()): ?>
                                        <?php if( has_category() ): ?>
                                            <a class="diaryContents__cell_categoryCell">
                                                <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- タイトルを指定 -->
                                <a href=""><h1 class="cellTitle"><?php the_title(); ?></h1></a>
                                
                                <!-- タグを指定（複数可） -->
                                <a href="" class="diaryContents__cell--tag">
                                    <?php the_tags(''); ?>
                                </a>
                                
                                <!-- 文章の一部 -->
                                <p class="diary"><?php the_excerpt(); ?></p>
                                
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?> 
                    <?php endwhile; else : ?>
                    <div class="diaryContents__noCongtentsMessage__background">
                        <div class="diaryContents__noCongtentsMessage--frame">
                            現在は掲載中のダイアリーは御座いません。
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="projectContents__pageMenu--frame">
                        <div class="projectContents__pageMenu--back">
                            <a class="projectContents__pageMenu--cellRecNotButton">1/20</a>
                            <a class="projectContents__pageMenu--cellRec" style="background-color: #dddddd">&lt;&lt;Past</a>
                            <a class="projectContents__pageMenu--cellSquare" style="background-color: #dddddd">1</a>
                            <a href="" class="projectContents__pageMenu--cellSquare">2</a>
                            <a href="" class="projectContents__pageMenu--cellSquare">3</a>
                            <a href="" class="projectContents__pageMenu--cellSquare">4</a>
                            <a href="" class="projectContents__pageMenu--cellSquare">5</a>
                            <a href="" class="projectContents__pageMenu--cellSquare">6</a>
                            <a href="" class="projectContents__pageMenu--cellSquare">..</a>
                            <a href="" class="projectContents__pageMenu--cellRec">Next&gt;&gt;</a>
                        </div>
                    </div>
                </div>
                
                <?php get_sidebar(); ?>
            </div>
            
        </div>   
        <!-- end main contents -->

        <!-- footer.phpを読み込む -->
        <?php get_footer(); ?>

        <!--システム・プラグイン用-->
        <?php wp_footer(); ?>
    </body>
</html>
