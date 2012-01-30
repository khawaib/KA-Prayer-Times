<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport( 'joomla.application.component.view');
class KaprayertimesViewDefault extends JView {
    function display($tpl = null) {
        $option = JRequest::getVar('option');
        $app = JFactory::getApplication();
        $params =& JComponentHelper::getParams($option);
        
        JToolBarHelper::title( JText::_( 'KAPRAYERTIMES' ), 'kaprayertimes' );
        JToolBarHelper::preferences( 'com_kaprayertimes', '700', '600' );
        $bar=& JToolBar::getInstance( 'toolbar' );
        
        require_once JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'dashboardlinks.php';
        
        parent::display($tpl);
    }
}
?>