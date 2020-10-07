<?php

	$setting=unserialize(@file_get_contents(DATA_DIR.'/setting/overnotes.dat'));
	ini_set('mbstring.http_input', 'pass');
	parse_str($_SERVER['QUERY_STRING'],$_GET);
	$keyword=isset($_GET['k'])?trim($_GET['k']):'';
	$category=isset($_GET['c'])?trim($_GET['c']):'';
	$page=isset($_GET['p'])?trim($_GET['p']):'';
	$base_title = !empty($setting['title'])? $setting['title'] : 'OverNotes';

?><?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $current_category_name; ?>｜<?php echo $base_title; ?>｜千代田区秋葉原の歯医者｜中川歯科クリニック</title>
<meta name="keywords" content="<?php echo $current_category_name; ?>,秋葉原,歯科,歯医者,千代田区,予防歯科" />
<meta name="description" content="<?php echo $current_category_name; ?>,千代田区秋葉原の「中川歯科クリニック」は、秋葉原駅から徒歩3分という立地にある歯医者です。長きにわたってお口の健康を維持できることを願って予防歯科に力を入れており、マウスピース矯正やメインテナンスのために専用のフロアをご用意しています。" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<link  href="../../css/styles.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery.js" type="text/javascript"></script>
<script src="../../js/jquery.scroll.js" type="text/javascript"></script>
<script src="../../js/rollover.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../../js/menu.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-15077242-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-15077242-1');
</script>
</head>

<body id="blog" class="under">
<div id="wrapper">
  <div id="header">
    <div id="header_in" class="clearfix">
      <h1>千代田区秋葉原にある「中川歯科クリニック」のスタッフブログ。</h1>
      <p id="logo"><a href="../../"><img src="../../images/header_logo.jpg" width="330" height="60" alt="医療法人社団 智正会 中川歯科クリニック 秋葉原駅徒歩3分" /></a></p>
      <ul class="bnr clearfix pc-b">
        <li class="tel"><img src="../../images/header_tel.jpg" width="187" height="21" alt="03-3851-5566" /></li>
        <li><a href="https://www.shika-town.com/f00001369/reservation" target="_blank" onclick="ga('send', 'event', 'header', 'out_link', 'https://www.shika-town.com/f00001369/reservation', {'nonInteraction': 1});"><img src="../../images/header_contact_off.jpg" width="154" height="21" alt="東京都千代田区｜診療予約｜中川歯科クリニック" /></a></li>
      </ul>
      <ul id="gnavi" class="pc-b">
        <li><a href="../../"><img src="../../images/gnavi01_off.jpg" width="190" height="40" alt="HOME"/></a></li>
        <li><a href="../../clinic/concept.html"><img src="../../images/gnavi02_off.jpg" width="190" height="40" alt="診療コンセプト"/></a></li>
        <li><a href="../../clinic/concept.html#h401"><img src="../../images/gnavi03_off.jpg" width="190" height="40" alt="Dr.紹介"/></a></li>
        <li><a href="../../clinic/clinic.html"><img src="../../images/gnavi04_off.jpg" width="190" height="40" alt="院内紹介"/></a></li>
        <li><a href="../../clinic/clinic.html#h402"><img src="../../images/gnavi05_off.jpg" width="190" height="40" alt="アクセス"/></a></li>
      </ul>
    </div>
   
    <div id="mainimg">
      <div class="container">
        <h2><?php echo $current_category_name; ?></h2>
      </div>
    </div>
  </div>
  
  <!-- header end --> 
  <!-- begin menu sp -->
    <div class="header_btn">
      <p class="ac_Menu sp-b"> <span class="menu-trigger"> <span></span> <span></span> <span></span> <span>MENU</span> </span> </p>
      <div id="acbox" style="display: none;">
      <ul class="clearfix sp-b">
        <li class="acr_text">当院について</li>
        <li><a class="bdr-n2" href="../../clinic/concept.html">診療コンセプト</a></li>
        <li><a href="../../clinic/concept.html#h401">Dr.紹介</a></li>
        <li><a class="bdr-n2" href="../../clinic/clinic.html">院内紹介</a></li>
        <li><a href="../../clinic/clinic.html#h402">アクセス</a></li>
        <li class="acr_text bdt_n">診療メニュー</li>
        <li><a class="bdr-n2" href="../../clinic/effort.html">当院の取り組み</a></li>
        <li><a href="../../treatment/prevent.html">予防歯科</a></li>
        <li><a class="bdr-n2" href="../../treatment/general.html">虫歯</a></li>
        <li><a href="../../treatment/general.html#h302">小児歯科</a></li>
        <li><a class="bdr-n2" href="../../treatment/perio.html">歯周病</a></li>
        <li><a href="../../treatment/esthetic.html">補綴・セラミック治療</a></li>
        <li><a class="bdr-n2" href="../../treatment/ortho.html">矯正歯科</a></li>
        <li><a href="../../treatment/implant.html">インプラント治療</a></li>
        <li class="back_sp">×&nbsp;閉じる</li>
      </ul>
    </div>
    </div>


     <!-- end menu sp -->
  <!-- main start -->
  <div id="main" class="clearfix">
    <ul class="breadcrumb">
      <li><a href="../../">Home</a> </li>
      <li><a href="../"><?php echo $base_title; ?>一覧</a></li>
      <li><?php echo $current_category_name; ?></li>
    </ul>
    
    <!-- content start -->
    <div id="content">
      <h3><?php echo $current_category_name; ?></h3>
      <div class="section"> 
        <!-- *********   CATEGORY_TEXT   ********* --> 
        <?php echo $current_category_text; ?> 
        <!-- *********    /CATEGORY_TEXT ********* -->
        
        <div class="section"> 
          
          <!-- *********   POSTS   ********* -->
          <?php $limitNum = 20 ?>
          <?php
	$contribute_index=contribute_search(
		@$current_category_id
		,''
		,''
		,''
		,''
		,''
	);
	$max_record_count=count($contribute_index);

	$current_page=(@$_GET['p'])?(@$_GET['p']):1;
	$contribute_index=array_slice($contribute_index,($current_page-1)*$limitNum,$limitNum);
	$record_count=count($contribute_index)

