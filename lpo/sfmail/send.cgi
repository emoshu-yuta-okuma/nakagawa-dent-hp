#!/usr/bin/perl

require 'jcode.pl';

$ver = 'SFmail 2.06 utf8';
#----------------------------------------------------------------------#
# 一般的な設定                                                         #
#----------------------------------------------------------------------#

# 00.テスト時の誤送信を制御 / 0にしないとメールが飛びません
$conf{'debug'} = 0;

# 01.完了画面からの戻り先（絶対パスでも相対パスでも可能。）
$site_url = '../index.html';

# 02.宛名管理者
# メールの送信元として表示されます。
$conf{'email_name'} = '中川歯科クリニック';

# 03.設置者のアドレス(カンマ区切り)
$conf{'mailto'} = 'yoyaku@nakagawadent.net';
#$conf{'mailto'} = 'f-check@freesale.co.jp';


# 04.管理者宛のメールの送信元ユーザname値
$conf{'user_name'} = 'お名前';

# 05.HTML側メールアドレスのName値
# 確認用の2の方は、自動で処理します。
$conf{'email'} = 'メールアドレス';

# 06.スパムブロック([URL]や[LINK]が含まれた送信をブロック) 1:ON / 0:OFF
$conf{'spam_block'} = 1;

# 07.sendmailのパス(サーバ会社へお問い合わせ下さい)
#/usr/sbin/sendmail　iCLUSTA VPS ラピッド CPI
#/usr/lib/sendmail　プロックス
$conf{'sendmail'} = '/usr/sbin/sendmail';
#$conf{'sendmail'} = '/usr/lib/sendmail';

# 08.本プログラム
$conf{'script'} = './send.cgi';

# 09.確認画面
$conf{'confs'} = './conf.html';

# 10.エラー画面
$conf{'errors'} = './error.html';

# 11.送信完了時にリダイレクトするサンクスページ
$conf{'thanks'} = './thank.html';

# 12.設置者に届くメールの件名
$conf{'subject'} = '「中川歯科クリニック」にお問い合わせがありました。';

# 13.送信者に届くメールの件名（自動返信メール）
$conf{'res_subject'} = '「中川歯科クリニック」にお問い合わせありがとうございました';

#---------------------------------------------------------
# 14.アフィリエイトタグ
#
# ユニークキーは、任意の箇所に<uniquekey>を記述します。
# ユニークキーは、$serial_number_$timestamp　で構成。
# 
# 例：$aff = '<img src="https://px.a8.net/cgi-bin/a8fly/sales?pid=99999999&so=<uniquekey>&si=1.1.1.hogehoge" width="1" height="1">';
# 
# ヒント：アフィリエイトタグを複数設置したい場合は、
#   例：$aff = '<img src="https://px.a8.net/cgi-bin/a8fly/sales?pid=99999999&so=<uniquekey>&si=1.1.1.hogehoge" width="1" height="1"><img src="https://ad2.trafficgate.net/t/w/99999999/1;1;1/<uniquekey>" width="1" height="1">';
#   のようにすればOKです。
#
# 結果として、送信完了画面でのタグの吐き出しと、メール本文での申込ID出力が行なわれます。
# 申込IDは、お客様の申込ID：xxxx_yyyymmddhhmmss　と表示されます。※これを見て、アフィリエイトの管理画面で照合を行ないます。
#---------------------------------------------------------
$aff = '';

# 15.管理者に届くメール本文
$conf{'client_body'} = <<'__res_body_eof__';
<username>　様からお問い合わせがありました。

以下、お問い合わせ内容です。ご対応お願いいたします。
<affiliate_tag>
─ご送信内容の確認───────────────────────────
__res_body_eof__

# 16.送信者に届くメールの本文
$conf{'res_body'} = <<'__res_body_eof__';
<username>　様

この度はお問い合わせいただき、誠にありがとうございました。
担当者より折り返しご連絡いたしますので、今しばらくお待ちください。

数日経っても連絡がない場合は、大変お手数ですが、
お電話またはメールフォームより再度お問い合わせください。

この度はお問い合わせいただき、ありがとうございました。
重ねて御礼申し上げます。

─ご送信内容の確認───────────────────────────
<resbody>
────────────────────────────────────

このメールに心当たりの無い場合は、お手数ですが
下記連絡先までお問い合わせください。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
[ 送信元 ]
中川歯科クリニック
TEL：03-3851-5566
E-mail：yoyaku@nakagawadent.net
サイト：https://www.nakagawadent.net/lpo/
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
__res_body_eof__

# 17.Yahooジオシティーズ ジオプラス用設定 1:ON / 0:OFF
$conf{'geoplus'} = 0;



