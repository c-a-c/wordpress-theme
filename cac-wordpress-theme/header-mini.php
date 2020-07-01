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
        </div>
    </header>
</html>
        