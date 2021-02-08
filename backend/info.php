<!-- 管理防疫相關文章 -->

<form action="api/editInfo.php" method="post">
    <table style="width:100%;" id="infoT1">
        <?php
        $infos = $Info->all(" order by `date` desc");
        foreach ($infos as $i) {
        ?>
            <tr>
                <td colspan="4" class="text-center"><i class="far fa-star"></i></td>
            </tr>
            <tr>
                <td style="width:50%">文章日期:<?= $i['date'] ?></td>
                <td style="width:30%">出處:<?= $i['publish'] ?></td>
                <td style="width:10%;text-align:center">顯示</td>
                <td style="width:10%;text-align:center">刪除</td>
            </tr>
            <tr>
                <td colspan="2"><b><?= $i['title'] ?></b></td>
                <td style="text-align:center">
                    <input type="checkbox" name="sh[]" value="<?= $i['id'] ?>" <?= ($i['sh'] == 1) ? 'checked' : '' ?>>
                </td>
                <td style="text-align:center"><input type="checkbox" name="del[]" value="<?= $i['id'] ?>">
                    <input type="hidden" name="id[]" value="<?= $i['id'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="4" class="infoContent">
                    <div><?= $i['text'] ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="4"><img src="image/line.png" class="mar_line"></td>
            </tr>
        <?php
        } ?>
    </table>
    <div class="sideButton">
        <button type="submit" class=" btn btn-dark">確定修改</button>
        <button type="button" class=" btn btn-dark" onclick="insertInfo(this)">新增文章</button>
    </div>
</form>


<form action="api/addInfo.php" method="post"><table id="infoT2" style="width:100%;">
<!-- 新增文章的table -->

<tr>
<td style="padding-left:10%">文章新增</td>
<td></td>
</tr>
<tr class="topSpace">
<td style="width:30%;padding-left:10%">文章日期</td>
<td style="width:70%"><input type="text" style="width:80%" name="date" placeholder="<?=date('Y-m-d')?>"></td>
</tr>
<tr>
<td colspan="2"><img src="image/line.png" class="mar_line"></td>
</tr>
<tr class="topSpace">
<td style="width:30%;padding-left:10%">出處</td>
<td style="width:70%"><input type="text" style="width:80%" name="publish"></td>
</tr>
<tr>
<td colspan="2"><img src="image/line.png" class="mar_line"></td>
</tr>
<tr>
<td style="padding-left:10%">標題</td>
<td style="width:70%"><input type="text" style="width:80%" name="title"></td>
</tr>
<tr>
<td colspan="2"><img src="image/line.png" class="mar_line"></td>
</tr>
<tr>
<td style="padding-left:10%">內容</td>
<td></td>
</tr>
<tr>
<td colspan="2" style="padding-left:10%">
<textarea name="text" cols="30" rows="5" style="width:85%"></textarea>
</td>
</tr>
<tr>
<td></td>
<td style="padding-right:15%" class="text-right">
<button type="submit" class="btn btn-dark">確定新增</button>
</td>
</tr>
</table></form>

<script>
    function insertInfo(insertButton) {
        $("#infoT1").slideUp(1500)
            $(insertButton).fadeOut(1500)
            $(insertButton).siblings('button').fadeOut(1500,function(){
            $("#infoT2").fadeIn(1500)
                $(insertButton).attr({'class':'btn btn-danger','onclick':'back(this)'}).text('返回上頁');
                $(insertButton).fadeIn(750);
        });
        // console.log($(insertButton).siblings('button'))
    }
    function back(backButton){
        $("#infoT2").fadeOut(1500);
        $(backButton).fadeOut(1500,function(){
            $(backButton).attr({'class':'btn btn-dark','onclick':'insertInfo(this)'}).text('新增文章');
            $("#infoT1").slideDown(1500)
            $(backButton).fadeIn(1500);
            $(backButton).siblings('button').fadeIn(1500);
        });
    }
</script>