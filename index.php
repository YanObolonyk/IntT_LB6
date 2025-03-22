<?php

?>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Прокат авто</title>
</head>
<body>
    <h2>Введіть дату для розрахунку доходу</h2>
    <form action="post1.php" method="POST">
        <label for="inputDate">Дата:</label>
        <input type="date" id="inputDate" name="inputDate" required>
        <button type="submit">Розрахувати</button>
    </form>

    <h2>Введіть пробіг:</h2>
    <form action="post2.php" method="POST">
        <input type="number" name="mileage" required>
        <button type="submit">Шукати</button>
    </form>
    
    <h2>Перевірити наявні марки авто:</h2>
    <form action="post3.php" method="POST">
        <button type="submit">Показати марки автомобілів</button>
    </form>


</body>
</html>