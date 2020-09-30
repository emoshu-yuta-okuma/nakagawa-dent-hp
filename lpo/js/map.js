/////////////////////////////////////////////////////////////////////////////////
//
//   GoogleMap設定ファイル　Ver1.20
//     2009/03/14：経路表示実装
//     2009/02/12：外部リンクからのマーカー移動実装
//     2009/01/22：アイコン画像差し替え実装（一括変更のみ）
//     2009/01/01：タブ機能改変・吹き出しなしマーカー、複数MAP設置実装
//     2008/09/11：タブ機能実装・オプション機能追加・リファレンス改訂
//     2008/09/01：説明文をより分かりやすく修正
//     2008/08/23：初期設定値変更・説明文追加
//
/////////////////////////////////////////////////////////////////////////////////

/********************************基本機能設定部分*******************************/

function gLoadExec() {
  
//-------------------------------------------------------------------------------
//                                 必須初期設定
//-------------------------------------------------------------------------------
  // 1）地図を表示する部分で指定したIDと同じ名前を指定
  m_ID = 'map';
  
  // 2）地図のサイズを指定（他所で指定している場合は空白）
  m_Width = '470px';
  m_Height = '400px';
  
  // 3）初期表示場所を指定
  m_Loc = '36.5674044, 139.9168419';
  
  // 4）マーカーを指定（複数配置する場合は間に / を入れる）
  m_Mar = '36.5674044, 139.9168419';
  
  // 5）読み込み時に吹き出しを表示するマーカーを、上のマーカー指定で座標を記入した順番に沿って設定（1番から数え、0はoff）
  pre_Com = 0;

  // 6）地図の拡大率設定：0～19の範囲で数字が大きいほど拡大
  m_Zoom = 16;

  // 7）吹き出しに表示する外部ファイルを、地図表示ページからの相対パスで指定
  m_Com = "gmap.html";


//-------------------------------------------------------------------------------
//                               経路表示設定
//-------------------------------------------------------------------------------

  // 8）座標と座標を結んで、経路表示　例：m_Lin[線の本数（0が一本目）] = '[線の色 , 線の太さ , 線の透明度] 初めの座標 / 次の座標 / 次の座標・・・最後の座標';
  //m_Lin[0] = '[#ff0000,8,80%] 35.657817, 139.701416 / 35.657651, 139.701194 / 35.657436, 139.700593 / 35.657074, 139.700687 / 35.656756, 139.699767 / 35.656383, 139.698629 / 35.656379, 139.698423 / 35.656071, 139.697463 / 35.655995, 139.697345 / 35.655405,139.695223';

//-------------------------------------------------------------------------------
//                               吹き出しタブ設定
//-------------------------------------------------------------------------------
  // 9）吹き出しにタブを使用（1でon、0でoff）
  //   吹き出し設定ファイルで、divタグとdivタグの間に空行（改行ではない隙間の行）がくるまでが同じ吹き出し・別タブ
  //   空行を挟むと別の吹き出しに切り替わる
  m_Tab = 0;

  // 10）divタグにtitle属性がない場合に付けるタブの名前
  dmy_tab = '詳細';

//-------------------------------------------------------------------------------
//                                 アイコン画像設定
//-------------------------------------------------------------------------------
  // 11）アイコンの画像を変更する場合はiconを記述（空白でデフォルト）
  ico = '';
  //ico = 'img/arrow1.png';

  // 12）アイコンの画像サイズ（正方形の一辺の長さ:px）
  ico_size = '32';

  // 13）アイコンの先端が画像内のどの部分から出てるか
  //    ┌─┬─┬─┐
  //    │１│２│３│
  //    ├─┼─┼─┤
  //    │４│５│６│
  //    ├─┼─┼─┤
  //    │７│８│９│アイコンの先端が位置する部分の数字を指定
  //    └─┴─┴─┘
  ico_pos = 7;

//-------------------------------------------------------------------------------
//                                   オプション
//-------------------------------------------------------------------------------
  // 14）地図のコントロールパネルを表示（1で小、2で中、3で大、0でoff）
  m_Con = 2;
  
  // 15）地図の種類（航空写真など）を切り替えるパネルを表示（1でon、0でoff）
  m_Typ = 0;

  // 16）地図の縮尺を左下に表示（1でon、0でoff）
  m_Sca = 0;

  // 17）地図の拡大縮小をマウスホイールで可能（1でon、0でoff）
  m_Whl = 0;

  // 18）地図の拡大縮小をスムーズ化（1でon、0でoff）
  m_Coz = 1;

  // 19）地図の右下に縮小地図を表示（1でon、0でoff）
  m_Min = 0;

  // 20）縮小地図を表示する場合のサイズの指定（m_MinX：横幅・m_MinY：縦幅、単位は自動的にpxがつきます）
  m_MinX = 100;
  m_MinY = 100;




  /*******************************以下設定部分のため改変不可******************************/
  
  //地図の表示方法を変更
  m_style = document.getElementById(m_ID).style;
  
  if(m_Width){
    m_style.width = m_Width;
    m_style.overflow = "hidden";
  }
  if(m_Height){
    m_style.height = m_Height;
  }
  sta_Tag = "<div";
  end_Tag = "</div>";
  //正規表現オブジェクト
  LF = "\n";
  find_LF = new RegExp(LF,"g");
  
  //座標を確定
  set_map = new GMap2(document.getElementById(m_ID));
  set_Loc = m_Loc.split(',');
  arr_Mar = m_Mar.split('/');
  count_Mar = m_Mar.split('/').length;
  icon = new GIcon();
  ico_x = 1;
  ico_y = 1;
  switch(ico_pos){
    case 1:
      ico_x = ico_size;
      ico_y = ico_size;
      break;
    case 2:
      ico_x = 2;
      ico_y = ico_size;
      break;
    case 3:
      ico_y = ico_size;
      break;
    case 4:
      ico_x = ico_size;
      ico_y = 2;
      break;
    case 5:
      ico_x = 2;
      ico_y = 2;
      break;
    case 6:
      ico_y = 2;
      break;
    case 7:
      ico_x = ico_size;
      ico_y = 1;
      break;
    case 8:
      ico_x = 2;
      break;
    default:
      break;
  }
  icon.image = ico;
  icon.iconSize = new GSize(ico_size, ico_size);
  icon.iconAnchor = new GLatLng(ico_size/ico_y,ico_size/ico_x);
  icon.infoWindowAnchor = new GPoint(0,0);
  
  /** 地図表示部分 **/

  if (GBrowserIsCompatible()) {
    set_map.setCenter(new GLatLng(set_Loc[0],set_Loc[1]), m_Zoom);
    
    //外部ファイルの読み込み
    req[m_ID] = GXmlHttp.create();
    req[m_ID].open("GET", m_Com, true);
    req[m_ID].onreadystatechange = function () {
      if (req[m_ID].readyState == 4) {
        res = req[m_ID].responseText;
        if(m_Tab) {
          set_Com = res.split(end_Tag+LF+LF);
        }else{
          set_Com = res.split(end_Tag);
        }
        for( i=0; i < count_Mar; i++ ) {
          count_Tab[i] = set_Com[i].match(sta_Tag).length;
          res_Mar += count_Tab[i];
          if(res_Mar > count_Mar) {
            res_Mar = count_Mar;
          }
          
          //マーカーを表示
          if(i < res_Mar) {
            arr = arr_Mar[i].split( ',' );
            point[i] = new GLatLng( arr[0], arr[1] );
            if(ico) {
              marker[i] = new GMarker(point[i],icon);
            }else{
              marker[i] = new GMarker(point[i]);
            }
            set_map.addOverlay(marker[i]);
          }
          
          //マーカーの初期設定
          set_Com[i] = set_Com[i].replace(find_LF,"");
          if (!set_Com[i].match( end_Tag+"$" )) {
            set_Com[i] = set_Com[i]+end_Tag;
          }
          tab_Com = set_Com[i].split(end_Tag);
          for(m=0; tab_Com[m];m++){
            if (tab_Com[m].match(/title="([^"])([^"]*)/i)) {
              tab_Ind[m] = RegExp.$1 + RegExp.$2;
            }else{
              tab_Ind[m] = dmy_tab;
            }
          }
          
          //マーカークリック時の動作
          tabs[i] = [new GInfoWindowTab(tab_Ind[0],tab_Com[0])];
          for ( j=1; tab_Com[j]; j++ ){
              tabs[i] = tabs[i].concat(new GInfoWindowTab(tab_Ind[j],tab_Com[j]));
          }
          if (!set_Com[i].match(/<div><\/div>/i)) {
            if(m_Tab) {
              clickTab ( marker[i], point[i], tabs[i], set_map)
            }else{
              clickMap ( marker[i], set_Com[i] )
            }
          }
          //マーカーの初期表示
          if(pre_Com > 0){
            if(m_Tab) {
              set_map.openInfoWindowTabsHtml(point[pre_Com - 1],tabs[pre_Com - 1]);
            }else{
              marker[pre_Com - 1].openInfoWindowHtml(set_Com[pre_Com - 1]);
            }
          }
        }
      }
    };
    req[m_ID].send(null);
    
    //オプション設定
    if(m_Lin[0]){
      for(var n=0; m_Lin[n]; n++){
        lines(n);
      }
    }

    if(m_Con == 1){
      set_map.addControl(new GSmallZoomControl());
    }else if(m_Con == 2){
      set_map.addControl(new GSmallMapControl());
    }else if(m_Con == 3){
      set_map.addControl(new GLargeMapControl());
    }
    if (m_Typ) { set_map.addControl(new GMapTypeControl()); }
    if (m_Sca) { set_map.addControl(new GScaleControl()); }
    if (m_Whl) { set_map.enableScrollWheelZoom(); }
    if (m_Coz) { set_map.enableContinuousZoom(); }
    if (m_Min) {
      miniMap = new GOverviewMapControl(new GSize(m_MinX,m_MinY));
      set_map.addControl(miniMap);
    }
  }
}

function gLoad() {
  //初期化
  point = new Array();
  set_Lin = new Array();
  marker = new Array();
  m_Lin = new Array();
  res_Mar = 0;
  tmp_Mar = new Array();
  tab_Ind = new Array();
  tabs = new Array();
  count_Tab = new Array();
  req = new Array();
  gLoadExec();
}


//各マーカークリック時の動作設定
function clickMap ( m, c ) {
  GEvent.addListener(m, "click", function() {
    m.openInfoWindowHtml(c);
  });
}

//各マーカークリック時の動作設定(Tab時)
function clickTab ( m, k , t, n) {
  GEvent.addListener(m, "click", function() {
    n.openInfoWindowTabsHtml(k,t);
  });
}

//外部リンクからの表示位置指定
function gmove(l){
  l--;
  move_loc = arr_Mar[l].split(',');
  if(!m_Tab){
    marker[l].openInfoWindowHtml(set_Com[l]);
    set_map.panTo(new GLatLng(move_loc[0],move_loc[1]));
  }
}

//経路表示

function lines(ad){
  slice_Lin = m_Lin[ad].split(']');
  opt_Lin = slice_Lin[0].split(',');
  opt_Lin[0] = opt_Lin[0].slice(1);
  get_Lin = slice_Lin[1].split('/');
  count_Lin = m_Lin[ad].split('/').length;
  for( li=0; li < count_Lin; li++){
    arr_Lin = get_Lin[li].split( ',' );
    set_Lin.push(new GLatLng(arr_Lin[0],arr_Lin[1]));
  }
  color_Lin = opt_Lin[0];
  weight_Lin = opt_Lin[1];
  alpha_Lin = opt_Lin[2];
  alpha_Lin = alpha_Lin.substr(0,alpha_Lin.length-1);
  alpha_Lin = alpha_Lin/100;
  polyline = new GPolyline(set_Lin,color_Lin,weight_Lin,alpha_Lin);
  set_map.addOverlay(polyline);
  set_Lin = new Array();
}

//「onload」イベントを疑似的に再現
addListener = function(elm, type, func) {
  if (elm.addEventListener) {
    elm.addEventListener(type, func, false);
  }
  else if (elm.attachEvent) {
    elm.attachEvent('on' + type, func);
  }
};
addListener(window, "load", gLoad);
