<?php

readonly class Seed
{
    // public int $id;
    public string $name;
    public string $family_name;
    public string $species;
    public string $image;
    public string $description;

    public function __construct(
        // int $id,
        string $name,
        string $family_name,
        string $species,
        string $image,
        string $description
    ) {
        // $this->id = $id;
        $this->name = $name;
        $this->family_name = $family_name;
        $this->species = $species;
        $this->image = $image;
        $this->description = $description;
    }
}
?>