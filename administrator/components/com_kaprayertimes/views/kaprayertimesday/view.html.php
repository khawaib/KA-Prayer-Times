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

class KaprayertimesViewKaprayertimesday extends Jview {
	function __construct( $config = array()) { 
        global $context;
        $context = 'prayertimes.list.';
        parent::__construct( $config );
	}

	function display($tpl = null) {			 
        $app = JFactory::getApplication();
		$option = JRequest::getVar('option');
        
        require_once JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'dashboardlinks.php';
        
        $uri	=& JFactory::getURI();
		$user 	=& JFactory::getUser();
		$model	=& $this->getModel();
        
        $detail	=& $this->get('data');
        $isNew	= ($detail->id < 1);

        // fail if checked out not by 'me'
//		if ($model->isCheckedOut( $user->get('id') )) {
//			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'THE DETAIL' ), $detail->title );
//			$app->redirect( 'index.php?option='. $option, $msg );
//		}
        
        $text = $isNew ? JText::_( 'NEW' ) : JText::_( 'EDIT' );
        
		$document = & JFactory::getDocument();
        JToolBarHelper::title( JText::_( 'KAPRAYERTIMES' ).': <small>[ ' . $text.' ]</small>', 'kaprayertimes' );
		JToolBarHelper::apply();
        JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}
		
//        if (!$isNew) {
//			$model->checkout( $user->get('id') );
//        } else {
//			// initialise new record
//			$detail->published = 1;
//			$detail->approved 	= 1;
//        }
        
		jimport('joomla.filter.filteroutput');	
		JFilterOutput::objectHTMLSafe( $detail, ENT_QUOTES, 'description' );
		
		$this->assignRef('lists',		$lists);
		$this->assignRef('detail',		$detail);
		$this->assignRef('request_url',	$uri->toString());
        $this->assignRef('warningIcon', $this->warningIcon());
        
		parent::display($tpl);
    }
	function warningIcon() {
		$app = JFactory::getApplication();
		$url = $app->isAdmin() ? JURI::root() : JURI::base();
		$tip = '<span class="error hasTip" title="'.JText::_( 'WARNING' ).'::'. JText::_( 'TIME_FORMAT_WARN' ).'"><img src="'.$url.'includes/js/ThemeOffice/warning.png" border="0"  alt="" />';
		return $tip;
	}
}
?>