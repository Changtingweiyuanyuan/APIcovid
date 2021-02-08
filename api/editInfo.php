<!-- 顯示刪除info -->
<?php
include_once "../base.php";


print_r($_POST);
if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Info->del($id);
        }else{
            $n=$Info->find(['id'=>$id]);
            $n['sh']=(in_array($id,$_POST['sh']))?'1':'0';
            $Info->save($n);
        }
    }
}

to('../backend.php?do=info');

?>