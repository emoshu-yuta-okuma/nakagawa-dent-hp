<?php

	$setting=unserialize(@file_get_contents(DATA_DIR.'/setting/overnotes.dat'));
	ini_set('mbstring.http_input', 'pass');
	parse_str($_SERVER['QUERY_STRING'],$_GET);
	$keyword=isset($_GET['k'])?trim($_GET['k']):'';
	$category=isset($_GET['c'])?trim($_GET['c']):'';
	$page=isset($_GET['p'])?trim($_GET['p']):'';
	$base_title = !empty($setting['title'])? $setting['title'] : 'OverNotes';

?><?php
	$contribute=get_contribute($contribute_id);
		$title=$contribute['title'];
	$category_id=$contribute['category'];
	$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$category_id.'.dat'));
	$category_name=$category_data['name'];
	$category_text=@$category_data['text'];
	$category_url=$category_data['id'];
	$field_id=$contribute['field'];
	$id=$contribute['id'];
	$field=get_field($field_id);
	$date=$contribute['public_begin_datetime'];
	$url=$contribute['url'].'/';

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

?>
<?php
$current_category_id   = $category_id;
$current_category_name = $category_name;
?>
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
  <?php if( $current_category_id==$category_id ) $current_category_url = $category_url; ?>
<?php
	}
?>
<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" ?>
<!DOCTYPE html>
<html lang="ja">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?>｜<?php echo $base_title; ?>｜秋葉原駅から徒歩3分の歯医者【中川歯科クリニック】千代田区秋葉原の歯医者</title>
  <?php
    if($description_Value){
  ?>
  <meta name="description" content="<?php echo $description_Value; ?>" />
  <ELSEIf>
  <meta name="description" content="<?php echo $title; ?>,千代田区秋葉原の「中川歯科クリニック」では、感染対策を徹底しており、平日はもちろん土曜日も診療しています。秋葉原駅から徒歩3分という通いやすい歯医者です。歯を削らない治療、神経を残す治療に力を入れており、長きにわたってお口の健康をサポートします。" />
  <?php
    }
  ?>
  <?php
    if($keywords_Value){
  ?>
    <meta name="keywords" content="<?php echo $title; ?>,秋葉原,歯科,歯医者,千代田区,予防歯科" />
    <ELSEIf>
  <?php
    }
  ?>
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <link rel="stylesheet" href="../../css/normalize.css" type="text/css">
  <link rel="stylesheet" href="../../css/blog.css" type="text/css">
  <link rel="stylesheet" href="../../css/common.css" type="text/css">
  <link rel="stylesheet" href="../../css/common-responsive.css" type="text/css">
  <link rel="canonical" href="https://www.nakagawadent.net/blog/" />
  <script src="https://kit.fontawesome.com/f714ef2d5d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179136058-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-179136058-1');
  </script>
</head>

