<?php
/**
 * @package     CookieHandleBar
 * @filesource  TlModule.php
 * @version     1.0.0
 * @since       08.05.18 - 09:47
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2018
 * @license     EULA
 */
namespace Esit\CookieHandleBar\Classes\Contao\Dca;

use Contao\Controller;

/**
 * Class TlModule
 * @package Esit\CookieHandleBar\Classes\Contao\Dca
 */
class TlModule
{


    /**
     * onload_callback: Erstellt eine Warnmeldung, wenn der MCW nicht installiert ist.
     */
    public function generateMessage()
    {
        if(!array_key_exists('MultiColumnWizard', \ClassLoader::getClasses()))
        {
            if (isset($GLOBALS['TL_LANG']['MSC']['chb']['error']['noMcw'])) {
                $msg = $GLOBALS['TL_LANG']['MSC']['chb']['error']['noMcw'];
            } else {
                $msg = 'Please install MultiColumnWizard!';
            }

            \Message::addError($msg);
        }
    }


    /**
     * save_callback: Erstellt die eindeutige Id für die Einstellungen des Cookies.
     * @param $value
     * @param $dc
     * @return string
     */
    public function generateUniqueId($value, $dc)
    {
        if (!$value) {
            return uniqid($GLOBALS['CTS']['COOKIEBAR']['COOKIESETTINGPREFIX']);
        }

        return $value;
    }


    /**
     * options_callback: Gibt die Templates für die CookieBar zurück.
     * @param $dc
     * @return array
     */
    public function getCookiebarTemplate($dc)
    {
        return Controller::getTemplateGroup('cts_cookiebar');
    }


    /**
     * options_callback: Gibt die Templates für das CookieModal zurück.
     * @param $dc
     * @return array
     */
    public function getCookiemodalTemplate($dc)
    {
        return Controller::getTemplateGroup('cts_cookiemodal');
    }


    /**
     * save_callback: Erzeugt den Namen des Kontroll-Cookies.
     * @param $value
     * @param $dc
     * @return string
     */
    public function generateCtrlCookieName($value, $dc)
    {
        if (!$value) {
            return uniqid($GLOBALS['CTS']['COOKIEBAR']['CTRLCOOKIEPREFIX']);
        }

        return $value;
    }
}
