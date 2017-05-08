<?php 

require __DIR__ . '/vendor/autoload.php';

use Distance\Range;

// Current position
$position 		= ['lat' => '45.258290', 'lon' => '19.829792'];

// Destination
$destination 	= ['lat' => '45.257951', 'lon' => '19.830819'];

// Radius in kilometers
$destinationRadius = 500;

// Test to see is current position in range of destination base ond destination radius
$test = Range::inRange($position, $destination, $destinationRadius);

echo 'Is in range: ' .  ($test ? 'Yes' : 'No');

// Calculate distance between current position and destination
$distance = \Distance\DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, ['lat' => 45.258290, 'lon' => 19.829792], ['lon' => 45.257951, 'lat' => 19.830819]);

echo '<br>';

echo $distance;