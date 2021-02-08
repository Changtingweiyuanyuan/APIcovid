<?php
include_once "../base.php";

$chk=$Mem->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
    echo '1';
    $_SESSION['login']=$_POST['acc'];
}else{
    echo '0';
}