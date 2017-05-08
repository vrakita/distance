<?php namespace Distance\Drivers;

use Distance\Contracts\Method;

class GeoDataSource implements Method {

	/**
	 * Calculates distance by air between two given locations
	 * 
	 * @param \Distance\Contracts\Method $driver
	 * @param array $location1
	 * @param array $location2
	 * @return float
	 */
	public function calculate($location1, $location2) {

		$theta = $location1['lon'] - $location2['lon'];
		$dist = sin(deg2rad($location1['lat'])) * sin(deg2rad($location2['lat'])) +  cos(deg2rad($location1['lat'])) * cos(deg2rad($location2['lat'])) * cos(deg2rad($theta));
		$dist = acos($dist);

		if(is_nan($dist)) return 0;

		$dist = rad2deg($dist);

		$miles = $dist * 60 * 1.1515;

  		return $miles * 1.609344;

  	}


}