########################################################################
##連結項目用############################################################
########################################################################
#01.ご住所
$address_paturn_0 = 'ご住所';#合成名
$address_paturn_1 = '郵便番号';#パーツ１
$address_paturn_2 = '都道府県';#パーツ２
$address_paturn_3 = '市区町村以下';#パーツ２
$address_paturn_4 = 'マンション名等';#パーツ２

#02.生年月日
$birth_paturn_0 = '生年月日';#合成名
$birth_paturn_1 = '生年月日：年';#パーツ１
$birth_paturn_2 = '生年月日：月';#パーツ２
$birth_paturn_3 = '生年月日：日';#パーツ２
$birth_paturn_1_mark = '年';#パーツ１
$birth_paturn_2_mark = '月';#パーツ２
$birth_paturn_3_mark = '日';#パーツ２

#03.予約日　その１
$reserve_paturn1_0 = 'カウンセリング第一希望日';#合成名
$reserve_paturn1_1 = 'カウンセリング第一希望日：年';#パーツ１
$reserve_paturn1_2 = 'カウンセリング第一希望日：月';#パーツ２
$reserve_paturn1_3 = 'カウンセリング第一希望日：日';#パーツ２
$reserve_paturn1_1_mark = '年';#パーツ１
$reserve_paturn1_2_mark = '月';#パーツ２
$reserve_paturn1_3_mark = '日';#パーツ２

#04.予約日　その２
$reserve_paturn2_0 = 'カウンセリング第二希望日';#合成名
$reserve_paturn2_1 = 'カウンセリング第二希望日：年';#パーツ１
$reserve_paturn2_2 = 'カウンセリング第二希望日：月';#パーツ２
$reserve_paturn2_3 = 'カウンセリング第二希望日：日';#パーツ２
$reserve_paturn2_1_mark = '年';#パーツ１
$reserve_paturn2_2_mark = '月';#パーツ２
$reserve_paturn2_3_mark = '日';#パーツ２

#05.予約日　その３
$reserve_paturn3_0 = 'カウンセリング第三希望日';#合成名
$reserve_paturn3_1 = 'カウンセリング第三希望日：年';#パーツ１
$reserve_paturn3_2 = 'カウンセリング第三希望日：月';#パーツ２
$reserve_paturn3_3 = 'カウンセリング第三希望日：日';#パーツ２
$reserve_paturn3_1_mark = '年';#パーツ１
$reserve_paturn3_2_mark = '月';#パーツ２
$reserve_paturn3_3_mark = '日';#パーツ２

#06.２個の組み合わせ　その１
$two_paturn1_0 = '';#合成名
$two_paturn1_1 = '';#パーツ１
$two_paturn1_2 = '';#パーツ２
$two_paturn1_1_mark = '';#パーツ１
$two_paturn1_2_mark = '';#パーツ２

#07.２個の組み合わせ　その２
$two_paturn2_0 = '';#合成名
$two_paturn2_1 = '';#パーツ１
$two_paturn2_2 = '';#パーツ２
$two_paturn2_1_mark = '';#パーツ１
$two_paturn2_2_mark = '';#パーツ２

#08.２個の組み合わせ　その３
$two_paturn3_0 = '';#合成名
$two_paturn3_1 = '';#パーツ１
$two_paturn3_2 = '';#パーツ２
$two_paturn3_1_mark = '';#パーツ１
$two_paturn3_2_mark = '';#パーツ２

#09.３個の組み合わせ　その１
$three_paturn1_0 = '';#合成名
$three_paturn1_1 = '';#パーツ１
$three_paturn1_2 = '';#パーツ２
$three_paturn1_3 = '';#パーツ３
$three_paturn1_1_mark = '';#パーツ１
$three_paturn1_2_mark = '';#パーツ２
$three_paturn1_3_mark = '';#パーツ３

#10.３個の組み合わせ　その２
$three_paturn2_0 = '';#合成名
$three_paturn2_1 = '';#パーツ１
$three_paturn2_2 = '';#パーツ２
$three_paturn2_3 = '';#パーツ３
$three_paturn2_1_mark = '';#パーツ１
$three_paturn2_2_mark = '';#パーツ２
$three_paturn2_3_mark = '';#パーツ３

#11.３個の組み合わせ　その３
$three_paturn3_0 = '';#合成名
$three_paturn3_1 = '';#パーツ１
$three_paturn3_2 = '';#パーツ２
$three_paturn3_3 = '';#パーツ３
$three_paturn3_1_mark = '';#パーツ１
$three_paturn3_2_mark = '';#パーツ２
$three_paturn3_3_mark = '';#パーツ３


########################################################################
##高度な設定############################################################
########################################################################

#01.リファラーによるスパムチェック 1:ON / 0:OFF
$conf{'domain_check'} = 1;

