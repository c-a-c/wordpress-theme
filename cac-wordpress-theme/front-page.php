<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- 
Theme Name  : C.A.C.Web
Author      : Keisuke Ikeda, Naoki Okamoto, Hikaru Suzuki
Date        : 2020/06/08 (created：2017)
Description : original theme
Version     ： 1.0.0 
-->

<?php
/**
 Template Name: ホーム
*/
?>

<html>
    <head>
        <title>C.A.C. | 京都産業大学 文化団体連盟所属 電子計算機応用部</title>
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
        
        <!-- header-front.phpを読み込む -->
        <?php get_header("front"); ?>
        
        <!-- start main contents -->
        <div class="mainTitle">
            <div class="mainTitle__titleEnglish">Beyond your Creation</div>
            <div class="mainTitle__titleJapanese">「作るだけ」で、終わらせない</div>
        </div>

        <div class="mainMenu">
            <div class="mainMenu__aboutLink" onclick="document.location.href = '<?php  ?>'" onmouseout="hoverMainMenu('about', false);" onmouseover="hoverMainMenu('about', true);">
                <div class="mainMenu__imageLeft" id="mainMenu__aboutLink" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/top/mainMenu_about.png');">
                    <div class="mainMenu__squareLeft" style="background-color: #bedf69;"></div>
                </div>
                <div class="mainMenu__discriptionRight" style="background-color: #bedf69;">
                    <div class="mainMenu__discriptionLogo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/top/mainMenu_logo_弊団体について.png');"></div>
                    <div class="mainMenu__discriptionTitle">弊団体について</div>
                    <div class="mainMenu__discriptionSentence">弊団体についての説明をご覧いただけます</div>
                    <div class="mainMenu__discriptionMoreButton" id="mainMenu__aboutLinkMoreButton">more</div>
                </div>
            </div>

            <div class="mainMenu__projectLink" onclick="document.location.href = '<?php  ?>'" onmouseout="hoverMainMenu('project', false);" onmouseover="hoverMainMenu('project', true);">
                <div class="mainMenu__imageRight" id="mainMenu__projectLink" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/top/mainMenu_project.png');"></div>
                <div class="mainMenu__discriptionLeft" style="background-color: #69abdf;">
                    <div class="mainMenu__discriptionLogo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/top/mainMenu_logo_プロジェクト.png');"></div>
                    <div class="mainMenu__discriptionTitle">プロジェクト</div>
                    <div class="mainMenu__discriptionSentence">弊団体の活動について紹介しています</div>
                    <div class="mainMenu__discriptionMoreButton" id="mainMenu__projectLinkMoreButton">more</div>
                    <div class="mainMenu__squareRight" style="background-color: #69abdf;"></div>
                </div>
            </div>

            <div class="mainMenu__diaryLink" onclick="document.location.href = '<?php  ?>'" onmouseout="hoverMainMenu('diary', false);" onmouseover="hoverMainMenu('diary', true);">
                <div class="mainMenu__imageLeft" id="mainMenu__diaryLink" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/top/mainMenu_diary.png');">
                    <div class="mainMenu__squareLeft" style="background-color: #d069df;"></div>
                </div>
                <div class="mainMenu__discriptionRight" style="background-color: #d069df;">
                    <div class="mainMenu__discriptionLogo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/top/mainMenu_logo_ダイアリー.png');"></div>
                    <div class="mainMenu__discriptionTitle">ダイアリー</div>
                    <div class="mainMenu__discriptionSentence">弊団体の普段の様子などを日記形式でご覧いただけます</div>
                    <div class="mainMenu__discriptionMoreButton" id="mainMenu__diaryLinkMoreButton">more</div>
                </div>
            </div>
        </div>

        <div class="mainDiary">
            <div class="mainDiary__separater"></div>
            <div class="mainDiary__diary">
                <div class="mainDiary__title">Diary</div>
                <!-- PHPのループ開始　-->
                <!-- カテゴリ-「ダイアリー」の投稿を最新３件表示 -->
                <?php $index = 0; ?>
                <?php
                    $the_query = new WP_Query([
                        'category_name' => 'ダイアリー', //カテゴリー名の指定
                        'posts_per_page' => '3'        //表示する件数を指定
                    ]);
                    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                ?>
                    <div class="mainDiary__diary--contents">
                        <a href="<?php the_permalink(); ?>">
                            <!-- サムネイルの表示 -->
                            <?php if( has_post_thumbnail() ): ?>   
                                <?php 
                                the_post_thumbnail(
                                    [ 
                                        200, 200                             //サムネイル画像の大きさを指定
                                    ],
                                    [
                                        'class' => "mainDiary__diary--logo"  //サムネイルのクラスを指定
                                    ]
                                ); 
                                ?>         
                            <?php else: ?>
                                <img class="mainDiary__diary--logo" src="<?php echo get_template_directory_uri(); ?>/img/top/NoImage.jpg"/>
                            <?php endif; ?>
                            <!-- 記事タイトルの表示 -->
                            <div class="mainDiary__diary--title">
                                <?php the_title(); ?>
                            </div>
                            <!-- 記事本文の一部を表示 -->
                            <div class="mainDiary__diary--sentence">
                                <?php add_new_line_on_except( get_the_excerpt(), 30); ?>
                            </div>
                            <!-- セパレータの表示 -->
                            <?php if( $index < 2 ): ?>
                                <div class="mainDiary__diary--separator"></div>
                            <?php $index++; endif; ?>
                        </a>
                    </div>
                <?php endwhile; else : ?>
                    <div class="mainDiary__diary--contents" style="text-align:center">
                        現在は掲載中のダイアリーは御座いません。
                    </div>
                <?php endif; wp_reset_postdata(); ?>
                <!-- PHPのループ終了　-->
                <a class="mainDiary__moreButton" href="<?php  ?>">more</a>
            </div>
            <div class="mainDiary__twitter">
                <div class="mainDiary__title">Twitter</div>
                <div class="mainDiary__twitter--contents">
                    <a class="twitter-timeline" data-height="470" href="https://twitter.com/c_a_c_official?ref_src=twsrc%5Etfw">Tweets by c_a_c_official</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <a class="mainDiary__moreButton" href="https://twitter.com/c_a_c_official" target="blank">more</a>
            </div>
        </div>
        <!-- end main contents -->

        <!-- footer.phpを読み込む -->
        <?php get_footer(); ?>

        <!--システム・プラグイン用-->
        <?php wp_footer(); ?>
    </body>
</html>
