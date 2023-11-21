<?php

require_once 'src/SeedsModel.php';
require_once 'src/SeedsViewer.php';
require_once 'src/Seed.php';

$db = new PDO('mysql:host=db; dbname=seed_vault', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

$seedsModel = new SeedsModel($db); 

$seeds = $seedsModel->getAllSeeds();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abby's Seed Vault</title>
    
</head>
<body>

<?php
echo SeedsViewer::displayAllSeeds($seeds);
?>
    
</body>
</html>