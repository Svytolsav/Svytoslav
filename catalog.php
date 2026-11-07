<?php
require_once 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['prod_title'] ?? '');
    $price = str_replace(',', '.', trim($_POST['prod_price'] ?? ''));

    if ($title === '' || $price === '') {
        $message = "<p style='color:red;'>Заполните все поля!</p>";
    } elseif (mb_strlen($title) > 100) {
        $message = "<p style='color:red;'>Название слишком длинное!</p>";
    } elseif (!is_numeric($price) || $price < 0) {
        $message = "<p style='color:red;'>Цена должна быть числом не меньше 0!</p>";
    } else {
        $price = (float)$price;
        $stmt = $conn->prepare("INSERT INTO products (title, price) VALUES (?, ?)");
        $stmt->bind_param("sd", $title, $price);
        if ($stmt->execute()) {
            $message = "<p style='color:green;'>Товар добавлен!</p>";
        } else {
            $message = "Ошибка: " . htmlspecialchars($stmt->error);
        }
        $stmt->close();
    }
}

$result = $conn->query("SELECT id, title FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Каталог</title>
</head>
<body>
    <h1>Каталог товаров</h1>
    <a href="add_product.php"><b>Добавить товар</b></a>
    <hr>
    <?php echo $message; ?>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <a href="product.php?id=<?php echo $row['id']; ?>">
                    <?php echo htmlspecialchars($row['title']); ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>