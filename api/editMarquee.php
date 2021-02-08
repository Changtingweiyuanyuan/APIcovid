<?php
include_once "../base.php";

print_r($_POST);

if(isset($_POST['reviseText'])){
    $r=$Marquee->find(['id'=>$_POST['reviseId']]);
    $r['text']=$_POST['reviseText'];
    $Marquee->save($r);
}

if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Marquee->del($id);
        }else{
            $n=$Marquee->find(['id'=>$id]);
            $n['sh']=($id==$_POST['sh'])?'1':'0';
            $Marquee->save($n);
        }
    }
}

if(isset($_POST['insertText'])){
    $i['text']=$_POST['insertText'];
    $i['sh']='0';
    $Marquee->save($i);
}

to('../backend.php?do=marquee');