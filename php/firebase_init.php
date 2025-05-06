<?php
require_once 'path/to/autoload.php'; 
use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('path/to/serviceAccount.json');
$messaging = $factory->createMessaging();
$database = $factory->createDatabase();
?>