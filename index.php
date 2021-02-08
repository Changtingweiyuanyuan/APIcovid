<?php
include_once 'base.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css/css.css" rel="stylesheet" type="text/css"> -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha3/css/bootstrap.min.css'/>
    <link rel="stylesheet" href="codiv.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/js.js"></script>
    <title>COVID</title>
</head>
<body>
    <div class="container">
    
    <!-- <div class="title d-flex"><div>Coronavirus</div><div id="t2">Update</div></div> -->
<div class="center d-flex">
    <div class="left col-3 d-flex">
                <a class="blo" href="?do=news">latest news</a>
				<a class="blo" href="?do=pop">pop news</a>
				<a class="blo" href="?do=info">related info</a>
    </div>
    
    <div class="right col-sm-12 col-md-12 col-lg-9">
        <div class="r_block float-left">
        <!-- 背景 寬70% 高0 padding-bottom:97.85% -->
        <marquee><?=$Marquee->find(['sh'=>1])['text'];?></marquee>
                <div class="r_text">
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
<button id="login" onclick="op('#loginblock')">login</button>

<div id="loginblock" style="display:none;">
    <a onclick="cl('#loginblock')" style="position:absolute; right:10px; top:5px; cursor:pointer; z-index:9999; color:white;">X</a>

<form>
<div class="login_content">

    <span>管理者登入</span>
    <div class="res">
    </div>
    <input type="text" id="acc" placeholder="Username">
    <input type="password" id="pw" placeholder="Password">
    <div class="login_button d-flex">
        <button type="button" onclick="login()">login</button>
        <button type="reset">reset</button>
    </div>
</div>
</form>

</div>

<script>

function op(x){
    console.log('click');
        $(x).fadeIn()
}
function cl(x)
{
    $(x).fadeOut();
}

function login(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();
    // console.log(acc,pw);
    $.post("api/chkLogin.php",{acc,pw},function(res){
        if(res=='successed'){
            location.href="backend.php";
        }else{
        $(".res").html(res).fadeIn();
        }
    })
}
</script>

</body>
</html>
<!-- <a href='https://zh.pngtree.com/so/黃色的花蕊'>黃色的花蕊 png來自 zh.pngtree.com</a> -->
