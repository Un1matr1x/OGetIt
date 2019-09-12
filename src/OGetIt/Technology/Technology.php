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
namespace OGetIt\Technology;

use OGetIt\Common\Resources;

abstract class Technology implements \JsonSerializable {
	
	/**
	 * @var integer
	 */
	private $type;
	
	/**
	 * @var Resources
	 */
	private $resources;
	
	/**
	 * @param integer $type
	 * @param integer $metal
	 * @param integer $crystal
	 * @param integer $deuterium
	 * @param integer $energy
	 */
	protected function __construct($type, $metal, $crystal, $deuterium, $energy = 0) {
		
		$this->type = $type;
		$this->resources = new Resources($metal, $crystal, $deuterium, $energy);
		
	}
	
	/**
	 * @return integer
	 */
	public function getType() {
		
		return $this->type;
		
	}
	
	/**
	 * @return Resources
	 */
	public function getResources() {
		
		return $this->resources;
		
	}
	
	/**
	 * @return Resources
	 */
	abstract public function getCosts();
	
	/* (non-PHPdoc)
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		return array(
			'type' => $this->type,
			'resources' => $this->resources
		);
	}
	
}