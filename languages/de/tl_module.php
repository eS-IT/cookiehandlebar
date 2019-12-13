<?php
/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 *
 * @package     CookieHandleBar
 * @filesource  tl_module.php
 * @version     1.0.0
 * @since       08.05.18 - 09:38
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2018
 * @license     EULA
 */
/**
 * Set Tablename
 */
$strName = 'tl_module';

/**
 * Fields
 */
$GLOBALS['TL_LANG'][$strName]['cookieheadline']         = array('Überschrift', 'Bitte geben Sie die Überschrift ein.');
$GLOBALS['TL_LANG'][$strName]['defaultopenmodal']       = array('Modal-Window sofort öffnen', 'Ist diese Option ausgewählt wird das Modal-Window sofort beim Laden der Seite geöffnet.');
$GLOBALS['TL_LANG'][$strName]['showcookiesettings']     = array('Cookiebar aktivieren', 'Die Cookie Information Bar auf der Webseite anzeigen.');
$GLOBALS['TL_LANG'][$strName]['bartext']                = array('Text der CookieBar', 'Bitte geben Sie den Text der CookieBar ein.');
$GLOBALS['TL_LANG'][$strName]['barlabelallowall']       = array('Beschrifung der Schaltfläche "Alles erlauben"', 'Bitte geben Sie die Beschrifung der Schaltfläche "Alles erlauben" ein.');
$GLOBALS['TL_LANG'][$strName]['barlabelconfig']         = array('Beschrifung der Schaltfläche "Cookie Präferenzen"', 'Bitte geben Sie die Beschrifung der Schaltfläche "Cookie Präferenzen" ein.');
$GLOBALS['TL_LANG'][$strName]['modalheadline']          = array('Überschrift des Modal-Windows', 'Bitte geben Sie die Überschrift des Modal-Windows ein.');
$GLOBALS['TL_LANG'][$strName]['modaltext']              = array('Kopftext des Modal-Windows', 'Bitte geben Sie den Kopftext des Modal-Windows ein.');
$GLOBALS['TL_LANG'][$strName]['modallabelsave']         = array('Beschrifung der Schaltfläche "Speichern"', 'Bitte geben Sie die Beschrifung der Schaltfläche "Speichern" ein.');
$GLOBALS['TL_LANG'][$strName]['cookiesettings']         = array('Cookie-Einstellungen', 'Bitte legen Sie die Cookie-Einstellungen fest.');
$GLOBALS['TL_LANG'][$strName]['cookieid']               = array('Cookie-Id', 'Cookie-Id');
$GLOBALS['TL_LANG'][$strName]['cookiescriptlocation']   = array('Ort für das Einbinden des Script', 'Bitte wählen Sie den Ort für das Einbinden des Scripts aus.');
$GLOBALS['TL_LANG'][$strName]['cookiereadonly']         = array('Cookie nicht löschbar', 'Ist die Checkbox gesetzt, kann der Cokkie nicht gelöscht werden.');
$GLOBALS['TL_LANG'][$strName]['cookieheadline']         = array('Überschrift des Cookies', 'Bitte geben Sie die Überschrift des Cookies ein.');
$GLOBALS['TL_LANG'][$strName]['cookiedescription']      = array('Beschreibung des Cookies', 'Bitte geben Sie die Beschreibung des Cookies ein.');
$GLOBALS['TL_LANG'][$strName]['bartemplate']            = array('Template der CookieBar', 'Bitte wählen Sie das Template der CookieBar aus.');
$GLOBALS['TL_LANG'][$strName]['modaltemplate']          = array('Template des ModalWindows', 'Bitte wählen Sie das Template des ModalWindows aus.');
$GLOBALS['TL_LANG'][$strName]['pageforscript']          = array('Seiten für das Skript', 'Bitte wählen Sie die Seiten aus, auf denen das Skript geladen werden soll.');
$GLOBALS['TL_LANG'][$strName]['cookiesnippet']          = array('Snippet des Cookies', 'Bitte geben Sie das Snippet des Cookies ein.');
$GLOBALS['TL_LANG'][$strName]['ctrlcookiename']         = array('Name des Kontroll-Cookies', 'Bitte geben Sie das Snippet des Name des Kontroll-Cookies ein. Er muss mit "' . $GLOBALS['CTS']['COOKIEBAR']['CTRLCOOKIEPREFIX'] . '" beginnen!');
$GLOBALS['TL_LANG'][$strName]['sessioncookieheadline']  = array('Name des Contao Session Cookies', 'Bitte geben Sie die Überschrift des Contao Session Cookies ein.');
$GLOBALS['TL_LANG'][$strName]['sessioncookietext']      = array('Text des Contao Session Cookies', 'Bitte geben Sie den Text des Contao Session Cookies ein.');


/**
 * Legends
 */
$GLOBALS['TL_LANG'][$strName]['cookiesettings_legend']  = 'Cookie-Einstellungen';
$GLOBALS['TL_LANG'][$strName]['cookies_legend']         = 'Cookies';
$GLOBALS['TL_LANG'][$strName]['cookiestemplate_legend'] = 'Templates';
$GLOBALS['TL_LANG'][$strName]['cookietext_legend']      = 'Texte';
$GLOBALS['TL_LANG'][$strName]['cookiebuttons_legend']   = 'Button-Beschrifungen';
$GLOBALS['TL_LANG'][$strName]['session_legend']         = 'Contao Session Cookie';


/**
 * References
 */
$GLOBALS['TL_LANG'][$strName]['cookiescriptlocation_ref']   = ['head' => 'Kopfbereich', 'foot' => 'Fußbereich'];
$GLOBALS['TL_LANG'][$strName]['cookieposition_ref']         = ['top' => 'Kopfbereich', 'bottom' => 'Fußbereich'];
