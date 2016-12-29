<?php include __DIR__ . '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$type = isset($_GET['type']) ? $_GET['type'] : '';

if (!empty($type)) {
    switch ($type) {
        case 'cherry':
            $type = "01_cherry.png";
            break;
        case 'oak':
            $type = "02_oak.png";
            break;
        case 'maple':
            $type = "03_maple.png";
            break;
        case 'rose':
            $type = "04_rose.png";
            break;
        case 'walnut':
            $type = "05_walnut.png";
            break;
        default:
            $type = "01_cherry.png";
            break;
    }
} else {
    $type = "01_cherry.png";
}


// if(empty($sid)){
//     header("Location: product_list.php");
//     exit;
// }

$sql = "SELECT * FROM `products` WHERE `sid`= $sid";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <title>UniSay</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/single_product.css" rel="stylesheet" type="text/css">


    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative" rel="stylesheet">
    <!-- font-family: 'Cinzel Decorative', cursive; -->

    <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
    <!-- font-family: 'Amita', cursive; -->

    <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC" rel="stylesheet">
    <!-- font-family: 'IM Fell English SC', serif; -->

    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <!-- font-family: 'Fredericka the Great', cursive; -->


</head>


<!-- ====================================================================================== -->


<body>


<!-- 主頁面內容 -->
<div class="wrap">

    <header>

        <!-- 平板手機會fixed的banner -->
        <div class="banner">

            <!-- 三明治選單 -->
            <div class="sandwich"></div>


            <!-- fixed的按鈕 -->

            <div class="cart_icon"></div>
            <div class="cart_sidebar"></div>

            <div class="member_icon"></div>
            <div class="member_sidebar"></div>

            <div class="totop_icon"></div>


            <!-- 中央logo -->
            <div class="logo"><img src="images/header/header_logo.svg" alt=""></div>


            <!-- 上方選單列 -->
            <nav>
                <ul>
                    <!-- 當前頁面掛上here的class -->
                    <li class="icon_aboutus">
                        <a href="aboutus.html"></a>
                    </li>
                    <li class="icon_product here">
                        <a href="product.html"></a>
                    </li>
                    <li class="icon_custom">
                        <a href="custom.html"></a>
                    </li>
                    <li class="icon_inspire">
                        <a href="inspire.html"></a>
                    </li>
                </ul>
            </nav>


            <!-- 暗幕的背景 -->
            <div class="fixed_shadowbg"></div>

        </div><!-- banner包全部 -->

    </header>


    <!-- ====================================================================================== -->


    <content>

        <!-- 麵包屑 -->
        <div class="breadcrumb_trail">
            <ul>
                <li>
                    <a href="product.html">PRODUCTS</a>
                </li>
                <li>
                    <a href="product.html#wood">經典款</a>
                </li>
                <li>
                    <a href="product.html#animal">動物款</a>
                </li>
                <li>
                    <a href="product.html#motto">格言款</a>
                </li>
            </ul>
        </div>


        <!-- 產品簡介區塊 -->
        <div class="product_content">

            <div class="product_img">

                <div class="product_img_big">
                    <img src="<?= $row['pic_id'] ?><?= $type ?>">
                </div>

                <div class="product_img_small">
                    <ul>
                        <li class="<?= $type === '01_cherry.png' ? 'this_pic' : '' ?>"><img
                                    src="<?= $row['pic_id'] ?>01_cherry.png"></li>
                        <li class="<?= $type === '02_oak.png' ? 'this_pic' : '' ?>"><img
                                    src="<?= $row['pic_id'] ?>02_oak.png"></li>
                        <li class="<?= $type === '03_maple.png' ? 'this_pic' : '' ?>"><img
                                    src="<?= $row['pic_id'] ?>03_maple.png"></li>
                        <li class="<?= $type === '04_rose.png' ? 'this_pic' : '' ?>"><img
                                    src="<?= $row['pic_id'] ?>04_rose.png"></li>
                        <li class="<?= $type === '05_walnut.png' ? 'this_pic' : '' ?>"><img
                                    src="<?= $row['pic_id'] ?>05_walnut.png"></li>
                    </ul>
                </div>

            </div>


            <div class="product_info caption">

                <div class="product_name"><?= $row['productname'] ?></div>

                <div class="product_motto"><?= $row['motto'] === '1' ? '' : $row['motto'] ?></div>

                <div class="product_option">

                    <div class="product_price">NT <?= $row['price'] ?>
                        <!-- 數量 -->
                        <div class="product_qty">數量：
                            <select name="qty" class="qty">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>

                    </div>

                    <!-- 手機型號 -->
                    <select name="phone_type" class="phone_type">
                        <option value="">請選擇手機規格</option>
                        <option value="iPhone6">iPhone6</option>
                        <option value="iPhone6 plus">iPhone6 plus</option>
                        <option value="iPhone6s">iPhone6s</option>
                        <option value="iPhone6s plus">iPhone6s plus</option>
                        <option value="iPhone7">iPhone7</option>
                        <option value="iPhone7 plus">iPhone7 plus</option>
                    </select>


                    <div class="woodicon">

                        <div class="wood01_cherry wood">
                            <img src="images/product/classic-icon/01-cherry-wood.png" alt="">
                        </div>

                        <div class="wood02_oak wood">
                            <img src="images/product/classic-icon/02-oak-wood.png" alt="">
                        </div>

                        <div class="wood03_maple wood">
                            <img src="images/product/classic-icon/03-maple-wood.png" alt="">
                        </div>

                        <div class="wood04_rose wood">
                            <img src="images/product/classic-icon/04-rose-wood.png" alt="">
                        </div>

                        <div class="wood05_walnut wood">
                            <img src="images/product/classic-icon/05-walnut-wood.png" alt="">
                        </div>

                    </div>

                    <div class="add_to">
                        <div class="add_to_cart buy_btn" data-sid="<?= $row['sid'] ?>">加入購物車</div>
                        <div class="add_to_love"></div>
                    </div>


                    <!-- 分享鈕 -->
                    <div class="share_icons">
                        <ul class="share-buttons">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay"
                                   target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x"
                                                                                aria-hidden="true"></i><span
                                            class="sr-only">Share on Facebook</span></a></li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fminimony.bitbucket.org&text=UniSay:%20http%3A%2F%2Fminimony.bitbucket.org"
                                   target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x"
                                                                    aria-hidden="true"></i><span
                                            class="sr-only">Tweet</span></a></li>
                            <li><a href="https://plus.google.com/share?url=http%3A%2F%2Fminimony.bitbucket.org"
                                   target="_blank" title="Share on Google+"><i class="fa fa-google-plus-square fa-2x"
                                                                               aria-hidden="true"></i><span
                                            class="sr-only">Share on Google+</span></a></li>
                            <li>
                                <a href="http://www.tumblr.com/share?v=3&u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay&s="
                                   target="_blank" title="Post to Tumblr"><i class="fa fa-tumblr-square fa-2x"
                                                                             aria-hidden="true"></i><span
                                            class="sr-only">Post to Tumblr</span></a></li>
                            <li>
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fminimony.bitbucket.org&description=%E7%94%B1%E4%BD%A0%E8%AA%AA%20%3A%3A%20%E7%B6%93%E5%85%B8%E6%9C%A8%E8%B3%AA%E6%89%8B%E6%A9%9F%E6%AE%BC%0A%E4%BE%86%E6%89%BE%E5%B0%88%E5%B1%AC%E6%96%BC%E8%87%AA%E5%B7%B1%E7%8D%A8%E4%B8%80%E7%84%A1%E4%BA%8C%E7%9A%84%E6%89%8B%E6%A9%9F%E6%AE%BC%E5%90%A7%3AD"
                                   target="_blank" title="Pin it"><i class="fa fa-pinterest-square fa-2x"
                                                                     aria-hidden="true"></i><span
                                            class="sr-only">Pin it</span></a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>


        <!-- 產品介紹細節 -->
        <div class="product_intro">

            <div class="product_detail">
                ▍想要擁有屬於自己獨一無二圖案的手機殼嗎？歡迎到客製化CUSTOM頁面量身定做喔:D <br/>

                <div class="UniSay_Symbol">
                    <img src="images/single_product/home_03.png" alt="">
                </div>

                【商品簡介】<br/>
                用實木的溫潤包覆手機，透過精密機械的製作與手工細磨，握在手裡體驗木頭與工藝的質感與細緻。以動物形態為靈感，取其特徵並加以幾何化，形成俱有象徵性的圖騰。<br/>
                <br/>

                【商品說明】<br/>
                進口美國櫻桃木<br/>
                高級天鵝絨布內襯，防止手機被刮傷<br/>
                CNC精密加工、雷射加工、手工打磨<br/>
                適用機種：iPhone6/6s、iPhone6 Plus/6s Plus、iPhone7、iPhone7 Plus<br/>
                <br/>

                【木種介紹】<br/>
                進口美國櫻桃木為高級木材，主要分佈於美國東部級加拿大部分地區。櫻桃木的心材顏色由艷紅色至棕紅色，邊材呈奶白色。櫻桃木紋理細膩、拋光性好，塗裝效果好，適合做高級家居用品，強度中等，耐衝擊載荷。<br/>
                <br/>

                【客製服務】 <br/>
                我們採用最新的數位工藝－雷射雕刻提供消費者打造屬於自己的物品與禮品。根據圖示規範並跟我們聯繫欲要客製化的內容，我們會先畫出模擬圖，確認後方可製作。<br/>

                ＊因每件木製商品裁切方向及裁切位置不同，商品若有顏色沉澱、色差或些微粗糙之現象，皆屬正常。<br/>
                ＊我們挑選最好的木材部位，每個實木殼皆擁有獨一無二木紋，無法讓每個實木殼紋路一模一樣，無法要求因木紋問題退換貨。<br/>
                ＊實木殼不像塑膠殼摔不壞，不小心摔到可能導致實木殼破裂等問題，可以說是犧牲實木殼來換取手機的健康。為讓實木殼可以用更久，建議放置手機時不要以丟的方式進行，以避免裂開。<br/>
                ＊實木殼比一般塑膠殼厚，使用時音量鍵和開關鍵時不比薄的塑膠殼方便，但是熟悉後便能上手。<br/>
                ＊本產品經測試不會對滿版玻璃貼及包膜造成破壞，但對於未貼正之滿版玻璃貼及過厚之包膜則無法保證。<br/>
                ＊本產品之孔洞皆依據原廠耳機及充電線進行設計，非原廠耳機及充電線使用者應留意孔洞不符之狀況發生。<br/>
                ＊本產品為客製化產品，恕不接受退換貨。<br/>
                <br/>

                【產地】 台灣<br/>
                <br/>
                <br/>
                <br/>

            </div>
        </div>


    </content>


    <!-- ====================================================================================== -->


    <footer>


    </footer>


    <!-- ====================================================================================== -->


</div><!-- wrap的結尾 -->


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="js/nav_icon.js"></script>
<script src="js/single_product.js"></script>
<script>

    function calTotalQty(data) {
        var count = 0;

        for (var s in data) {
            count += data[s];
        }
        $('.cart_qty').text(count);
    }

    $('.buy_btn').click(function () {

        var sid = $(this).attr('data-sid');
        var qty = $(this).closest('.caption').find('.qty').val();
        var type = $('.woodicon>.wood').index($('.this_woodicon')) + 1;
        var spec = $('.buy_btn').closest('.caption').find('.phone_type').prop('selectedIndex');

        if (spec === 0) {
            alert('請選擇手機規格');
        } else if (type === 0) {
            alert('請選擇材質');
        } else {
            $.get('add_to_cart.php',
                {
                    sid: sid,
                    qty: qty,
                    type: type,
                    spec: spec
                },
                function (data) {
                    console.log(data);

                    calTotalQty(data);
//            $(".cart_sidebar").load("cart_and_member.php .cart_sidebar_content");
                    alert('商品已加入購物車');
                    $('.cart_sidebar').load("side_cart.php");
                }, 'json');
        }


    });


</script>


</body>
</html>
