<?php

namespace OGetIt\Common;

use OGetIt\Common\OGetIt_Fleet;

class OGetIt_Player {

	/**
	 * @var string
	 */
	private $_name;
	
	/**
	 * @var integer
	 */
	private $_armor;

	/**
	 * @var integer
	 */
	private $_shield;

	/**
	 * @var integer
	 */
	private $_weapon;
	
	/**
	 * @var OGetIt_Fleet[]
	 */
	private $_fleet = array();
	
	/**
	 * @param string $name
	 */
	public function __construct($name) {
		
		$this->_name = $name;
		
	}
	
	/**
	 * @param integer $armor
	 * @param integer $shield
	 * @param integer $weapon
	 */
	public function setCombatTechnologies($armor, $shield, $weapon) {
		
		$this->_armor = $armor;
		$this->_shield = $shield;
		$this->_weapon = $weapon;
		
	}
	
	/**
	 * @param OGetIt_Fleet $fleet
	 */
	public function addFleet(OGetIt_Fleet $fleet) {
		
		$this->_fleet[] = $fleet;
		
	}

	/**
	 * @param integer $combat_index
	 * @return OGetIt_Fleet|NULL
	 */
	public function getFleetByCombatIndex($combat_index) {
		
		foreach ($this->_fleet as $fleet) {
				
			if ($fleet->getCombatIndex() === $combat_index) return $fleet;
				
		}
		
		return null;
		
	}
	
	/**
	 * @return string
	 */
	public function getName() {
		
		return $this->_name;
		
	}
	
	/**
	 * @return integer
	 */
	public function getArmor() {
		
		return $this->_armor;
		
	}

	/**
	 * @return integer
	 */
	public function getShield() {
		
		return $this->_shield;
		
	}

	/**
	 * @return integer
	 */
	public function getWeapon() {
		
		return $this->_weapon;
		
	}
	
	/**
	 * @return OGetIt_Fleet[]
	 */
	public function getFleets() {
		
		return $this->_fleet;
		
	}
	
}