<!-- 反過來顯示 由1月到12月 -->
<!-- 五篇一分頁 -->
<!-- 繼續閱讀 加在詳細報導之後 套bootstrap collapse -->
<!-- Chart.js 下方製作國家危險程度(以出現國家名來列) -->

    <div id="news">
        <p id="add">近三個月內新聞 <i class="far fa-clock"></i></p>


        <table>
            <tr id="th">
                <th style="width:25%">日期</th>
                <th style="width:30%">相關國家</th>
                <th style="width:45%">本篇報導</th>
            </tr>
        </table>

        <script>
            $.getJSON('api.php').done((re) => {
                console.log(re);
                console.log(re[0].headline);
                // console.log(re.length);
                let areaId = new Array();
                for (let i = 0; i < re.length; i++) {
                    let tmp = (re[i].headline.includes('肺炎')) ? (`
                <tr>
                    <td class="news_date">${re[i].sent.split('T')[0]}</td>
                    <td class="area a${i}">${re[i].areaDesc}</td>
                    <td id="d${i}" class="desc">${re[i].description}</td>
                </tr>
                `) : '';
                    $("#th").after(tmp);
                    $("tr").css('border-bottom', '#db0000 2px solid')
                }

                // 國家名套btn
                for (let i = 0; i < $(".area").length; i++) {
                    let area = '';
                    let id = $(".area").eq(i).attr('class').split(' ')[1]; //相關國家id
                    let descId = $(".desc").eq(i);
                    // console.log(descId);
                    let idNum = $(`.${id}`).html().split(',').length; //相關國家數量
                    // console.log(idNum);
                    for (let k = 0; k < idNum; k++) {
                        area = area +
                            `<span class="btn btn-outline-dark">${$(`.`+id).html().split(',')[k]}</span>`;
                        // $(".desc").eq(0).html().replace(`全球`,`123`);
                        // 詳細介紹國家名換顏色/粗體match
                        text = descId.html().replace(`${$(`.`+id).html().split(',')[k]}`,
                            `<b>${$(`.`+id).html().split(',')[k]}</b>`);
                        descId.html(text);

                    }
                    $('.' + id).html(area);
                    // console.log(area);
                    // 這篇報導有的國家名 $('.'+id).text()




                }



            })
        </script>

        <p>news's source:衛生福利部疾病管制署&CDC</p>
    </div>

<!-- ${re[i].description.slice(0,80) 80字文章 -->
<!-- `).replace(/\s*/g,"") : '';  把空白都取消掉-->