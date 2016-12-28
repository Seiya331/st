<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $seoinfo['seotitle'];?>-<?php echo $webname;?></title>
    <?php if($seoinfo['keyword']) { ?>
    <meta name="keywords" content="<?php echo $seoinfo['keyword'];?>"/>
    <?php } ?>
    <?php if($seoinfo['description']) { ?>
    <meta name="description" content="<?php echo $seoinfo['description'];?>"/>
    <?php } ?>
    <meta name="author" content="<?php echo $webname;?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="<?php echo $GLOBALS['cfg_m_main_url'];?>/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo $GLOBALS['cfg_m_main_url'];?>/favicon.ico" type="image/x-icon"/>
    <?php echo Common::css('amazeui.css,style.css,index.css,extend.css');?>
    <?php echo Common::js('jquery.min.js,amazeui.js,template.js,layer/layer.m.js,delayLoading.min.js');?>
</head>
<body>
<?php echo Request::factory("pub/header/typeid/0")->execute()->body(); ?>
<section>
    <div class="mid_content">
        <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}'>
            <ul class="am-slides">
                <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$data = $ad_tag->getad(array('action'=>'getad','name'=>'s_index_1',));}?>
                <?php $n=1; if(is_array($data['aditems'])) { foreach($data['aditems'] as $v) { ?>
                <li><a href="<?php echo $v['adlink'];?>"><img src="<?php echo Common::img($v['adsrc'],640,300);?>" title="<?php echo $v['adname'];?>"></a></li>
                <?php $n++;}unset($n); } ?>
                
            </ul>
        </div>
        <!--轮播图-->
        <div class="st_search_box">
            <input type="text" class="st_home_txt" id="keyword" placeholder="搜索产品"/>
            <input type="button" class="st_home_btn" value="搜索"/>
        </div>
        <!--搜索-->
        <nav>
            <div class="st_home_menu">
                <p>
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/channel.php");$channel_tag = new Taglib_Channel();if (method_exists($channel_tag, 'getchannel')) {$data = $channel_tag->getchannel(array('action'=>'getchannel','row'=>'100',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                    <a href="<?php echo $row['url'];?>">
                        <span><img src="<?php echo $row['ico'];?>"/></span>
                        <strong><?php echo $row['title'];?></strong>
                    </a>
                    <?php $n++;}unset($n); } ?>
                    
                </p>
            </div>
        </nav>
        <!--导航-->
        <div class="st_sale_box">
            <h3><i></i>特价优惠</h3>
            <div class="st_sale_con">
                <div class="st_advpic_l">
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$data = $ad_tag->getad(array('action'=>'getad','name'=>'s_index_2',));}?>
                    <a href="<?php echo $data['adlink'];?>"><img src="/public/images/grey.gif" st-src="<?php echo $data['adsrc'];?>" title="<?php echo $v['adname'];?>"></a>
                    
                </div>
                <div class="st_advpic_r">
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$data = $ad_tag->getad(array('action'=>'getad','name'=>'s_index_3',));}?>
                    <a href="<?php echo $data['adlink'];?>"><img src="/public/images/grey.gif" st-src="<?php echo $data['adsrc'];?>" title="<?php echo $v['adname'];?>"></a>
                    
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/ad.php");$ad_tag = new Taglib_Ad();if (method_exists($ad_tag, 'getad')) {$data = $ad_tag->getad(array('action'=>'getad','name'=>'s_index_4',));}?>
                    <a href="<?php echo $data['adlink'];?>"><img src="/public/images/grey.gif" st-src="<?php echo $data['adsrc'];?>" title="<?php echo $v['adname'];?>"></a>
                    
                </div>
            </div>
        </div>
        <!--特价优惠-->
        <?php if($channel['line']['isopen']==1) { ?>
        <div class="st_hot_list">
            <div class="st_tit">
                <h3><?php echo $channel['line']['channelname'];?></h3>
            </div>
            <div class="st_list_con">
                <ul class="st_list_ul">
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/line.php");$line_tag = new Taglib_Line();if (method_exists($line_tag, 'query')) {$data = $line_tag->query(array('action'=>'query','flag'=>'order','row'=>'4',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                    <li>
                        <a href="<?php echo $row['url'];?>">
                            <img src="/public/images/grey.gif" st-src="<?php echo Common::img($row['litpic'],302,180);?>" alt="<?php echo $row['title'];?>"/>
                            <p class="tit"><?php echo $row['title'];?><?php echo $row['sellpoint'];?></p>
                            <p class="num">
                                <?php if(!empty($row['price'])) { ?>
                                <span><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><strong><?php echo $row['price'];?></strong>起</span>
                                <?php } else { ?>
                                <span><strong>电询</strong></span>
                                <?php } ?>
                                <?php if(!empty($row['storeprice'])) { ?>
                                <del>原价：<?php echo $row['storeprice'];?>元</del>
                                <?php } ?>
                            </p>
                        </a>
                    </li>
                    <?php $n++;}unset($n); } ?>
                    
                </ul>
                <div class="list_more"><a href="<?php echo $cmsurl;?>lines/all/">查看更多</a></div>
                <div style=" clear:both"></div>
            </div>
        </div>
        <!--热门线路-->
        <?php } ?>
        <?php if($channel['hotel']['isopen']) { ?>
        <div class="st_hot_list">
            <div class="st_tit">
                <h3><?php echo $channel['hotel']['channelname'];?></h3>
            </div>
            <div class="st_list_con">
                <ul class="st_list_ul">
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/hotel.php");$hotel_tag = new Taglib_Hotel();if (method_exists($hotel_tag, 'query')) {$data = $hotel_tag->query(array('action'=>'query','flag'=>'order','row'=>'4',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                    <li>
                        <a href="<?php echo $row['url'];?>">
                            <img src="/public/images/grey.gif" st-src="<?php echo Common::img($row['litpic'],302,180);?>" alt="<?php echo $row['title'];?>"/>
                            <p class="tit"><?php echo $row['title'];?><?php echo $row['sellpoint'];?></p>
                            <p class="num">
                                <?php if(!empty($row['price'])) { ?>
                                <span><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><strong><?php echo $row['price'];?></strong>起</span>
                                <?php } else { ?>
                                <span><strong>电询</strong></span>
                                <?php } ?>
                                <?php if(!empty($row['storeprice'])) { ?>
                                <del>原价：<?php echo $row['storeprice'];?>元</del>
                                <?php } ?>
                            </p>
                        </a>
                    </li>
                    <?php $n++;}unset($n); } ?>
                    
                </ul>
                <div class="list_more"><a href="<?php echo $cmsurl;?>hotels/all/">查看更多</a></div>
                <div style=" clear:both"></div>
            </div>
        </div>
        <!--热门酒店-->
        <?php } ?>
        <?php if($channel['car']['isopen']) { ?>
        <div class="st_hot_list">
            <div class="st_tit">
                <h3><?php echo $channel['car']['channelname'];?></h3>
            </div>
            <div class="st_list_con">
                <ul class="st_list_ul">
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/car.php");$car_tag = new Taglib_Car();if (method_exists($car_tag, 'query')) {$data = $car_tag->query(array('action'=>'query','flag'=>'order',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                    <li>
                        <a href="<?php echo $row['url'];?>">
                            <img src="/public/images/grey.gif" st-src="<?php echo Common::img($row['litpic'],302,180);?>" alt="<?php echo $row['title'];?>"/>
                            <p class="tit"><?php echo $row['title'];?><?php echo $row['sellpoint'];?></p>
                            <p class="num">
                                <?php if(!empty($row['price'])) { ?>
                                <span><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><strong><?php echo $row['price'];?></strong>起</span>
                                <?php } else { ?>
                                <span><strong>电询</strong></span>
                                <?php } ?>
                            </p>
                        </a>
                    </li>
                    <?php $n++;}unset($n); } ?>
                    
                </ul>
                <div class="list_more"><a href="<?php echo $cmsurl;?>cars/all/">查看更多</a></div>
                <div style=" clear:both"></div>
            </div>
        </div>
        <!--热门租车-->
        <?php } ?>
        <?php if($channel['spot']['isopen']) { ?>
        <div class="st_hot_list">
            <div class="st_tit">
                <h3><?php echo $channel['spot']['channelname'];?></h3>
            </div>
            <div class="st_list_con">
                <ul class="st_list_ul">
                    <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/spot.php");$spot_tag = new Taglib_Spot();if (method_exists($spot_tag, 'query')) {$data = $spot_tag->query(array('action'=>'query','flag'=>'order','row'=>'4',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                    <li>
                        <a href="<?php echo $row['url'];?>">
                            <img src="/public/images/grey.gif" st-src="<?php echo Common::img($row['litpic'],302,180);?>" alt="<?php echo $row['title'];?>"/>
                            <p class="tit"><?php echo $row['title'];?><?php echo $row['sellpoint'];?></p>
                            <p class="num">
                                <?php if(!empty($row['price'])) { ?>
                                <span><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><strong><?php echo $row['price'];?></strong>起</span>
                                <?php } ?>
                            </p>
                        </a>
                    </li>
                    <?php $n++;}unset($n); } ?>
                    
                </ul>
                <div class="list_more"><a href="<?php echo $cmsurl;?>spots/all/">查看更多</a></div>
                <div style=" clear:both"></div>
            </div>
        </div>
        <!--景点门票-->
        <?php } ?>
        <?php if($channel['tuan']['isopen']) { ?>
        <div class="tuan_home_con st_hot_list">
            <div class="st_tit">
                <h3><?php echo $channel['tuan']['channelname'];?></h3>
            </div>
            <ul class="tuan_hm_list">
                <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/tuan.php");$tuan_tag = new Taglib_Tuan();if (method_exists($tuan_tag, 'query')) {$data = $tuan_tag->query(array('action'=>'query','flag'=>'new','row'=>'2',));}?>
                <?php $n=1; if(is_array($data)) { foreach($data as $v) { ?>
                <li>
                    <a href="<?php echo $v['url'];?>">
                        <img class="pic" src="/public/images/grey.gif" st-src="<?php echo Common::img($v['litpic'],620,408);?>"/>
                        <div class="date_time" start-time="<?php echo $v['starttime'];?>" end-time="<?php echo $v['endtime'];?>">
                            <em></em>
                            <span></span>
                        </div>
                        <p class="tit"><?php echo $v['title'];?></p>
                        <p class="txt"><?php echo $v['sellpoint'];?></p>
                        <p class="price">
                            <span><i class="currency_sy"><?php echo Currency_Tool::symbol();?></i><b><?php echo $v['price'];?></b></span>
                            <?php if(!empty($v['sellprice'])) { ?>
                            <del>原价：<?php echo $v['sellprice'];?>元</del>
                            <?php } ?>
                            <em>已售：<?php echo $v['sellnum'];?></em>
                        </p>
                    </a>
                </li>
                <?php $n++;}unset($n); } ?>
                
            </ul>
            <div class="tuan_more"><a href="<?php echo $cmsurl;?>tuan/">查看更多</a></div>
        </div>
        <!--限时特价-->
        <?php } ?>
        <?php if($channel['jieban']['isopen']) { ?>
        <div class="jb_list_home">
            <h3><span><?php echo $channel['jieban']['channelname'];?></span></h3>
            <ul>
                <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/jieban.php");$jieban_tag = new Taglib_Jieban();if (method_exists($jieban_tag, 'query')) {$data = $jieban_tag->query(array('action'=>'query','row'=>'2','flag'=>'new',));}?>
                <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                <li>
                    <a class="pic" href="<?php echo $row['url'];?>"><img src="/public/images/grey.gif" st-src="<?php echo Common::img($row['litpic'],616,392);?>"/><span class="day_date"><strong><b><?php echo $row['day'];?></b>日游</strong><em><?php echo $row['startdate'];?>出发</em></span></a>
                    <p class="tit"><?php echo $row['title'];?>片</p>
                    <p class="txt"><?php echo Common::cutstr_html($row['description'],20);?></p>
                    <p class="attr">
                        <?php $n=1; if(is_array($row['attrlist'])) { foreach($row['attrlist'] as $v) { ?>
                        <span><?php echo $v['attrname'];?></span>
                        <?php $n++;}unset($n); } ?>
                    </p>
                    <p class="join"><span>已有<b><?php echo $row['joinnum'];?></b>人报名</span><em><?php echo $row['shownum'];?></em><a
                            href="<?php echo $row['url'];?>">立即加入</a></p>
                </li>
                <?php $n++;}unset($n); } ?>
                
            </ul>
            <div class="tuan_more"><a href="<?php echo $cmsurl;?>jieban/">查看更多</a></div>
        </div>
        <!--结伴-->
        <?php } ?>
        <?php if($channel['article']['isopen']) { ?>
        <div class="gl_hot_list">
            <h3 class="tit"><span><?php echo $channel['article']['channelname'];?></span></h3>
            <ul>
                <?php require_once ("/Users/zhuguojie/study/st/phone/taglib/article.php");$article_tag = new Taglib_Article();if (method_exists($article_tag, 'query')) {$data = $article_tag->query(array('action'=>'query','flag'=>'order','row'=>'3',));}?>
                <?php $n=1; if(is_array($data)) { foreach($data as $row) { ?>
                <li>
                    <a href="<?php echo $row['url'];?>">
                        <div class="pic"><img src="/public/images/grey.gif" st-src="<?php echo Common::img($row['litpic'],246,246);?>" alt="<?php echo $row['title'];?>"/></div>
                        <div class="con">
                            <p class="bt"><?php echo $row['title'];?></p>
                            <p class="txt"><?php echo Common::cutstr_html($row['summary'],20);?></p>
                            <p class="data">
                                <span class="mdd"><?php echo $row['kindname'];?></span>
                                <span class="num"><?php echo $row['shownum'];?></span>
                            </p>
                        </div>
                    </a>
                </li>
                <?php $n++;}unset($n); } ?>
                
            </ul>
            <div class="list_more"><a href="<?php echo $cmsurl;?>raiders/all/">查看更多</a></div>
        </div>
        <!--游记攻略-->
        <?php } ?>
    </div>
