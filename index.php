<?php
session_start();

// ▼ パスワード設定（必要に応じて暗号化にも対応可能）
$correctPassword = '0000';

// ▼ ログアウト処理
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}

// ▼ ログイン処理
if (isset($_POST['password'])) {
    if ($_POST['password'] === $correctPassword) {
        $_SESSION['logged_in'] = true;
        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        exit;
    } else {
        $loginError = "パスワードが違います";
    }
}

// ▼ 未ログインならログインフォームを表示して終了
if (!isset($_SESSION['logged_in'])):
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
  <form method="post" class="card p-4 shadow" style="min-width:300px;">
    <h4 class="mb-3">ログイン</h4>
    <?php if (isset($loginError)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($loginError) ?></div>
    <?php endif; ?>
    <input type="password" name="password" class="form-control mb-3" placeholder="パスワードを入力" required>
    <button class="btn btn-primary w-100">ログイン</button>
  </form>
</body>
</html>
<?php exit; endif; ?>

<?php // ▼ 未ログインならログインフォームを表示して終了 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理画面</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>管理ページ</h1>
      <a href="?logout=1" class="btn btn-outline-danger">ログアウト</a>
    </div>

    <p>ログイン成功！ここに管理機能や内容を追加してください。</p>
    <p>例：アップロード機能、ファイル管理、ユーザー一覧など。</p>
  </div>
</body>
</html>
