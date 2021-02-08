    <form action="api/editMarquee.php" method="post">
        <table style="width:100%">
            <tr>
                <td style="width:10%;"></td>
                <td style="width:70%;">跑馬燈內容:點擊鋼筆可做修改</td>
                <td style="width:10%;text-align:center">顯示</td>
                <td style="width:10%;text-align:center">刪除</td>
            </tr>
            <tr>
                <td colspan="4"><img src="image/line.png" class="mar_line"></td>
            </tr>
            <?php
            $mars = $Marquee->all();
            foreach($mars as $m){
            ?>
            <tr>
                <td style="text-align:center"><button onclick="block(this)" type="button"><i class="fas fa-pen-fancy"></i></button></td>
                <td><?=$m['text']?></td>
                <td style="text-align:center"><input type="radio" name="sh" value="<?=$m['id']?>" <?=($m['sh']==1)?'checked':''?>></td>
                <td style="text-align:center"><input type="checkbox" name="del[]" value="<?=$m['id']?>">
                <input type="hidden" name="id[]" value="<?=$m['id']?>">
            </td>
            </tr>
            <tr style="display:none">
            <td colspan="4">
                <input type="text" name="text" style="width:80%">
                <button type="button" onclick="revise(this)">確定修改</button>
                <input type="hidden" name="reviseId" value="<?=$m['id']?>">
            </td>
            </tr>
            <?php
            }?>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-center">
                    <input class="btn btn-dark" type="submit" style="width:80%" value="確定修改">
                </td>
            </tr>
</form>
            <tr>
                <td colspan="4"><img src="image/line.png" class="mar_line"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">新增跑馬燈</td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="text" name="insertT" style="width:80%" class="ii">
                    <button type="button" onclick="insert(this)">確定新增</button>
                </td>
            </tr>
        </table>

    


<script>
    function block(tdButton){
        console.log($(tdButton).parents('tr').next())
        $(tdButton).parents('tr').next().fadeIn()
    }

    function revise(reviseT){
        let reviseText=$(reviseT).siblings('input[type=text]').val();
        let reviseId=$(reviseT).siblings('input[type=hidden]').val();
        // console.log(text);
        $.post('api/editMarquee.php',{reviseText,reviseId},function(re){
            location.reload();
        })
    }

    function insert(insertT){
        let insertText=$(insertT).siblings('input[class=ii]').val();
        $.post('api/editMarquee.php',{insertText},function(re){
            location.reload();
        })
    }

</script>