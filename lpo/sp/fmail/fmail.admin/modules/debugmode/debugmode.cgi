#!/usr/bin/perl

# -----------------------------------------------------------
#
# 本ファイルは、メールフォームの動作とは無関係です。
# 動作環境確認用ツールです。
# 不要であれば、削除していただいても問題ありません。
#
# -----------------------------------------------------------

# -----------------------------------------------------------
# 初期設定
# -----------------------------------------------------------
# 本ファイル名
$script = 'debugmode.cgi';

# ログインID
$id = 'freesale';

# パスワード
$pwd = 'fJE.910koCtYQ';

# モジュールセット
my %mod_list;

listup($_) for grep {$_ ne '.'} @INC;
foreach(sort keys %mod_list){
	 push(@modulelist, $_);
}





# -----------------------------------------------------------
# メインルーチン
# -----------------------------------------------------------
# フォームデコード
&decode;
if($in{'id'} eq $id && crypt($in{'pwd'}, $pwd) eq $pwd ) {
	&output;
} else {
	if($in{'id'} || $in{'pwd'}) {
		$err_text = 'There is an error in the login information.';
	}
	&login;
}



# -----------------------------------------------------------
# ログイン
# -----------------------------------------------------------
sub login {
	my $html = <<"	EOM";
Content-type: text/html

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body style="background: #000; color: #FFF;">

<div style="margin: 0 auto; width: 300px;">
<h1>Debug mode</h1>
<p style="color: red;">$err_text</p>
<form action="$script" method="POST" style="padding: 10px; width: 300px; background: #300;">
	<filedset>
		<table>
			<tr><th style="width: 70px; height: 30px; text-align: left;">ID</th>	<td><input type="text" name="id" value="" style="width: 150px;" /></td></tr>
			<tr><th style="width: 70px; height: 30px; text-align: left;">PWD</th>	<td><input type="password" name="pwd" value="" style="width: 150px;" /></td></tr>
		</table>
		<p style="text-align: center;"><input type="submit" value="Login" style="width: 160px; height: 50px;"></p>
	</filedset>
</form>

</body>
</html>
	EOM
	
	print $html;
}



# -----------------------------------------------------------
# 必要情報の表示
# -----------------------------------------------------------
sub output {
	# Perlバージョン（小数点以下は、三桁区切り）
	my $ver = $];
	my $ver_major = substr($ver, 0,2);
	my $ver_minor = substr($ver, 2,3) * 1;
	my $ver_minor_minor = substr($ver, 5,3) * 1;
	my $version = $ver_major;
	if($ver_minor) {	$version .= $ver_minor;}
	if($ver_minor_minor) {	$version .= '.' . $ver_minor_minor;}
	
	# 現在の位置取得（使えない場合があります。）
	# my $path1 = `pwd`;
	my $path1_class = ' style="color: #0F0;"';
	if(!$path1){
		$path1 = '[ NG ] Contact the server administrator.';
		$path1_class = ' style="color: #F00;"';
	}
	
	# スクリプトまでのフルパス（使えない場合があります。）
	my $path2 = $ENV{'SCRIPT_FILENAME'};
	my $path2_class = ' style="color: #0F0;"';
	if(!$path2){
		$path2 = '[ NG ] Contact the server administrator.';
		$path2_class = ' style="color: #F00;"';
	}
	
	# sendmailパス取得（使えない場合があります。）
#	my $sendpath = `which sendmail`;
	my $sendpath_class = ' style="color: #0F0;"';
	if(!$sendpath){
		$sendpath = '[ NG ] Contact the server administrator.';
		$sendpath_class = ' style="color: #F00;"';
	}
	
	# 必要モジュールのチェック
	@mustmodules = qw/CGI CGI::Cookie Encode File::Copy MIME::Base64 URI::Escape/;
	
	
	my $html = <<"	EOM";