<body>
  <!-- Header -->
  <header id="home">
    <div class="header-info">
      <h1>東京秋葉原の歯医者「中川歯科クリニック」のスタッフブログ</h1>
      <div class="header-buttons">
        <a href="mailto:5566@nakagawadent.net?subject=%E4%B8%AD%E5%B7%9D%E6%AD%AF%E7%A7%91%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF-Web%E8%A8%BA%E7%99%82%E4%BA%88%E7%B4%84%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0&amp;body=%E3%81%93%E3%81%A1%E3%82%89%E4%B8%AD%E5%B7%9D%E6%AD%AF%E7%A7%91%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AFWeb%E8%A8%BA%E7%99%82%E4%BA%88%E7%B4%84%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0%E3%81%AB%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82%0D%0A%E5%8C%BB%E9%99%A2%E3%81%8B%E3%82%89%E3%81%AE%E8%BF%94%E4%BF%A1%E3%82%92%E3%82%82%E3%81%A3%E3%81%A6%E5%8F%97%E4%BB%98%E7%A2%BA%E5%AE%9A%E3%81%A8%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82%0D%0A%E3%81%94%E4%BA%88%E7%B4%84%E7%A2%BA%E8%AA%8D%E3%81%AE%E9%9B%BB%E8%A9%B1%E3%82%82%E3%81%97%E3%81%8F%E3%81%AF%E3%83%A1%E3%83%BC%E3%83%AB%E3%81%8C%E5%B1%8A%E3%81%8D%E3%81%BE%E3%81%99%E3%81%AE%E3%81%A7%E3%80%90%40nakagawadent.net%E3%80%91%E3%81%8B%E3%82%89%E3%81%AE%E3%83%A1%E3%83%BC%E3%83%AB%E3%82%92%E5%8F%97%E4%BF%A1%E5%87%BA%E6%9D%A5%E3%82%8B%E3%82%88%E3%81%86%E3%81%AB%E3%80%81%E8%A8%AD%E5%AE%9A%E3%82%92%E3%81%8A%E9%A1%98%E3%81%84%E3%81%97%E3%81%BE%E3%81%99%E3%80%82%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0A%E3%81%8A%E5%90%8D%E5%89%8D%EF%BC%9A%0D%0A%0D%0A%E3%81%94%E4%BD%8F%E6%89%80%EF%BC%9A%0D%0A%0D%0A%E9%9B%BB%E8%A9%B1%E7%95%AA%E5%8F%B7%EF%BC%9A%0D%0A%0D%0A%E3%83%A1%E3%83%BC%E3%83%AB%E3%82%A2%E3%83%89%E3%83%AC%E3%82%B9%EF%BC%9A%0D%0A%0D%0A%E6%B2%BB%E7%99%82%E5%B8%8C%E6%9C%9B%E5%86%85%E5%AE%B9%EF%BC%9A%0D%0A%28%E4%BE%8B.%E3%80%80%E8%99%AB%E6%AD%AF%E6%B2%BB%E7%99%82%E3%80%81%E5%B0%8F%E5%85%90%E6%AD%AF%E7%A7%91%E3%80%81%E6%AD%AF%E5%91%A8%E7%97%85%E3%81%AA%E3%81%A9%29%0D%0A%0D%0A%0D%0A%E4%BA%88%E7%B4%84%E5%B8%8C%E6%9C%9B%E6%97%A5%E6%99%82%EF%BC%9A%E3%80%80%28%E7%AC%AC%E4%B8%89%E5%B8%8C%E6%9C%9B%E3%81%BE%E3%81%A7%E3%81%94%E5%85%A5%E5%8A%9B%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%29%0D%0A%E2%91%A0%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%E2%91%A1%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%E2%91%A2%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%0D%0A%0D%0A%E6%8A%98%E3%82%8A%E8%BF%94%E3%81%97%E5%B8%8C%E6%9C%9B%E9%80%A3%E7%B5%A1%E5%85%88%EF%BC%88%E9%9B%BB%E8%A9%B1%E3%82%82%E3%81%97%E3%81%8F%E3%81%AF%E3%83%A1%E3%83%BC%E3%83%AB%EF%BC%89%EF%BC%9A%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0A%E3%81%94%E5%85%A5%E5%8A%9B%E5%86%85%E5%AE%B9%E3%82%92%E3%81%94%E7%A2%BA%E8%AA%8D%E3%81%AE%E4%B8%8A%E3%80%81%E3%82%88%E3%82%8D%E3%81%97%E3%81%91%E3%82%8C%E3%81%B0%E9%80%81%E4%BF%A1%E3%81%97%E3%81%A6%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%E3%80%82" class="reservation"><i class="fas fa-desktop"></i>WEB診療予約<i class="fas fa-chevron-circle-right"></i></a>
        <a href="tel:0338515566" class="phone-number"><i class="fas fa-phone-alt"></i>03-3851-5566</a>
      </div>
    </div>
    <div class="header-title">
      <div class="clinic-name">
        <a href="../../">
          <h3>医療法人社団　智正会</h3>
          <h1>中川歯科クリニック</h1>
        </a>
      </div>
      <div class="clinic-access">
        <p>秋葉原駅<br>徒歩3分</p>
      </div>
    </div>
    <nav class="header-menu">
      <ul>
        <li><a href="../../">ホーム</a></li>
        <li><a href="../../clinic/">治療コンセプト</a></li>
        <li><a href="../../treatment/">治療案内</a></li>
        <li><a href="../../clinic/effort.html">医療機器</a></li>
        <li><a href="../../clinic/staff.html">スタッフ紹介</a></li>
        <li><a href="../../clinic/clinic.html">院内紹介</a></li>
        <li><a href="../../clinic/access.html">アクセス</a></li>
      </ul>
    </nav>
    <nav class="header-menu-sm">
      <input type="checkbox" class="toggler">
      <div class="hamburger">
        <div></div>
      </div>
      <div class="menu-sm">
        <div>
          <div>
            <ul>
              <li><a href="../../">ホーム</a></li>
              <li><a href="../../clinic/">治療コンセプト</a></li>
              <li><a href="../../treatment/">治療案内</a></li>
              <li><a href="../../clinic/effort.html">医療機器</a></li>
              <li><a href="../../clinic/staff.html">スタッフ紹介</a></li>
              <li><a href="../../clinic/clinic.html">院内紹介</a></li>
              <li><a href="../../clinic/access.html">アクセス</a></li>
              <li><a href="mailto:5566@nakagawadent.net?subject=%E4%B8%AD%E5%B7%9D%E6%AD%AF%E7%A7%91%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF-Web%E8%A8%BA%E7%99%82%E4%BA%88%E7%B4%84%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0&amp;body=%E3%81%93%E3%81%A1%E3%82%89%E4%B8%AD%E5%B7%9D%E6%AD%AF%E7%A7%91%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AFWeb%E8%A8%BA%E7%99%82%E4%BA%88%E7%B4%84%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0%E3%81%AB%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82%0D%0A%E5%8C%BB%E9%99%A2%E3%81%8B%E3%82%89%E3%81%AE%E8%BF%94%E4%BF%A1%E3%82%92%E3%82%82%E3%81%A3%E3%81%A6%E5%8F%97%E4%BB%98%E7%A2%BA%E5%AE%9A%E3%81%A8%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82%0D%0A%E3%81%94%E4%BA%88%E7%B4%84%E7%A2%BA%E8%AA%8D%E3%81%AE%E9%9B%BB%E8%A9%B1%E3%82%82%E3%81%97%E3%81%8F%E3%81%AF%E3%83%A1%E3%83%BC%E3%83%AB%E3%81%8C%E5%B1%8A%E3%81%8D%E3%81%BE%E3%81%99%E3%81%AE%E3%81%A7%E3%80%90%40nakagawadent.net%E3%80%91%E3%81%8B%E3%82%89%E3%81%AE%E3%83%A1%E3%83%BC%E3%83%AB%E3%82%92%E5%8F%97%E4%BF%A1%E5%87%BA%E6%9D%A5%E3%82%8B%E3%82%88%E3%81%86%E3%81%AB%E3%80%81%E8%A8%AD%E5%AE%9A%E3%82%92%E3%81%8A%E9%A1%98%E3%81%84%E3%81%97%E3%81%BE%E3%81%99%E3%80%82%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0A%E3%81%8A%E5%90%8D%E5%89%8D%EF%BC%9A%0D%0A%0D%0A%E3%81%94%E4%BD%8F%E6%89%80%EF%BC%9A%0D%0A%0D%0A%E9%9B%BB%E8%A9%B1%E7%95%AA%E5%8F%B7%EF%BC%9A%0D%0A%0D%0A%E3%83%A1%E3%83%BC%E3%83%AB%E3%82%A2%E3%83%89%E3%83%AC%E3%82%B9%EF%BC%9A%0D%0A%0D%0A%E6%B2%BB%E7%99%82%E5%B8%8C%E6%9C%9B%E5%86%85%E5%AE%B9%EF%BC%9A%0D%0A%28%E4%BE%8B.%E3%80%80%E8%99%AB%E6%AD%AF%E6%B2%BB%E7%99%82%E3%80%81%E5%B0%8F%E5%85%90%E6%AD%AF%E7%A7%91%E3%80%81%E6%AD%AF%E5%91%A8%E7%97%85%E3%81%AA%E3%81%A9%29%0D%0A%0D%0A%0D%0A%E4%BA%88%E7%B4%84%E5%B8%8C%E6%9C%9B%E6%97%A5%E6%99%82%EF%BC%9A%E3%80%80%28%E7%AC%AC%E4%B8%89%E5%B8%8C%E6%9C%9B%E3%81%BE%E3%81%A7%E3%81%94%E5%85%A5%E5%8A%9B%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%29%0D%0A%E2%91%A0%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%E2%91%A1%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%E2%91%A2%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%0D%0A%0D%0A%E6%8A%98%E3%82%8A%E8%BF%94%E3%81%97%E5%B8%8C%E6%9C%9B%E9%80%A3%E7%B5%A1%E5%85%88%EF%BC%88%E9%9B%BB%E8%A9%B1%E3%82%82%E3%81%97%E3%81%8F%E3%81%AF%E3%83%A1%E3%83%BC%E3%83%AB%EF%BC%89%EF%BC%9A%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0A%E3%81%94%E5%85%A5%E5%8A%9B%E5%86%85%E5%AE%B9%E3%82%92%E3%81%94%E7%A2%BA%E8%AA%8D%E3%81%AE%E4%B8%8A%E3%80%81%E3%82%88%E3%82%8D%E3%81%97%E3%81%91%E3%82%8C%E3%81%B0%E9%80%81%E4%BF%A1%E3%81%97%E3%81%A6%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%E3%80%82" class="reservation"><i class="fas fa-desktop"></i>WEB診療予約<i class="fas fa-chevron-circle-right"></i></a></li>
              <li><a href="tel:0338515566" class="phone-number"><i class="fas fa-phone-alt"></i>03-3851-5566</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- Title Banner -->
  <div class="title-banner">
    <div class="page-title">
    <img src="../../icons/treatment_menu.png" alt="スタッフブログ" class="page-title-icon">
      <h1><?php echo $base_title; ?></h1>
    </div>
    <img src="../../images/pc_title_banner03.png" alt="タイトルバナー待合室" class="title-banner-img pc-title-banner">
    <img src="../../images/sp_title_banner03.jpg" alt="タイトルバナー待合室" class="title-banner-img sp-title-banner">
  </div>
  <div class="page-access">
    <p><a href="../../">秋葉原 中川歯科クリニック</a> > <?php echo $base_title; ?> > <strong><?php echo $title; ?></strong></p>
  </div>

  <!-- main start -->
  <section id="blog-post">
    <!-- content start -->
    <div class="container">
      <h3><?php echo $title; ?></h3>
        <?php
          if($image1_Value){
        ?>
        <img src="<?php echo $image1_Src; ?>" alt="" style="float:left;margin-right:15px; margin-bottom:15px; max-width:320px; max-height: 240px;" />
        <?php
          }
        ?>
        <?php echo $text1_Value; ?>
        <div class="center"> <a href="../" class="back-btn"> 戻る </a> </div>
        <!-- *********    /CONTENTS ********* --> 
    </div>
    <!-- content end -->
  </section>
  
  <!-- Clinic Info -->
  <section class="clinic-info">
    <div class="container">
      <div class="clinic-info-wrapper">
        <div class="clinic-info-left">
          <h3>医療法人社団　智正会</h3>
          <h1>中川歯科クリニック</h1>
          <p>〒101-0024<br>東京都千代田区神田和泉町1-3-4 青木ビル2F</p>
          <a class="access-phone"><i class="fas fa-phone-alt"></i>03-3851-5566</a>
        </div>
        <div class="clinic-info-right">
          <table border="1">
            <tr>
              <th class="table-head">診療時間</th>
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th>土</th>
              <th>日(祝)</th>
            </tr>
            <tr>
              <th class="table-head">9:30 〜 13:00</th>
              <td>◯</td>
              <td>◯</td>
              <td>◯</td>
              <td>ー</td>
              <td>◯</td>
              <td>◯</td>
              <td>ー</td>
            </tr>
            <tr>
              <th class="table-head">14:00 〜 19:00</th>
              <td>◯</td>
              <td class="filled-circle">●</td>
              <td>◯</td>
              <td>ー</td>
              <td class="filled-circle">●</td>
              <td class="triangle">△</td>
              <td>ー</td>
            </tr>
          </table>
          <div class="hour-info special-hour">
            <p><span class="filled-circle">●</span> … 14:00 〜 18:00　<span class="triangle">△</span> … 14:00 〜 16:00 の診療時間になります。</p>
          </div>
          <div class="hour-info special-hour-sp">
            <p><span class="filled-circle">●</span> … 14:00 〜 18:00</p>
            <p><span class="triangle">△</span> … 14:00 〜 16:00 の診療時間になります。</p>
          </div>
        </div>
      </div>
    </div>
    <a href="mailto:5566@nakagawadent.net?subject=%E4%B8%AD%E5%B7%9D%E6%AD%AF%E7%A7%91%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF-Web%E8%A8%BA%E7%99%82%E4%BA%88%E7%B4%84%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0&amp;body=%E3%81%93%E3%81%A1%E3%82%89%E4%B8%AD%E5%B7%9D%E6%AD%AF%E7%A7%91%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AFWeb%E8%A8%BA%E7%99%82%E4%BA%88%E7%B4%84%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0%E3%81%AB%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82%0D%0A%E5%8C%BB%E9%99%A2%E3%81%8B%E3%82%89%E3%81%AE%E8%BF%94%E4%BF%A1%E3%82%92%E3%82%82%E3%81%A3%E3%81%A6%E5%8F%97%E4%BB%98%E7%A2%BA%E5%AE%9A%E3%81%A8%E3%81%AA%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82%0D%0A%E3%81%94%E4%BA%88%E7%B4%84%E7%A2%BA%E8%AA%8D%E3%81%AE%E9%9B%BB%E8%A9%B1%E3%82%82%E3%81%97%E3%81%8F%E3%81%AF%E3%83%A1%E3%83%BC%E3%83%AB%E3%81%8C%E5%B1%8A%E3%81%8D%E3%81%BE%E3%81%99%E3%81%AE%E3%81%A7%E3%80%90%40nakagawadent.net%E3%80%91%E3%81%8B%E3%82%89%E3%81%AE%E3%83%A1%E3%83%BC%E3%83%AB%E3%82%92%E5%8F%97%E4%BF%A1%E5%87%BA%E6%9D%A5%E3%82%8B%E3%82%88%E3%81%86%E3%81%AB%E3%80%81%E8%A8%AD%E5%AE%9A%E3%82%92%E3%81%8A%E9%A1%98%E3%81%84%E3%81%97%E3%81%BE%E3%81%99%E3%80%82%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0A%E3%81%8A%E5%90%8D%E5%89%8D%EF%BC%9A%0D%0A%0D%0A%E3%81%94%E4%BD%8F%E6%89%80%EF%BC%9A%0D%0A%0D%0A%E9%9B%BB%E8%A9%B1%E7%95%AA%E5%8F%B7%EF%BC%9A%0D%0A%0D%0A%E3%83%A1%E3%83%BC%E3%83%AB%E3%82%A2%E3%83%89%E3%83%AC%E3%82%B9%EF%BC%9A%0D%0A%0D%0A%E6%B2%BB%E7%99%82%E5%B8%8C%E6%9C%9B%E5%86%85%E5%AE%B9%EF%BC%9A%0D%0A%28%E4%BE%8B.%E3%80%80%E8%99%AB%E6%AD%AF%E6%B2%BB%E7%99%82%E3%80%81%E5%B0%8F%E5%85%90%E6%AD%AF%E7%A7%91%E3%80%81%E6%AD%AF%E5%91%A8%E7%97%85%E3%81%AA%E3%81%A9%29%0D%0A%0D%0A%0D%0A%E4%BA%88%E7%B4%84%E5%B8%8C%E6%9C%9B%E6%97%A5%E6%99%82%EF%BC%9A%E3%80%80%28%E7%AC%AC%E4%B8%89%E5%B8%8C%E6%9C%9B%E3%81%BE%E3%81%A7%E3%81%94%E5%85%A5%E5%8A%9B%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%29%0D%0A%E2%91%A0%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%E2%91%A1%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%E2%91%A2%E3%80%80%E6%9C%88%E3%80%80%E6%97%A5%E3%80%80%E6%99%82%E3%80%80%E3%80%9C%E3%80%80%E6%99%82%0D%0A%0D%0A%0D%0A%E6%8A%98%E3%82%8A%E8%BF%94%E3%81%97%E5%B8%8C%E6%9C%9B%E9%80%A3%E7%B5%A1%E5%85%88%EF%BC%88%E9%9B%BB%E8%A9%B1%E3%82%82%E3%81%97%E3%81%8F%E3%81%AF%E3%83%A1%E3%83%BC%E3%83%AB%EF%BC%89%EF%BC%9A%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0A%E3%81%94%E5%85%A5%E5%8A%9B%E5%86%85%E5%AE%B9%E3%82%92%E3%81%94%E7%A2%BA%E8%AA%8D%E3%81%AE%E4%B8%8A%E3%80%81%E3%82%88%E3%82%8D%E3%81%97%E3%81%91%E3%82%8C%E3%81%B0%E9%80%81%E4%BF%A1%E3%81%97%E3%81%A6%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%E3%80%82" class="btn btn-reserve"><i class="fas fa-desktop"></i>WEB診療予約<i class="fas fa-chevron-circle-right"></i></a>
  </section>

  <!-- Page Top -->
  <p class="page-top-container">
    <a href="#" class="page-top"><img src="../../icons/pagetop.png" alt="ページトップ"></a>
  </p>

  <!-- Footer -->
  <footer>
    <div class="footer-wrap">
      <div class="footer-grid footer-1">
        <div class="menu-title">
          <h4>サイトマップ</h4>
        </div>
        <div class="footer-menu">
            <ul>
              <li><a href="../../"><i class="fas fa-tooth"></i>ホーム</a></li>
              <li><a href="../../clinic"><i class="fas fa-tooth"></i>治療コンセプト</a></li>
              <li><a href="../../clinic/staff.html"><i class="fas fa-tooth"></i>スタッフ紹介</a></li>
              <li><a href="../../clinic/clinic.html"><i class="fas fa-tooth"></i>院内紹介</a></li>
            </ul>
            <ul>
              <li><a href="../../clinic/effort.html"><i class="fas fa-tooth"></i>医療機器紹介</a></li>
              <li><a href="../../clinic/access.html"><i class="fas fa-tooth"></i>アクセス</a></li>
              <!-- <li><a href="#"><i class="fas fa-tooth"></i>当院からのおしらせ</a></li> -->
              <li><a href="../"><i class="fas fa-tooth"></i>ブログ</a></li>
              <!-- <li><a href="#"><i class="fas fa-tooth"></i>WEB予約・LINE予約</a></li> -->
            </ul>
        </div>
      </div>
      <div class="footer-grid footer-2">
        <div class="menu-title">
          <h4>診療案内</h4>
        </div>
        <div class="footer-menu">
          <ul>
            <li><a href="../../treatment/"><i class="fas fa-tooth"></i>診療案内</a></li>
            <li><a href="../../treatment/prevent/"><i class="fas fa-tooth"></i>予防歯科</a></li>
            <li><a href="../../treatment/child/"><i class="fas fa-tooth"></i>小児歯科</a></li>
            <li><a href="../../treatment/esthetic/"><i class="fas fa-tooth"></i>補綴・セラミック治療</a></li>
            <li><a href="../../treatment/implant/"><i class="fas fa-tooth"></i>インプラント治療</a></li>
          </ul>
          <ul>
            <li><a href="../../treatment/general/"><i class="fas fa-tooth"></i>虫歯治療</a></li>
            <li><a href="../../treatment/perio/"><i class="fas fa-tooth"></i>歯周病治療</a></li>
            <li><a href="../../treatment/ortho/"><i class="fas fa-tooth"></i>矯正歯科</a></li>
            <li><a href="../../treatment/whitening/"><i class="fas fa-tooth"></i>ホワイトニング</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-grid footer-3">
        <h6>医療法人社団　智正会</h6>
        <h5>中川歯科クリニック</h5>
        <p class="footer-info-title">住所</p>
        <p class="footer-address">〒101-0024<br>東京都千代田区神田和泉町1-3-4 青木ビル2F</p>
        <p class="footer-info-title">電話</p>
        <p class="access-phone"><i class="fas fa-phone-alt"></i>03-3851-5566</p>
      </div>
    </div>
    <small>Copyright &copy; 2020 医療法人社団 智正会　中川歯科クリニック All Rights Reserved.</small>
  </footer>
  <script src="../../js/pagetop.js" type="text/javascript"></script>
</body>
</html>