#02.リファラー(送信元)のURLの一部か全部
$conf{'domain'} = $ENV{'SERVER_NAME'};

#03.HTML側での設定を無効化(タダ乗り対策) 1:ON / 0:OFF
$conf{'html_vals_disabled'} = 1;

#04.全てが英文の送信を拒否 1:ON / 0:OFF
$conf{'language_check'} = 1;

#05.通し番号保存用のファイルのパス
$conf{'serial_file'} = 'count.dat';

#06.件名に通し番号を付ける 1:ON / 0:OFF
$conf{'subject_serial'} = 0;

#07.送信履歴保存用ファイルとダウンロードパスワード
#$conf{'log_file'} = 'sendlog.cgi';
#$conf{'log_passwd'} = '0123';

#08.送信文字コード
#$conf{'charset'} = 'ISO-2022-JP';
#$conf{'lang'} = 1;

#09.無変換設定
$conf{'charset'} = 'UTF-8';
$conf{'lang'} = 0;

#10.HTML側のエンコード（1=Shift_JIS 0=utf-8）
$flag_html_encode = 'utf8';


########################################################################
##MAIN##################################################################
########################################################################
($sec,$min,$hour,$day,$mon,$year) = gmtime(time + 9 * 3600);$mon++;$year += 1900;
$posted_body = '送信日時：';
$posted_body .= sprintf("%04d-%02d-%02d %02d:%02d:%02d\n",$year,$mon,$day,$hour,$min,$sec);
$conf{'download_file_name'} = sprintf("%04d-%02d-%02d.csv",$year,$mon,$day,$hour,$min,$sec);
push @field, "DATE";
push @record, sprintf("%04d-%02d-%02d %02d:%02d:%02d",$year,$mon,$day,$hour,$min,$sec);

$spam{"lang"} = 1;
$spam{"link"} = 0;

@construct_utf = ("－","～");
#@construct_utf = ("\xef\xbc\x8d","\xE3\x80\x9C");
@construct_jis = ("\x1b\x24B\x21\x5d\x1b\x28J","\x1b\x24B\x21A\x1b\x28J");
@construct_sjis = ("\x81\x7c","\x81\x60");

# POSTデータ適用分
@con_befor = ('①','②','③','④','⑤','⑥','⑦','⑧','⑨','⑩','Ⅰ','Ⅱ','Ⅲ','Ⅳ','Ⅴ','Ⅵ','Ⅶ','Ⅷ','Ⅸ','Ⅹ','㈱','㈲');
@con_after = ('(1)','(2)','(3)','(4)','(5)','(6)','(7)','(8)','(9)','(10)','(1)','(2)','(3)','(4)','(5)','(6)','(7)','(8)','(9)','(10)','(株)','(有)');

# メールヘッダ適用分
@con_befor2 = ('髙','﨑','閒','塚','德');
@con_after2 = ('高','崎','間','塚','徳');


&getQuery;
&main;
exit;
sub main {
	if($ENV{'QUERY_STRING'} eq 'download' && $conf{'log_passwd'} eq $form{'password'} && $conf{'log_passwd'} ne $null){
		&download;
	} elsif($ENV{'QUERY_STRING'} eq 'download' && $conf{'log_passwd'} eq $form{'delLogPWD'} && $conf{'log_passwd'} ne $null){
		&deletefile;
	}	elsif($ENV{'QUERY_STRING'} eq 'download'){
		&downloadscreen;
	} else{
	
		#送信フラグ初期化
		$flag_send = 9;
		#ポストデータの読み込み
		foreach $pair (@pairs) {
			($name, $value) = split(/=/, $pair);
			$name =~ tr/+/ /;
			$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
			$value =~ tr/+/ /;
			$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
			
			#モードチェック
			if($name eq 'mode' && $value eq 'send'){
				$flag_send = 1;
			}
		}

		if($flag_send == 9){
			#確認画面
			&conf_check;
		}else{
			#送信画面
			&send;
		}
	}
}

