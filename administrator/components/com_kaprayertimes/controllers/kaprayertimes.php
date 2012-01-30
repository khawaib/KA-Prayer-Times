<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

class KaprayertimesControllerKaprayertimes extends KaprayertimesController {
	function display() {
		$this->registerTask( 'add',     'edit' );
		$this->registerTask( 'apply',   'save' );
        
		JRequest::setVar('view', 'kaprayertimes');
		parent::display();
	}
	function save() {
		$task = JRequest::getVar('task');
		//Sanitize
		$post = JRequest::get( 'post' );

//		$post['text'] = JRequest::getVar( 'text', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$model = $this->getModel('kaprayertimesday');
		if ( $model->store($post) ) {
			switch ($task) {
				case 'apply' :
					$link = 'index.php?option=com_kaprayertimes&view=kaprayertimesday&cid[]='.(int) $post['cid'][0];
					break;
				default :
					$link = 'index.php?option=com_kaprayertimes&view=kaprayertimes';
					break;
			}
			$msg = JText::_( 'DATA SAVED' );
		} else {
			$msg 	= JText::_( 'ERROR SAVING DATA' );
			$link 	= 'index.php?option=com_kaprayertimes&view=kaprayertimes';
		}
		$this->setRedirect($link, $msg);
	}
	function cancel() {
		$this->setRedirect( 'index.php?option=com_kaprayertimes&view=kaprayertimes' );
	}
	function edit() {		
		JRequest::setVar( 'view', 'kaprayertimesday' );
		JRequest::setVar( 'hidemainmenu', 1 );

		$model 	= $this->getModel('kaprayertimesday');
		$user	=& JFactory::getUser();

		// Error if checkedout by another administrator
//		if ($model->isCheckedOut( $user->get('id') )) {
//			$this->setRedirect( 'index.php?option=com_kaprayertimes&view=kaprayertimes', JText::_( 'EDITED BY ANOTHER ADMIN' ) );
//		}
//
//		$model->checkout( $user->get('id') );
		
		parent::display();
	}
}
?>
