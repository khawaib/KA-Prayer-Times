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

class TableUploaddata extends JTable {
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

	function check() {
		return true;
	}
}
?>