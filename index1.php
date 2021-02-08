<?php
include_once "base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網</title>
	<link href="css/css.css" rel="stylesheet" type="text/css">
	<link href="css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />	
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha3/css/bootstrap.min.css'/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/js.js"></script>
	<script src="js/SpryTabbedPanels.js" type="text/javascript"></script>
</head>

<body>
	<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
		<pre id="ssaa"></pre>
	</div>
	<div id="all">
		<div id="title">
			更新日期:<?=date('m 月 d 號 l')?> | 今日瀏覽: <?=$Total->count(['date'=>date('Y-m-d')])?> | 累積瀏覽: <?=$Total->q("select sum(`total`) from `total`")[0][0]?> 
			<a href="index.php?do=login" style="float:right">後台管理</a></div>
		<div id="title2">
	<img src="icon/02B01.jpg" alt="">
		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=news">最新新聞</a>
				<a class="blo" href="?do=pop">人氣新聞</a>
				<a class="blo" href="?do=know">防疫資訊</a>
			</div>
			<div class="hal" id="main">
				<div style="width:100%;display:flex">
				<span style="width:100%; display:inline-block;">
						<marquee>疫情期間請保持基本社交距離</marquee>
				</span></div>
				<div class="">
				<!-- main -->
				<?php
				$do = (isset($_GET['do']))?$_GET['do']:'main';
				$file='front/'.$do.'.php';
				if(file_exists($file)){
					include_once $file;
				}else{
					include_once "front/main.php";
				}
				?>
				</div>
				</div>
			</div>
		</div>

	</div>

</body>

</html>