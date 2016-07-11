<?php 

require __DIR__ . '/vendor/autoload.php';

use Distance\Range;

// Current position
$position 		= ['lat' => '45.251924', 'lon' => '19.837043'];

// Destination
$destination 	= ['lat' => '53.185004', 'lon' => '8.705415'];

// Radius in kilometers
$destinationRadius = 2500;

// Test to see is current position in range of destination base ond destination radius
$test = Range::inRange($position, $destination, $destinationRadius);

echo 'Is in range: ' .  ($test ? 'Yes' : 'No');

// Calculate distance between current position and destination
$distance = Distance\DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination);

echo '<br>';

echo $distance;