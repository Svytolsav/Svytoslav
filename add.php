<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['student_name']);
    $email = $conn->real_escape_string($_POST['student_email']);

    if (!empty($name) && !empty($email)) {
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Студент добавлен!</p>";
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } else {
        echo "<p style='color: red;'>Заполните все поля!</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Добавить студента</title>
</head>
<body>
    <a href="index.php">Назад к списку</a>
    <hr>
    <h1>Форма добавления нового студента</h1>
    <form action="add.php" method="POST">
        <label>Имя студента:</label><br>
        <input type="text" name="student_name"><br><br>
        <label>Email:</label><br>
        <input type="email" name="student_email"><br><br>
        <input type="submit" value="Сохранить в БД">
    </form>
</body>
</html>
