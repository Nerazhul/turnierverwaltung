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
 * Turnier
 */
class Turnier extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * titel of the turnier
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $titel = '';

	/**
	 * location of the turnier
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $location = '';

	/**
	 * date of the turnier
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $dateturnier = NULL;

	/**
	 * spieler
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Vaupel\Turnierverwaltung\Domain\Model\Spieler>
	 */
	protected $spieler = NULL;

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
		$this->spieler = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

    /**
     * Adds a Post
     *
     *@param Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
     *@return void
     */
    public function addSpieler(Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler){
        $this->spieler->attach($spieler);
    }

    /**
     * Removes a Post
     *
     *@param Vaupel\Turnierverwaltung\Domain\Model\Spieler $spielerToRemove The Spieler to be removed
     *@return void
     */
    public function removeSpieler(Vaupel\Turnierverwaltung\Domain\Model\Spieler $spielerToRemove){
        $this->spieler->detach($spielerToRemove);
    }

	/**
	 * Returns the titel
	 * 
	 * @return string $titel
	 */
	public function getTitel() {
		return $this->titel;
	}

	/**
	 * Sets the titel
	 * 
	 * @param string $titel
	 * @return void
	 */
	public function setTitel($titel) {
		$this->titel = $titel;
	}

	/**
	 * Returns the location
	 * 
	 * @return string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 * 
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the dateturnier
	 * 
	 * @return \DateTime $dateturnier
	 */
	public function getDateturnier() {
		return $this->dateturnier;
	}

	/**
	 * Sets the dateturnier
	 * 
	 * @param \DateTime $dateturnier
	 * @return void
	 */
	public function setDateturnier(\DateTime $dateturnier) {
		$this->dateturnier = $dateturnier;
	}

		/**
	 * Returns the spieler
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Vaupel\Turnierverwaltung\Domain\Model\Spieler> $spieler
	 */
	public function getSpieler() {
		return $this->spieler;
	}

	/**
	 * Sets the spieler
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Vaupel\Turnierverwaltung\Domain\Model\Spieler> $spieler
	 * @return void
	 */
	public function setSpieler(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $spieler) {
		$this->spieler = $spieler;
	}

}