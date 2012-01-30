<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

class KaprayertimesControllerLanguages extends KaprayertimesController {
	function display() {
		$this->registerTask( 'add', 'edit' );
		$this->registerTask( 'apply', 'save' );
		parent::display();
	}
	function save() {
		jimport('joomla.filesystem.file');
        $code = JRequest::getString('code');
		JRequest::setVar('code',$code);
        $content = JRequest::getVar('content','','','string',JREQUEST_ALLOWRAW);
        if (empty($code) OR empty($content)) {
            $msg = JText::_( 'ERROR SAVING DATA CODE ERROR OR EMPTY' );
        } else {
            $path = JLanguage::getLanguagePath(JPATH_ROOT).DS.$code.DS.$code.'.com_kaprayertimes.ini';
            $result = JFile::write($path, $content);
            if ($result) {
                $msg = JText::_( 'FILE SAVED' );
            } else {
                $msg = JText::_( 'ERROR SAVING DATA' );
            }
        }

        $link = 'index.php?option=com_kaprayertimes&view=languages&layout=editfile&tmpl=component&code='.$code;
		$this->setRedirect($link, $msg);
	}
    function share() {
        JRequest::setVar( 'view', 'languages' );
        JRequest::setVar( 'layout', 'share' );
        parent::display();
    }
	function send(){
		$bodyEmail = JRequest::getString('mailbody');
		$code = JRequest::getString('code');
		JRequest::setVar('code',$code);
        $link = 'index.php?option=com_kaprayertimes&view=languages&layout=share&tmpl=component&code='.$code;
        if (empty($code)) {
            $msg = JText::_( 'ERROR SAVING DATA CODE ERROR' );
            $this->setRedirect($link, $msg);
        }
        
		$mailer =& JFactory::getMailer();
        $config =& JFactory::getConfig();
        $sender = array( $config->getValue( 'config.mailfrom' ), $config->getValue( 'config.fromname' ) );
        $mailer->setSender($sender);
        $recipient = 'translate@khawaib.co.uk';
        $mailer->addRecipient($recipient);
        $mailSubject = '[KAPRAYERTIMES LANGUAGE FILE] '.$code;
        $mailer->setSubject($mailSubject);
        $mailer->setBody = 'The website '.JURI::base().' using KA Prayer Times '.COM_KAPRAYERTIMES_VERSION.' sent a language file : '.$code;
		jimport('joomla.filesystem.file');
		$path = JPath::clean(JLanguage::getLanguagePath(JPATH_ROOT).DS.$code.DS.$code.'.com_kaprayertimes.ini');
		$mailer->AddAttachment($path);
		$result = $mailer->Send();
		if ($result) {
            $msg = JText::_( 'THANK_YOU_FOR_SHARING' );
		} else {
			$msg = JText::_( 'THANK_YOU_FOR_SHARING' . $mailer->reportMessage );
		}
        $this->setRedirect($link, $msg);
	}
}
?>