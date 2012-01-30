<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.view' );

class KaprayertimesViewKaprayertimes extends Jview {
	function __construct( $config = array()) { 
        global $context;
        $context = 'prayertimes.list.';
        parent::__construct( $config );
	}

	function display($tpl = null) {			 
        $option = JRequest::getVar('option');
        $app = JFactory::getApplication();
        
		$option = 'com_kaprayertimes';
		//set document title
		$document = & JFactory::getDocument();
		$document->setTitle( JText::_('KAPRAYERTIMES') );
        require_once JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'dashboardlinks.php';
        //Set ToolBar title
        JToolBarHelper::title( JText::_( 'KAPRAYERTIMES' ) . ' <small>[ '.JText::_('PRAYERTIMES').' ]</small>', 'kaprayertimes' );
 		JToolBarHelper::addNew();
 		JToolBarHelper::editList();		
		JToolBarHelper::deleteList();
		
		$uri	=& JFactory::getURI();
				
        $filter_months	= $app->getUserStateFromRequest( $option.'filter_months', 'filter_months',0,'int' );
        if (!$filter_months) { $filter_months = date("mY"); }

        $database	= & JFactory::getDBO();
		$query = ' SELECT date_format(date, \'%m%Y\') as value, date_format(date, \'%M %Y\') as text '
			. ' FROM #__kaprayertimes'
            . ' GROUP BY value'
			. ' ORDER BY date';
        $database->setQuery( $query );
		$monthsResult = $database->loadObjectList();
        
        if (!empty($monthsResult)) {
            $months[] = JHTML::_('select.option',  '0', JText::_( 'SELECT_MONTH' ) );

            foreach ($monthsResult as $key => $value) {
                if (is_null($value->value) || $value->value=="" || $value->value=="000000") {
                    unset($monthsResult[$key]);
                }
            }

            $months = array_merge( $months, $monthsResult );
            $lists['months']	= JHTML::_('select.genericlist',   $months, 'filter_months', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', "$filter_months" );
        } else {
            $app->redirect('index.php?option='.$option.'&view=uploaddata', JText::_('UPLOAD_DATA_FIRST_MSG'));
        }
        
		//Get data from the model
		$items = & $this->get( 'Data');
		$pagination = & $this->get( 'Pagination' );

        //save a reference into view	
        $this->assignRef('user',		JFactory::getUser());	
        $this->assignRef('lists',		$lists);    
        $this->assignRef('items',		$items); 		
        $this->assignRef('pagination',	$pagination);
        $this->assignRef('request_url',	$uri->toString());
		$this->assignRef('warningIcon', $this->warningIcon());

		//call parent display
        parent::display($tpl);
    }
	function warningIcon() {
		$app = JFactory::getApplication();
		$url = $app->isAdmin() ? JURI::root() : JURI::base();
		$tip = '<img src="'.$url.'includes/js/ThemeOffice/warning.png" border="0"  alt="" />';
		return $tip;
	}
}
?>