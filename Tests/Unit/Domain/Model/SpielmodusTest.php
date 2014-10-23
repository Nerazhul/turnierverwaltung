<?php

namespace Vaupel\Turnierverwaltung\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class SpielmodusTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getSingleReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getSingle()
		);
	}

	/**
	 * @test
	 */
	public function setSingleForBooleanSetsSingle() {
		$this->subject->setSingle(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'single',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDoppelReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getDoppel()
		);
	}

	/**
	 * @test
	 */
	public function setDoppelForBooleanSetsDoppel() {
		$this->subject->setDoppel(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'doppel',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMixedReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getMixed()
		);
	}

	/**
	 * @test
	 */
	public function setMixedForBooleanSetsMixed() {
		$this->subject->setMixed(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'mixed',
			$this->subject
		);
	}
}
