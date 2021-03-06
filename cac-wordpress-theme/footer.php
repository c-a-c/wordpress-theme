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

<!-- フッターを表示するファイル -->
<html>
    <footer>
        <div class="footer">
            <!-- ナビゲーションとコピーライトの表示 -->
            <div class="footer__contents">
                <div class="footer__contents--link">
                    <?php 
                        apply_filters('footer_tag', 0, 0);
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
                <div class="footer__copyright">
                    Copyright &copy; Computer Applications Club All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
</html>
