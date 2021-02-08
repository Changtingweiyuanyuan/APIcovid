<fieldset>
<legend>目標位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <th class="ct" style="width:30%">標題</th>
            <th class="ct" style="width:50%">內容</th>
            <th class="ct" style="width:20%">人氣</th>
        </tr>
        <?php
        $count=$News->count();
        $div=5;
        $pages=ceil($count/$div);
        $now=(isset($_GET['p']))?$_GET['p']:'1';
        $start=($now-1)*$div;
        $news=$News->all(['sh'=>1],"order by `good` desc limit $start,$div");
        foreach($news as $k => $n){
        ?>
        <tr>
            <td class="ct" onmouseover="op(this)" onmouseout="clo(this)"><?=$n['title'];?></td>
            <td class="ct"><?=mb_substr($n['text'],'0','30');?></td>
            <td class="ct" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;"><?=$n['text'];?></td>
            <td class="ct">
            <?=$n['good'];?>個人說讚<img src="icon/02B03.jpg" style="height:20px;width:20px">
            <?php
            if(isset($_SESSION['login'])){
                $chk=$Log->find(['acc'=>$_SESSION['login'],'newid'=>$n['id']]);
                if($chk){
                    //收回讚
            ?>
            <a href="#" onclick="good('<?=$n['id']?>',2,'<?=$_SESSION['login']?>')">收回讚</a>
            <?php
                }else{
                    //可以按讚
                    ?>
            <a href="#" onclick="good('<?=$n['id']?>',1,'<?=$_SESSION['login']?>')">讚</a>
            <?php
                }
            }
            ?>
            </td>
        </tr>
        <?php
        }?>
    </table>
    <div class="ct" style="width:100%">
    <?php
    if(($now-1)>0){
        echo '<a href="?do=pop&p='.($now-1).'"><</a>';
    }
    for($i=1;$i<=$pages;$i++){
        $fs=($i==$now)?'40px':'18px';
        echo '<a href="?do=pop&p='.$i.'" style="font-size:'.$fs.'">'.$i.'</a>';
    }
    
    if(($now+1)<=$pages){
        echo '<a href="?do=pop&p='.($now+1).'">></a>';
    }
    ?>
    </div>
</fieldset>

<script>
function op(title){
    $(title).next().next().toggle();
    $(title).next().toggle();
}
function clo(title){
    $(title).next().next().toggle();
    $(title).next().toggle();
}
</script>