#確認画面
sub conf_check {
	local($cp_flag,$flag,$cell,$tmp);
	
	#必須チェック
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);

		$name =~ tr/+/ /;
		$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
		if($name =~ /\(必須\)/ && $value eq ''){
			&error("必須項目が入力されていません。");
		}
	}
	
	
	open(IN,"$conf{'confs'}") || &error("Open Error: $conf");
	print "Content-type: text/html\n\n";
	while (<IN>) {
		if (/<!-- LOOPS -->/) {
			$flag=1;
			$flag_lastdata = 1;
		}
		if (/<!-- LOOPE -->/) {
			$flag=0;

			local($key,$bef,$tmp);

#	foreach $pair (@pairs) {
#		($name, $value) = split(/=/, $pair);
		
		
			foreach $pair (@pairs) {
				($name, $value) = split(/=/, $pair);

				$name =~ tr/+/ /;
				$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
				$name =~ s/\(必須\)//g;
				
				$value =~ tr/+/ /;
				$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
				
				$value = &sanitizing_str($value);
				
				if($bef eq $name){
					$value .= " $bef_value";
				}
				#next if ($bef eq $name);
				
				next if ("$conf{'email'}2" eq $name);

				$value =~ s/\0/ /g;
				$value =~ s/\r\n/<br>/g;
				$value =~ s/\r/<br>/g;
				$value =~ s/\n/<br>/g;
				$value =~ s/"/&quot;/g;
				if ($value =~ /<br>$/) {
					while ($value =~ /<br>$/) {
						$value =~ s/<br>$//g;
					}
				}

####【その２】ここまで、日付対応箇所#############################
				#01.ご住所
				if($name eq $address_paturn_1){
					$value_str = "〒$value　";
				}elsif($name eq $address_paturn_2){
					$value_str .= $value;
				}elsif($name eq $address_paturn_3){
					$value_str .= "$value　";
				}elsif($name eq $address_paturn_4){
					$value_str .= $value;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$address_paturn_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$address_paturn_0" value="$value_str" \/>/;
					
					print "$tmp\n";
					print "";
					
				#02.生年月日
				}elsif($name eq $birth_paturn_1){
					$value_str = $value . $birth_paturn_1_mark;
				}elsif($name eq $birth_paturn_2){
					$value_str .= $value . $birth_paturn_2_mark;
				}elsif($name eq $birth_paturn_3){
					$value_str .= $value . $birth_paturn_3_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$birth_paturn_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$birth_paturn_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
					
				#03.予約日
				}elsif($name eq $reserve_paturn1_1){
					$value_str = $value . $reserve_paturn1_1_mark;
				}elsif($name eq $reserve_paturn1_2){
					$value_str = $value . $reserve_paturn1_2_mark;
				}elsif($name eq $reserve_paturn1_3){
					$value_str .= $value . $reserve_paturn1_3_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$reserve_paturn1_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$reserve_paturn1_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
					
				#04.予約日２
				}elsif($name eq $reserve_paturn2_1){
					$value_str = $value . $reserve_paturn2_1_mark;
				}elsif($name eq $reserve_paturn2_2){
					$value_str = $value . $reserve_paturn2_2_mark;
				}elsif($name eq $reserve_paturn2_3){
					$value_str .= $value . $reserve_paturn2_3_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$reserve_paturn2_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$reserve_paturn2_0" value="$value_str" \/>/;
					
					print "$tmp\n";
					
				#05.予約日３
				}elsif($name eq $reserve_paturn3_1){
					$value_str = $value . $reserve_paturn3_1_mark;
				}elsif($name eq $reserve_paturn3_2){
					$value_str = $value . $reserve_paturn3_2_mark;
				}elsif($name eq $reserve_paturn3_3){
					$value_str .= $value . $reserve_paturn3_3_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$reserve_paturn3_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$reserve_paturn3_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
				#06.２個の組み合わせ　その１
				}elsif($name eq $two_paturn1_1){
					$value_str = $value . two_paturn1_1_mark;
				}elsif($name eq $two_paturn1_2){
					$value_str .= $value . two_paturn1_2_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$two_paturn1_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$two_paturn1_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
				#07.２個の組み合わせ　その２
				}elsif($name eq $two_paturn2_1){
					$value_str = $value . $two_paturn2_1_mark;
				}elsif($name eq $two_paturn2_2){
					$value_str .= $value . $two_paturn2_2_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$two_paturn2_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$two_paturn2_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
				#08.２個の組み合わせ　その３
				}elsif($name eq $two_paturn3_1){
					$value_str = $value . $two_paturn3_1_mark;
				}elsif($name eq $two_paturn3_2){
					$value_str .= $value . $two_paturn3_2_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$two_paturn3_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$two_paturn3_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
				#09.３個の組み合わせ　その１
				}elsif($name eq $three_paturn1_1){
					$value_str = $value . $three_paturn1_1_mark;
				}elsif($name eq $three_paturn1_2){
					$value_str .= $value . $three_paturn1_2_mark;
				}elsif($name eq $three_paturn1_3){
					$value_str .= $value . $three_paturn1_3_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$three_paturn1_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$three_paturn1_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
				#10.３個の組み合わせ　その２
				}elsif($name eq $three_paturn2_1){
					$value_str = $value . $three_paturn2_1_mark;
				}elsif($name eq $three_paturn2_2){
					$value_str .= $value . $three_paturn2_2_mark;
				}elsif($name eq $three_paturn2_3){
					$value_str .= $value . $three_paturn2_3_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$three_paturn2_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$three_paturn2_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
				#11.３個の組み合わせ　その３
				}elsif($name eq $three_paturn3_1){
					$value_str = $value . $three_paturn3_1_mark;
				}elsif($name eq $three_paturn3_2){
					$value_str .= $value . $three_paturn3_2_mark;
				}elsif($name eq $three_paturn3_3){
					$value_str .= $value . $three_paturn3_3_mark;
					
					$tmp = $cell;
					$tmp =~ s/\$left/$three_paturn3_0/;
					$tmp =~ s/\$right/$value_str/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$three_paturn3_0" value="$value_str" \/>/;
					
					print "$tmp\n";
				
				}else{
					$tmp = $cell;
					$tmp =~ s/\$left/$name/;
					$tmp =~ s/\$right/$value/;
					$tmp =~ s/\$hidden/<input type="hidden" name="$name" value="$value" \/>/;
					
					print "$tmp\n";
				}
				
####【その２】ここまで、日付対応箇所#############################
			}
			next;
		}
		if ($flag) {
			if (!/<!-- LOOPS -->/) {
				$cell .= $_;
			}
			next;
		}

		s/\$script/$conf{'script'}/;

		if (/(<\/body([^>]*)>)/i) {
			$cp_flag=1;
			$tmp = $1;
			s/$tmp/$copy\n$tmp/;
		}

		print;
	}
	close(IN);

	if (!$cp_flag) { print "$copy\n</body></html>\n"; }

	exit;

}

