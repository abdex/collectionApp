<?php

require_once 'src/Seed.php';
require_once 'src/SeedsModel.php';

class SeedsViewer
{
    public static function displaySingleSeed(Seed $seed): string
    {
            $output = '<div>';
            $output .= "<h1>$seed->name</h1>";
            $output .= "<p>$seed->family_name</p>";
            $output .= "<p>$seed->species</p>";
            $output .= "<p>$seed->description</p>";
            $output .= "<img src='$seed->image' />";
            $output .= '</div>';

        return $output;
    }

    public static function displayAllSeeds(array $seeds): string
    {
         if (empty($seeds)){
            return "Sorry, the apocalypse has happened and you've run out of seeds!";
        }

        $output = '';

        foreach ($seeds as $seed) {
            $output .= '<div>';
            $output .= "<h2>$seed->name</h2>";
            $output .= "<p>Plant family: $seed->family_name</p>";
            $output .= "<p>Species: $seed->species</p>";
            $output .= "<p>$seed->description</p>";
            $output .= "<img src='$seed->image' />";
            $output .= '</div>';
        }

        return $output;
    }
}