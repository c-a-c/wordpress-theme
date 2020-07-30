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

<!-- フロントページ以外のヘッダーを表示するファイル -->
<html>
    <header>
        <div class="miniHeader">
            <div class="miniHeader__cacLogo" style="cursor: pointer;" onclick="location.href ='<?php echo esc_url( home_url( '/' ) ); ?>'" ></div>
            <div class="miniHeader__Link" style="text-align: right; margin-right: 10px; " >
                <?php  
                    apply_filters('header_mini_tag', 0, 0);
                    wp_nav_menu(
                        [
                            'menu' => 'メインナビゲーション',
                            'menu_class' => '',
                            'menu_id' => 'menu',
                            'container' => false,
                            'container_class' => '',
                            'container_id' => '',
                            'theme_location' => 'main-nav',
                            'items_wrap' => '%3$s'
                        ] 
                    ); 
                ?>
            </div>
            <nav class="navbar navbar-light bg-white pulldown_size">
                <button class="navbar-toggler pulldown_button" type="button"
                    data-toggle="collapse"
                    data-target="#navmenu1"
                    aria-controls="navmenu1"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navmenu1">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link pulldown_content" href="..">ホーム</a>
                        <a class="nav-item nav-link pulldown_content" href="about">弊団体について</a>
                        <a class="nav-item nav-link pulldown_content" href="project">プロジェクト</a>
                        <a class="nav-item nav-link pulldown_content" href="announce">告知</a>
                        <a class="nav-item nav-link pulldown_content" href="diary">ダイアリー</a>
                        <a class="nav-item nav-link pulldown_content" href="media">メディア</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</html>
        