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
 * @since       03.07.18 - 10:13
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2018
 * @license     EULA
 */
/**
 * Set Tablename: tl_module
 */
$strName = 'tl_module';

/* global_operations
$GLOBALS['TL_DCA'][$strName]['list']['global_operations'] = array
(
   'all' => array
   (
       'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
       'href'                => 'act=select',
       'class'               => 'header_edit_all',
       'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
   )
);

/* operations
$GLOBALS['TL_DCA'][$strName]['list']['operations']['delete'] = array
(
   'label'               => &$GLOBALS['TL_LANG'][$strName]['delete'],
   'href'                => 'act=delete',
   'icon'                => 'delete.gif',
   'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
);

/* slectors */
//$GLOBALS['TL_DCA'][$strName]['palettes']['__selector__'][] = '';

/* Palettes */
$GLOBALS['TL_DCA'][$strName]['palettes']['cookiehandlebar'] = '{title_legend},name,type,cookieheadline;{cookiesettings_legend},defaultopenmodal;{cookietext_legend},bartext,modalheadline,modaltext;{cookiebuttons_legend},barlabelallowall,barlabelconfig,barposition,modallabelsave;{session_legend},sessioncookieheadline,sessioncookietext;{cookies_legend},cookiesettings;{cookiestemplate_legend},bartemplate,modaltemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

/* subpalettes */
//$GLOBALS['TL_DCA'][$strName]['subpalettes'][''] = '';