#メール送信ルーチン（自動返信も行われる）
sub send {
	local($flag_usermail);
	$flag_usermail = 1;
	if(&spamcheck){
		if(!$conf{'debug'}){
			@mailto = split(/\,/,$conf{'mailto'});
			if(@mailto > 0){
				&serials;
				
				# アフィリエイト処理----------------------------------------
				# アフィリのサブルーチン
				&affiliate;
				
				#アフィリタグが存在していれば、一時格納
				if($aff){
					$admin_posted_body =~ s/<affiliate_tag>/\nお客様の申込ID：$uniquekey\n\n/g;
				}else{
					$admin_posted_body =~ s/<affiliate_tag>//g;
				}
				# アフィリエイト処理----------------------------------------
				
				#エンドメアドが不正な場合は、クライアントメアドへ差し替え
				if($mailfrom =~ /[^a-zA-Z0-9\.\@\-\_\+]/ || split(/\@/,$mailfrom) != 2){
					$mailfrom = $mailto[0];
					$flag_usermail = 0;
				}
				
				#管理宛メール
				$subject = $conf{'subject'};
				#ユーザ名の洗い出し
				foreach $pair (@pairs) {
					($name, $value) = split(/=/, $pair);
					
					$name =~ tr/+/ /;
					$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
					
					$value =~ tr/+/ /;
					$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
					
					if($name eq $conf{'user_name'}){
						$mailfrom_name = $value;
					}
				}
				#エンドユーザのメアドがない時
				if($flag_usermail  == 0){
					$subject .= '＜利用者のメールアドレス無し＞';
				}
				
				#utf8の場合
				if($flag_html_encode eq 'utf8'){
					$subject = &sanitizing_str($subject);
					$subject = &sanitizing_str2($subject);
					$subject = &base64($subject);
				}
				
				$admin_posted_body =~ s/<br>/\n/g;
				$admin_posted_body =~ s/<br \/>/\n/g;
				$body = $admin_posted_body;
				
				#sjisの場合
				if($flag_html_encode eq 'sjis'){
					&jcode'convert(*subject,'jis');
					&jcode'convert(*body,'jis');
				}
				
				#エンドユーザの名前がある場合
				if($mailfrom_name){
					$mailfrom_name = &sanitizing_str2($mailfrom_name);
					$mailfrom_name = &base64("$mailfrom_name　様");
					$mailfrom_name = "$mailfrom_name <$mailfrom>";
				}else{
					$mailfrom_name = &base64('匿名');
					$mailfrom_name = "$mailfrom_name <$mailfrom>";
				}
				
				for($cnt=0;$cnt<@mailto;$cnt++){
					&sendmail($mailto[$cnt],$mailfrom,$mailfrom_name,$subject,$body);
				}
				
				#自動返信メール
				if($flag_usermail){
					$mailfrom_name = $conf{'email_name'};
					$subject = $conf{'res_subject'};
					#utf8の場合
					if($flag_html_encode eq 'utf8'){
						$subject = &sanitizing_str($subject);
						$subject = &sanitizing_str2($subject);
						$subject = &base64($subject);
					}
					
					$conf{'res_body'} =~ s/<br>/\n/g;
					$conf{'res_body'} =~ s/<br \/>/\n/g;
					$body = $conf{'res_body'};
					#sjisの場合
					if($flag_html_encode eq 'sjis'){
						&jcode'convert(*subject,'jis');
						&jcode'convert(*body,'jis');
					}
					
					#お名前が存在する場合等の処理
					if($flag_usermail){
						$mailfrom_name = &sanitizing_str2($mailfrom_name);
						$mailfrom_name = &base64($mailfrom_name);
						$mailfrom_name = "$mailfrom_name <$mailto[0]>";
					}else{
						$mailfrom_name = "$mailto[0]";
					}
					
					if($conf{'res_subject'} ne $null && $conf{'res_body'} ne $null){
						&sendmail($mailfrom,$mailto[0],$mailfrom_name,$subject,$body);
					}
				}
				&logfileCreate;
				&thanks;
			}
		}
		else {
			&error("DEBUG");
		}
	}
	else {
		&error("SPAM BLOCK");
	}
}

