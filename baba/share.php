<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>粑粑去哪儿</title>
    <meta content="telephone=no" name="format-detection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link type="text/css" href="./styles/style.css" rel="stylesheet">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="browsermode" content="application"/>
</head>
<body>

<div class="main">
    <section class="section" style="overflow:hidden;">
        <div class="index-bg share-bg">
            <div class="index-bg-1"></div>
            <div class="index-bg-2"></div>
            <div class="index-bg-3"></div>
            <div class="index-bg-4"></div>
            <div class="index-bg-5"></div>
            <div class="index-bg-6"></div>
            <div class="index-bg-7"></div>
            <div class="index-bg-8"></div>
            <div class="index-bg-9"></div>
            <div class="index-bg-10"></div>
            <div class="index-bg-11"></div>
            <div class="index-bg-12"></div>
        </div>
        <div class="share-title">
            <div class="share-t-inner">
                <div class="J_baba_amo"></div>
                <div class="share-t-cont" id="J_baba_nick"></div>
            </div>
        </div>
        <div class="map-wrap">
            <div class="map" id="J_map"></div>
            <div class="share-compare" id="J_compare">
                击败
                <p id="J_compare_score"></p>
                同胞
            </div>
        </div>
		<?php if($_GET[from]=="timeline"){?>
       <div class="share-btn">
            <a href="./index.html" class="ui-btn" >我也去标记</a>
        </div>
		<?php }else{?>
		<div class="share-btn">
            <a href="javascript:void(0);" class="ui-btn" id="J_share">炫耀我的粑粑地图</a>
        </div>
		<?php }?>
        <div class="share-btn">
          <a href="#" onClick="guanzhu();" style="color:#FFFFFF;">关注 微信游戏网络</a>
        </div>
     
    </section>
</div>

<div class="share-popup" id="J_share_popup"></div>
<div class="share-popup-tips" id="J_share_popup_t">
    <i></i>
    分享到朋友圈
</div>

<script type="text/javascript" src="./js/zepto.min.js"></script>
<script type="text/javascript">
  var jump_url = "http://mp.weixin.qq.com/s?__biz=MjM5ODQzODk0MA==&mid=200754961&idx=1&sn=343f5c361ad670bc05f6bc683da7a153#rd";
