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

class EspionageProbe extends TechnologyCombatFlyable
{
	const TYPE = 210;
	
	const METAL = 0, CRYSTAL = 1000, DEUTERIUM = 0;
	
	const ARMOR = 1000, SHIELD = 0.01, WEAPON = 0.01;
	
	const SPEED = 100000000, CARGO_CAPACITY = 0, FUEL_USAGE = 1;
	
	public static $RAPIDFIRE_FROM = [
		LightFighter::TYPE => 5,
		HeavyFighter::TYPE => 5,
		Cruiser::TYPE => 5,
		Battleship::TYPE => 5,
		Battlecruiser::TYPE => 5,
		Bomber::TYPE => 5,
		Destroyer::TYPE => 5,
		Deathstar::TYPE => 1250,
		Reaper::TYPE => 5,
		Pathfinder::TYPE => 5,
		SmallCargo::TYPE => 5,
		LargeCargo::TYPE => 5,
		ColonyShip::TYPE => 5,
		Recycler::TYPE => 5
	];
	
	public function __construct()
	{
		parent::__construct(self::TYPE, self::METAL, self::CRYSTAL, self::DEUTERIUM, self::ARMOR, self::SHIELD, self::WEAPON, self::SPEED, self::CARGO_CAPACITY, self::FUEL_USAGE);
	}
}