#BASE64変換
sub base64 {
	local($sub) = @_;

	$sub =~ s/\x1b\x28\x42/\x1b\x28\x4a/g;
	$sub = "=?UTF-8?B?" . &b64enc($sub) . "?=";
	$sub;
}
sub b64enc {
	local($ch)="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
	local($x, $y, $z, $i);
	$x = unpack("B*", $_[0]);
	for ($i=0; $y=substr($x,$i,6); $i+=6) {
		$z .= substr($ch, ord(pack("B*", "00" . $y)), 1);
		if (length($y) == 2) {
			$z .= "==";
		} elsif (length($y) == 4) {
			$z .= "=";
		}
	}
	$z;
}

#スパムチェック
sub spamcheck {
	if(($spam{"lang"}) && $conf{'language_check'}){
		return 0;
	}
	elsif(($spam{"link"}) && ($conf{'spam_block'})){
		return 0;
	}
	elsif(index($ENV{'HTTP_REFERER'},$conf{'domain'}) == -1 && ($conf{'domain_check'})){
		return 0;
	}
	else {
		return 1;
	}
}

sub serials {
	if(-f $conf{"serial_file"}){
		$serial = &loadline($conf{"serial_file"});
		$serial_number = sprintf("%04d",$serial);
		push @field, "SERIAL";
		push @csv, $serial_number;
		$form{"serial"} = $serial_number;
		if($conf{'subject_serial'}){
			$conf{"subject"} = "\[" . $serial_number . "\] " . $conf{"subject"};
			$conf{"res_subject"} = "\[" . $serial_number . "\] " . $conf{"res_subject"};
		}
		$serial++;
		&saveline($conf{"serial_file"},$serial);
	}
}
sub charcodeExchange {
	my($str,$charset) = @_;
	if($conf{'lang'}){
		if($charset eq "jis"){
			return &encodeJIS($str);
			#&jcode'convert(*str,'jis');
			#return $str;
		}
		else {
			return &encodeSJIS($str);
			#&jcode'convert(*str,'jis');
			#return $str;
		}
	}
	else {
		return $str;
	}
}
sub mimeenc {
	my($str) = @_;
	if($conf{'lang'}){
		#return Jcode->new($str)->mime_encode;
		return &jcode->new($str)->mime_encode;
		return $str;
	}
	else {
		return $str;
	}
}
sub encodeJIS {
	my($str) = @_;
	for(my $cnt=0;$cnt<@construct_utf;$cnt++){
		$str =~ s/$construct_utf[$cnt]/<\_hotfix${cnt}\_>/g;
	}
	&jcode'convert(\$str,'jis');
	$str = &charhotfix_unescape_jis($str);
	return $str;
}
sub encodeSJIS {
	my($str) = @_;
	for(my $cnt=0;$cnt<@construct_utf;$cnt++){
		$str =~ s/$construct_utf[$cnt]/<\_hotfix${cnt}\_>/g;
	}
	&jcode'convert(*str,'sjis');
	$str = &charhotfix_unescape_sjis($str);
	return $str;
}
sub charhotfix_unescape_jis {
	my($str) = @_;
	for(my $cnt=0;$cnt<@construct_utf;$cnt++){
		$str =~ s/<\_hotfix${cnt}\_>/$construct_jis[$cnt]/g;
	}
	return $str;
}
sub charhotfix_unescape_sjis {
	my($str) = @_;
	for(my $cnt=0;$cnt<@construct_utf;$cnt++){
		$str =~ s/<\_hotfix${cnt}\_>/$construct_sjis[$cnt]/g;
	}
	return $str;
}

