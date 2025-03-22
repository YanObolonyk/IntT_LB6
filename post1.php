<?php

include 'connection.php';
$rentalsCollection = $db->rentals;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputDate = strtotime($_POST["inputDate"]); // перетворення введеної дати в формат UNIX timestamp

    if ($inputDate) {
        $rentals = $rentalsCollection->find([ // отримання всіх оренд, що закінчені
            'endDate' => ['$lte' => $inputDate]
        ]);

        $totalRevenue = 0;
        foreach ($rentals as $rental) {
            $totalRevenue += $rental['price'];
        }

        echo "<h3>Отриманий дохід з прокату станом на " . date("d.m.Y", $inputDate) . ":</h3>";
        echo "<p>Загальний дохід: $" . $totalRevenue . "</p>";
    } else {
        echo "<p style='color: red;'>Невірний формат дати. Використовуйте формат YYYY-MM-DD.</p>";
    }
}

?>
