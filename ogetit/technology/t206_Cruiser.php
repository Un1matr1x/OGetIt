<?php

namespace OGetIt\Technology;

class t206_Cruiser extends OGetIt_Technology_Combat {

	const TYPE = 206;
	
	const METAL = 20000, CRYSTAL = 7000, DEUTERIUM = 2000;
	
	const ARMOR = 0, SHIELD = 0, WEAPON = 0;
	
	public function __construct() {
		
		parent::__construct(self::TYPE, self::METAL, self::CRYSTAL, self::DEUTERIUM, self::ARMOR, self::SHIELD, self::WEAPON);
		
	}
	
}