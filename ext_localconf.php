<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Vaupel.' . $_EXTKEY,
    'Turnierliste',
    array(
        'Turnier' => 'list, show, new, create, edit, update, delete, deleteConfirm',
        'Spieler' => 'list, show, new, create, edit, update, delete, deleteConfirm',
        'Spielmodus' => 'add, new, create, edit, delete, deleteConfirm, update',
    ),
    array(
        'Turnier' => 'list, show, new, create, edit, update, delete, deleteConfirm',
        'Spieler' => 'list, show, new, create, edit, update, delete, deleteConfirm',
        'Spielmodus' => 'add, new, edit, create, delete, deleteConfirm, update',
    )
);