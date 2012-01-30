<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport( 'joomla.application.component.view');

class KaprayertimesViewKaprayertimes extends JView {
	function display($tpl = null) {
        $option = JRequest::getVar('option');
        $app = JFactory::getApplication('site');
        
		// Get document object
		$document = & JFactory::getDocument();	

    	// Add stylesheets to the document
		$document->addStyleSheet('components/com_kaprayertimes/assets/css/kaprayertimes.css');
        
		// set document information
		$document->setTitle('Title');
		$document->setName('Alias');
		$document->setDescription('Metadesc');
		$document->setMetaData('keywords', 'Metakey');
        
		// Get the page/component configuration
		$params = $app->getParams('com_kaprayertimes');

		$lists = array();
		
		$uri = JURI::base();
		
	    $filter_months	= $app->getUserStateFromRequest( $option.'filter_months', 'filter_months',0,'int' );
	    if (!$filter_months) { $filter_months = date("mY"); }
	
	    $search = $app->getUserStateFromRequest( $option.'search', 'search', '', 'string' );
	    $search = JString::strtolower( $search );
    
		$javascript = 'onchange="document.adminForm.submit();"';
		
		$db =& JFactory::getDBO();
		$uri	=& JFactory::getURI();
        
	    $items		=& $this->get( 'Data' );
	    $total		=& $this->get( 'Total' );
	    $pagination =& $this->get( 'Pagination' );
	    
	    $javascript 	= 'onchange="document.adminForm.submit();"';
//      $monthYear = date("M Y"); 
	    $database	= & JFactory::getDBO();
		$query = 'SELECT date_format(date, \'%m%Y\') as value, date_format(date, \'%M %Y\') as text '
		. ' FROM #__kaprayertimes'
      	. ' GROUP BY value'
		. ' ORDER BY date';
		
    	$database->setQuery( $query );
        $monthsResult = $database->loadObjectList();
		//$sortorder = $database->loadObjectList();
		//$months[] = JHTML::_('select.option',  '0', JText::_( 'SELECT MONTH' ) );
        $months = array();

        foreach ($monthsResult as $key => $value) {
            if (is_null($value->value) || $value->value=="" || $value->value=="000000") {
                unset($monthsResult[$key]);
            }
        }

		$months = array_merge( $months, $monthsResult );
		$lists['months']	= JHTML::_('select.genericlist',   $months, 'filter_months', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', "$filter_months" );
		
        $print = JRequest::getBool('print');
		if ($print) {
			$document->setMetaData('robots', 'noindex, nofollow');
		}
        
        $linkPDF = 'index.php?option=com_kaprayertimes&amp;view=kaprayertimes&amp;format=pdf&amp;tmpl=component';
        $pdf = '<a class="modal" title="'.JText::_('EDIT_LANGUAGE_FILE',true).'"  href="'.$linkPDF.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><img id="" src="../images/M_images/edit.png" alt="'.JText::_('EDIT_LANGUAGE_FILE',true).'"/></a>';

		$this->assignRef('lists',       $lists);
    	$this->assignRef('items',       $items);
    	$this->assignRef('pagination',	$pagination);
		$this->assignRef('search',		$search);
	  	$this->assignRef('params',		$params);
    	$this->assignRef('request_url',	$uri->toString());
        $this->assignRef('print',       $print);
        $this->assignRef('pdf',         $pdf);
        $this->assignRef('format',      JRequest::getvar('format'));
        
echo 'jhjh jh jk kjh jkhg jhgg hg jhg jg jgj hjh';
        echo 'For information about working with other document types, refer to the remaining recipes in
this chapter—Creating an RSS or Atom feed in a component, Outputting a RAW document
from a component, and Using a custom JDocument in a component (PHP';
//        parent::display($tpl);
    }
}
?>