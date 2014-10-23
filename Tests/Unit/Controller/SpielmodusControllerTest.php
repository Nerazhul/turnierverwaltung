<?php
namespace Vaupel\Turnierverwaltung\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
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
 * Test case for class Vaupel\Turnierverwaltung\Controller\SpielmodusController.
 *
 */
class SpielmodusControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Vaupel\Turnierverwaltung\Controller\SpielmodusController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Vaupel\\Turnierverwaltung\\Controller\\SpielmodusController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllSpielmodusesFromRepositoryAndAssignsThemToView() {

		$allSpielmoduses = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$spielmodusRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$spielmodusRepository->expects($this->once())->method('findAll')->will($this->returnValue($allSpielmoduses));
		$this->inject($this->subject, 'spielmodusRepository', $spielmodusRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('spielmoduses', $allSpielmoduses);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenSpielmodusToView() {
		$spielmodus = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('spielmodus', $spielmodus);

		$this->subject->showAction($spielmodus);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenSpielmodusToView() {
		$spielmodus = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newSpielmodus', $spielmodus);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($spielmodus);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenSpielmodusToSpielmodusRepository() {
		$spielmodus = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();

		$spielmodusRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$spielmodusRepository->expects($this->once())->method('add')->with($spielmodus);
		$this->inject($this->subject, 'spielmodusRepository', $spielmodusRepository);

		$this->subject->createAction($spielmodus);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenSpielmodusToView() {
		$spielmodus = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('spielmodus', $spielmodus);

		$this->subject->editAction($spielmodus);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenSpielmodusInSpielmodusRepository() {
		$spielmodus = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();

		$spielmodusRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$spielmodusRepository->expects($this->once())->method('update')->with($spielmodus);
		$this->inject($this->subject, 'spielmodusRepository', $spielmodusRepository);

		$this->subject->updateAction($spielmodus);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenSpielmodusFromSpielmodusRepository() {
		$spielmodus = new \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus();

		$spielmodusRepository = $this->getMock('', array('remove'), array(), '', FALSE);
		$spielmodusRepository->expects($this->once())->method('remove')->with($spielmodus);
		$this->inject($this->subject, 'spielmodusRepository', $spielmodusRepository);

		$this->subject->deleteAction($spielmodus);
	}
}
