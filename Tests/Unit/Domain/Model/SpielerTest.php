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
	public function getGenderReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getGender()
		);
	}

	/**
	 * @test
	 */
	public function setGenderForStringSetsGender() {
		$this->subject->setGender('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'gender',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSpielmodusReturnsInitialValueForSpielmodus() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getSpielmodus()
		);
	}

	/**
	 * @test
	 */
	public function setSpielmodusForObjectStorageContainingSpielmodusSetsSpielmodus() {
		$spielmodu = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();
		$objectStorageHoldingExactlyOneSpielmodus = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneSpielmodus->attach($spielmodu);
		$this->subject->setSpielmodus($objectStorageHoldingExactlyOneSpielmodus);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneSpielmodus,
			'spielmodus',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addSpielmoduToObjectStorageHoldingSpielmodus() {
		$spielmodu = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();
		$spielmodusObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$spielmodusObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($spielmodu));
		$this->inject($this->subject, 'spielmodus', $spielmodusObjectStorageMock);

		$this->subject->addSpielmodu($spielmodu);
	}

	/**
	 * @test
	 */
	public function removeSpielmoduFromObjectStorageHoldingSpielmodus() {
		$spielmodu = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();
		$spielmodusObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$spielmodusObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($spielmodu));
		$this->inject($this->subject, 'spielmodus', $spielmodusObjectStorageMock);

		$this->subject->removeSpielmodu($spielmodu);

	}
}
