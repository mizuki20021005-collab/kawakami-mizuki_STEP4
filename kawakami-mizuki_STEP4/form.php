<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>フォーム入力</title>
</head>
<body>
<div class="form-container">
    <h1>フォーム入力</h1>
    <form action="confirm.php" method="post" class="form-panel">
        <div class="form-group">
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="age">年齢:</label>
            <input type="text" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="phone">電話番号:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">住所:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="question">質問:</label>
            <input type="text" id="question" name="question" required>
        </div>
        <div class="form-group">
            <label for="gender">性別:</label>
            <select id="gender" name="gender" required>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
            </select>
        </div>
        <button type="submit" class="button">送信</button>
    </form>
</div>
</body>
</html>
