<?php

namespace Distance;

use Distance\Contracts\Method;

class DistanceFactory {

	/**
	 * Calling calculate method on given object algorithm
	 *
	 * @param \Distance\Contracts\Method $driver
	 * @param array $location1
	 * @param array $location2
	 * @return float
	 * @throws \Exception
	 *
	 */
	public static function calculate(Method $driver, $location1, $location2) {

		if( ! isset($location1['lon'], $location1['lat'], $location2['lon'], $location2['lat'])) 
			throw new \Exception('Required parameters missing. Provide lon/lat for both locations');

		return $driver->calculate($location1, $location2);

	}

}