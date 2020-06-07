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
            <nav class="navbar navbar-light bg-white navbar-expand-md" style="padding: 0px">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul id="menu" class="collapse navbar-collapse justify-content-center">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__Link">ホーム</a></li>
                    <li><a href="index.php/about" class="header__Link">弊団体について</a></li>
                    <li><a href="index.php/project" class="header__Link">プロジェクト</a></li>
                    <li><a href="index.php/announce" class="header__Link">告知</a></li>
                    <li><a href="index.php/diary" class="header__Link">ダイアリー</a></li>
                    <li><a href="index.php/media" class="header__Link">メディア</a></li>
                </ul>
            </nav>
        </div>  
    </header>
</html>
