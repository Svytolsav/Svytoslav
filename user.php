<?php
require_once 'db.php';
$user = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Профиль студента</title>
</head>
<body>
    <a href="index.php">Назад к списку</a>
    <hr>
    <?php if ($user): ?>
        <h1>Карточка студента</h1>
        <p><b>ID:</b> <?php echo $user['id']; ?></p>
        <p><b>Имя:</b> <?php echo $user['name']; ?></p>
        <p><b>Email:</b> <?php echo $user['email']; ?></p>
    <?php else: ?>
        <p>Студент не найден!</p>
    <?php endif; ?>
</body>
</html>
