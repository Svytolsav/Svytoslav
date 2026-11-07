<?php 
require_once 'db.php'; 
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Главная страница</title>
</head>
<body>
    <h1>Список студентов</h1>
    <a href="add.php"><b>Добавить нового студента</b></a>
    <hr>
    <ul>
        <?php
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<a href='user.php?id=" . $row['id'] . "'>" . $row['name'] . "</a>";
            echo "</li>";
        }
        ?>
    </ul>
</body>
</html>