?>
            <ul class="list_post">
              <?php
	$local_index=0;
	foreach($contribute_index as $rowid=>$index){
		$contribute=unserialize(@file_get_contents(DATA_DIR.'/contribute/'.$index['id'].'.dat'));
		$title=$contribute['title'];
		$url=$contribute['url'].'/';
		$category_id=$index['category'];
		$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$category_id.'.dat'));
		$category_name=$category_data['name'];
		$category_text=@$category_data['text'];
		$field_id=$index['field'];
		$date=$index['public_begin_datetime'];
		$id=$index['id'];
		$field=get_field($field_id);

		foreach($field as $field_index=>$field_data){
			${$field_data['code'].'_Name'}=$field_data['name'];
			${$field_data['code'].'_Value'}=make_value(
		$field_data['name']
				,@$contribute['data'][$field_id][$field_index]
				,$field_data['type']
				,$id
				,$field_id
				,$field_index
			);
	
			if($field_data['type']=='image'){
				${$field_data['code'].'_Src'}=ROOT_URI.'/_data/contribute/images/'.@$contribute['data'][$field_id][$field_index];
			}
		}
		$local_index++;

?>
                <?php $url = "../{$url}" ?>
                <li> <a href="<?php echo $url; ?>"><?php echo $title; ?></a> </li>
              <?php
		foreach($field as $field_index=>$field_data){
			unset(${$field_data['code'].'_Name'});
			unset(${$field_data['code'].'_Value'});
			unset(${$field_data['code'].'_Src'});
		}
	}
?>
            </ul>
          
          
          <!-- *********    /POSTS ********* --> 
          
          <!-- *********   PAGINATION   ********* -->
          <?php
	$page_count=(int)ceil($max_record_count/(float)$limitNum);
