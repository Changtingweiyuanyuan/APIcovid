<!-- 新增info -->
<?php
include_once "../base.php";

$_POST['sh']=1;
$Info->save($_POST);

to('../backend.php?do=info');

?>