Content-type: text/html

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body style="background: #000; color: #FFF;">
	<h1>Debug mode</h1>
	<h3 style="margin: 10px 0 5px 0; border: 1px solid #FFF; border-width: 0 0 1px 0; color: #FF0;">Environmental information</h3>
	<table>
		<tr><th style="width: 150px; height: 20px; text-align: left;">Perl version</th>		<td style="color: #0F0;">$]　（ver $version）</td></tr>
		<tr><th style="width: 150px; height: 20px; text-align: left;">Present location</th>				<td$path1_class>$path1</td></tr>
		<tr><th style="width: 150px; height: 20px; text-align: left;">Full path</th>					<td$path2_class>$path2</td></tr>
		<tr><th style="width: 150px; height: 20px; text-align: left;">Sendmail path</th>			<td$sendpath_class>$sendpath</td></tr>
	</table>
	
	<h3 style="margin: 50px 0 5px 0; border: 1px solid #FFF; border-width: 0 0 1px 0; color: #FF0;">Required Modules</h3>
	<table>
	EOM
	
	for(my $i=0; $i<@mustmodules; $i++) {
		# 一時格納用変数の初期化
		$html_work = '';
		# 存在チェック用フラグ初期化
		$flag_ok = 0;
		for(my $j=0; $j<@modulelist; $j++) {
			if($modulelist[$j] eq $mustmodules[$i]) {
				# 存在するのでフラグON
				$flag_ok = 1;
			}
		}
		if($flag_ok) {
			$html_work .= qq|		<tr><th style="width: 150px; height: 20px; text-align: left;">$mustmodules[$i]</th>			<td style="color: #0F0;">[ O.K. ]</td></tr>|;
		} else {
			$html_work .= qq|		<tr><th style="width: 150px; height: 20px; text-align: left;">$mustmodules[$i]</th>			<td style="color: #F00;">[ NG ] Contact the server administrator.</td></tr>|;
		}
		$html .= $html_work;
	}
	
	$html .= <<"	EOM";
	</table>
</body>
</html>
	EOM
	
	print $html;
}



#-------------------------------------------------
# モジュールリスト作成
#-------------------------------------------------
sub listup {
	my ($base, $path) = @_;
	(my $mod = $path) =~ s!/!::!g;

	opendir DIR, "$base/$path" or return;
	my @node = grep {!/^\.\.?$/} readdir DIR;
	closedir DIR;

	foreach (@node) {
		if (/(.+)\.pm$/) { $mod_list{"$mod$1"} = 1 }
		elsif (-d "$base/$path$_") { listup($base, "$path$_/") }
	}
}




#-------------------------------------------------
# フォームデコード
#-------------------------------------------------
sub decode {
	local($key,$val,$buf);
	
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		$postflag=1;
		read(STDIN, $buf, $ENV{'CONTENT_LENGTH'});
	} else {
		$postflag=0;
		$buf = $ENV{'QUERY_STRING'};
	}
	
	undef(%in);
	@key=(); @required=(); @err=(); $check=0;
	foreach ( split(/&/, $buf) ) {
		($key, $val) = split(/=/);
		$key =~ tr/+/ /;
		$key =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("H2", $1)/eg;
		$val =~ tr/+/ /;
		$val =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("H2", $1)/eg;
		
		# タグ排除
		$key =~ s/&/&amp;/g;
		$key =~ s/"/&quot;/g;
		$key =~ s/</&lt;/g;
		$key =~ s/>/&gt;/g;
		
		$val =~ s/&/&amp;/g;
		$val =~ s/"/&quot;/g;
		$val =~ s/</&lt;/g;
		$val =~ s/>/&gt;/g;
		$val =~ s/,/&cedil;/g;
		
		if($flag_url == 1){
			if($val =~ m/http:\/\/|HTTP:\/\/|https:\/\/|HTTPS:\/\/|ftp:\/\/|FTP:\/\//){
				&error("<p>不正なURL入力がありました。</p><p>$key：$val</p>");
			}
		}
		
		# 必須入力項目
		if ($key =~ /^_(.+)/) {
			$key = $1;
			push(@required,$key);
			
			if ($val eq "") { $check++; push(@err,$key); }
		}
		
		$in{$key} .= "\0" if (defined($in{$key}));
		$in{$key} .= $val;
		
		push(@key,$key);
	}
	
	# 返り値
	if ($buf) { return (1); } else { return (0); }
}
