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