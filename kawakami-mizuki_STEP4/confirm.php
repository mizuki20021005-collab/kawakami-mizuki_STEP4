<?php
// フォームから送信された値を取得
$name    = trim($_POST['name'] ?? '');
$age     = trim($_POST['age'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$email   = trim($_POST['email'] ?? '');
$address = trim($_POST['address'] ?? '');
$question = trim($_POST['question'] ?? '');
$gender = trim($_POST['gender'] ?? '');

$errors = [];

// 名前：ひらがな、カタカナ、漢字、英字のみ
if ($name === '') {
    $errors[] = '名前を入力してください。';
} elseif (!preg_match('/\A[ぁ-ゖァ-ヺー一-龯々〆ヵヶa-zA-Z]+\z/u', $name)) {
    $errors[] = '名前はひらがな、カタカナ、漢字、英字のみ使用できます。';
}

// 年齢：0～150の整数
if ($age === '') {
    $errors[] = '年齢を入力してください。';
} elseif (!preg_match('/\A[0-9]+\z/', $age) || (int)$age > 150) {
    $errors[] = '年齢は0から150の間で入力してください。';
}

// 電話番号：半角数字とハイフンのみ
if ($phone === '') {
    $errors[] = '電話番号を入力してください。';
} elseif (!preg_match('/\A[0-9-]+\z/', $phone)) {
    $errors[] = '電話番号は半角数字とハイフンのみ使用できます。';
}

// メールアドレス：正しいメール形式
if ($email === '') {
    $errors[] = 'メールアドレスを入力してください。';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'メールアドレスの形式が正しくありません。';
}

// 住所：ひらがな、カタカナ、漢字、英字、半角数字、ハイフンのみ
if ($address === '') {
    $errors[] = '住所を入力してください。';
} elseif (!preg_match('/\A[ぁ-ゖァ-ヺー一-龯々〆ヵヶa-zA-Z0-9-]+\z/u', $address)) {
    $errors[] = '住所はひらがな、カタカナ、漢字、英字、半角数字、ハイフンのみ使用できます。';
}

// 質問
if ($question === '') {
    $errors[] = '質問内容を入力してください。';
}

//性別
$allowed_genders = ['男性', '女性', 'その他'];
if ($gender === '') {
    $errors[] = '性別を選択してください。';
} elseif (!in_array($gender, $allowed_genders, true)) {
    $errors[] = '不正な性別が選択されました。';
}

// エラーがある場合
if (!empty($errors)) {
    echo '<h1>入力エラー</h1>';
    echo '<ul>';

    foreach ($errors as $error) {
        echo '<li>' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</li>';
    }

    echo '</ul>';
    echo '<a href="form.php">入力画面に戻る</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
</head>
<body>
    <h1>入力内容確認</h1>

    <p>名前：<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></p>
    <p>年齢：<?= htmlspecialchars($age, ENT_QUOTES, 'UTF-8') ?></p>
    <p>電話番号：<?= htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') ?></p>
    <p>メールアドレス：<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>
    <p>住所：<?= htmlspecialchars($address, ENT_QUOTES, 'UTF-8') ?></p>
    <p>質問：<?= htmlspecialchars($question, ENT_QUOTES, 'UTF-8') ?></p>
    <p>性別：<?= htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') ?></p>

    <p>入力内容に問題はありません。</p>
</body>
</html>