<?php

require_once 'src/SeedsModel.php';
require_once 'src/SeedsViewer.php';
require_once 'src/Seed.php';



$db = new PDO('mysql:host=db; dbname=seed_vault', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

$query = $db->prepare('SELECT `seeds`.`id`, `seeds`.`name`, `plant_family`.`common_name` AS "Plant Family",
`seeds`.`species`, `seeds`. `image`, `seeds`.`description`
FROM `seeds`
	INNER JOIN `plant_family`
		ON `seeds`.`genus` = `plant_family`.`id`');

$query->execute();

$result = $query->fetchAll();

$seedsModel = new SeedsModel($db); 
$seeds = $seedsModel->getAllSeeds();


if (
    isset($_POST['name']) &&
    isset($_POST['genus']) &&
    isset($_POST['species']) &&
    isset($_POST['image']) &&
    isset($_POST['description'])
) {
    $name = $_POST['name'];
    $genus = $_POST['genus'];
    $species = $_POST['species'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    if (strlen($name) == 0 || strlen($name) > 31) {
        echo "Please fill in seed name that is between 1 to 30 characters!";
    } else if (intval($genus) == 0 || intval($genus) > 6) {
        echo "Please select a Plant Value from the dropdown menu!";
    } else if (strlen($species) == 0 || strlen($species) > 41) {
        echo "Please fill in species name that is between 1 to 40 characters!";
    } else if (strlen($image) == 0 || strlen($image) > 2000) {
        echo  "Please fill in a URL of an image that is between 1 to 2000 characters!";
    } else if (strlen($description) == 0 || strlen($description) > 2000) {
        echo "Please write a description that is between 1 to 500 characters!";
    } else {
        $seedsModel = new SeedsModel($db);
        $success = $seedsModel->addASeed ($name, $genus, $species, $image, $description);
     } 

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Abby's Seed Vault</title>
    
</head>
<body>
    <h1>Abby's Seed Vault</h1>
    <br/>
    <h2 class="pageTitle">Please add New Seeds!</h2>
        <div class="formContainer">
            <form method = "POST">
                <label for="name">Name of Plant Seed:</label>
                <input type="text" id="name" name="name" />
                <br/>

                <label for="genus">What plant family does it come from? </label>
                    <select id="genus" name="genus">
                        <option value= "0">Choose a Plant Family</option>
                        <option value= "1">Umbellifer</option>
                        <option value= "2">Brassica</option>
                        <option value= "3">Nightshade</option>
                        <option value= "4">Curcibits</option>
                        <option value= "5">Alliums</option>
                    </select>
                    <br/>

                <label for="species">What species is it?:</label>
                <input type="text" id="species" name="species" />
                <br/>

                <label for="image">Add an image:</label>
                <input type="text" id="image" name="image" />
                <br/>

                <label for="description">Write a description (i.e. best planting and harvesting months, how best to cook, fun facts!):</label>
                <input type="text" id="description" name="description" />
                <br/>

                <input id = addSeedButton type="submit" value="Add a Seed!" />

                <?php 
                if (isset($success)){
                    echo "Thank you for adding a new seed!";
                }
                ?>

            </form>
        </div>


<?php
echo SeedsViewer::displayAllSeeds($seeds)
?>
    
</body>
</html>