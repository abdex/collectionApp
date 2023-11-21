<?php

// require_once 'src/Seed.php';
require_once 'src/SeedsViewer.php';

use PHPUnit\Framework\TestCase;

class SeedsViewerTest extends TestCase
{
    public function test_seedsViewerDisplayAll(): void
    {
        $output = '<div>';
        $output .= "<h1>Rainbow Carrots</h1>";
        $output .= "<p>Umbellifer</p>";
        $output .= "<p>Daucus carota</p>";
        $output .= "<p>Carrot fly resistant F1 hybrid. Sow thinnly outdoors in intervals from March to June. Harvest from June to October.</p>";
        $output .= "<img src='https://www.shutterstock.com/image-photo/colorful-rainbow-carrot-their-green-600nw-2041355402.jpg' />";
        $output .= '</div>';


        $newSeed = new Seed(
            1, 
            'Rainbow Carrots',              
            'Umbellifer',
            'Daucus carota', 
            'https://www.shutterstock.com/image-photo/colorful-rainbow-carrot-their-green-600nw-2041355402.jpg', 
            'Carrot fly resistant F1 hybrid. Sow thinnly outdoors in intervals from March to June. Harvest from June to October.' 
        );

        $result = SeedsViewer::displayAllSeeds([$newSeed]);

        $this->assertEquals($output, $result);
    }
}