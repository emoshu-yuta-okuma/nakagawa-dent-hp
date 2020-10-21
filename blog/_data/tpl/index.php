<?php

	$setting=unserialize(@file_get_contents(DATA_DIR.'/setting/overnotes.dat'));
	ini_set('mbstring.http_input', 'pass');
	parse_str($_SERVER['QUERY_STRING'],$_GET);
	$keyword=isset($_GET['k'])?trim($_GET['k']):'';
	$category=isset($_GET['c'])?trim($_GET['c']):'';
	$page=isset($_GET['p'])?trim($_GET['p']):'';
	$base_title = !empty($setting['title'])? $setting['title'] : 'OverNotes';

?><?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $base_title; ?>｜秋葉原駅から徒歩3分の歯医者【中川歯科クリニック】千代田区秋葉原の歯医者</title>
	<meta name="description"
		content="<?php echo $base_title; ?>,千代田区秋葉原の「中川歯科クリニック」では、感染対策を徹底しており、平日はもちろん土曜日も診療しています。秋葉原駅から徒歩3分という通いやすい歯医者です。歯を削らない治療、神経を残す治療に力を入れており、長きにわたってお口の健康をサポートします。" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<link rel="stylesheet" href="../css/normalize.css" type="text/css">
  <link rel="stylesheet" href="../css/blog.css" type="text/css">
  <link rel="stylesheet" href="../css/common.css" type="text/css">
  <link rel="stylesheet" href="../css/common-responsive.css" type="text/css">
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
      <a href="mailto:5566@nakagawadent.net?subject=中川歯科クリニック-Web診療予約フォーム&body=こちら中川歯科クリニックWeb診療予約フォームになります。%0D%0A医院からの返信をもって受付確定となります。%0D%0Aご予約確認の電話もしくはメールが届きますので【@nakagawadent.net】からのメールを受信出来るように、設定をお願いします。%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0Aお名前：%0D%0A%0D%0Aご住所：%0D%0A%0D%0A電話番号：%0D%0A%0D%0Aメールアドレス：%0D%0A%0D%0A治療希望内容：%0D%0A(例.%20虫歯治療、小児歯科、歯周病など)%0D%0A%0D%0A予約希望日時：　(第三希望までご入力ください)%0D%0A①　月　日　時　〜　時%0D%0A②　月　日　時　〜　時%0D%0A③　月　日　時　〜　時%0D%0A%0D%0A折り返し希望連絡先（電話もしくはメール）：%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0Aご入力内容をご確認の上、よろしければ送信してください。" class="reservation"><i class="fas fa-desktop"></i>WEB診療予約<i class="fas fa-chevron-circle-right"></i></a>
        <a href="tel:0338515566" class="phone-number"><i class="fas fa-phone-alt"></i>03-3851-5566</a>
      </div>
    </div>
    <div class="header-title">
      <div class="clinic-name">
        <a href="../">
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
        <li><a href="../">ホーム</a></li>
        <li><a href="../clinic/">治療コンセプト</a></li>
        <li><a href="../treatment/">治療案内</a></li>
        <li><a href="../clinic/effort.html">医療機器</a></li>
        <li><a href="../clinic/staff.html">スタッフ紹介</a></li>
        <li><a href="../clinic/clinic.html">院内紹介</a></li>
        <li><a href="../clinic/access.html">アクセス</a></li>
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
              <li><a href="../">ホーム</a></li>
              <li><a href="../clinic/">治療コンセプト</a></li>
              <li><a href="../treatment/">治療案内</a></li>
              <li><a href="../clinic/effort.html">医療機器</a></li>
              <li><a href="../clinic/staff.html">スタッフ紹介</a></li>
              <li><a href="../clinic/clinic.html">院内紹介</a></li>
              <li><a href="../clinic/access.html">アクセス</a></li>
              <li><a href="mailto:5566@nakagawadent.net?subject=中川歯科クリニック-Web診療予約フォーム&body=こちら中川歯科クリニックWeb診療予約フォームになります。%0D%0A医院からの返信をもって受付確定となります。%0D%0Aご予約確認の電話もしくはメールが届きますので【@nakagawadent.net】からのメールを受信出来るように、設定をお願いします。%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0Aお名前：%0D%0A%0D%0Aご住所：%0D%0A%0D%0A電話番号：%0D%0A%0D%0Aメールアドレス：%0D%0A%0D%0A治療希望内容：%0D%0A(例.%20虫歯治療、小児歯科、歯周病など)%0D%0A%0D%0A予約希望日時：　(第三希望までご入力ください)%0D%0A①　月　日　時　〜　時%0D%0A②　月　日　時　〜　時%0D%0A③　月　日　時　〜　時%0D%0A%0D%0A折り返し希望連絡先（電話もしくはメール）：%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0Aご入力内容をご確認の上、よろしければ送信してください。" class="reservation"><i class="fas fa-desktop"></i>WEB診療予約<i class="fas fa-chevron-circle-right"></i></a></li>
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
      <img src="../icons/treatment_menu.png" alt="スタッフブログ" class="page-title-icon">
      <h1><?php echo $base_title; ?></h1>
    </div>
    <img src="../images/pc_title_banner03.png" alt="タイトルバナー待合室" class="title-banner-img pc-title-banner">
    <img src="../images/sp_title_banner03.jpg" alt="タイトルバナー待合室" class="title-banner-img sp-title-banner">
  </div>
  <div class="page-access">
    <p><a href="../">秋葉原 中川歯科クリニック</a> > <strong><?php echo $base_title; ?></strong></p>
  </div>

  <!-- Blog -->
  <section id="blog">
    <!-- main start -->
    <div class="container">
      <h3><?php echo $base_title; ?></h3>
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
          <li> <a href="./<?php echo $url; ?>"><?php echo $title; ?></a></li>
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
    </div>
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
    <a href="mailto:5566@nakagawadent.net?subject=中川歯科クリニック-Web診療予約フォーム&body=こちら中川歯科クリニックWeb診療予約フォームになります。%0D%0A医院からの返信をもって受付確定となります。%0D%0Aご予約確認の電話もしくはメールが届きますので【@nakagawadent.net】からのメールを受信出来るように、設定をお願いします。%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0Aお名前：%0D%0A%0D%0Aご住所：%0D%0A%0D%0A電話番号：%0D%0A%0D%0Aメールアドレス：%0D%0A%0D%0A治療希望内容：%0D%0A(例.%20虫歯治療、小児歯科、歯周病など)%0D%0A%0D%0A予約希望日時：　(第三希望までご入力ください)%0D%0A①　月　日　時　〜　時%0D%0A②　月　日　時　〜　時%0D%0A③　月　日　時　〜　時%0D%0A%0D%0A折り返し希望連絡先（電話もしくはメール）：%0D%0A%0D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0D%0A%0D%0Aご入力内容をご確認の上、よろしければ送信してください。" class="btn btn-reserve"><i class="fas fa-desktop"></i>WEB診療予約<i class="fas fa-chevron-circle-right"></i></a>
  </section>

  <!-- Page Top -->
  <p class="page-top-container">
    <a href="#" class="page-top"><img src="../icons/pagetop.png" alt="ページトップ"></a>
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
              <li><a href="../"><i class="fas fa-tooth"></i>ホーム</a></li>
              <li><a href="../clinic/"><i class="fas fa-tooth"></i>治療コンセプト</a></li>
              <li><a href="../clinic/staff.html"><i class="fas fa-tooth"></i>スタッフ紹介</a></li>
              <li><a href="../clinic/clinic.html"><i class="fas fa-tooth"></i>院内紹介</a></li>
            </ul>
            <ul>
              <li><a href="../clinic/effort.html"><i class="fas fa-tooth"></i>医療機器紹介</a></li>
              <li><a href="../clinic/access.html"><i class="fas fa-tooth"></i>アクセス</a></li>
              <!-- <li><a href="#"><i class="fas fa-tooth"></i>当院からのおしらせ</a></li> -->
              <li><a href="./"><i class="fas fa-tooth"></i>ブログ</a></li>
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
            <li><a href="../treatment/"><i class="fas fa-tooth"></i>診療案内</a></li>
            <li><a href="../treatment/prevent/"><i class="fas fa-tooth"></i>予防歯科</a></li>
            <li><a href="../treatment/child/"><i class="fas fa-tooth"></i>小児歯科</a></li>
            <li><a href="../treatment/esthetic/"><i class="fas fa-tooth"></i>補綴・セラミック治療</a></li>
            <li><a href="../treatment/implant/"><i class="fas fa-tooth"></i>インプラント治療</a></li>
          </ul>
          <ul>
            <li><a href="../treatment/general/"><i class="fas fa-tooth"></i>虫歯治療</a></li>
            <li><a href="../treatment/perio/"><i class="fas fa-tooth"></i>歯周病治療</a></li>
            <li><a href="../treatment/ortho/"><i class="fas fa-tooth"></i>矯正歯科</a></li>
            <li><a href="../treatment/whitening/"><i class="fas fa-tooth"></i>ホワイトニング</a></li>
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
  <script src="../js/pagetop.js" type="text/javascript"></script>
</body>
</html>