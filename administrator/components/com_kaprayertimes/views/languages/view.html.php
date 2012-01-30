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
class KaprayertimesViewLanguages extends JView {
    function display($tpl = null) {
        $option = JRequest::getVar('option');
        JHTML::_('behavior.modal');
        $app = JFactory::getApplication();
        $params =& JComponentHelper::getParams($option);
        JToolBarHelper::title( JText::_( 'KAPRAYERTIMES' ) . ' <small>[ Languages ]</small>', 'kaprayertimes' );
        require_once JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'dashboardlinks.php';
        
        $path = JLanguage::getLanguagePath(JPATH_ROOT);
        $dirs = JFolder::folders( $path );
        foreach ($dirs as $dir) {
			$xmlFiles = JFolder::files( $path.DS.$dir, '^([-_A-Za-z]*)\.xml$' );
			$xmlFile = reset($xmlFiles);
			if(empty($xmlFile)) continue;
			$data = JApplicationHelper::parseXMLLangMetaFile($path.DS.$dir.DS.$xmlFile);
			$oneLanguage = null;
			$oneLanguage->language 	= $dir;
			$oneLanguage->name = $data['name'];
			$languageFiles = JFolder::files( $path.DS.$dir, '^(.*)\.com_kaprayertimes\.ini$' );
			$languageFile = reset($languageFiles);
			if(!empty($languageFile)){
				$linkEdit = 'index.php?option=com_kaprayertimes&amp;view=languages&amp;layout=editfile&amp;tmpl=component&amp;code='.$oneLanguage->language;
				$oneLanguage->edit = '<a class="modal" title="'.JText::_('EDIT_LANGUAGE_FILE',true).'"  href="'.$linkEdit.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><img id="image'.$oneLanguage->language.'" src="'.JURI::root().'administrator/components/com_kaprayertimes/assets/images/edit.png" alt="'.JText::_('EDIT_LANGUAGE_FILE',true).'"/></a>';
			} else {
				$linkEdit = 'index.php?option=com_kaprayertimes&amp;view=languages&amp;layout=editfile&amp;tmpl=component&amp;code='.$oneLanguage->language;
				$oneLanguage->edit = '<a class="modal" title="'.JText::_('ADD_LANGUAGE_FILE',true).'"  href="'.$linkEdit.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><img id="image'.$oneLanguage->language.'" src="'.JURI::root().'administrator/components/com_kaprayertimes/assets/images/edit.png" alt="'.JText::_('ADD_LANGUAGE_FILE',true).'"/></a>';
//                $oneLanguage->edit = '';
			}
			$languages[] = $oneLanguage;
		}
        
        $this->assignRef('languages',$languages);

        if ($this->getLayout() == 'editfile') {
            $code = JRequest::getString('code');
/* TODO: Redirect user if file empty */
//            if (empty($code)) {
//                $msg = JText::_('CODE_NOT_SPECIFIED');
//                $this->setRedirect( 'index.php?option=com_kaprayertimes&amp;view=languages', $msg );
//                return;
//            }
            $file = null;
            $file->name = $code;
            $path = JLanguage::getLanguagePath(JPATH_ROOT).DS.$code.DS.$code.'.com_kaprayertimes.ini';
            $file->path = $path;
            jimport('joomla.filesystem.file');
            $showLatest = true;
            $loadLatest = false;
            if (JFile::exists($path)) {
                $file->content = JFile::read($path);

                if (empty($file->content)) {
/* TODO: Redirect user if file empty */
//                    acymailing::display('File not found : '.$path,'error');
                }
            } else {
                $loadLatest = true;
//                acymailing::display(JText::_('LOAD_ENGLISH_1').'<br/>'.JText::_('LOAD_ENGLISH_2').'<br/>'.JText::_('LOAD_ENGLISH_3'),'info');
//                $file->content = JFile::read(JLanguage::getLanguagePath(JPATH_ROOT).DS.'en-GB'.DS.'en-GB.com_acymailing.ini');
            }
            if ($loadLatest OR JRequest::getString('task') == 'latest') {
                $doc =& JFactory::getDocument();
//                $doc->addScript(ACYMAILING_UPDATEURL.'languageload&code='.JRequest::getString('code'));
                $showLatest = false;
            } elseif (JRequest::getString('task') == 'save') {
                $showLatest = false;
            }

            $this->assignRef('showLatest',$showLatest);
            $this->assignRef('file',$file);
        }
        
        if ($this->getLayout() == 'share') {
            $file = null;
            $file->name = JRequest::getString('code');
            $this->assignRef('file',$file);
        }
        
        parent::display($tpl);
    }
}
?>