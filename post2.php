<?php

include 'connection.php';
$carsCollection = $db->cars;

$mileageLimit = null;
$cars = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["mileage"])) {
    $mileageLimit = (int) $_POST["mileage"]; // значення mileage з форми на ціле число

    $cars = $carsCollection->find(["mileage" => ['$lt' => $mileageLimit]]);// знаходимо автомобілі, у яких пробіг менше заданого ліміту
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Результати пошуку</title>
</head>
<body>
    <h2>Результати пошуку:</h2>
    <?php if ($mileageLimit !== null): ?>
        <?php 
        $found = false;
        foreach ($cars as $car): 
            $found = true;
        ?>
            <ul>
                <li>
                    <strong>Марка:</strong> <?= htmlspecialchars($car["brand"]) ?><br>
                    <strong>Рік випуску:</strong> <?= htmlspecialchars($car["year"]) ?><br>
                    <strong>Пробіг:</strong> <?= htmlspecialchars($car["mileage"]) ?><br>
                    <strong>Стан:</strong> <?= htmlspecialchars($car["condition"]) ?>
                </li>
            </ul>
        <?php endforeach; ?>

        <?php if (!$found): ?>
            <p>Немає автомобілів з пробігом менше <?= htmlspecialchars($mileageLimit) ?> км.</p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>