?>
            <?php
	if($max_record_count > $limitNum){
?>
              <ul class="pagination">
                <?php
	if($current_page <= 1){
?>
                  <li class="disabled"><a href="#">&lt;&lt;</a></li>
                  <?php
	}else{
?>
                  <li><a href="./?p=<?php echo $current_page-1; ?>">&lt;&lt;</a></li>
                <?php
	}
?>
                <?php
	$page_old=@$page;
	for($page=1;$page<=$page_count;$page++){
?>
                  <?php
	if($current_page == $page){
?>
                    <li class="active"><a href="#"><?php echo $page; ?></a></li>
                    <?php
	}else{
?>
                    <li><a href="./?p=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                  <?php
	}
?>
                <?php
	}
$page=$page_old;
?>
                <?php
	if($current_page*$limitNum<$max_record_count){
?>
                  <li><a href="./?p=<?php echo $current_page+1; ?>">&gt;&gt;</a></li>
                  <?php
	}else{
?>
                  <li class="disabled"><a href="#">&gt;&gt;</a></li>
                <?php
	}
?>
              </ul>
            <?php
	}
?>
          
          <!-- *********    /PAGINATION ********* --> 
          
        </div>
        <p class="mb0"><img src="../../images/tel_bnr.jpg" width="680" height="120" alt="ご予約・お問い合わせはこちら 中川歯科クリニック　TEL：03-3851-5566 秋葉原駅から徒歩3分 / 歯科用CT・マイクロ完備 / メインテナンス専用フロアあり" /></p>
      </div>
    </div>
    <!-- content end -->
    
    <div id="navi">
      <p><a href="../../clinic/effort.html"><img src="../../images/navi_bnr01_off.jpg" width="240" height="50" alt="当院の取り組み" /></a></p>
      <p><a href="../../treatment/prevent.html"><img src="../../images/navi_bnr09_off.jpg" width="240" height="50" alt="「予防」こそ歯科医療の原点" /></a></p>
      <ul>
        <li><a href="../../treatment/general.html"><img src="../../images/navi_bnr02_off.jpg" width="240" height="61" alt="歯の痛みをなんとかしたい 虫歯"  /></a></li>
        <li><a href="../../treatment/general.html#h302"><img src="../../images/navi_bnr03_off.jpg" width="240" height="60" alt="子どもの虫歯を治したい 小児歯科"  /></a></li>
        <li><a href="../../treatment/perio.html"><img src="../../images/navi_bnr04_off.jpg" width="240" height="70" alt="歯ぐきが腫れている・出血する 歯周病"  /></a></li>
        <li><a href="../../treatment/esthetic.html"><img src="../../images/navi_bnr05_off.jpg" width="240" height="60" alt="銀歯や黄ばみを白くしたい 補綴・セラミック治療"  /></a></li>
        <li><a href="../../treatment/ortho.html"><img src="../../images/navi_bnr06_off.jpg" width="240" height="60" alt="気になる歯並びを治したい 矯正歯科"  /></a></li>
        <li><a href="../../treatment/implant.html"><img src="../../images/navi_bnr07_off.jpg" width="240" height="60" alt="歯が抜けて困っている インプラント治療"  /></a></li>
      </ul>
      <p class="mt10"><a href="../../lpo/"><img src="../../images/navi_bnr08_off.jpg" width="240" height="80" alt="寝ている間に歯並び矯正 DENマウスピース矯正" /></a></p>
      <div class="blog_cat"> <span class="title">ブログカテゴリ一覧</span>
        <ul class="nav nav-pills nav-stacked">
          
          <!-- *********   CATEGORIES   ********* -->
          <?php
	$category_index=get_category_index();
	foreach($category_index as $rowid=>$id){
		$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$id.'.dat'));
		$category_url=$category_data['id'];
		$category_name=$category_data['name'];
		$category_text=@$category_data['text'];
		$category_id=$id;
		${'category'.$id.'_url'}=$category_data['id'];
		${'category'.$id.'_name'}=$category_data['name'];
		${'category'.$id.'_text'}=@$category_data['text'];
		$selected=(@$_GET['c']==$id?' selected="selected"':'');

?>
            <li> <a href="../<?php echo $category_url; ?>/"><?php echo $category_name; ?></a> </li>
          <?php
	}
