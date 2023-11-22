<?php

require_once 'src/SeedsModel.php';
require_once 'src/SeedsViewer.php';
require_once 'src/Seed.php';

$db = new PDO('mysql:host=db; dbname=seed_vault', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

$seedsModel = new SeedsModel($db); 
$seeds = $seedsModel->getAllSeeds();

if (
    isset($_POST['name']) &&
    isset($_POST['family_name']) &&
    isset($_POST['species']) &&
    isset($_POST['image']) &&
    isset($_POST['description'])
) {
    // Saving the data into variables
    $name = $_POST['name'];
    $family_name = $_POST['family_name'];
    $species = $_POST['species'];
    $species = $_POST['image'];
    $species = $_POST['description'];

    $db = connectToDb();

    $success = addASeed($db, $name, $family_name, $species, $image, $description);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abby's Seed Vault</title>
    
</head>
<body>
    <h1>Please add New Seeds!</h1>
        <div>
            <form method = "POST">
                <label for="name">Name of Plant Seed:</label>
                <input type="text" id="name" name="name" />

                <label for="family_name">What plant family does it come from?:</label>
                <input type="text" id="family_name" name="family_name" />

                <label for="species">What species is it?:</label>
                <input type="text" id="species" name="species" />

                <label for="image">What species is it?:</label>
                <input type="text" id="image" name="image" />

                <label for="description">What species is it?:</label>
                <input type="text" id="description" name="description" />

                <input type="submit" value="Add a Seed!" />
            </form>
        </div>


<?php
echo SeedsViewer::displayAllSeeds($seeds);

if (isset($success) && $success) {
    echo "Thank you for adding a new seed!";
}

?>
    
</body>
</html>