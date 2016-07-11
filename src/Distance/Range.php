<?php

namespace Distance;

use Distance\DistanceFactory;
use Distance\Drivers\GeoDataSource;

class Range {

	/**
	 *
	 * Determine is current position in range of destination
	 *
	 * @param array $position
	 * @param array $destination
	 * @param integer $radius
	 * @return bool
	 * @throws \Exception
	 *
	 */
	public static function inRange($position, $destination, $offset = 0) {

		try {

			return (DistanceFactory::calculate(new GeoDataSource, $position, $destination) - $offset) <= 0;

		} catch(\Exception $e) {

			throw new \Exception($e->getMessage());

		}		


	}


}