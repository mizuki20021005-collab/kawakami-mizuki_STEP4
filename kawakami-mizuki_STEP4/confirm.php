<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.php');
    exit;
}

$name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
$age = htmlspecialchars($_POST['age'] ?? '', ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars($_POST['address'] ?? '', ENT_QUOTES, 'UTF-8');
$question = htmlspecialchars($_POST['question'] ?? '', ENT_QUOTES, 'UTF-8');
$gender = htmlspecialchars($_POST['gender'] ?? '', ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>入力確認</title>
</head>
<body>
<div class="form-container">
    <h1>入力確認</h1>
    <div class="form-panel">
    <div class="form-group">
        <span class="label">名前:</span>
        <div class="confirm-value"><?= $name ?></div>
    </div>
    <div class="form-group">
        <span class="label">年齢:</span>
        <div class="confirm-value"><?= $age ?></div>
    </div>
    <div class="form-group">
        <span class="label">電話番号:</span>
        <div class="confirm-value"><?= $phone ?></div>
    </div>
    <div class="form-group">
        <span class="label">メールアドレス:</span>
        <div class="confirm-value"><?= $email ?></div>
    </div>
    <div class="form-group">
        <span class="label">住所:</span>
        <div class="confirm-value"><?= $address ?></div>
    </div>
    <div class="form-group">
        <span class="label">質問:</span>
        <div class="confirm-value"><?= $question ?></div>
    </div>
    <div class="form-group">
        <span class="label">性別:</span>
        <div class="confirm-value"><?= $gender ?></div>
    </div>
    <a href="form.php" class="button">戻る</a>
    </div>
</div>
</body>
</html>