?>
          <!-- *********    /CATEGORIES ********* -->
          
        </ul>
      </div>
    </div>
    <!-- navi end --> 
  </div>
  <!-- main end -->
  
  <div id="footer">
    <div class="container clearfix">
      <div class="footer_link pc-b">
        <div class="box_fleft">
          <ul>
            <li><a href="https://www.nakagawadent.net/">TOPページ</a></li>
            <li><a href="../../clinic/concept.html">コンセプト</a></li>
            <li><a href="../../clinic/effort.html">こだわりの取り組み</a></li>
            <li><a href="../../clinic/clinic.html">院内紹介</a></li>
            <li><a href="../../blog/">ブログ</a></li>
          </ul>
        </div>
        <div class="box_right">
          <p class="title_flink">診療内容</p>
          <ul>
            <li><a href="../../treatment/prevent.html">予防歯科</a></li>
            <li><a href="../../treatment/general.html">虫歯治療</a></li>
            <li><a href="../../treatment/general.html#h302">小児歯科</a></li>
            <li><a href="../../treatment/perio.html">歯周病治療</a></li>
              <li><a href="../../treatment/esthetic.html">補綴・セラミック治療</a></li>
            <li><a href="../../treatment/ortho.html">矯正歯科</a></li>
            <li><a href="../../treatment/implant.html">インプラント治療</a></li>
            </ul>
        </div>
      </div>
      <div class="wrap_box_info clearfix">
        <p class="pagetop"><a href="#wrapper"><img src="../../images/pagetop_off.png" width="130" height="30" alt="PAGE TOP" /></a></p>
        <div class="block">
          <p class="mb20"><a href="../../"><img src="../../images/footer_logo.jpg" width="285" height="45" alt="医療法人社団 智正会 中川歯科クリニック 医院情報"  /></a></p>
          <dl class="clearfix mb15">
            <dt>住所</dt>
            <dd>〒101-0024<br />
              東京都千代田区神田和泉町1-3-4 青木ビル2F</dd>
          </dl>
          <dl class="clearfix mb15 pc-b">
            <dt>TEL</dt>
            <dd class="tel">03-3851-5566</dd>
          </dl>
          <p class="mb15"><img src="../../images/footer_time.jpg" width="419" height="104" alt="診療時間" /><br>
</p>
        <p class="mb0 fl w220"><a href="https://www.shika-town.com/f00001369/" target="_blank"><img src="../../images/footer_bnr01.jpg" width="220" height="86" alt="東京都千代田区｜中川歯科クリニック" /></a>
          <div class="fr">
            <p class="mt15 mb10"><a href="../../blog/"><img src="../../images/footer_bnr02_off.jpg" width="180" height="30" alt="スタッフブログ" /></a></p>
            <p class="mb0 pc-b"><a href="https://www.shika-town.com/f00001369/reservation" target="_blank" onclick="ga('send', 'event', 'footer', 'out_link', 'https://www.shika-town.com/f00001369/reservation', {'nonInteraction': 1});"><img src="../../images/footer_bnr03_off.jpg" width="180" height="30" alt="東京都千代田区｜診療予約｜中川歯科クリニック" /></a></p>
          </div>
        </div>
        <div class="map">
          <iframe class="gMap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1620.0235217985894!2d139.7760481184085!3d35.70045993514595!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb6784d83bd44429d!2z5Lit5bed5q2v56eR44Kv44Oq44OL44OD44KvIOeni-iRieWOn-OBruatr-WMu-iAhS_mra_lkajnl4Uv5a-p576O5q2v56eR!5e0!3m2!1sja!2sjp!4v1536126133014" width="500" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <address>
    Copyright  &copy;  医療法人社団 智正会　中川歯科クリニック All Rights Reserved.
    </address>
  </div>
  <!-- begin fixfooter -->
  <div id="fixfooter">
    <ul class="sp-b">
      <li><a href="tel:03-3851-5566" onclick="ga('send', 'event', 'sp', 'tel');"><img src="../../images/header_tel.jpg" alt="03-3851-5566" /></a></li>
      <li><a href="https://www.shika-town.com/f00001369/reservation"  target="_blank" onclick="ga('send', 'event', 'sp', 'shikatown');"><img src="../../images/header_contact_off.jpg" alt="東京都千代田区｜診療予約｜中川歯科クリニック" /></a></li>
    </ul>
  </div>
  <!-- end fixfooter --> 
</div>
</body>
</html>
