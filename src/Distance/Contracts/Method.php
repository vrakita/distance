<?php namespace Distance\Contracts;

interface Method {

	/**
	 * Calculates distance by air between two given locations
	 * 
	 * @param \Distance\Contracts\Method $driver
	 * @param array $location1
	 * @param array $location2
	 * @return float
	 */
	public function calculate($location1, $location2);

}