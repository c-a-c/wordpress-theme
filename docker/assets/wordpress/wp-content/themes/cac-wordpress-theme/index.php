<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/*
theme Name: C.A.C.Web
Author: Keisuke Ikeda, Naoki Okamoto, Hikaru Suzuki
Date: 2020/06/07 (created：2017)
Description: original theme
version： 1.1.0
*/
?>
<html>
    <head>
        <title>C.A.C. | 京都産業大学 文化団体連盟所属 電子計算機応用部</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- links for css-->
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
        
        <!-- links for javascript -->
        <script src="js/main.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
        <script src="js/jqueryColorPlugin.js" type="text/javascript"></script>

        <!-- import fonts -->
        <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

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
        
        <!-- start main contents -->
        <div class="projectBackgroundImage"></div>
        <div class="subPageHeader" style="background-color: rgba(255, 255, 255, 0.8);">
            <div class="subPageTitle" style="color: #545454;">
                　ようこそ！！このページを見つけた人！！
            </div>
            <div class="subPageSentence" style="color: #545454;">
                そんなあなたに、C.A.C.に密かに伝わる哀歌を載せておきます。
            </div>
        </div>
        
        <div class="aboutProfile" style="height: 1400px;">
            <div class="aboutProfile__title">
                <a class="aboutProfile__title--main">C.A.C.哀歌</a> 
            </div>
            <div class="aboutProfile__information">
                <ul>
                    <li>1.</li>
                    <li>花の三月試験受け</li>
                    <li>四月めでたく入学し</li>
                    <li>入ったクラブは産大の</li>
                    <li>その他も高きCAC</li>
                </ul>
                <br>
                <ul>
                    <li>2.</li>
                    <li>コンピュータやりたい一心で</li>
                    <li>勇んで入ったCAC</li>
                    <li>聞くと見るとは大違い</li>
                    <li>恐い幹部が目に浮かぶ</li>
                </ul>
                <br>
                <ul>
                    <li>3.</li>
                    <li>四回生は神様で</li>
                    <li>三回生は天皇で</li>
                    <li>二回生は平民で</li>
                    <li>あわれ一回生はドレイの身</li>
                </ul>
                <br>
                <ul>
                    <li>4.</li>
                    <li>せめてかかれよ女の子</li>
                    <li>コンピュータをばエサにして</li>
                    <li>話しかけては見たものの</li>
                    <li>相手は応用数学科（注）</li>
                </ul>
                <br>
                <ul>
                    <li>5.</li>
                    <li>やっとなれたよ三回生</li>
                    <li>肩で風切る晴れ姿</li>
                    <li>うれし天皇になってみりゃ</li>
                    <li>人には言えない悩みあり</li>
                </ul>
                <br>
                <ul>
                    <li>6.</li>
                    <li>気がつきゃ早くも四回生</li>
                    <li>クラブの中の神様も</li>
                    <li>地上に降りて苦労する</li>
                    <li>就職地獄の苦しさよ（？）</li>
                </ul>
                <br>
                <ul>
                    <li>7.</li>
                    <li>たとえおいらは卒業でも</li>
                    <li>コンピューターは世に残る</li>
                    <li>CACの名も残る</li>
                    <li>京都産大の名と共に</li>
                </ul>
                <br>
                <ul>
                    <li>（注）後に「理学部 計算機科学科」→「理学部 コンピュータ科学科」→「コンピュータ理工学部」→「情報理工学部」となる。<br>（今はもうなくなったそうですが）</li>
                </ul>
            </div>
        </div>
        <!-- end main contents -->

        <!-- footer.phpを読み込む -->
        <?php get_footer(); ?>

        <!--システム・プラグイン用-->
        <?php wp_footer(); ?>
    </body>
</html>
