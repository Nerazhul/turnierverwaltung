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
 * TurnierController
 */
class TurnierController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * turnierRepository
	 * 
	 * @var \Vaupel\Turnierverwaltung\Domain\Repository\TurnierRepository
	 * @inject
	 */
	protected $turnierRepository = NULL;

    /**
     * Persistence Manager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$turniers = $this->turnierRepository->findAll();
		$this->view->assign('turniers', $turniers);
	}

	/**
	 * action show
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @return void
	 */
	public function showAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier) {
		$this->view->assign('turnier', $turnier);
	}

	/**
	 * action new
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @ignorevalidation $newTurnier
	 * @return void
	 */
	public function newAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier = NULL) {
		$this->view->assign('turnier', $turnier);
	}

	/**
	 * action create
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @return void
	 */
	public function createAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->turnierRepository->add($turnier);
		$this->redirect('list');
	}

	/**
	 * action edit
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @ignorevalidation $turnier
	 * @return void
	 */
	public function editAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier) {
		$this->view->assign('turnier', $turnier);
	}

	/**
	 * action update
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @return void
	 */
	public function updateAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->turnierRepository->update($turnier);
		$this->redirect('list');
	}

	/**
	 * action delete
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
	 * @return void
	 */
	public function deleteAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->turnierRepository->remove($turnier);
		$this->redirect('list');
	}

    /**
     * action delteconfirm
     *
     * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
     * @return void
     */
    public function deleteConfirmAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier = null) {
        $this->view->assign('turnier', $turnier);
    }

}