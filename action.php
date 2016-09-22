<?php
/**
 * @license    MIT
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC . 'lib/plugins/');
require_once(DOKU_PLUGIN . 'action.php');

class action_plugin_isowikitweaks extends DokuWiki_Action_Plugin {

    /**
     * Register the events
     */
    function register(Doku_Event_Handler $controller) {
        $controller->register_hook('DOKUWIKI_STARTED', 'BEFORE', $this, 'redirect');
    }
    
    function redirect() {
		if ($_SERVER["HTTPS"] == NULL) {
			header("HTTP/1.1 301 Moved Permanently");
			if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
				$location  = 'https://' . substr($_SERVER['HTTP_HOST'], 4).$_SERVER['REQUEST_URI'];
			} else {
				$location = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
			}
			header("Location: $location");
			exit;
		}
	}
}
