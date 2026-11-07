<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Добавить товар</title>
</head>
<body>
    <a href="catalog.php">К каталогу</a>
    <hr>
    <h1>Добавление товара</h1>
    <form action="catalog.php" method="POST">
        <label>Название:</label><br>
        <input type="text" name="prod_title" maxlength="100"><br><br>
        <label>Цена:</label><br>
        <input type="text" name="prod_price"><br><br>
        <input type="submit" value="Сохранить">
    </form>
</body>
</html>