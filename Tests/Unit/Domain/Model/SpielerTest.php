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
 * Test case for class \Vaupel\Turnierverwaltung\Domain\Model\Spieler.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class SpielerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Vaupel\Turnierverwaltung\Domain\Model\Spieler
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Vaupel\Turnierverwaltung\Domain\Model\Spieler();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStrengthReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getStrength()
		);
	}

	/**
	 * @test
	 */
	public function setStrengthForIntegerSetsStrength() {
		$this->subject->setStrength(12);

		$this->assertAttributeEquals(
			12,
			'strength',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSpielmodusReturnsInitialValueForSpielmodus() {
		$this->assertEquals(
			NULL,
			$this->subject->getSpielmodus()
		);
	}

	/**
	 * @test
	 */
	public function setSpielmodusForSpielmodusSetsSpielmodus() {
		$spielmodusFixture = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();
		$this->subject->setSpielmodus($spielmodusFixture);

		$this->assertAttributeEquals(
			$spielmodusFixture,
			'spielmodus',
			$this->subject
		);
	}
}