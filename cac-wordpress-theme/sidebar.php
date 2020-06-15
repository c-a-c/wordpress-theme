<div class="eachDiaryContents--subMenu">

    <h2 class="diary">最近の投稿</h2>

    <?php
        $the_query = new WP_Query([
            'category_name' => 'ダイアリー', //カテゴリー名の指定
            'posts_per_page' => 5,         //1ページに表示する投稿数
        ]);
        if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
    ?>
        <div class="subMenu__cell--frame">
            <a href="<?php the_permalink(); ?>" class="subMenu__cell--contentsFrame">
                <!-- メイン画像を指定 -->     
                <?php if( has_post_thumbnail() ): ?>
                    <?php
                    the_post_thumbnail(
                        [
                            110, 80                         //サムネイル画像の大きさを指定
                        ],
                        [
                            'class' => "subMenu__cell--img" //サムネイルのクラスを指定
                        ]
                    );
                    ?>
                <?php else: ?>
                    <img class="subMenu__cell--img" src="<?php echo get_template_directory_uri(); ?>/img/diary/NoImage_mini.jpg"/>
                <?php endif; ?>
                <div class="subMenu__cell--titleFrame">
                    <h3 class="subMenu__cell--title"><?php the_title(); ?></h3>
                </div>
            </a>
            <div class="subMenu__cell--categoryCell">
                <?php if (!is_category()): ?>
                    <?php if( has_category() ): ?>
                        <a class="diaryContents__cell_categoryCell">
                            <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; else : ?>
        <div class="diaryContents__noCongtentsMessage__background">
            <div class="diaryContents__noCongtentsMessage--frame">
                現在は掲載中のダイアリーは御座いません。
            </div>
        </div>
    <?php endif; wp_reset_postdata(); ?>
    
    <h2 class="diary">アクセスランキング（仮）</h2>
    
    <?php
        // views post metaで記事のPV情報を取得する
        setPostViews(get_the_ID());

        $the_query = new WP_Query([
            'category_name' => 'ダイアリー',  //カテゴリー名の指定
            'posts_per_page' => 5,          //1ページに表示する投稿数
            'meta_key' => post_views_count, //
            'orderby' => meta_value_num,    //
            'order' => DESC                 //降順
        ]);
        if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
    ?>
        <div class="subMenu__cell--frame">
            <a href="" class="subMenu__cell--contentsFrame">
                <!-- メイン画像を指定 -->     
                <?php if( has_post_thumbnail() ): ?>
                    <?php
                    the_post_thumbnail(
                        [
                            110, 80                         //サムネイル画像の大きさを指定
                        ],
                        [
                            'class' => "subMenu__cell--img" //サムネイルのクラスを指定
                        ]
                    );
                    ?>
                <?php else: ?>
                    <img class="subMenu__cell--img" src="<?php echo get_template_directory_uri(); ?>/img/diary/NoImage_mini.jpg"/>
                <?php endif; ?>
                <div class="subMenu__cell--titleFrame">
                    <h3 class="subMenu__cell--title"><?php the_title(); ?></h3>
                </div>
            </a>
            <div class="subMenu__cell--categoryCell">
                <?php if (!is_category()): ?>
                    <?php if( has_category() ): ?>
                        <a class="diaryContents__cell_categoryCell">
                            <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; else : ?>
        <div class="diaryContents__noCongtentsMessage__background">
            <div class="diaryContents__noCongtentsMessage--frame">
                現在は掲載中のダイアリーは御座いません。
            </div>
        </div>
    <?php endif; wp_reset_postdata(); ?>
    
    <h2 class="diary">タグ一覧（仮）</h2>

    <div class="subMenu__cell--frame">
        
    </div>
    
    
</div>