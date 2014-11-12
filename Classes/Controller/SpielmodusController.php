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
 * SpielmodusController
 */
class SpielmodusController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$spielmoduses = $this->spielmodusRepository->findAll();
		$this->view->assign('spielmoduses', $spielmoduses);
	}

	/**
	 * action show
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @return void
	 */
	public function showAction(\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus) {
		$this->view->assign('spielmodus', $spielmodus);
	}

	/**
	 * action new
	 * 
         * @param \Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier
         * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @ignorevalidation $spielmodus
	 * @return void
	 */
	public function newAction(\Vaupel\Turnierverwaltung\Domain\Model\Turnier $turnier,\Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler,
                \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus = NULL) {
            $this->view->assign('turnier', $turnier);
            $this->view->assign('spieler', $spieler);
            $this->view->assign('spielmodus', $spielmodus);
	}

	/**
	 * action create
	 * 
         * @param \Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @return void
	 */
	public function createAction(\Vaupel\Turnierverwaltung\Domain\Model\Spieler $spieler,\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus) {
		$spieler->addSpielmodu($spielmodus);
                $this->objectManager->get('Vaupel\\Turnierverwaltung\\Domain\\Repository\\SpielerRepository')->update($spieler);
		$this->redirect('show','Turnier','NULL',array('turnier'=>$turnier));
	}

	/**
	 * action edit
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @ignorevalidation $spielmodus
	 * @return void
	 */
	public function editAction(\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus) {
		$this->view->assign('spielmodus', $spielmodus);
	}

	/**
	 * action update
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @return void
	 */
	public function updateAction(\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->spielmodusRepository->update($spielmodus);
		$this->redirect('list');
	}

	/**
	 * action delete
	 * 
	 * @param \Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus
	 * @return void
	 */
	public function deleteAction(\Vaupel\Turnierverwaltung\Domain\Model\Spielmodus $spielmodus) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->spielmodusRepository->remove($spielmodus);
		$this->redirect('list');
	}

}