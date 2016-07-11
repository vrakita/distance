<?php

use Distance\DistanceFactory;
use Distance\Range;

class InRangeTest extends PHPUnit_Framework_TestCase {

	public function test_return_true_if_is_in_range() {

		$position 		= ['lat' => '45.251924', 'lon' => '19.837043'];
		$destination 	= ['lat' => '53.185004', 'lon' => '8.705415'];

		// Google maps calculates 1194
		$distance = ceil(DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination));

		

		$this->assertTrue(Range::inRange($position, $destination, 1194));
		$this->assertTrue(Range::inRange($position, $destination, 5000));

	}

	public function test_return_false_if_is_not_range() {

		$position 		= ['lat' => '45.251924', 'lon' => '19.837043'];
		$destination 	= ['lat' => '53.185004', 'lon' => '8.705415'];

		// Google maps calculates 1194
		$distance = ceil(DistanceFactory::calculate(new \Distance\Drivers\GeoDataSource, $position, $destination));

		

		$this->assertFalse(Range::inRange($position, $destination, 1193));
		$this->assertFalse(Range::inRange($position, $destination));

	}

}