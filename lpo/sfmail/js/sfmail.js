<!--
	//----------------------------------------------
	// 現在フォーカスがあるオブジェクトを取得
	//----------------------------------------------
	//head内にあるjqueryで取得
	var focuselements;
	function set(obj){
		focuselements = obj;
	}
	
	
	function input(event){
		if (document.all) {
			event = window.event;
		}
		if(event.keyCode == 13){
			enter_next(document.getElementById('fmail'));
		}
	}
	
	
	function enter_next(obj){
		//----------------------------------------------
		// Enterキーで進む
		//----------------------------------------------
		var flag;
		var movefocus;
		
		// 画面リフレッシュ直後は値セットされていないので、処理を終わらせる
		if(!focuselements){
			return false;
		}
		
		// submitボタンにはname値を設定していないので
		// name値が存在するものだけ、次へ次へ進む
		if(focuselements.name){
			for(i=0;i<obj.length;i++){
				if(flag){
					movefocus = obj.elements[i];
					flag = 0;
				}
				if(obj.elements[i] == focuselements){
					flag = 1;
				}
			}
			movefocus.focus();
			return false;
		}
		//----------------------------------------------
	}
	
	//----------------------------------------------
	// 必須チェック
	//----------------------------------------------
	var conservationKey = "[resume]";
	var mustId = "(必須)";
	var construct = new Array("－","～");
	var enabled_color = "#000000";
	
	function sendmail(obj){
		var caution = "";
		var errorflag = 0;
		var must = mustId;
		var error_element_number = new Array();
		//メールアドレスのname値
		var email = 'メールアドレス';
		var email_address = "";
		var checkflag = new Object();
		
		//id=fmailの中にあるエレメントの数だけ繰り返す
		for(i=0;i<obj.length;i++){
			var elementType;
			var errortext;
			var must_flag;
			
			//fieldsetタグがエレメントとして認識されてしまうため、回避処理
			//IE7以前のみ、obj.elements[i]を正常に取得できない為、下記条件文はスルー
			//fieldsetタグにname値の設定はない為、スルー
			obj_flag = 0;
			if(obj.elements[i].name){
				obj_flag = 1;
			}
			
			//fieldset除外
			if(obj_flag == 1){
				elementType = obj.elements[i].type;
				errortext = obj.elements[i].name.replace(must,"");
				must_flag = obj.elements[i].name.indexOf(must,0);
				
				if(!checkflag[obj.elements[i].name]){
					if(errortext == email){
						email_address = obj.elements[i].value;
						if(must_flag > -1){
							chkMail = obj.elements[i].value;
							check = /.+@.+\..+/;
							if (!chkMail.match(check)){
								obj.elements[i].style.backgroundColor='#FFEEEE';
								obj.elements[i].style.color='#FF0000';
								obj.elements[i].style.borderWidth = '1px';
								obj.elements[i].style.borderStyle = 'solid';
								obj.elements[i].style.borderColor = '#7f9db9';
								error_element_number.push(i);
								caution = caution + email + "が正しくありません。\n";
								errorflag = 2;
							}
							else{
								obj.elements[i].style.backgroundColor='#FFFFFF';
								obj.elements[i].style.color='#000000';
								obj.elements[i].style.borderWidth = '1px';
								obj.elements[i].style.borderStyle = 'solid';
								obj.elements[i].style.borderColor = '#7f9db9';
							}
						}
						else if(obj.elements[i].value != ""){
							chkMail = obj.elements[i].value;
							check = /.+@.+\..+/;
							if (!chkMail.match(check)){
								obj.elements[i].style.backgroundColor='#FFEEEE';
								obj.elements[i].style.color='#FF0000';
								obj.elements[i].style.borderWidth = '1px';
								obj.elements[i].style.borderStyle = 'solid';
								obj.elements[i].style.borderColor = '#7f9db9';
								error_element_number.push(i);
								caution = caution + email + "が正しくありません。\n";
								errorflag = 2;
							}
							else{
								obj.elements[i].style.backgroundColor='#FFFFFF';
								obj.elements[i].style.color='#000000';
								obj.elements[i].style.borderWidth = '1px';
								obj.elements[i].style.borderStyle = 'solid';
								obj.elements[i].style.borderColor = '#7f9db9';
							}
						}
					}
					else if(errortext == email + "2"){
						if(email_address != ""){
							if(email_address != obj.elements[i].value){
								obj.elements[i].style.backgroundColor='#FFEEEE';
								obj.elements[i].style.color='#FF0000';
								obj.elements[i].style.borderWidth = '1px';
								obj.elements[i].style.borderStyle = 'solid';
								obj.elements[i].style.borderColor = '#7f9db9';
								error_element_number.push(i);
								caution = caution + "確認用" + email + "と一致しません。\n";
								errorflag = 3;
							}
							else{
								obj.elements[i].style.backgroundColor='#FFFFFF';
								obj.elements[i].style.color='#000000';
								obj.elements[i].style.borderWidth = '1px';
								obj.elements[i].style.borderStyle = 'solid';
								obj.elements[i].style.borderColor = '#7f9db9';
							}
						}
					}
					else if(must_flag > -1){
						if(elementType == "text" || elementType == "textarea"){
							if(obj.elements[i].value == ""){
								obj.elements[i].style.backgroundColor='#FFEEEE';
								obj.elements[i].style.borderWidth = '1px';
								obj.elements[i].style.borderStyle = 'solid';
								obj.elements[i].style.borderColor = '#7f9db9';
								error_element_number.push(i);
								caution = caution + errortext +"が未入力です。\n";
								errorflag = 1;
							}
							else{
								obj.elements[i].style.backgroundColor='#FFFFFF';
							}
						}
						else if(elementType == "checkbox" || elementType == "radio"){
							if(obj.elements[obj.elements[i].name].length > 0){
								var checkbox_checked_count = 0;
								for(ii=0;ii<obj.elements[obj.elements[i].name].length;ii++){
									if(obj.elements[obj.elements[i].name][ii].checked)
										checkbox_checked_count++;
								}
								if(checkbox_checked_count < 1){
									caution = caution + errortext +"がチェックされていません。\n";
									error_element_number.push(i);
									errorflag = 1;
								}
							}
							else if(!obj.elements[i].checked){
								caution = caution + errortext +"がチェックされていません。\n";
								error_element_number.push(i);
								errorflag = 1;
							}
						}
						else if(elementType == "select-multiple" || elementType == "select-one"){
							if(obj.elements[i].selectedIndex > -1){
								var selectCnt = obj.elements[i].selectedIndex;
								if(obj.elements[i].options[selectCnt].value == ""){
									error_element_number.push(i);
									caution = caution + errortext +"が選択されていません。\n";
									errorflag = 1;
								}
							}
							else{
								error_element_number.push(i);
								caution = caution + errortext +"が選択されていません。\n";
								errorflag = 1;
							}
						}
					}
				}
			}//fieldset除外
			checkflag[obj.elements[i].name] = 1;
		}
		
		if(errorflag == 0){
//			if(confirm("送信してもよろしいですか？")){
//				for(i=0;i<obj.length ;i++){
//					obj.elements[i].name = obj.elements[i].name.replace(must,"");
//					if(obj.elements[i].type == "submit"){
//						obj.elements[i].disabled = true;
//					}
//				}
//				return true;
//			}
//			else{
//				return false;
//			}
			obj.submit();
		}
		else{
			caution = "TYPE "+errorflag+" ERROR\n"+caution;
			alert(caution);
			obj.elements[error_element_number[0]].focus();
			return false;
		}
	}
	function keepField(){
		var setValue = "";
		var obj = mfObj;
		var elementsList = new Array();
		for(i=0;i<obj.length;i++){
			if(obj.elements[i].type == "checkbox" || obj.elements[i].type == "radio"){
				if(obj.elements[i].checked)
					setValue += "1" + "&";
				else
					setValue += "0" + "&";
			}
			else if(obj.elements[i].type == "text" || obj.elements[i].type == "textarea"){
				setValue += escape(obj.elements[i].value) + "&";
			}
			else if(obj.elements[i].type == "select-multiple"){
				var selected_multiple = new Array();
				for(multiplect=0;multiplect<obj.elements[i].length;multiplect++){
					if(obj.elements[i].options[multiplect].selected)
						selected_multiple.push(multiplect);
				}
				setValue += selected_multiple.join(",") + "&";
			}
			else if(obj.elements[i].type == "select-one"){
				setValue += obj.elements[i].selectedIndex + "&";
			}
		}
		setValue = conservationKey + setValue + conservationKey;
		mfp_setCookie("fmail",setValue)
	}
	function mfp_setCookie(name,val){
		var current_dir = location.pathname;
		var current_dirs = new Array();
		current_dirs = current_dir.split("/");
		if(current_dirs[current_dirs.length-1] != ""){
			current_dirs[current_dirs.length-1] = "";
			current_dir = current_dirs.join("/");
		}
		document.cookie = name + "=" + val + "; path=" + current_dir + "; expires=";
	}
	function formatCharset(str){
		var befor = new Array("ｶﾞ","ｷﾞ","ｸﾞ","ｹﾞ","ｺﾞ","ｻﾞ","ｼﾞ","ｽﾞ","ｾﾞ","ｿﾞ","ﾀﾞ","ﾁﾞ",
			"ﾂﾞ","ﾃﾞ","ﾄﾞ","ﾊﾞ","ﾋﾞ","ﾌﾞ","ﾍﾞ","ﾎﾞ","ﾊﾟ","ﾋﾟ","ﾌﾟ","ﾍﾟ","ﾎﾟ","ｦ","ｧ",
			"ｨ","ｩ","ｪ","ｫ","ｬ","ｭ","ｮ","ｯ","ｰ","ｱ","ｲ","ｳ","ｴ","ｵ","ｶ","ｷ","ｸ","ｹ",
			"ｺ","ｻ","ｼ","ｽ","ｾ","ｿ","ﾀ","ﾁ","ﾂ","ﾃ","ﾄ","ﾅ","ﾆ","ﾇ","ﾈ","ﾉ","ﾊ","ﾋ",
			"ﾌ","ﾍ","ﾎ","ﾏ","ﾐ","ﾑ","ﾒ","ﾓ","ﾔ","ﾕ","ﾖ","ﾗ","ﾘ","ﾙ","ﾚ","ﾛ","ﾜ","ﾝ",
			'Ａ','Ｂ','Ｃ','Ｄ','Ｅ','Ｆ','Ｇ','Ｈ','Ｉ','Ｊ','Ｋ','Ｌ','Ｍ','Ｎ','Ｏ','Ｐ','Ｑ','Ｒ','Ｓ','Ｔ','Ｕ','Ｖ','Ｗ','Ｘ','Ｙ','Ｚ','ａ','ｂ','ｃ','ｄ','ｅ','ｆ','ｇ','ｈ','ｉ','ｊ','Ｋ','ｌ','ｍ','ｎ','ｏ','ｐ','ｑ','ｒ','ｓ','ｔ','ｕ','ｖ','ｗ','ｘ','ｙ','ｚ','＠','０','１','２','３','４','５','６','７','８','９','．',
			'①','②','③','④','⑤','⑥','⑦','⑧','⑨','⑩','Ⅰ','Ⅱ','Ⅲ','Ⅳ','Ⅴ','Ⅵ','Ⅶ','Ⅷ','Ⅸ','Ⅹ','㈱','㈲','～','－');
		var after = new Array("ガ","ギ","グ","ゲ","ゴ","ザ","ジ","ズ","ゼ","ゾ","ダ","ヂ",
			"ヅ","デ","ド","バ","ビ","ブ","ベ","ボ","パ","ピ","プ","ペ","ポ","ヲ","ァ",
			"ィ","ゥ","ェ","ォ","ャ","ュ","ョ","ッ","ー","ア","イ","ウ","エ","オ","カ",
			"キ","ク","ケ","コ","サ","シ","ス","セ","ソ","タ","チ","ツ","テ","ト","ナ",
			"ニ","ヌ","ネ","ノ","ハ","ヒ","フ","ヘ","ホ","マ","ミ","ム","メ","モ","ヤ",
			"ユ","ヨ","ラ","リ","ル","レ","ロ","ワ","ン",
			'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','@','0','1','2','3','4','5','6','7','8','9','.',
			'(1)','(2)','(3)','(4)','(5)','(6)','(7)','(8)','(9)','(10)','(1)','(2)','(3)','(4)','(5)','(6)','(7)','(8)','(9)','(10)','(株)','(有)','<_hotfix0_>','<_hotfix1_>');
		for(i=0;i<befor.length;i++){
			var temp = new Array();
			temp = str.split(befor[i]);
			str = temp.join(after[i]);
		}
		var temp = new Array();
		temp = str.split("\n");
		for(i=0;i<temp.length;i++){
			if(temp[i].length > 64){
				var chars = new Array();
				chars = temp[i].split("");
				for(ii=63;ii<chars.length;ii+=63){
					chars[ii] += "\n";
				}
				temp[i] = chars.join("");
			}
		}
		return temp.join("\n");
	}
	function debug(){
		alert("this");
	}
	var mfObj = document.forms["fmail"];
	var tagObjects = document.getElementsByTagName("tr");
	for(i=0;i < tagObjects.length;i++) {
		if(i % 2 == 1 && tagObjects[i].className == "mfptr"){
			tagObjects[i].style.backgroundColor = "#E8EEF9";
		}
	}
	if(mfObj){
		for(i=0;i<mfObj.length;i++){
			if(mfObj.elements[i].size){
				if(mfObj.elements[i].type == "text")
					mfObj.elements[i].style.width = (mfObj.elements[i].size * 6) + "px";
			}
			if(mfObj.elements[i].rows)
				mfObj.elements[i].style.height = (mfObj.elements[i].rows * 12) + "px";
			if(mfObj.elements[i].cols)
				mfObj.elements[i].style.width = (mfObj.elements[i].cols * 6) + "px";
		}
	}
	var formId = 'fmail';
	var obj = document.forms[formId];
	var valueList = new Array();
	var selectedLinks = new Array();
	var elcount = 0;
	if(document.cookie && document.cookie.indexOf(conservationKey) > -1){
		valueList = document.cookie.split(conservationKey);
		valueList = valueList[1].split("&");
		var checked_count = 0;
		for(i=0;i<obj.length;i++){
			if(obj.elements[i].type != "hidden" && obj.elements[i].type != "file" && obj.elements[i].type != "button" && obj.elements[i].type != "submit" && obj.elements[i].type != "image"){
				checked_count++;
			}
		}
		if(valueList.length == (checked_count)){
			
			for(i=0;i<obj.length;i++){
				if(obj.elements[i].type == "checkbox" || obj.elements[i].type == "radio"){
					if(valueList[elcount] == 1){
						obj.elements[i].checked = true;
					}
					else{
						obj.elements[i].checked = false;
					}
					elcount++;
				}
				else if(obj.elements[i].type == "text" || obj.elements[i].type == "textarea"){
					obj.elements[i].value = unescape(valueList[elcount]);
					elcount++;
				}
				else if(obj.elements[i].type == "select-multiple"){
					var selected_multiple = new Array();
					selected_multiple = valueList[elcount].split(",");
					for(multiplect=0;multiplect<selected_multiple.length;multiplect++){
						if(selected_multiple[multiplect] != ""){
							obj.elements[i].options[selected_multiple[multiplect]].selected = true;
						}
					}
					elcount++;
				}
				else if(obj.elements[i].type == "select-one"){
					obj.elements[i].options[valueList[elcount]].selected = true;
					elcount++;
				}
			}
		}
	}
	
	
	
	//----------------------------------------------
	// フリガナ・ふりがな
	//----------------------------------------------
	function furiganaajust(str_id,flag){
		if(flag == 'katakana'){
			//カタカナの時
			var single_char = new Array('ｧ','ｨ','ｩ','ｪ','ｫ',
																	'ｯ',
																	'ｬ','ｭ','ｮ',
																	'ｳﾞ',
																	'ｶﾞ','ｷﾞ','ｸﾞ','ｹﾞ','ｺﾞ',
																	'ｻﾞ','ｼﾞ','ｽﾞ','ｾﾞ','ｿﾞ',
																	'ﾀﾞ','ﾁﾞ','ﾂﾞ','ﾃﾞ','ﾄﾞ',
																	'ﾊﾞ','ﾋﾞ','ﾌﾞ','ﾍﾞ','ﾎﾞ',
																	'ﾊﾟ','ﾋﾟ','ﾌﾟ','ﾍﾟ','ﾎﾟ',
																	'ｱ','ｲ','ｳ','ｴ','ｵ',
																	'ｶ','ｷ','ｸ','ｹ','ｺ',
																	'ｻ','ｼ','ｽ','ｾ','ｿ',
																	'ﾀ','ﾁ','ﾂ','ﾃ','ﾄ',
																	'ﾅ','ﾆ','ﾇ','ﾈ','ﾉ',
																	'ﾊ','ﾋ','ﾌ','ﾌ','ﾍ',
																	'ﾏ','ﾐ','ﾑ','ﾒ','ﾓ',
																	'ﾔ','ﾕ','ﾖ',
																	'ﾗ','ﾘ','ﾙ','ﾚ','ﾛ',
																	'ﾜ','ｦ','ﾝ','ﾟ','-','ｰ',
																	'ぁ','ぃ','ぅ','ぇ','ぉ',
																	'っ',
																	'ゃ','ゅ','ょ',
																	'ぶ',
																	'が','ぎ','ぐ','げ','ご',
																	'ざ','じ','ず','ぜ','ぞ',
																	'だ','ぢ','づ','で','ど',
																	'ば','び','ぶ','べ','ぼ',
																	'ぱ','ぴ','ぷ','ぺ','ぽ',
																	'あ','い','う','え','お',
																	'か','き','く','け','こ',
																	'さ','し','す','せ','そ',
																	'た','ち','つ','て','と',
																	'な','に','ぬ','ね','の',
																	'は','ひ','ふ','ふ','へ',
																	'ま','み','む','め','も',
																	'や','ゆ','よ',
																	'ら','り','る','れ','ろ',
																	'わ','を','ん');
			var double_char = new Array('ァ','ィ','ゥ','ェ','ォ',
																	'ッ',
																	'ャ','ュ','ョ',
																	'ヴ',
																	'ガ','ギ','グ','ゲ','ゴ',
																	'ザ','ジ','ズ','ゼ','ゾ',
																	'ダ','ヂ','ヅ','デ','ド',
																	'バ','ビ','ブ','ベ','ボ',
																	'パ','ピ','プ','ペ','ポ',
																	'ア','イ','ウ','エ','オ',
																	'カ','キ','ク','ケ','コ',
																	'サ','シ','ス','セ','ソ',
																	'タ','チ','ツ','テ','ト',
																	'ナ','ニ','ヌ','ネ','ノ',
																	'ハ','ヒ','フ','フ','ヘ',
																	'マ','ミ','ム','メ','モ',
																	'ヤ','ユ','ヨ',
																	'ラ','リ','ル','レ','ロ',
																	'ワ','ヲ','ン','゜','ー','ー',
																	'ァ','ィ','ゥ','ェ','ォ',
																	'ッ',
																	'ャ','ュ','ョ',
																	'ヴ',
																	'ガ','ギ','グ','ゲ','ゴ',
																	'ザ','ジ','ズ','ゼ','ゾ',
																	'ダ','ヂ','ヅ','デ','ド',
																	'バ','ビ','ブ','ベ','ボ',
																	'パ','ピ','プ','ペ','ポ',
																	'ア','イ','ウ','エ','オ',
																	'カ','キ','ク','ケ','コ',
																	'サ','シ','ス','セ','ソ',
																	'タ','チ','ツ','テ','ト',
																	'ナ','ニ','ヌ','ネ','ノ',
																	'ハ','ヒ','フ','フ','ヘ',
																	'マ','ミ','ム','メ','モ',
																	'ヤ','ユ','ヨ',
																	'ラ','リ','ル','レ','ロ',
																	'ワ','ヲ','ン');
		}else{
			//ひらがなの時
			var single_char = new Array('ァ','ィ','ゥ','ェ','ォ',
																	'ッ',
																	'ャ','ュ','ョ',
																	'ヴ',
																	'ガ','ギ','グ','ゲ','ゴ',
																	'ザ','ジ','ズ','ゼ','ゾ',
																	'ダ','ヂ','ヅ','デ','ド',
																	'バ','ビ','ブ','ベ','ボ',
																	'パ','ピ','プ','ペ','ポ',
																	'ア','イ','ウ','エ','オ',
																	'カ','キ','ク','ケ','コ',
																	'サ','シ','ス','セ','ソ',
																	'タ','チ','ツ','テ','ト',
																	'ナ','ニ','ヌ','ネ','ノ',
																	'ハ','ヒ','フ','フ','ヘ',
																	'マ','ミ','ム','メ','モ',
																	'ヤ','ユ','ヨ',
																	'ラ','リ','ル','レ','ロ',
																	'ワ','ヲ','ン','゜','ー','ー','-','ｰ');
			var double_char = new Array('ぁ','ぃ','ぅ','ぇ','ぉ',
																	'っ',
																	'ゃ','ゅ','ょ',
																	'ぶ',
																	'が','ぎ','ぐ','げ','ご',
																	'ざ','じ','ず','ぜ','ぞ',
																	'だ','ぢ','づ','で','ど',
																	'ば','び','ぶ','べ','ぼ',
																	'ぱ','ぴ','ぷ','ぺ','ぽ',
																	'あ','い','う','え','お',
																	'か','き','く','け','こ',
																	'さ','し','す','せ','そ',
																	'た','ち','つ','て','と',
																	'な','に','ぬ','ね','の',
																	'は','ひ','ふ','ふ','へ',
																	'ま','み','む','め','も',
																	'や','ゆ','よ',
																	'ら','り','る','れ','ろ',
																	'わ','を','ん','゜','ー','ー','ー','ー');
		}
		var ptn = '';
		
		//半角化
		for(i=0;i<double_char.length;i++){
			var temp = new Array();
			temp = document.getElementById(str_id).value.split(single_char[i]);
			document.getElementById(str_id).value = temp.join(double_char[i]);
		}
		ptn = document.getElementById(str_id).value;
		
		//不要テキスト抹消
		var dummy = '';
		if(flag == 'katakana'){
			work = ptn.replace(/[^ア-ン|ー|ァ-ォ|ャ-ョ|　]+/g,"");
		}else{
			work = ptn.replace(/[^あ-ん|ー|ぁ-ぉ|ゃ-ょ|　]+/g,"");
		}
		
		//値を返す
		document.getElementById(str_id).value = work;
	}
	
	
	//----------------------------------------------
	// メールアドレスの半角化
	//----------------------------------------------
	function mailajust(str_id){
		var single_char = new Array('0','1','2','3','4','5','6','7','8','9','-','-','-','-','-','-','-','@','.',',',':','_',
																'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
																'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		var double_char = new Array('０','１','２','３','４','５','６','７','８','９','－','-', '－', 'ー', '―', 'ｰ', '‐','＠','．','，','：','＿',
																'ａ','ｂ','ｃ','ｄ','ｅ','ｆ','ｇ','ｈ','ｉ','ｊ','ｋ','ｌ','ｍ','ｎ','ｏ','ｐ','ｑ','ｒ','ｓ','ｔ','ｕ','ｖ','ｗ','ｘ','ｙ','ｚ',
																'Ａ','Ｂ','Ｃ','Ｄ','Ｅ','Ｆ','Ｇ','Ｈ','Ｉ','Ｊ','Ｋ','Ｌ','Ｍ','Ｎ','Ｏ','Ｐ','Ｑ','Ｒ','Ｓ','Ｔ','Ｕ','Ｖ','Ｗ','Ｘ','Ｙ','Ｚ');
		var ptn = '';
		
		//半角化
		for(i=0;i<single_char.length;i++){
			var temp = new Array();
			temp = document.getElementById(str_id).value.split(double_char[i]);
			document.getElementById(str_id).value = temp.join(single_char[i]);
		}
		ptn = document.getElementById(str_id).value;
		
		//不要テキスト抹消
		var dummy = '';
		work = ptn.replace(/[^0-9|a-z|A-Z|\-|@|\.|,|:|_]+/g,"");
		
		//値を返す
		document.getElementById(str_id).value = work;
	}
	
	
	//----------------------------------------------
	// 住所の全角化
	//----------------------------------------------
	function addrajust(str_id){
		var single_char = new Array('0','1','2','3','4','5','6','7','8','9','-','ｰ','@','.',',',':','+','*','/',
																'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
																'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
																'ｧ','ｨ','ｩ','ｪ','ｫ',
																'ｯ',
																'ｬ','ｭ','ｮ',
																'ｳﾞ','ﾟ',
																'ｶﾞ','ｷﾞ','ｸﾞ','ｹﾞ','ｺﾞ',
																'ｻﾞ','ｼﾞ','ｽﾞ','ｾﾞ','ｿﾞ',
																'ﾀﾞ','ﾁﾞ','ﾂﾞ','ﾃﾞ','ﾄﾞ',
																'ﾊﾞ','ﾋﾞ','ﾌﾞ','ﾍﾞ','ﾎﾞ',
																'ﾊﾟ','ﾋﾟ','ﾌﾟ','ﾍﾟ','ﾎﾟ',
																'ｱ','ｲ','ｳ','ｴ','ｵ',
																'ｶ','ｷ','ｸ','ｹ','ｺ',
																'ｻ','ｼ','ｽ','ｾ','ｿ',
																'ﾀ','ﾁ','ﾂ','ﾃ','ﾄ',
																'ﾅ','ﾆ','ﾇ','ﾈ','ﾉ',
																'ﾊ','ﾋ','ﾌ','ﾌ','ﾍ',
																'ﾏ','ﾐ','ﾑ','ﾒ','ﾓ',
																'ﾔ','ﾕ','ﾖ',
																'ﾗ','ﾘ','ﾙ','ﾚ','ﾛ',
																'ﾜ','ｦ','ﾝ');
		var double_char = new Array('０','１','２','３','４','５','６','７','８','９','‐','ー','＠','．','，','：','＋','＊','／',
																'ａ','ｂ','ｃ','ｄ','ｅ','ｆ','ｇ','ｈ','ｉ','ｊ','ｋ','ｌ','ｍ','ｎ','ｏ','ｐ','ｑ','ｒ','ｓ','ｔ','ｕ','ｖ','ｗ','ｘ','ｙ','ｚ',
																'Ａ','Ｂ','Ｃ','Ｄ','Ｅ','Ｆ','Ｇ','Ｈ','Ｉ','Ｊ','Ｋ','Ｌ','Ｍ','Ｎ','Ｏ','Ｐ','Ｑ','Ｒ','Ｓ','Ｔ','Ｕ','Ｖ','Ｗ','Ｘ','Ｙ','Ｚ',
																'ァ','ィ','ゥ','ェ','ォ',
																'ッ',
																'ャ','ュ','ョ',
																'ヴ','゜',
																'ガ','ギ','グ','ゲ','ゴ',
																'ザ','ジ','ズ','ゼ','ゾ',
																'ダ','ヂ','ヅ','デ','ド',
																'バ','ビ','ブ','ベ','ボ',
																'パ','ピ','プ','ペ','ポ',
																'ア','イ','ウ','エ','オ',
																'カ','キ','ク','ケ','コ',
																'サ','シ','ス','セ','ソ',
																'タ','チ','ツ','テ','ト',
																'ナ','ニ','ヌ','ネ','ノ',
																'ハ','ヒ','フ','フ','ヘ',
																'マ','ミ','ム','メ','モ',
																'ヤ','ユ','ヨ',
																'ラ','リ','ル','レ','ロ',
																'ワ','ヲ','ン');
		var ptn = '';
		
		//半角化
		for(i=0;i<double_char.length;i++){
			var temp = new Array();
			temp = document.getElementById(str_id).value.split(single_char[i]);
			document.getElementById(str_id).value = temp.join(double_char[i]);
		}
		ptn = document.getElementById(str_id).value;
		
		//値を返す
		document.getElementById(str_id).value = ptn;
	}
	
	
	//----------------------------------------------
	// 数字の半角化
	//----------------------------------------------
	function numajust(str_id){
		var single_char = new Array('0','1','2','3','4','5','6','7','8','9','-',"-","-","-","-","-","-");
		var double_char = new Array('０','１','２','３','４','５','６','７','８','９','－',"-", "－", "ー", "―", "ｰ", "‐");
		var ptn = '';
		
		//半角化
		for(i=0;i<single_char.length;i++){
			var temp = new Array();
			temp = document.getElementById(str_id).value.split(double_char[i]);
			document.getElementById(str_id).value = temp.join(single_char[i]);
		}
		ptn = document.getElementById(str_id).value;
		
		//不要テキスト抹消
		var dummy = '';
		work = ptn.replace(/[^0-9|\-]+/g,"");
		
		//値を返す
		document.getElementById(str_id).value = work;
	}
//-->