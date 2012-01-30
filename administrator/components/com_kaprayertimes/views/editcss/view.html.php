<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');

class KaprayertimesViewEditcss extends JView {
	function display($tpl = null) {
		$app = JFactory::getApplication();
        $option = JRequest::getVar('option');
        require_once JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'dashboardlinks.php';
		//initialise variables
		$document	= & JFactory::getDocument();
		$user 		= & JFactory::getUser();
		$lang 		= & JFactory::getLanguage();
		
		//only admins have access to this view
//		if ($user->get('gid') < 24) {
//			JError::raiseWarning( 'SOME_ERROR_CODE', JText::_( 'ALERTNOTAUTH'));
//			$app->redirect( 'index.php?option=com_kaprayertimes' );
//		}

		//get vars
		$option		= JRequest::getVar('option');
		$filename	= 'kaprayertimes.css';
		$path		= JPATH_SITE.DS.'components'.DS.'com_kaprayertimes'.DS.'assets'.DS.'css';
		$css_path	= $path.DS.$filename;

		//create the toolbar
        JToolBarHelper::title( JText::_( 'KAPRAYERTIMES' ) . ' <small>[ Edit CSS ]</small>', 'kaprayertimes' );
		JToolBarHelper::apply( 'applycss' );
		JToolBarHelper::spacer();
		JToolBarHelper::save( 'savecss' );
		JToolBarHelper::spacer();
		JToolBarHelper::cancel();
		
//		JRequest::setVar( 'hidemainmenu', 1 );

		//add css to document
//		$document->addStyleSheet('components/com_kaprayertimes/assets/css/kaprayertimes_backend.css');
//		if ($lang->isRTL()) {
//			$document->addStyleSheet('components/com_kaprayertimes/assets/css/kaprayertimes_backend_rtl.css');
 //   	}
		
		//read the the stylesheet
		jimport('joomla.filesystem.file');
		$content = JFile::read($css_path);
		
		jimport('joomla.client.helper');
		$ftp =& JClientHelper::setCredentialsFromRequest('ftp');

		if ($content !== false) {
			$content = htmlspecialchars($content, ENT_COMPAT, 'UTF-8');
		} else {
			$msg = JText::sprintf('FAILED TO OPEN FILE FOR WRITING', $css_path);
			$app->redirect('index.php?option='.$option, $msg);
		}

		//assign data to template
		$this->assignRef('css_path'		, $css_path);
		$this->assignRef('content'		, $content);
		$this->assignRef('filename'		, $filename);
		$this->assignRef('ftp'			, $ftp);

		parent::display($tpl);
	}
}