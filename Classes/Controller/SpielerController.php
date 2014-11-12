<?php
namespace Vaupel\Turnierverwaltung\Controller;


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
 * SpielerController
 */
class SpielerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * spielerRepository
	 * 
	 * @var \Vaupel\Turnierverwaltung\Domain\Repository\SpielerRepository
	 * @inject
	 */
	protected $spielerRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$spielers = $this->spielerRepository->findAll();
		$this->view->assign('spielers', $spielers);
	}

	/**
	 * action show
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
	 * @return void
	 */
	public function showAction(\Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler) {
		$this->view->assign('spieler', $spieler);
	}

	/**
	 * action new
	 *
         * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
         * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @ignorevalidation $spieler
	 * @return void
	 */
	public function newAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier,\Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler = NULL,
                \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus) {
        $this->view->assign('turnier', $turnier);
        $this->view->assign('spieler', $spieler);
        $this->view->assign('spielmodus', $spielmodus);
	}

	/**
	 * action create
	 *
         * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
         * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @return void
	 */
	public function createAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier,\Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler,
                \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus) {
		//$this->spielerRepository->add($spieler);
        $spieler->addSpielmodu($spielmodus);
        $turnier->addSpieler($spieler);
        $this->objectManager->get('Vaupel\\Turnierverwaltung\\Domain\\Repository\\TurnierRepository')->update($turnier);
        
	$this->redirect('show','Turnier','NULL',array('turnier'=>$turnier));
	}

	/**
	 * action edit
	 *
     * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
	 * @ignorevalidation $spieler
	 * @return void
	 */
	public function editAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier, \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler) {
        $this->view->assign('turnier', $turnier);
        $this->view->assign('spieler', $spieler);
	}

	/**
	 * action update
	 *
     * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
	 * @return void
	 */
	public function updateAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier,\Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler) {
	$this->spielerRepository->update($spieler);
        $this->redirect('show','Turnier','NULL',array('turnier'=>$turnier));
	}

	/**
	 * action delete
	 *
     * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
	 * @return void
	 */
	public function deleteConfirmAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier,\Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler) {
	$this->spielerRepository->remove($spieler);
        $this->redirect('show','Turnier','NULL',array('turnier'=>$turnier));
	}

}