function guanzhu(){
			window.location=jump_url;
		}
    (function(){
        var city_id = window.location.hash.replace(/^#/, "");
        var city_id_arr = city_id.split(",");
        var city_len = city_id_arr.length;

        var map_html = "";
        for(var i = 0; i < city_len; i++){
            map_html += '<div class="map-bg map-bg'+ city_id_arr[i] +'"></div>';
        }
        $("#J_map").html(map_html);

        $.ajax({
            url : "/ajax/baba_tj", 
            data : {
                city_id : city_id,
                type : "省份选择"
            },
            type : "GET",
            dataType : "json",
            success : function(){}
        });

        //结果话术
        var res_cont = [
            "",
            "<p>呦喂，你的粑粑</p>只去过<span>1</span>个省！",
            "<p>次奥，你的粑粑</p>去过<span>{num}</span>个省了！",
            "<p>我去，你的粑粑</p>去过<span>{num}</span>个省耶！",
            "<p>我擦，你的粑粑</p>去过<span>{num}</span>个省哇！",
            "<p>尼玛，你的粑粑</p>去过<span>{num}</span>个省！",
            "<p>矮油，你的粑粑</p>居然去过<span>{num}</span>个省！",
            "<p>买噶，你的粑粑</p>居然去过<span>{num}</span>个省！",
            "<p>我日，你居然</p>拉遍了全中国！"
        ];

        if(city_len == 1){
            var city_i = 1;
            $(".J_baba_amo").addClass("baba-amo");
            $("#J_baba_nick").html(res_cont[city_i]);
        }else if(city_len >= 2 && city_len <= 5){
            var city_i = 2;
            $(".J_baba_amo").addClass("baba-amo baba-amo-"+ city_i);
            $("#J_baba_nick").html(res_cont[city_i].replace(/{num}/, city_len));
        }else if(city_len >= 6 && city_len <= 8){
            var city_i = 3;
            $(".J_baba_amo").addClass("baba-amo baba-amo-"+ city_i);
            $("#J_baba_nick").html(res_cont[city_i].replace(/{num}/, city_len));
        }else if(city_len >= 9 && city_len <= 11){
            var city_i = 4;
            $(".J_baba_amo").addClass("baba-amo baba-amo-"+ city_i);
            $("#J_baba_nick").html(res_cont[city_i].replace(/{num}/, city_len));
        }else if(city_len >= 12 && city_len <= 17){
            var city_i = 5;
            $(".J_baba_amo").addClass("baba-amo baba-amo-"+ city_i);
            $("#J_baba_nick").html(res_cont[city_i].replace(/{num}/, city_len));
        }else if(city_len >= 18 && city_len <= 28){
            var city_i = 6;
            $(".J_baba_amo").addClass("baba-amo baba-amo-"+ city_i);
            $("#J_baba_nick").html(res_cont[city_i].replace(/{num}/, city_len));
        }else if(city_len >= 29 && city_len <= 33){
            var city_i = 7;
            $(".J_baba_amo").addClass("baba-amo baba-amo-"+ city_i);
            $("#J_baba_nick").html(res_cont[city_i].replace(/{num}/, city_len));
        }else if(city_len == 34){
            var city_i = 8;
            $(".J_baba_amo").addClass("baba-amo baba-amo-"+ city_i);
            $("#J_baba_nick").html(res_cont[city_i].replace(/{num}/, city_len));
        }

        //击败话术
        var fail_cont = [
            "",
            "",
            "64.28%",
            "69.68%",
            "73.19%",
            "78.26%",
            "79.82%",
            "80.26%",
            "82.27%",
            "83.93%",
            "86.88%",
            "89.75%",
            "91.18%",
            "94.16%",
            "95.22%",
            "96.69%",
            "97.24%",
            "97.67%",
            "98.03%",
            "98.28%",
            "98.68%",
            "98.75%",
            "98.86%",
            "98.91%",
            "98.92%",
            "98.93%",
            "99.95%",
            "99.97%",
            "99.98%",
            "99.99%",
            "99.99%",
            "99.99%",
            "99.99%",
            "99.99%",
            "99.99%",
        ];
        $("#J_compare_score").html(fail_cont[city_len]);
        if(city_len == 1){
            $("#J_compare").hide();
        }

        //随机话术
        var cont_rand = [
            "拉自己的粑粑，让排队的人等去吧！",
            "拉粑粑拉成回旋向上金黄色宝塔状就像中奖一样难",
            "就算是一坨粑粑也会有遇到屎壳郎的那天",
            "屁是粑粑的叹息",
            "许多优美的旋律是音乐家拉粑粑时来的灵感",
            "千呼万唤始出来，感觉自己萌萌哒",
            "板侧尿流急，坑深粪落迟",
            "在没有人温暖我的嘴的时候，幸好还有你，每天温暖着我的屁股",
            "粑粑不起眼吗？不，他是微生物的抢手货",
            "你要是鲜花，以后牛都不敢拉粑粑了",
            "粑粑的离去是屁沟的抛弃还是粪坑的追求",
            "人生重要的不是拉粑粑的目的地，重要的是沿途的风景。粑粑拉在哪里不重要，重要的是过程",
            "最美的粑粑在去马桶的路上",
            "什么叫幸福？我想拉粑粑，就一个坑，你蹲那了，你就比我幸福",
            "人生最好的旅行，就是你在一个陌生的地方，拉了一泡舒服的粑粑",
            "要么读书、要么旅行，灵魂和粑粑，必须有一个在路上",
            "路漫漫其修远兮，吾将上下而求厕所",
            "人生自古谁无屎，有谁拉屎不用纸",
            "爱情就像是粑粑，有时候很努力却只是个屁",
            "世上谁没吃过屎？只要不要嚼就好了"
        ];
        var cont_rand_index = Math.round(Math.random(0, cont_rand.length - 1) * (cont_rand.length - 1));
        $("#J_baba_slogn").html(cont_rand[cont_rand_index]);

        var amo_index = 1;
        var amo_position = {
            0 : "0 0",
            1 : "-90px 0",
            2 : "-180px 0",
            3 : "0 -85px",
            4 : "-90px -85px",
            5 : "-180px -85px",
        };
        var amo_timer = setInterval(function(){
            if(amo_index >= 6){
                amo_index = 0;
            }
            $(".J_baba_amo").css({
                backgroundPosition : amo_position[amo_index]
            });
            amo_index++;
        }, 150);

        $("#J_share").on("tap", function(){
            $("#J_share_popup").show();
            $("#J_share_popup_t").show();
        });
        $("#J_share_popup").on("tap", function(){
            $(this).hide();
            $("#J_share_popup_t").hide();
        });
        $("#J_share_popup_t").on("tap", function(){
            $(this).hide();
            $("#J_share_popup").hide();
        });

        var share_desc_arr = [
            "",
            "呦喂，我是粑粑菜鸟！我的粑粑只去过1个省！",
            "次奥，我是粑粑达人！我的粑粑去过{num}个省了！",
            "我去，我是粑粑骚年！我的粑粑去过{num}个省耶！",
            "我擦，我是粑粑土豪！我的粑粑去过{num}个省哇！",
            "尼玛，我是粑粑大湿！我的粑粑去过{num}个省！",
            "矮油，我是粑粑大神！我的粑粑居然去过{num}个省！",
            "买噶，我是粑粑至尊！我的粑粑居然去过{num}个省！",
            "我日，我是粑粑大帝！我居然拉遍了全中国！"
        ];

        var share_title = share_desc_arr[city_i].replace(/{num}/, city_len);
        var share_desc = share_desc_arr[city_i].replace(/{num}/, city_len);
          var share_url = "http://www.weixin199.com/youxi/games/baba/share.php#"+ city_id;
        var share_img = "http://mmbiz.qpic.cn/mmbiz/2zpp2iaH4HWG5mQPzMneqjN72jQREWAAqVbnTWku1qUlnFbc7BNvz0IBnyUvWwiagCwIYFGzadiaceTn8e8NicosEw/640";

        if(city_len > 1){
            score = fail_cont[city_len].replace(/%$/, "");
            share_desc += "击败"+ Math.floor(score) +"%同胞！";
        }

        document.addEventListener("WeixinJSBridgeReady", function(){
            WeixinJSBridge.on("menu:share:appmessage",
                function(e){
                    WeixinJSBridge.invoke("sendAppMessage", {
                        img_url : share_img,
                        link : share_url,
                        desc : share_desc,
                        title : "粑粑去哪儿"
                    }, function(e){
                        if(typeof $ != "undefined"){
                            $.ajax({
                                url : "/ajax/baba_tj", 
                                data : {
                                    type : "分享页面好友分享"
                                },
                                type : "GET",
                                dataType : "json",
                                success : function(){
                                    document.location.href = jump_url;
                                }
                            });
                        }
                        
                    })
                }
            ), WeixinJSBridge.on("menu:share:timeline", function(e){
                    WeixinJSBridge.invoke("shareTimeline", {
                        img_url : share_img,
                        img_width : "640", 
                        img_height : "640", 
                        link : share_url,
                        desc : share_desc, 
                        title : share_title
                    }, function(e){
                        if(typeof $ != "undefined"){
                            $.ajax({
                                url : "/ajax/baba_tj", 
                                data : {
                                    type : "分享页面朋友圈分享"
                                },
                                type : "GET",
                                dataType : "json",
                                success : function(){
                                    document.location.href = jump_url;
                                }
                            });
                        }
                        
                    })
                })
        }, !1);
    })();

        
</script>

<!-- www.weixin199.com/youxi Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F048fdec886cd53f8bb62cee837c505c2' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>
