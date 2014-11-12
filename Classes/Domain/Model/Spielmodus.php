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
 * Spielmodus
 */
class Spielmodus extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject {

	/**
	 * single
	 * 
	 * @var integer
	 */
	protected $single = 0;

	/**
	 * doppel
	 * 
	 * @var integer
	 */
	protected $doppel = 0;

	/**
	 * mixed
	 * 
	 * @var integer
	 */
	protected $mixed = 0;

	/**
	 * Returns the single
	 * 
	 * @return boolean $single
	 */
	public function getSingle() {
		return $this->single;
	}

	/**
	 * Sets the single
	 * 
	 * @param boolean $single
	 * @return void
	 */
	public function setSingle($single) {
		$this->single = $single;
	}

	/**
	 * Returns the boolean state of single
	 * 
	 * @return boolean
	 */
	public function isSingle() {
		return $this->single;
	}

	/**
	 * Returns the doppel
	 * 
	 * @return boolean $doppel
	 */
	public function getDoppel() {
		return $this->doppel;
	}

	/**
	 * Sets the doppel
	 * 
	 * @param boolean $doppel
	 * @return void
	 */
	public function setDoppel($doppel) {
		$this->doppel = $doppel;
	}

	/**
	 * Returns the boolean state of doppel
	 * 
	 * @return boolean
	 */
	public function isDoppel() {
		return $this->doppel;
	}

	/**
	 * Returns the mixed
	 * 
	 * @return boolean $mixed
	 */
	public function getMixed() {
		return $this->mixed;
	}

	/**
	 * Sets the mixed
	 * 
	 * @param boolean $mixed
	 * @return void
	 */
	public function setMixed($mixed) {
		$this->mixed = $mixed;
	}

	/**
	 * Returns the boolean state of mixed
	 * 
	 * @return boolean
	 */
	public function isMixed() {
		return $this->mixed;
	}

}