#HTML側からのポストデータ
sub getQuery {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	}
	else {
		$buffer = $ENV{'QUERY_STRING'};
	}
	@pairs = split(/&/, $buffer);
	
	#name値重複対応処理 START--------------------------------------------------------------------
	#主にcheckboxのようなname値が重複するフィールドの場合、値をスペース区切りで代入していく。
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);
		if($buf_name eq $name){
			#直前のレコードとname値が同じ（checkbox等で名前がかぶるパターン）なので、
			#配列の最終アイテムを削除
			pop @check;
			#直前の値と現在の値をスペース区切りで合体させて値を格納
			$value = "$buf_value $value";
		}
		#追加
		#前述のif文で値を合体させたものも含め、ここで配列の最後尾に追加
		push(@check,"$name=$value");
		
		#現在のレコードを引き継ぐためにバッファ用の変数に格納
		$buf_name = $name;
		$buf_value = $value;
	}
	@pairs = @check;
	#name値重複対応処理 END--------------------------------------------------------------------
	
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);
		
		
		$name =~ tr/+/ /;
		$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
		$value =~ tr/+/ /;
		$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
#		if($name eq "email"){
		if($name eq $conf{'email'}){
			$posted_body .= "\n\[ ${name} \] ${value}";
			push @field,$name;
			push @record,$value;
			$mailfrom = $value;
		}
		elsif($name ne $null && $name ne "Submit" && $name ne "confirm_email" && $name ne "x" && $name ne "y" && $name ne "mode" ){
			if($name ne $prev_name){
				$crr = "";
				if(index($value,"\n") > -1){
					$crr = "\n";
				}
				$posted_body .= "\n\[ ${name} \] ${crr}${value}${crr}";
				push @field,$name;
				push @record,$value;
			}
			else {
				$form{$name} .= "、";
				$posted_body .= "、${value}";
				$record[-1] .= "、${value}";
			}
			if(!($value !~ /[\x80-\xff]/)){
				$spam{"lang"} = 0;
			}
			if($value =~ /\[\/url\]/si || $value =~ /\[\/link\]/si){
				$spam{"link"} = 1;
			}
		}
		$check_values .= $value;
		$form{$name} .= $value;
		$prev_name = $name;
	}
	my($ip_address) = $ENV{'REMOTE_ADDR'};
	my(@addr) = split(/\./, $ip_address);
	my($packed_addr) = pack("C4", $addr[0], $addr[1], $addr[2], $addr[3]);
	my($name, $aliases, $addrtype, $length, @addrs);
	($name, $aliases, $addrtype, $length, @addrs) = gethostbyaddr($packed_addr, 2);
	$admin_posted_body .= "\n\n─環境情報───────────────────────────────\n";
	$admin_posted_body .= "\[ HOST NAME \] ${name}\n";
	$admin_posted_body .= "\[ IP ADDRESS \] $ENV{'REMOTE_ADDR'}\n";
	$admin_posted_body .= "\[ USER AGENT \] $ENV{'HTTP_USER_AGENT'}\n";
	$admin_posted_body .= "\[ HTTP REFERER \] $ENV{'HTTP_REFERER'}\n";
	$admin_posted_body .= "\[ Version \] $ver\n";
	$admin_posted_body .= "───────────────────────────────────────\n";

	$conf{'client_body'} =~ s/<username>/$form{$conf{'user_name'}}/g;
	$admin_posted_body = $conf{'client_body'} . $posted_body . $admin_posted_body;
	$conf{'res_body'} =~ s/<username>/$form{$conf{'user_name'}}/g;
	$conf{'res_body'} =~ s/<resbody>/$posted_body/g;
	push @field,"HOST NAME";
	push @record,$name;
	push @field,"IP ADDRESS";
	push @record,$ENV{'REMOTE_ADDR'};
	push @field,"USER AGENT";
	push @record,$ENV{'HTTP_USER_AGENT'};
	push @field,"HTTP REFERER";
	push @record,$ENV{'HTTP_REFERER'};
	$field = "\"" . join("\"\,\"",@field) . "\"\n";
	$record = "\"" . join("\"\,\"",@record) . "\"\n";
	$field .= $record;
}

sub refresh {
	my($refreshurl) = @_;
	print "Location: ${refreshurl}\n\n";
}

sub logfileCreate {
	if($conf{"log_file"} ne $null && $conf{"log_passwd"} ne $null){
		$size = -s $conf{"log_file"};
		if(-f $conf{"log_file"} && $size > 0){
			chmod 0777, $conf{"log_file"};
			$put_field = &encodeSJIS($record);
			flock(FH, LOCK_EX);
				open(FH,">>".$conf{"log_file"});
					print FH $put_field;
				close(FH);
			flock(FH, LOCK_NB);
			chmod 0600, $conf{"log_file"};
		}
		else{
			$put_field = &encodeSJIS($field);
			flock(FH, LOCK_EX);
				open(FH,">".$conf{"log_file"});
					print FH $put_field;
				close(FH);
			flock(FH, LOCK_NB);
			chmod 0600, $conf{"log_file"};
		}
	}
}

