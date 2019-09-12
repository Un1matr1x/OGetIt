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
use OGetIt\Technology\Entity\Defence\LightLaser;

class Destroyer extends TechnologyCombatFlyable
{
	const TYPE = 213;
	
	const METAL = 60000, CRYSTAL = 50000, DEUTERIUM = 15000;
	
	const ARMOR = 110000, SHIELD = 500, WEAPON = 2000;
	
	const SPEED = 5000, CARGO_CAPACITY = 2000, FUEL_USAGE = 1000;
	
	public static $RAPIDFIRE_FROM = [
		Deathstar::TYPE => 5,
		Reaper::TYPE => 3
	];
		
	public static $RAPIDFIRE_AGAINST = [
		EspionageProbe::TYPE => 5,
		SolarSatellite::TYPE => 5,
		Crawler::TYPE => 5,
		LightLaser::TYPE => 10,
		Battlecruiser::TYPE => 2
	];
	
	public function __construct()
	{
		parent::__construct(self::TYPE, self::METAL, self::CRYSTAL, self::DEUTERIUM, self::ARMOR, self::SHIELD, self::WEAPON, self::SPEED, self::CARGO_CAPACITY, self::FUEL_USAGE);
	}
}