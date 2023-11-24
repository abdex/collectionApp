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
        $nameError =  "<p class='errorMess'>Please fill in seed name that is between 1 to 30 characters!</p>";
    } if (intval($genus) == 0 || intval($genus) > 6) {
        $genusError = "<p class='errorMess'>Please select a Plant Value from the dropdown menu!</p>";
    } if (strlen($species) == 0 || strlen($species) > 41) {
        $speciesError =  "<p class='errorMess'>Please fill in species name that is between 1 to 40 characters!</p>";
    } if (strlen($image) == 0 || strlen($image) > 2000) {
        $imageError =  "<p class='errorMess'>Please fill in a URL of an image that is between 1 to 2000 characters!</p>";
    } if (strlen($description) == 0 || strlen($description) > 2000) {
        $descriptionError =  "<p class='errorMess'>Please write a description that is between 1 to 500 characters!</p>";
    } else {
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
    <title>Abby's Seed Vault</title>
    
</head>
<body>
    <h1 id="titlePage"><strong>ABBY'S SEED VAULT</strong></h1>
    <br/>
        <div class= "outerContainer">
            <h2 id="formTitle">Please add New Seeds!</h2>
            <form method = "POST" class="formGridContainer">
                <label class ="grid" for="name">Name of Plant Seed:</label>
                <input type="text" id="name" name="name" />
                <?php 
                if (isset($nameError)){
                    echo $nameError;
                }
                ?>
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
                    <?php 
                    if (isset($genusError)){
                    echo $genusError;
                    }
                ?>
                    <br/>

                <label for="species">What species is it?:</label>
                <input type="text" id="species" name="species" />
                <?php 
                if (isset($speciesError)){
                    echo $speciesError;
                }
                ?>
                <br/>

                <label for="image">Add an image:</label>
                <input type="text" id="image" name="image" />
                <?php 
                if (isset($imageError)){
                    echo $imageError;
                }
                ?>
                <br/>

                <label for="description">Write a description (i.e. best planting and harvesting months, how best to cook, fun facts!):</label>
                <input type="text" id="description" name="description" />
                <?php 
                if (isset($descriptionError)){
                    echo $descriptionError;
                }
                ?>
                <br/>

                <input id = addSeedButton type="submit" value="Add a Seed!" />

                <?php 
                if (isset($success)){
                    echo "<p class='successMess'>Thank you for adding a new seed!</p>";
                }
                ?>

            </form>
        </div>


<?php
echo SeedsViewer::displayAllSeeds($seeds)
?>
    
</body>
</html>