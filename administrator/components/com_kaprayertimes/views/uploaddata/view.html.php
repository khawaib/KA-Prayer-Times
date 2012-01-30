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
class KaprayertimesViewUploaddata extends JView {
	function display($tpl = null) {	
		$option = JRequest::getVar('option');
        $document =& JFactory::getDocument();
        $app = JFactory::getApplication();
        $params =& JComponentHelper::getParams($option);
		$manageuploads =& $this->get('Data'); 

		JToolBarHelper::title( JText::_( 'KAPRAYERTIMES' ) . ' <small>[ Upload Data ]</small>', 'kaprayertimes' );
		JToolBarHelper::save();
        JToolBarHelper::cancel();
        require_once JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'dashboardlinks.php';
        
        $importData = array();
		$importData['file'] = JText::_('CSV FILE');
        if(!version_compare(JVERSION,'1.7.0','ge') && !version_compare(JVERSION,'1.6.0','ge')) {
            $importData['file_advanced'] = JText::_('CSV FILE ADVANCED');
            $importData['textarea'] = JText::_('IMPORT_TEXTAREA');
        }

		
//		$importData['database'] = JText::_('DATABASE');
		$importvalues = array();
		foreach($importData as $div => $name){
			$importvalues[] = JHTML::_('select.option', $div, $name);
		}

		$js = 'var currentoption = \'file\'; function updateImport(newoption){document.getElementById(currentoption).style.display = "none";document.getElementById(newoption).style.display = \'block\';currentoption = newoption;}';
		$document->addScriptDeclaration( $js );

		$lists = array();
        $options[] = JHTML::_( 'select.option', 1, 'Yes' );
        $options[] = JHTML::_( 'select.option', 0, 'No' );
        $lists['overwriteexisting'] = JHTML::_('select.genericlist‎', $options, 'overwriteexisting', 'class="inputbox" ', 'value', 'text', '1', 'overwriteexisting');

        $this->assignRef('lists',           $lists);
        $this->assignRef('importvalues',    $importvalues);
        $this->assignRef('importdata',      $importData);
		$this->assignRef('manageuploads',   $manageuploads);
        $this->assignRef('selectLists',     $this->selectLists());
	    
	    parent::display($tpl);
	}
	function selectLists() {
        $colSelectLists = array();

        for ($i = 1; $i <= 12; $i++) {
            $default = 0;
            $columnNames = array(
                'date' => 'date',
                'fajr_begins' => 'fajr_begins',
                'fajr_jamaat' => 'fajr_jamaat',
                'sunrise' => 'sunrise',
                'zuhr_begins' => 'zuhr_begins',
                'zuhr_jamaat' => 'zuhr_jamaat',
                'asr_begins' => 'asr_begins',
                'asr_jamaat' => 'asr_jamaat',
                'maghrib_begins' => 'maghrib_begins',
                'maghrib_jamaat' => 'maghrib_jamaat',
                'isha_begins' => 'isha_begins',
                'isha_jamaat' => 'isha_jamaat',
                'skip' => 'skip');
            $options = array();
            $k = 1;
            foreach ( $columnNames as $key => $value ) :
                if ($i == $k) {$default = $key;}
                $options[] = JHTML::_('select.option', $key, $value);
                $k++;
            endforeach;
            $dropdown = JHTML::_('select.genericlist', $options, 'column_'.$i, 'class="inputbox"', 'value', 'text', $default);

            $colSelectLists[] = $dropdown;
        }
        return $colSelectLists;
    }
}
?>