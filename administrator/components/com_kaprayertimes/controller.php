<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.controller' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );

class KaprayertimesController extends JController {
    function __construct() {
        //Get View
        if(JRequest::getCmd('view') == '') {
            JRequest::setVar('view', 'default');
        }
        $this->item_type = 'Default';
        parent::__construct();
        
        // Register Extra task
		$this->registerTask( 'apply', 'save' );
		$this->registerTask( 'applycss', 'savecss' );
    }
	function savecss() {
		$app = JFactory::getApplication();
		JRequest::checkToken() or jexit( 'Invalid Token' );
        
		// Initialize some variables
		$option			= JRequest::getVar('option');
		$filename		= JRequest::getVar('filename', '', 'post', 'cmd');
		$filecontent	= JRequest::getVar('filecontent', '', '', '', JREQUEST_ALLOWRAW);

		if (!$filecontent) {
			$app->redirect('index.php?option='.$option, JText::_('OPERATION FAILED').': '.JText::_('CONTENT EMPTY'));
		}

		// Set FTP credentials, if given
		jimport('joomla.client.helper');
		JClientHelper::setCredentialsFromRequest('ftp');
		$ftp = JClientHelper::getCredentials('ftp');

		$file = JPATH_SITE.DS.'components'.DS.'com_kaprayertimes'.DS.'assets'.DS.'css'.DS.$filename;

		// Try to make the css file writeable
		if (!$ftp['enabled'] && JPath::isOwner($file) && !JPath::setPermissions($file, '0755')) {
			JError::raiseNotice('SOME_ERROR_CODE', 'COULD NOT MAKE CSS FILE WRITABLE');
		}

		jimport('joomla.filesystem.file');
		$return = JFile::write($file, $filecontent);

		// Try to make the css file unwriteable
		if (!$ftp['enabled'] && JPath::isOwner($file) && !JPath::setPermissions($file, '0555')) {
			JError::raiseNotice('SOME_ERROR_CODE', 'COULD NOT MAKE CSS FILE UNWRITABLE');
		}

		if ($return) {
			$task = JRequest::getVar('task');

			switch($task) {
				case 'applycss' :
					$app->redirect('index.php?option='.$option.'&view=editcss', JText::_('CSS FILE SUCCESSFULLY ALTERED'));
					break;
				case 'savecss'  :
				default         :
					$app->redirect('index.php?option='.$option, JText::_('CSS FILE SUCCESSFULLY ALTERED') );
					break;
			}
		} else {
			$app->redirect('index.php?option='.$option, JText::_('OPERATION FAILED').': '.JText::sprintf('FAILED TO OPEN FILE FOR WRITING', $file));
		}
	}
    function display() {
        parent::display();
    }
}
?>