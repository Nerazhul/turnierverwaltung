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
 * Test case for class Vaupel\Turnierverwaltung\Controller\TurnierController.
 *
 */
class TurnierControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Vaupel\Turnierverwaltung\Controller\TurnierController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Vaupel\\Turnierverwaltung\\Controller\\TurnierController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTurniersFromRepositoryAndAssignsThemToView() {

		$allTurniers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$turnierRepository = $this->getMock('Vaupel\\Turnierverwaltung\\Domain\\Repository\\TurnierRepository', array('findAll'), array(), '', FALSE);
		$turnierRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTurniers));
		$this->inject($this->subject, 'turnierRepository', $turnierRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('turniers', $allTurniers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTurnierToView() {
		$turnier = new \Vaupel\Turnierverwaltung\Domain\Model\Turnier();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('turnier', $turnier);

		$this->subject->showAction($turnier);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenTurnierToView() {
		$turnier = new \Vaupel\Turnierverwaltung\Domain\Model\Turnier();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newTurnier', $turnier);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($turnier);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTurnierToTurnierRepository() {
		$turnier = new \Vaupel\Turnierverwaltung\Domain\Model\Turnier();

		$turnierRepository = $this->getMock('Vaupel\\Turnierverwaltung\\Domain\\Repository\\TurnierRepository', array('add'), array(), '', FALSE);
		$turnierRepository->expects($this->once())->method('add')->with($turnier);
		$this->inject($this->subject, 'turnierRepository', $turnierRepository);

		$this->subject->createAction($turnier);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTurnierToView() {
		$turnier = new \Vaupel\Turnierverwaltung\Domain\Model\Turnier();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('turnier', $turnier);

		$this->subject->editAction($turnier);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTurnierInTurnierRepository() {
		$turnier = new \Vaupel\Turnierverwaltung\Domain\Model\Turnier();

		$turnierRepository = $this->getMock('Vaupel\\Turnierverwaltung\\Domain\\Repository\\TurnierRepository', array('update'), array(), '', FALSE);
		$turnierRepository->expects($this->once())->method('update')->with($turnier);
		$this->inject($this->subject, 'turnierRepository', $turnierRepository);

		$this->subject->updateAction($turnier);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTurnierFromTurnierRepository() {
		$turnier = new \Vaupel\Turnierverwaltung\Domain\Model\Turnier();

		$turnierRepository = $this->getMock('Vaupel\\Turnierverwaltung\\Domain\\Repository\\TurnierRepository', array('remove'), array(), '', FALSE);
		$turnierRepository->expects($this->once())->method('remove')->with($turnier);
		$this->inject($this->subject, 'turnierRepository', $turnierRepository);

		$this->subject->deleteAction($turnier);
	}
}
