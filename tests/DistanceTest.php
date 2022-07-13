<?php

use PHPUnit\Framework\TestCase;
use Distance\DistanceFactory;



class DistanceTest extends TestCase {

	public function test_calculating_valid_long_distance() {

		$position 		= ['lat' => '45.251924', 'lon' => '19.837043'];
		$destination 	= ['lat' => '53.185004', 'lon' => '8.705415'];

		// Google maps calculates 1193,44 km
		$gmaps = 1193.44;

		$distance = DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination);

		$this->assertEquals(ceil($distance), ceil($gmaps));


	}

	public function test_calculating_valid_short_distance() {

		$position 		= ['lat' => '45.251929', 'lon' => '19.836989'];
		$destination 	= ['lat' => '45.249406', 'lon' => '19.831667'];

		// Google maps calculates 503,37 m

		$gmaps = 0.50337;

		$distance = DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination);

		// Error less the 5 meters
		$this->assertTrue(abs($gmaps - $distance) < 5);


	}

	public function test_calculating_same_location() {
        $position 		= ['lat' => '45.255462', 'lon' => '19.828439'];
        $destination 	= ['lat' => '45.255462', 'lon' => '19.828439'];

        $distance = DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination);

        $this->assertEquals(0, $distance);
    }

    public function test_calculating_same_location_different_data_type() {
        $position 		= ['lat' => '45.255462', 'lon' => '19.828439'];
        $destination 	= ['lat' => 45.255462, 'lon' => 19.828439];

        $distance = DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination);

        $this->assertEquals(0, $distance);

        $position 	        = ['lat' => 45.255462, 'lon' => 19.828439];
        $destination 		= ['lat' => '45.255462', 'lon' => '19.828439'];


        $distance = DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination);

        $this->assertEquals(0, $distance);
    }

}