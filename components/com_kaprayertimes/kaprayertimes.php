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

define( 'COM_KAPRAYERTIMES_VERSION', $version );
define( 'COM_KAPRAYERTIMES_VERSION_LINK', '<a href="http://www.khawaib.co.uk/index.php?option=com_content&amp;Itemid=29&amp;catid=12&amp;id=44&amp;lang=en&amp;view=article" target="_blank">KA Prayer Times '.$version.'</a>' );

require_once JPATH_COMPONENT.DS.'helpers'.DS.'icon.php';

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Initialize the controller
$controller = new KaprayertimesController();
$controller->execute( null );

// Redirect if set by the controller
$controller->redirect();
?>