</section>
<?php echo Request::factory("pub/code")->execute()->body(); ?>
<?php echo Request::factory("pub/footer")->execute()->body(); ?>
<script>
    $(function () {
        //全局搜索
        $('.st_home_btn').click(function () {
            var keyword = $("#keyword").val();
            if (keyword == '') {
                layer.open({
                    content: '<?php echo __("error_keyword_not_empty");?>',
                    btn: ['<?php echo __("OK");?>']
                });
                return false;
            } else {
                url = SITEURL + 'search?keyword=' + encodeURIComponent(keyword);
                window.location.href = url;
            }
        })
        //团购时间
        $('.tuan_hm_list').find('.date_time').each(function (index, element) {
            show_count(element);
        });
        function show_count(node) {
            var endTime = $(node).attr('end-time') * 1000;
            var startTime = $(node).attr('start-time') * 1000;
            var timer_rt = window.setInterval(function () {
                var time;
                var now = new Date();
                now = now.getTime();
                if (startTime > now) {
                    time = startTime - now;
                    $(node).find('em').html('开始时间');
                } else if (endTime > now) {
                    time = endTime - now;
                    $(node).find('em').html('结束时间');
                } else {
                    $(node).find('em').html('已结束');
                    $(node).parents('li').remove();
                    clearInterval(timer_rt);
                }
                time = parseInt(time / 1000);
                var day = Math.floor(time / (60 * 60 * 24));
                var hour = Math.floor((time - day * 24 * 60 * 60) / 3600);
                var minute = Math.floor((time - day * 24 * 60 * 60 - hour * 3600) / 60);
                var html = '';
                if (day > 0) {
                    html += day + '天';
                }
                if (hour > 0) {
                    html += hour + '时';
                }
                if (minute > 0) {
                    html += minute + '分';
                }
                $(node).find('span').html(html);
            }, 1000);
        }
    })
</script>
</body>
</html>
