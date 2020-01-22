<?php
/**
 * @package     CookieHandleBar
 * @filesource  ModuleCookieHandleBar.php
 * @version     1.0.0
 * @since       03.07.18 - 10:09
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2018
 * @license     EULA
 */
namespace Esit\CookieHandleBar\Classes\Contao\Modules;

use Contao\Controller;
use Contao\FrontendTemplate;
use Contao\Input;
use Contao\ModuleModel;
use Esit\CookieHandleBar\Classes\Helper\CookieHelper;
use http\QueryString;

/**
 * Class ModuleCookieHandleBar
 * @package CookieHandleBar\Classes\Contao\Modules
 */
class ModuleCookieHandleBar extends \Module
{


    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_cookiehandlebar';


    /**
     * @var CookieHelper
     */
    protected $cookieHelper;


    /**
     * ModuleCookieHandleBar constructor.
     * @param ModuleModel $objModule
     * @param string      $strColumn
     */
    public function __construct(ModuleModel $objModule, $strColumn = 'main')
    {
        parent::__construct($objModule, $strColumn);
        $this->cookieHelper = new CookieHelper();
    }


    /**
     * Generate module
     */
    public function generate()
    {
        if (TL_MODE === 'BE') {
            $objTemplate           = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### FRONTEND MODUL ###';
            $objTemplate->title    = $this->headline;
            $objTemplate->id       = $this->id;
            $objTemplate->link     = $this->name;
            $objTemplate->href     = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        $url                            = $this->generateUrl();
        $this->cookiesettings           = unserialize($this->cookiesettings, [null]);
        $this->setVisibility($this->ctrlcookiename);
        $this->Template->setData($this->arrData);
        $this->Template->cookieBar      = $this->generateBar($url);
        $this->Template->cookieModal    = $this->generateModal($this->ctrlcookiename);

        $this->loadScripts($this->ctrlcookiename);
        $this->handleForm($this->ctrlcookiename, $url);
    }


    /**
     * Erzeugt die Url der aktuellen Seite.
     * @return mixed
     */
    protected function generateUrl()
    {
        $url = Controller::addToUrl('');

        if (false !== strpos($url, '?')) {
            $parts = \explode('?', $url);

            if (false !== $parts && \count($parts) > 0) {
                $url = array_shift($parts);
            }
        }

        return $url;
    }


    /**
     * Erzeugt den String für das CookieModalWindow.
     * @param $ctrlcookiename
     * @return string
     */
    protected function generateModal($ctrlcookiename)
    {
        $name                       = $this->modaltemplate ?: 'cts_cookiemodal';
        $template                   = new FrontendTemplate($name);
        $template->setData($this->arrData);
        $template->selectedCookies  = $this->cookieHelper->getCookieIdsFormControll($_COOKIE, $ctrlcookiename);

        return $template->parse();
    }


    /**
     * Erzeugt den String für die Cookiebar.
     * @param $url
     * @return string
     */
    protected function generateBar($url)
    {
        $name     = $this->bartemplate ?: 'cts_cookiebar';
        $template = new FrontendTemplate($name);
        $template->setData($this->arrData);
        $template->allowAllLink = $url . '?allowAll=true';

        return $template->parse();
    }


    /**
     * Verarbeitet das Formular.
     * @param $ctrlcookiename
     * @param $url
     */
    protected function handleForm($ctrlcookiename, $url)
    {
        if (Input::get('allowAll') === 'true' || Input::post('FORM_SUBMIT') === 'COOKIEBARFORM') {
            $this->cookieHelper->deleteCookies();

            if (!empty($_POST)) {
                $cookies = $this->cookieHelper->getCookieIds($this->cookiesettings, array_keys($_POST));
            } else {
                $cookies = $this->cookieHelper->getCookieIds($this->cookiesettings);
            }

            $this->cookieHelper->setCookiebarCookie($ctrlcookiename, $cookies);
            Controller::redirect($url);
        }
    }


    /**
     * Lädt die erlaubten Scripte.
     * @param $ctrlcookiename
     */
    protected function loadScripts($ctrlcookiename)
    {
        $allowedKeys    = $this->cookieHelper->getCookieIdsFormControll($_COOKIE, $ctrlcookiename);
        $cookiesettings = $this->cookiesettings;

        if (!\is_array($cookiesettings)) {
            $cookiesettings = unserialize($this->cookiesettings, [null]);
        }

        if (is_array($cookiesettings) && count($cookiesettings)) {
            foreach ($cookiesettings as $cookie) {
                if (in_array($cookie['cookieid'], $allowedKeys) && $cookie['cookiesnippet']) {
                    $location = ($cookie['cookiescriptlocation'] === 'head') ? 'TL_HEAD' : 'TL_BODY';
                    $GLOBALS[$location][] = str_replace('&lt;', '<', $cookie['cookiesnippet']);
                }
            }
        }

        $GLOBALS['TL_BODY'][] = '<script src="system/modules/CookieHandleBar/assets/js/cookiebar.js"></script>';
    }


    /**
     * Setzt den Sichbarkeitsstatus der einzelnen Elemente der CookieBar.
     * @param $ctrlcookiename
     */
    protected function setVisibility($ctrlcookiename)
    {
        $this->showCookiebar                = false;
        $this->showCookiebartext            = false;
        $this->showCookiebarallowalllink    = false;
        $this->showCookiebarlink            = false;
        $this->showCookiebarmodal           = false;

        if (!array_key_exists($ctrlcookiename, $_COOKIE)) {
            // Kein Kontroll-Cookie gesetzt
            if ($this->defaultopenmodal) {
                // Modal sofort anzeigen
                $this->showCookiebarmodal = true;
            } else {
                // Modal NICHT sofort anzeigen
                $this->showCookiebar                = true;
                $this->showCookiebartext            = true;
                $this->showCookiebarallowalllink    = true;
                $this->showCookiebarlink            = true;
            }
        } else {
            // Kontroll-Cookie ist schon gesetzt
            $this->showCookiebarlink = true;
        }
    }
}
