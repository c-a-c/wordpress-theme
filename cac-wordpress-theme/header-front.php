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

<!-- フロントページ用のヘッダーを表示するファイル -->
<html>
    <header>
        <div class="header">
            <!-- 団体名とロゴの表示 -->
            <span>
                <div class="header__cacDiscription">京都産業大学　文化団体連盟　電子計算機応用部</div>
                <div class="header__cacLogo"></div>
            </span>
            <!-- ナビゲーションの表示 -->
            <nav class="navbar navbar-light bg-white navbar-expand-md" style="padding: 0px;top:40px">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php  
                    apply_filters('header_front_tag', 0, 0);
                    wp_nav_menu(
                        [
                            'menu' => 'メインナビゲーション',
                            'menu_class' => 'collapse navbar-collapse justify-content-center miniheader-navi miniheader_content',
                            'menu_id' => 'menu',
                            'container' => false,
                            'container_class' => '',
                            'container_id' => '',
                            'theme_location' => 'main-nav'
                        ] 
                    ); 
                ?>
            </nav>
        </div>  
    </header>
</html>
