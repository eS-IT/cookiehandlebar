'use strict';
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @copyright   e@sy Solutions IT 2018
 * @license     EULA
 * @package     CookieHandleBar
 * @version     1.0.0
 * @since       03.07.18 - 14:11
 */
$(document).ready(function () {
    $('#cookibarlink').click(function () {
        $('#cookiebarmodal').removeClass('closed').addClass('open');
        $('.cookiebar').removeClass('openall').addClass('closedall');
        $('.cookiebartext').removeClass('open').addClass('closed');
        $('.cookiebarallowalllink').removeClass('open').addClass('closed');
        $('.cookiebarlink').removeClass('open').addClass('closed');
    });
});