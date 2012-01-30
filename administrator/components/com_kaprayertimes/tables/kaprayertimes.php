<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

// Include library dependencies
jimport('joomla.filter.input');

class TableKaprayertimes extends JTable {
	var $id = null;
	var $date = null;
	var $fajr_begins = null;
	var $fajr_jamaat = null;
	var $sunrise = null;
	var $zuhr_begins = null;
	var $zuhr_jamaat = null;
	var $asr_begins = null;
	var $asr_jamaat = null;
    var $maghrib_begins = null;
	var $maghrib_jamaat = null;
	var $isha_begins = null;
	var $isha_jamaat = null;

	function __construct(& $db) {
		parent::__construct('#__kaprayertimes', 'id', $db);
	}
//	function bind( $array, $ignore = '' ) {
//		if (key_exists( 'params', $array ) && is_array( $array['params'] )) {
//			$registry = new JRegistry();
//			$registry->loadArray($array['params']);
//			$array['params'] = $registry->toString();
//		}
//		return parent::bind($array, $ignore);
//	}
    function check() {
        /** Check date format **/
        if ($this->date != date('d-m-Y',strtotime($this->date))) {
            $this->_error = JText::_('PLEASE_ENTER_DATE_IN_CORRECT_FORMAT.');
        }
        /** Change date format to save into database **/
        $this->date = date('Y-m-d',strtotime($this->date));
        
        /** check for valid name */
        if (trim($this->date) == '') {
            $this->_error = JText::_('DATE_FIELD_IS_EMPTY.');
            return false;
        }
//
//        $query = 'SELECT id, date FROM '.$this->_table_prefix.'prayertimes WHERE date = "'.date('Y-m-d',strtotime($this->date)).'"';
//        $this->_db->setQuery($query);
//
//        $resultData = $this->_db->loadAssoc();
//        $xid = $resultData[id];
//        $xdate = $resultData[date];
//
//        if (($xdate == date($this->date)) && ($xid != $this->id)) {
//            $this->_error = JText::sprintf('WARNNAMETRYAGAIN', JText::_('PRAYERTIMES LINK'));
//            //    $this->_error = JText::_('DATE ENTRY ALREADY EXISTS');
//            return false;
//        }
    return true;
    }
}
?>