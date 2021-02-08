<div id="login">
    <fieldset>
        <legend>會員登入</legend>
        <form>
            <table>
                <tr>
                    <td class="clo">帳號</td>
                    <td><input type="text" name="acc" id="acc"></td>
                </tr>
                <tr>
                    <td class="clo">密碼</td>
                    <td><input type="password" name="pw" id="pw"></td>
                </tr>
                <tr>
                    <td><input type="button" value="登入" onclick="chkacc()">
                    <input type="reset" value="清除"></td>
                    <td>
                    <a href="?do=forget">忘記密碼</a>|
                    <a href="?do=reg">尚未註冊</a>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>

<script>
function chkacc(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();
    $.post('api/chkacc.php',{acc},function(re){
        // console.log(re);
        if(re=='1'){
            $.post('api/chkpw.php',{acc,pw},function(re){
                // console.log(re);
                if(re=='1'){
                    if(acc=='admin'){
                        location.href="backend.php";
                    }else{
                        alert('登入成功')
                        location.href="index.php";
                    }
                }else{
                    alert('密碼有誤')
                    $("#acc,#pw").val('');
                }
            })
        }else{
            alert('帳號不存在')
            $("#acc,#pw").val('');
        }
    })
}
</script>