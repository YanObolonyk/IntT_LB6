<?php

include 'connection.php';
$carsCollection = $db->cars;

$carBrands = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carBrands = $carsCollection->distinct("brand"); // отримання унікальних марок автомобілів
}

if (!empty($carBrands)): ?>
    <h3>Марки автомобілів в наявності:</h3>
    <ul>
        <?php foreach ($carBrands as $brand): ?>
            <li><?php echo htmlspecialchars($brand); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif;
?>
