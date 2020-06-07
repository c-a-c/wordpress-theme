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

<!-- フロントページ以外のヘッダーを表示するファイル -->
<html>
    <header>
        <div class="miniHeader">
            <div class="miniHeader__cacLogo" style="cursor: pointer;" onclick="location.href ='<?php echo esc_url( home_url( '/' ) ); ?>'" ></div>
            <div style="text-align: right; margin-right: 30px" >
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="miniHeader__Link">ホーム</a>
                <a href="index.php/about" class="miniHeader__Link">弊団体について</a>
                <a href="index.php/project" class="miniHeader__Link">プロジェクト</a>
                <a href="index.php/announce" class="miniHeader__Link">告知</a>
                <a href="index.php/diary" class="miniHeader__Link">ダイアリー</a>
                <a href="index.php/media" class="miniHeader__Link">メディア</a>
            </div>
        </div>
    </header>
</html>
        