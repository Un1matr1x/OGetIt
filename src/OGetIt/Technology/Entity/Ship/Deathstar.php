<?php
/*
 * OGetIt, a open source PHP library for handling the new OGame API as of version 6.
 * Copyright (C) 2015  Klaas Van Parys
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */
namespace OGetIt\Technology\Entity\Ship; 

use OGetIt\Technology\TechnologyCombatFlyable;
use OGetIt\Technology\Entity\Defence\RocketLauncher;
use OGetIt\Technology\Entity\Defence\LightLaser;
use OGetIt\Technology\Entity\Defence\HeavyLaser;
use OGetIt\Technology\Entity\Defence\GaussCannon;
use OGetIt\Technology\Entity\Defence\IonCannon;

class Deathstar extends TechnologyCombatFlyable
{
	const TYPE = 214;
	
	const METAL = 5000000, CRYSTAL = 4000000, DEUTERIUM = 1000000;
	
	const ARMOR = 9000000, SHIELD = 50000, WEAPON = 200000;
	
	const SPEED = 100, CARGO_CAPACITY = 1000000, FUEL_USAGE = 1;
	
	public static $RAPIDFIRE_AGAINST = [
		EspionageProbe::TYPE => 1250,
		SolarSatellite::TYPE => 1250,
		LightFighter::TYPE => 200,
		HeavyFighter::TYPE => 100,
		Cruiser::TYPE => 33,
		Battleship::TYPE => 30,
		Bomber::TYPE => 25,
		Destroyer::TYPE => 5,
		SmallCargo::TYPE => 250,
		LargeCargo::TYPE => 250,
		ColonyShip::TYPE => 250,
		Recycler::TYPE => 250,
		RocketLauncher::TYPE => 200,
		LightLaser::TYPE => 200,
		HeavyLaser::TYPE => 100,
		IonCannon::TYPE => 100,
		GaussCannon::TYPE => 50,
		Battlecruiser::TYPE => 15,
		Pathfinder::TYPE => 30,
		Reaper::TYPE => 10,
		Crawler::TYPE => 1250
	];
	
	public function __construct()
	{
		parent::__construct(self::TYPE, self::METAL, self::CRYSTAL, self::DEUTERIUM, self::ARMOR, self::SHIELD, self::WEAPON, self::SPEED, self::CARGO_CAPACITY, self::FUEL_USAGE);
	}
}