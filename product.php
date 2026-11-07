<?php
require_once 'db.php';
$id = intval($_GET['id'] ?? 0);

$stmt = $conn->prepare("SELECT id, title, price FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Карточка товара</title>
</head>
<body>
    <a href="catalog.php">Назад к каталогу</a>
    <hr>
    <?php if ($product): ?>
        <h1>Карточка товара</h1>
        <p><b>ID:</b> <?php echo $product['id']; ?></p>
        <p><b>Название:</b> <?php echo htmlspecialchars($product['title']); ?></p>
        <p><b>Цена:</b> <?php echo $product['price']; ?></p>
    <?php else: ?>
        <p>Товар не найден!</p>
    <?php endif; ?>
</body>
</html>