<?php
namespace Vaupel\Turnierverwaltung\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Spieler
 */
class Spieler extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name of the player
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * strength
	 * 
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $strength = 0;

	/**
	 * gender
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $gender = '';

	/**
	 * spielmodus
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus>
	 */
	protected $spielmodus = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 * 
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->spielmodus = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 * 
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 * 
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the strength
	 * 
	 * @return integer $strength
	 */
	public function getStrength() {
		return $this->strength;
	}

	/**
	 * Sets the strength
	 * 
	 * @param integer $strength
	 * @return void
	 */
	public function setStrength($strength) {
		$this->strength = $strength;
	}

	/**
	 * Returns the gender
	 * 
	 * @return string $gender
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * Sets the gender
	 * 
	 * @param string $gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * Adds a Spielmodus
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodu
	 * @return void
	 */
	public function addSpielmodu(\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodu) {
		$this->spielmodus->attach($spielmodu);
	}

	/**
	 * Removes a Spielmodus
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmoduToRemove The Spielmodus to be removed
	 * @return void
	 */
	public function removeSpielmodu(\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmoduToRemove) {
		$this->spielmodus->detach($spielmoduToRemove);
	}

	/**
	 * Returns the spielmodus
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus> $spielmodus
	 */
	public function getSpielmodus() {
		return $this->spielmodus;
	}

	/**
	 * Sets the spielmodus
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus> $spielmodus
	 * @return void
	 */
	public function setSpielmodus(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $spielmodus) {
		$this->spielmodus = $spielmodus;
	}

}