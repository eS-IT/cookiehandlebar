<?php
/**
 * @package     CookieHandleBar
 * @filesource  autoload.php
 * @version     1.0.0
 * @since       05.07.18 - 08:10
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2018
 * @license     EULA
 */
/**
 * Variables
 */
$strFolder      = 'CookieHandleBar';
$strNamespace   = 'Esit\\' . $strFolder;


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	$strNamespace
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Dca
    $strNamespace . '\Classes\Contao\Dca\TlModule'                  => "system/modules/$strFolder/Classes/Contao/Dca/TlModule.php",

    // Modules
    $strNamespace . '\Classes\Contao\Modules\ModuleCookieHandleBar' => "system/modules/$strFolder/Classes/Contao/Modules/ModuleCookieHandleBar.php",

    // Modules
    $strNamespace . '\Classes\Helper\CookieHelper'                  => "system/modules/$strFolder/Classes/Helper/CookieHelper.php"
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_cookiehandlebar'   => "system/modules/$strFolder/templates",
    'cts_cookiebar'         => "system/modules/$strFolder/templates",
    'cts_cookiemodal'       => "system/modules/$strFolder/templates",
));