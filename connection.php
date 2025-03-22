<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://127.127.126.17:27017");

$db = $client->dbforlab;