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
namespace OGetIt\Report\CombatReport\Fleet;

use OGetIt\Technology\Technology;
use OGetIt\Common\Planet;
use OGetIt\Common\Resources;
use OGetIt\Common\Player;
use OGetIt\Report\CombatReport\CombatPlayer;
use OGetIt\Technology\State\StateCombatWithLosses;
use OGetIt\Common\Value\ChildValueAndLosses;

class Fleet implements \JsonSerializable {
	
	use ChildValueAndLosses;
	
	/**
	 * @var CombatPlayer
	 */
	private $player;
	
	/**
	 * @var StateCombatWithLosses[] 
	 */
	private $state = array();
	
	/**
	 * @param Technology $technology
	 * @param integer $count
	 * @param integer $lost
	 */
	public function addTechnologyState($technology, $count, $lost = false) {
		
		if (isset($this->state[$technology->getType()])) {
			
			$this->state[$technology->getType()]->addCount($count);
			if ($lost !== false) {
				$this->state[$technology->getType()]->addLost($lost);
			}
			
		} else {
		
			$techState = new StateCombatWithLosses(
				$technology, 
				$count, 
				$lost
			);
			
			$this->state[$technology->getType()] = $techState;
			
		}
		
	}
	
	/**
	 * @param integer $type
	 * @return StateCombatWithLosses|NULL
	 */
	public function getTechnologyState($type) {
		
		return isset($this->state[$type]) ? $this->state[$type] : null;
		
	}
	
	/**
	 * @return StateCombatWithLosses[]
	 */
	public function getTechnologyStates() {
		
		return $this->state;
		
	}
	
	/**
	 * @param CombatPlayer $player
	 */
	public function setPlayer(CombatPlayer $player) {
		
		$this->player = $player;
		
	}
	
	/**
	 * @return CombatPlayer
	 */
	public function getPlayer() {
		
		return $this->player;
		
	}
	

	public function __clone() {
	
		$this->state = array(); //Clear state
	
	}
	
	/**
	 * @param Fleet $fleet
	 */
	public function merge(Fleet $fleet) {
		
		foreach ($fleet->getTechnologyStates() as $techState) {
			
			$this->addTechnologyState(
				$techState->getTechnology(), 
				$techState->getCount(),
				$techState->getLost()
			);
			
		}
		
	}
	
	/**
	 * @return Resources
	 */
	public function getValue() {
	
		return $this->getChildrenValue($this->state);
	
	}
	
	/**
	 * @return Resources
	 */
	public function getLosses() {
		
		return $this->getChildrenLosses($this->state);
		
	}
	
	/**
	 * @param Fleet $other
	 * @return Fleet
	 */
	public function difference(Fleet $other) {
		
		$fleet = clone $other;
		
		foreach ($this->state as $type => $techState) {
			
			$count = $other->getTechnologyState($type) !== null ? $other->getTechnologyState($type)->getCount() : 0;
			$lost = $techState->getCount() - $count;
			
			$fleet->addTechnologyState($techState->getTechnology(), $count, $lost);
			
		}
		
		return $fleet;
		
	}
	
	/* (non-PHPdoc)
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		return array(
			//Don't add player, this will create recursion
			'state' => $this->state
		);
	}
	
}