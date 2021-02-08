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
    
<div class="center d-flex">
    <div class="title d-flex"><div>Coronavirus</div><div id="t2">Update</div></div>
    <div class="left col-3 d-flex">
                <a class="blo" href="?do=marquee">marquee AD</a>
				<a class="blo" href="?do=pop">pop news AD</a>
				<a class="blo" href="?do=info">info AD</a>
    </div>
    
    <div class="right col-9">
        <div class="r_block">
        <marquee><?=$Marquee->find(['sh'=>1])['text'];?></marquee>
                <div class="r_text">
				<!-- main -->
				<?php
				$do = (isset($_GET['do']))?$_GET['do']:'main';
				$file='backend/'.$do.'.php';
				if(file_exists($file)){
					include_once $file;
				}else{
					include_once "backend/main.php";
				}
				?>
				</div>
        </div>
    </div>
</div>
<button id="login" onclick="logout()">logout</button>


    </div>
</body>
</html>

<script>
    function logout(){
        $.post('api/logout.php',function(){
            location.href="index.php";
        })
    }
</script>