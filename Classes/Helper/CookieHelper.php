<?php
/**
 * @package     CookieHandleBar
 * @filesource  CookieHelper.php
 * @version     1.0.0
 * @since       04.07.18 - 10:18
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2018
 * @license     EULA
 */
namespace Esit\CookieHandleBar\Classes\Helper;

use Contao\Input;

class CookieHelper
{


    /**
     * Liest die Namen aller Kontrollcookies aus.
     * @param $cookie
     * @param $prefix
     * @return array
     */
    public function getControllKeys($cookie, $prefix)
    {
        $keys = [];

        if (is_array($cookie)) {
            $cookieKeys = array_keys($cookie);

            if (is_array($cookieKeys)) {
                foreach ($cookieKeys as $key) {
                    if (substr_count($key, $prefix)) {
                        $keys[] = $key;
                    }
                }
            }
        }

        return $keys;
    }


    /**
     * Gibt die ausgewählten Cookies eines Kontroll-Cookies zurück.
     * @param $cookie
     * @param $ctrlKey
     * @return array|mixed
     */
    public function getCookieIdsFormControll($cookie, $ctrlKey = null)
    {
        $keys = [];

        if ($ctrlKey === null) {
            foreach ($cookie as $name => $value) {
                if (substr_count($name, $GLOBALS['CTS']['COOKIEBAR']['CTRLCOOKIEPREFIX'])) {
                    $keys = array_merge($keys, json_decode($value));
                }
            }
        } else {
            if (isset($cookie[$ctrlKey])) {
                $keys = json_decode($cookie[$ctrlKey]);
            }
        }

        return $keys;
    }


    /**
     * Gibt die Ids der erlaubten Cookies zurück.
     * @param       $cookieSettings
     * @param array $postFields
     * @return array
     */
    public function getCookieIds($cookieSettings, $postFields = [])
    {
        $ids = [];

        if (is_array($cookieSettings)) {
            if (is_array($postFields) && count($postFields)) {
                foreach ($cookieSettings as $cookie) {
                    if (in_array($cookie['cookieid'], $postFields)) {
                        $ids[] = $cookie['cookieid'];
                    }
                }
            } else {
                foreach ($cookieSettings as $cookie) {
                    $ids[] = $cookie['cookieid'];
                }
            }
        }

        return $ids;
    }


    /**
     * Entfernt alle Cookies, bevor die neuen gesetzt werden.
     */
    public function deleteCookies()
    {
        if (is_array($_COOKIE)) {
            $cookies = array_keys($_COOKIE);

            foreach ($cookies as $name) {
                if ($name !== 'XDEBUG_SESSION') {
                    Input::setCookie($name, null);
                }
            }
        }
    }


    /**
     * Speichert die erlaubten Cookies in einem Cookie.
     * @param $name
     * @param $cookieIds
     */
    public function setCookiebarCookie($name, $cookieIds)
    {
        $lifeTime = $GLOBALS['CTS']['COOKIEBAR']['COOKIELIFETIME'];
        setcookie($name, json_encode($cookieIds), time() + 60 * 60 * 24 * $lifeTime);
        #Input::setCookie($name, 'TEST'); #json_encode($cookieIds));  // CTO setzt den Cookie nicht!?!
    }
}
