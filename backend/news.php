<fieldset>
<form action="api/editNews.php" method="post">
    <table>
        <tr>
            <th class="ct">編號</th>
            <th class="ct">標題</th>
            <th class="ct">顯示</th>
            <th class="ct">刪除</th>
        </tr>
        <?php
        $count=$News->count();
        $div=3;
        $pages=ceil($count/$div);
        $now=(isset($_GET['p']))?$_GET['p']:'1';
        $start=($now-1)*$div;
        $news=$News->all(" limit $start,$div");
        foreach($news as $k => $n){
        ?>
        <tr>
            <td class="ct"><?=$start+1+$k?></td>
            <td class="ct"><?=$n['title'];?></td>
            <td class="ct"><input type="checkbox" name="sh[]" value="<?=$n['id'];?>" <?=($n['sh']=='1')?'checked':'';?>></td>
            <td class="ct"><input type="checkbox" name="del[]" value="<?=$n['id'];?>">
            <input type="hidden" name="id[]" value="<?=$n['id'];?>"></td>
        </tr>
        <?php
        }?>
    </table>
    <div class="ct" style="width:100%">
    <?php
    if(($now-1)>0){
        echo '<a href="?do=news&p='.($now-1).'"><</a>';
    }
    for($i=1;$i<=$pages;$i++){
        $fs=($i==$now)?'40px':'18px';
        echo '<a href="?do=news&p='.$i.'" style="font-size:'.$fs.'">'.$i.'</a>';
    }
    
    if(($now+1)<=$pages){
        echo '<a href="?do=news&p='.($now+1).'">></a>';
    }
    ?>
    </div>
    <input type="submit" value="確定修改">
</form>
</fieldset>