<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class KaprayertimesModelKaprayertimesday extends JModel {
    var $_id = null;
    var $_data = null;
    var $_table_prefix = null;
    
    function __construct() {
		parent::__construct();
        
		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}
    
    function setId($id) {
		$this->_id		= $id;
		$this->_data	= null;
	}
    
	function &getData() {
		if ($this->_loadData()) {
		} else {
            $this->_initData();
        }
        return $this->_data;
	}
	function _loadData() {
		// Lets load the data if it doesn't already exist
		if (empty($this->_data)) {
			$query = 'SELECT *'
					. ' FROM #__kaprayertimes'
					. ' WHERE id = '.$this->_id
					;
			$this->_db->setQuery($query);
			$this->_data = $this->_db->loadObject();

			return (boolean) $this->_data;
		}
		return true;
	}
	function _initData() {
		// Lets load the data if it doesn't already exist
		if (empty($this->_data)) {
			$data = new stdClass();
            $data->id               = null;
            $data->fajr_begins      = null;
            $data->fajr_jamaat      = null;
            $data->sunrise          = null;
            $data->zuhr_begins      = null;
            $data->zuhr_jamaat      = null;
            $data->asr_begins       = null;
            $data->asr_jamaat       = null;
            $data->maghrib_jamaat   = null;
            $data->isha_begins      = null;
            $data->isha_jamaat      = null;
			$data->published		= 1;
                    
			$this->_data			= $data;
			return (boolean) $this->_data;
		}
		return true;
	}
//	function checkin() {
//		if ($this->_id) {
//			$data = & JTable::getInstance('kaprayertimes', 'Table');
//			return $data->checkin($this->_id);
//		}
//		return false;
//	}
//	function checkout($uid = null) {
//		if ($this->_id) {
//			if (is_null($uid)) {
//				$user	=& JFactory::getUser();
//				$uid	= $user->get('id');
//			}
//			// Lets get to it and checkout the thing...
//			$data = & JTable::getInstance('kaprayertimes', 'Table');
//            
//			if(!$data->checkout($uid, $this->_id)) {
//				$this->setError($this->_db->getErrorMsg());
//				return false;
//			}
//
//			return true;
//		}
//		return false;
//	}
//	function isCheckedOut( $uid=0 ) {
//		if ($this->_loadData())
//		{
//			if ($uid) {
//				return ($this->_data->checked_out && $this->_data->checked_out != $uid);
//			} else {
//				return $this->_data->checked_out;
//			}
//		} elseif ($this->_id < 1) {
//			return false;
//		} else {
//			JError::raiseWarning( 0, 'UNABLE LOAD DATA');
//			return false;
//		}
//	}
	function store($data) {
		$prayertimes  =& $this->getTable('kaprayertimes', 'Table');
		// bind it to the table
		if (!$prayertimes->bind($data)) {
			$this->setError(500, $this->_db->getErrorMsg() );
			return false;
		}
        $prayertimes->id = (int) $data['cid'][0];
        $prayertimes->date = date('Y-m-d',strtotime($data['date']));
		// Make sure the data is valid
		if (!$prayertimes->check()) {
			$this->setError($prayertimes->getError());
			return false;
		}
		// Store it in the db
		if (!$prayertimes->store()) {
			$this->setError(500, $this->_db->getErrorMsg() );
			return false;
		}
		$this->_data =& $prayertimes;
		return true;
	}
}
?>
