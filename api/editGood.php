<?php
include_once "../base.php";



switch($_POST['type']){
    case '2': //刪掉log紀錄 減少news good
        $Log->del(['acc'=>$_POST['user'],'newid'=>$_POST['id']]);
        $n=$News->find(['id'=>$_POST['id']]);
        $n['good']--;
        $News->save($n);
        break;
    case '1':
            $Log->save(['acc'=>$_POST['user'],'newid'=>$_POST['id']]);
            $n=$News->find(['id'=>$_POST['id']]);
            $n['good']++;
            $News->save($n);
    break;
}