/* Fields */
$GLOBALS['TL_DCA'][$strName]['fields']['defaultopenmodal'] = array
(   // Alle Cookies per default erlauben
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['defaultopenmodal'],
    'exclude'               => true,
    'inputType'             => 'checkbox',
    'eval'                  => ['tl_class'=>'m12 w50'],
    'sql'                   => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['cookieheadline'] = array
(   // Name des Kontroll-Cookies dieses Moduls
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['cookieheadline'],
    'exclude'               => true,
    'inputType'             => 'text',
    'eval'                  => ['maxlength'=>255, 'tl_class'=>'w50'],
    'sql'                   => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['ctrlcookiename'] = array
(   // Name des Kontroll-Cookies dieses Moduls
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['ctrlcookiename'],
    'exclude'               => true,
    'inputType'             => 'text',
    'default'               => uniqid($GLOBALS['CTS']['COOKIEBAR']['CTRLCOOKIEPREFIX']),
    'save_callback'         => array(array('\Esit\CookieHandleBar\Classes\Contao\Dca\TlModule','generateCtrlCookieName')),
    'eval'                  => ['maxlength'=>255, 'tl_class'=>'w50', 'unique'=>true, 'doNotCopy'=>true],
    'sql'                   => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['bartext'] = array
(   // Freier Text für die CookieBar
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['bartext'],
    'exclude'               => true,
    'inputType'             => 'textarea',
    'eval'                  => ['tl_class'=>'clr', 'allowHtml'=>true, 'rte'=>'tinyMCE'],
    'sql'                   => "text NOT NULL"
);

$GLOBALS['TL_DCA'][$strName]['fields']['barlabelallowall'] = array
(   // Label für den Speichern-Button im Modal-Window
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['barlabelallowall'],
    'exclude'               => true,
    'inputType'             => 'text',
    'eval'                  => ['maxlength'=>255, 'tl_class'=>'w50'],
    'sql'                   => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['barlabelconfig'] = array
(   // Label für den ModalLink
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['barlabelconfig'],
    'exclude'               => true,
    'inputType'             => 'text',
    'eval'                  => ['maxlength'=>255, 'tl_class'=>'w50'],
    'sql'                   => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['modalheadline'] = array
(   // Headline für das ModalWindows
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['modalheadline'],
    'exclude'               => true,
    'inputType'             => 'text',
    'eval'                  => ['maxlength'=>255, 'tl_class'=>'clr long'],
    'sql'                   => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['modaltext'] = array
(   // Freier Text für das ModalWindows
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['modaltext'],
    'exclude'               => true,
    'inputType'             => 'textarea',
    'eval'                  => ['tl_class'=>'clr', 'allowHtml'=>true, 'rte'=>'tinyMCE'],
    'sql'                   => "text NOT NULL"
);

$GLOBALS['TL_DCA'][$strName]['fields']['modallabelsave'] = array
(   // Label für den Speichern-Button
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['modallabelsave'],
    'exclude'               => true,
    'inputType'             => 'text',
    'eval'                  => ['maxlength'=>255, 'tl_class'=>'w50'],
    'sql'                   => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['bartemplate'] = array
(   // Templateauswahl für die CookieBar
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['bartemplate'],
    'exclude'               => true,
    'inputType'             => 'select',
    'options_callback'      => array('\Esit\CookieHandleBar\Classes\Contao\Dca\TlModule', 'getCookiebarTemplate'),
    'eval'                  => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql'                   => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['modaltemplate'] = array
(   // Templateauswahl für die CookieModal
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['modaltemplate'],
    'inputType'             => 'select',
    'options_callback'      => array('\Esit\CookieHandleBar\Classes\Contao\Dca\TlModule', 'getCookiemodalTemplate'),
    'eval'                  => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql'                   => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['sessioncookieheadline'] = array
(   // Headline für das ModalWindows
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['sessioncookieheadline'],
    'exclude'               => true,
    'inputType'             => 'text',
    'eval'                  => ['maxlength'=>255, 'tl_class'=>'clr long', 'mandatory'=>true],
    'sql'                   => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA'][$strName]['fields']['sessioncookietext'] = array
(   // Freier Text für das ModalWindows
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['sessioncookietext'],
    'exclude'               => true,
    'inputType'             => 'textarea',
    'eval'                  => ['tl_class'=>'clr', 'allowHtml'=>true, 'rte'=>'tinyMCE', 'mandatory'=>true],
    'sql'                   => "text NOT NULL"
);

$GLOBALS['TL_DCA'][$strName]['fields']['cookiesettings'] = array
(   // Einstellungen für die Cookies
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['cookiesettings'],
    'exclude'               => true,
    'inputType'             => 'multiColumnWizard',
    'sql'                   => "text NULL",
    'eval'                  => [
        'tl_class'          => 'clr',
        'allowHtml'         => true,
        'buttons'           => ['copy'=>false, 'up'=>false, 'down'=>false],
        'buttonPos'         => 'top',
        'disableSorting'    => true,
        'valign'            => 'top',
        'columnFields'      => [
            'cookieid' => [  // Id des Cookies
                             'label'          => &$GLOBALS['TL_LANG'][$strName]['cookieid'],
                             'exclude'        => true,
                             'save_callback'  => array(array('\Esit\CookieHandleBar\Classes\Contao\Dca\TlModule','generateUniqueId')),
                             'inputType'      => 'text',
                             'eval'           => [ 'style' => 'width:100%', 'columnPos'=>'long', 'unique'=>true, 'readonly'=>true]
            ],
            'cookiescriptlocation' => [ // Wo soll das Script eingebunden werden?
                                        'label'          => &$GLOBALS['TL_LANG'][$strName]['cookiescriptlocation'],
                                        'exclude'        => true,
                                        'inputType'      => 'select',
                                        'options'        => ['head', 'foot'],
                                        'reference'      => &$GLOBALS['TL_LANG'][$strName]['cookiescriptlocation_ref'],
                                        'eval'           => ['style' => 'width:100%', 'columnPos'=>'long']
            ],
            'cookieheadline' => [    // Überschrift des Eintrags
                                     'label'          => &$GLOBALS['TL_LANG'][$strName]['cookieheadline'],
                                     'exclude'        => true,
                                     'inputType'      => 'text',
                                     'eval'           => ['style' => 'width:100%', 'columnPos'=>'long', 'maxlength'=>255]
            ],
            'cookiedescription' => [ // Beschreibung des Eintrags
                                     'label'          => &$GLOBALS['TL_LANG'][$strName]['cookiedescription'],
                                     'exclude'        => true,
                                     'inputType'      => 'textarea',
                                     'eval'           => ['style' => 'width:100%', 'columnPos'=>'long', 'allowHtml'=>true/*, 'rte'=>'tinyMCE'*/]
            ],
            'cookiesnippet' => [     // Snipptes des Eintrags
                                     'label'          => &$GLOBALS['TL_LANG'][$strName]['cookiesnippet'],
                                     'exclude'        => true,
                                     'inputType'      => 'textarea',
                                     'eval'           => ['style' => 'width:100%', 'columnPos'=>'long', 'allowHtml'=>true]
            ]
        ]
    ]
);