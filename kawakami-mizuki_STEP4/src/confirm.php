<?php
// エラーメッセージを格納する配列
$errors = [];

// POSTデータの取得と初期化
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$age = isset($_POST['age']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_post['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$address = isset($_POST['address']) ? trim($_POST['address']) : '';
$question = isset($_POST['question']) ? trim($_POST['question']) : '';
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

// --- バリデーション (条件チェック) ---

// 1. 未入力チェック (必須項目)
if ($name === '' || $age === '' || $phone === '' || $email === '' || $address === '' || $gender === '') {
    $errors[] = "未入力の項目があります。";
}

// 2. 各個別の形式チェック
// name: ひらがな、カタカナ、漢字、英字のみ
if ($name !== '' && !preg_match('/^[a-zA-Z\x{3041}-\x{309F}\x{30A1}-\x{30FC}\x{4E00}-\x{9FFF}]+$/u', $name)) {
    $errors[] = "name：名前はひらがな、カタカナ、漢字、英字のみ使用できます。";
}

// age: 0から150の間
if ($age !== '') {
    if (!ctype_digit($age) || (int)$age < 0 || (int)$age > 150) {
        $errors[] = "age:年齢は0から150の間で入力してください。";
    }
}

// phone: 半角数字とハイフンのみ
if ($phone !== '' && !preg_match('/^[0-9-]+$/', $phone)) {
    $errors[] = "phone:電話番号は半角数字とハイフンのみ使用できます。";
}

// email: メールアドレスの形式
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "email:メールアドレスの形式が正しくありません。";
}

// address: ひらがな、カタカナ、漢字、英字、半角数字、ハイフンのみ
if ($address !== '' && !preg_match('/^[a-zA-Z0-9-\x{3041}-\x{309F}\x{30A1}-\x{30FC}\x{4E00}-\x{9FFF}]+$/u', $address)) {
    $errors[] = "address:住所はひらがな、カタカナ、漢字、英字、半角数字、ハイフンのみ使用できます。";
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meat charset="UTF-8">
    <title>入力内容確認</title>
</head>
<body>
    <h1>入力内容確認</h1>

    <?php if (count($errors) > 0): ?>
        <!-- エラーがある場合　-->
        <div style="color: red;">
            <?php foreach ($errors as $errors): ?>
                <p><?php echo htmlspecialchars($errors, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endforeach; ?>
        </div>
        <p><a href="form.php">入力画面に戻る</a></p>
    <?php else: ?>
        <!-- エラーがない (条件通り入力されて遷移した)　場合　-->
        <p>名前: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>年齢: <?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>電話番号: <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>メールアドレス: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>住所: <?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>質問: <?php echo htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>性別: <?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
</body>
</html>