#メール送信ルーチン（自動返信も行われる）
sub sendmail {
	my($mailto,$mailfrom,$mailfrom_name,$subject,$body) = @_;
	if($conf{'geoplus'}){
		$mailfrom = $conf{'mailto'};
		sleep(3);
	}
	open(MAIL,"| $conf{'sendmail'} -f $mailfrom -t");
		print MAIL "To: $mailto\n";
		print MAIL "Errors-To: $mailto\n";
		print MAIL "From: $mailfrom_name\n";
		print MAIL "Subject: $subject\n";
		print MAIL "MIME-Version:1.0\n";
		print MAIL "Content-type:text/plain; charset=$conf{'charset'}\n";
		print MAIL "Content-Transfer-Encoding:7bit\n";
		print MAIL "X-Mailer:Web Mail Delivery System\n\n";
		print MAIL "$body\n";
	close(MAIL);
}

sub loadline {
	my($path) = @_;
	chmod 0777, $path;
	flock(FH, LOCK_EX);
		open(FH,$path);
			my($str) = <FH>;
		close(FH);
	flock(FH, LOCK_NB);
	chmod 0600, $path;
	return $str;
}
sub saveline {
	my($path,$str) = @_;
	chmod 0777, "${path}";
	flock(FH, LOCK_EX);
		open(FH,">${path}");
			print FH $str;
		close(FH);
	flock(FH, LOCK_NB);
	chmod 0600, "${save}";
}
sub saveaddline {
	my($path,$str) = @_;
	chmod 0777, "${path}";
	flock(FH, LOCK_EX);
		open(FH,">>${path}");
			print FH $str;
		close(FH);
	flock(FH, LOCK_NB);
	chmod 0600, "${save}";
}

#エラー表示
sub error {
	unlink($tmpfile) if (-e $tmpfile && $pgType == 2);

	print "Content-type: text/html\n\n";
	open(IN,$conf{'errors'});
	while (<IN>) {
		s/\$errors/$_[0]/;
		print;
	}
	close(IN);

	exit;
}

#送信完了画面
sub thanks {
	open(IN,"$conf{'thanks'}") || &error("Open Error: $thanks");
	print "Content-type: text/html\n\n";
	while (<IN>) {
		s/\$site_url/$site_url/;
		
		# アフィリエイト表示
		if($aff){
			s/\$affiliate/<p>$aff<\/p>\n/;
		}else{
			s/\$affiliate//;
		}
		
		print;
	}
	close(IN);

	exit;
}


sub downloadscreen {
	print "Content-type: text/html\n\n";
	print <<EOF;
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=$conf{'charset'}" />
	<title>mode::logfile download</title>
	<style type=\"text/css\">
	<!--
		* {
			font-family: "Arial", "Helvetica", "sans-serif"; font-size: 12px;
		}
	-->
	</style>
</head>
<body>
	<h1 style="font-size: 21px;color: #232323;">mode::logfile download</h1>
	<form name="getLogs" action="" method="POST">
		PASSWORD <input type="password" name="password" style="ime-mode: disabled;width: 100px;"><input type="submit" value="ダウンロード">
	</form>
	<form name="delLogs" action="" method="POST">
		PASSWORD <input type="password" name="delLogPWD" style="ime-mode: disabled;width: 100px;"><input type="submit" value="ログの削除">
	</form>
	$form{'password'}
</body>
</html>
EOF
}

sub download {
	chmod 0777, $conf{'log_file'};
	print "Content-type: application/octet-stream; name=\"$conf{'log_file'}\"\n";
	print "Content-Disposition: attachment; filename=\"$conf{'download_file_name'}\"\n\n";
	open(IN,$conf{'log_file'});
	print <IN>;
	chmod 0600, $conf{'log_file'};
}

sub deletefile {
	unlink $conf{'log_file'};
	&downloadscreen;
}


# アフィリエイトタグ発行
sub affiliate {
# タイムスタンプ
$timestamp = sprintf("%04d%02d%02d%02d%02d%02d",$year,$mon,$day,$hour,$min,$sec);

# ユニークキー発行
$uniquekey = $serial_number . '_' . $timestamp;

# ユニークキーの埋め込み
$aff =~ s/<uniquekey>/$uniquekey/g;
}


# テキストサニタイズ処理
sub sanitizing_str {
	my($str) = @_;
	for($i=0;$i<@con_befor;$i++){
		$str =~ s/$con_befor[$i]/$con_after[$i]/g;
	}
	return $str;
}


# メールヘッダテキストサニタイズ処理
sub sanitizing_str2 {
	my($str) = @_;
	for($i=0;$i<@con_befor2;$i++){
		$str =~ s/$con_befor2[$i]/$con_after2[$i]/g;
	}
	return $str;
}
