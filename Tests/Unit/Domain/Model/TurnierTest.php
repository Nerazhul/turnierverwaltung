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
 * Test case for class \Vaupel\Turnierverwaltung\Domain\Model\Turnier.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class TurnierTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Vaupel\Turnierverwaltung\Domain\Model\Turnier
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Vaupel\Turnierverwaltung\Domain\Model\Turnier();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitel()
		);
	}

	/**
	 * @test
	 */
	public function setTitelForStringSetsTitel() {
		$this->subject->setTitel('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'titel',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForStringSetsLocation() {
		$this->subject->setLocation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'location',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDateturnierReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDateturnier()
		);
	}

	/**
	 * @test
	 */
	public function setDateturnierForDateTimeSetsDateturnier() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDateturnier($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'dateturnier',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSpielerReturnsInitialValueForSpieler() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getSpieler()
		);
	}

	/**
	 * @test
	 */
	public function setSpielerForObjectStorageContainingSpielerSetsSpieler() {
		$spieler = new \Vaupel\Turnierverwaltung\Domain\Model\Spieler();
		$objectStorageHoldingExactlyOneSpieler = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneSpieler->attach($spieler);
		$this->subject->setSpieler($objectStorageHoldingExactlyOneSpieler);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneSpieler,
			'spieler',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addSpielerToObjectStorageHoldingSpieler() {
		$spieler = new \Vaupel\Turnierverwaltung\Domain\Model\Spieler();
		$spielerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$spielerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($spieler));
		$this->inject($this->subject, 'spieler', $spielerObjectStorageMock);

		$this->subject->addSpieler($spieler);
	}

	/**
	 * @test
	 */
	public function removeSpielerFromObjectStorageHoldingSpieler() {
		$spieler = new \Vaupel\Turnierverwaltung\Domain\Model\Spieler();
		$spielerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$spielerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($spieler));
		$this->inject($this->subject, 'spieler', $spielerObjectStorageMock);

		$this->subject->removeSpieler($spieler);

	}
}
