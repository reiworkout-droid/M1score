<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>M1の採点してみんね？</title>
</head>
<body>
    <form action="create.php" method="POST">
        <fieldset>
            <legend>M1の採点してみんね？</legend>
            <a href="read.php" id="results">結果画面</a>
            <div id="judgement">
                    <div id="referee">
                        審査員：<input type="text" name="referee">
                    </div>
                    <div id="combination">
                        コンビ：<select name="comedian" id="comedian">
                                <option value="">選択してください</option>
                                <option value="ヤーレンズ">ヤーレンズ</option>
                                <option value="めぞん">めぞん</option>
                                <option value="カナメストーン">カナメストーン</option>
                                <option value="エバース">エバース</option>
                                <option value="真空ジェシカ">真空ジェシカ</option>
                                <option value="ヨネダ2000">ヨネダ2000</option>
                                <option value="たくろう">たくろう</option>
                                <option value="ドンテコルテ">ドンテコルテ</option>
                                <option value="豪快キャプテン">豪快キャプテン</option>
                                <option value="ママタルト">ママタルト</option>
                            </select>
                    </div>
                    <div id="point">
                        点数：<select name="score" id="score"></select>
                    </div>
                    <div id="opinion">
                        感想・審査基準：<br><textarea name="description" id="description"></textarea>
                    </div>
                    <button id="sendButton">送信</button>
            </div>
        </fieldset>
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    // 点数のセレクトボックス
    function selectBoxScore(start, end) {
        let str = "";
        for(let i = start; i<end; i++) {
            str += `<option value="${i}">${i}</option>`;
        }
        return str;
    }
    const score = selectBoxScore(0,101);
    $('#score').html(score);
</script>
</body>
</html>