<?php
$path = dirname(__FILE__);
$file = file($path."/全唐诗/杜甫.txt");

//随机读取一行
$arr  = mt_rand( 0, count( $file ) - 1 );
$content_1  = trim($file[$arr]);
$content_2 = str_replace("，","，<br>",$content_1);

//编码判断，用于输出相应的响应头部编码
if (isset($_GET['charset']) && !empty($_GET['charset'])) {
    $charset = $_GET['charset'];
    if (strcasecmp($charset,"gbk") == 0 ) {
		$content_1 = mb_convert_encoding($content_1,'gbk', 'utf-8');
		$content_2 = mb_convert_encoding($content_2,'gbk', 'utf-8');
    }
} else {
    $charset = 'utf-8';
}
header("Content-Type: text/html; charset=$charset");

//格式化判断，输出js或纯文本，如无特殊说明【rows】则发送单行文本
if ($_GET['format'] === 'js') {
	if($_GET['rows'] == '2'){
		echo "function hitokoto(){document.write('" . $content_2 . "');}";
	} else {
		echo "function hitokoto(){document.write('" . $content_1 . "');}";
	}
} else {
	if($_GET['rows'] == '2'){
		echo $content_2;
	} else {
    		echo $content_1;
	}
}
