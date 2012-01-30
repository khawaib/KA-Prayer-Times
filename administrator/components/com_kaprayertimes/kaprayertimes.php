<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'helper.php');
$kaptHelper = new kaptHelper();
$version = $kaptHelper->getVersion();
$releaseDate = $kaptHelper->getReleaseDate();

define( 'COM_KAPRAYERTIMES_DIR', 'images'.DS.'kaprayertimes'.DS );
define( 'COM_KAPRAYERTIMES_BASE', JPATH_ROOT.DS.COM_KAPRAYERTIMES_DIR );
define( 'COM_KAPRAYERTIMES_BASEURL', JURI::root().str_replace( DS, '/', COM_KAPRAYERTIMES_DIR ));
define( 'COM_KAPRAYERTIMES_VERSION', $version );
define( 'COM_KAPRAYERTIMES_RELEASEDATE', $releaseDate );
define( 'COM_KAPRAYERTIMES_VERSION_LINK', '<a href="http://www.khawaib.co.uk/index.php?option=com_content&amp;Itemid=29&amp;catid=12&amp;id=44&amp;lang=en&amp;view=article" target="_blank">KA Prayer Times '.$version.'</a>' );

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';
// Require the base controller
require_once JPATH_COMPONENT.DS.'helpers'.DS.'helper.php';
// CSS
$document = & JFactory::getDocument();
//$document->addStyleDeclaration(".icon-48-kaprayertimes {background-image: url('/administrator/components/com_kaprayertimes/assets/images/icon-48-kaprayertimes.png');}", 'text/css');
$document->addStyleSheet(JURI::root().'/administrator/components/com_kaprayertimes/assets/css/kaprayertimes.css');

// Require specific controller if requested
if( $controller = JRequest::getWord('controller') ) {
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        $controller = '';
    }
}

//Create the controller
$classname  = 'KaprayertimesController'.$controller;
$controller = new $classname( );

// Perform the Request task
$controller->execute( JRequest::getWord('task') );
$controller->redirect();
?>