<?php
include_once "../base.php";

$chk=$Mem->count(['acc'=>$_POST['acc']]);
if($chk){
    echo '1';
}else{
    echo '0';
}