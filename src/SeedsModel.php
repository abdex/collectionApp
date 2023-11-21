<?php

require_once 'src/Seed.php';

class SeedsModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // public function getSeedById(int $id): Seed
    // {
    //     $query = $this->db->prepare('SELECT * FROM `seeds` WHERE `id` = :id');
    //     $query->bindParam(':id', $id);
    //     $query->execute();
    //     $seed = $query->fetch();
        
    //     $seedObj = new Seed(
    //         $seed['id'],
    //         $seed['name'],
    //         $seed['family_name'],
    //         $seed['species'],
    //         $seed['image'],
    //         $seed['description']
    //     );
    //     return $seedObj;
    // }

    public function getAllSeeds()
    {
        $query = $this->db->prepare("SELECT `seeds`.`id`, `seeds`.`name`, 
        `plant_family`.`common_name` AS 'family_name', 
        `seeds`.`species`, 
        `seeds`. `image`, 
        `seeds`.`description`
        FROM `seeds`
            INNER JOIN `plant_family`
                ON `seeds`.`genus` = `plant_family`.`id`;");
        $query->execute();
        $seeds = $query->fetchAll();
        $seedsObjs = [];

        foreach($seeds as $seed){
            $seedsObjs[] = new Seed(
                $seed['id'],
                $seed['name'],
                $seed['family_name'],
                $seed['species'],
                $seed['image'],
                $seed['description']
             );
        }
        return $seedsObjs;
    }

    // public function getSeedsByGenus(int $id)
    // {
    //     $query = $this->db->prepare(
    //         'SELECT * FROM `seeds`
    //             WHERE `genus` = :id;'
    //         );
    //     $query->bindParam(':id', $id);
    //     $query->execute();
    //     $seed = $query->fetchAll();
    //     return $seed;
    // }

}