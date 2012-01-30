<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

class KaprayertimesControllerUploaddata extends kaprayertimesController {
	function __construct() {
		parent::__construct();
		$this->registerTask( 'add', 'edit' );
		$this->registerTask( 'upload', 'upload' );
	}
	
	function save() {
        $data = JRequest::get( 'post' );
		$model = $this->getModel('uploaddata');
  		if ($model->store($post)) {
  			$msg = JText::_( 'FILE_UPLOADED_SUCCESSFULLY' );
  		} else {
  			$msg = JText::_( 'ERROR_SAVING_FILE' );
  		}

  		$link = 'index.php?option=com_kaprayertimes&view=kaprayertimes';
  		$this->setRedirect($link, $msg);
	}

	function cancel() {
		$msg = JText::_( 'OPERATION_CANCELED' );
		$this->setRedirect( 'index.php?option=com_kaprayertimes', $msg );
	}
	
	function display() {
		JRequest::setVar('view', 'uploaddata');
		parent::display();
	}
}
?>