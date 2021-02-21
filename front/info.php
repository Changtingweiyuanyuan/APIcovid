<div class="pic" style="position:relative;padding-bottom:10px">
<img src="857.png" style="width:100%;height:100%">
<div class="table" style="position:absolute;top: 2%;left: 4%;width: 92%;height:92%;overflow:auto;">
<marquee style="padding-top:5px;padding-bottom:5px;color:red;font-weight:bolder"><?=$Marquee->find(['sh'=>1])['text']?></marquee>
<div>
        <?php
        $count=$News->count();
        $div=3;
        $pages=ceil($count/$div);
        $now=(isset($_GET['p']))?$_GET['p']:'1';
        $start=($now-1)*$div;
        $news=$News->all(['sh'=>1],"order by `good` desc limit $start,$div");
        foreach($news as $k => $n){
        ?>
        <div>
            <span style="width:20%"><b>標題</b></span>
            <span style="width:80%"><?=$n['title'];?></span>
        </div>
        <div>
            <span style="width:20%"><b>人氣</b></span>
            <span style="width:80%">
            
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
            
            </span>
        </div>
        
        <div style="margin-bottom:4%;width:100%;">

            <div id="a<?=$k?>">
                <div style="width:100%;">
                <?=mb_substr($n['text'],'0','50');?>
                </div>
                <div style="width:100%;text-align:right">
                <button class="btn btn-outline-dark p-1" style="font-size:0.8rem;" onclick="text(<?=$k?>)">觀看完整新聞</button>
                </div>
            </div>

            <div style="display:none" id="b<?=$k?>">
                <div style="width:100%;" class="pb-2">
                <b>完整內容</b><button class="btn btn-dark p-1" style="font-size:0.8rem;float:right" onclick="keepwatch(<?=$k?>)">返回</button>
                </div>
                <hr>
            <?=nl2br($n['text']);?>
            </div>

        </div>
        <!-- <div><img src="image/line1.png" style="width:100%;filter:opacity(.5)"></div> -->
        <?php
        }?>
    </div>
    <div style="width:100%;" class="d-flex justify-content-center align-items-center">
    <?php
    if(($now-1)>0){
        echo '<a href="?do=pop&p='.($now-1).'"><</a>';
    }
    for($i=1;$i<=$pages;$i++){
        $fs=($i==$now)?'bolder':'none';
        echo '<a href="?do=pop&p='.$i.'" style="font-weight:'.$fs.'">'.$i.'</a>';
    }
    
    if(($now+1)<=$pages){
        echo '<a href="?do=pop&p='.($now+1).'">></a>';
    }
    ?>
    </div>


</div>

</div>



<script>
function op(title){
    $(title).next().next().toggle();
    $(title).next().toggle();
}
function clo(title){
    $(title).next().next().toggle();
    $(title).next().toggle();
}

function text(k){
   console.log($('a'+k))
    $('#a'+k).fadeOut(500,function(){
        $('#b'+k).fadeIn(500)
    })
    
}
function keepwatch(k){
    $('#b'+k).fadeOut(500,function(){
        $('#a'+k).fadeIn(500)
    })
    
}



</script>