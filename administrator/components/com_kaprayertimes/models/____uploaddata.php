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
jimport('joomla.application.component.model');

class KaprayertimesModelUploaddata extends JModel {
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
        if (empty( $this->_data )) {
            $query = $this->_buildQuery();
            $this->_db->setQuery( $query );
            $this->_data = $this->_db->loadObject();			
        }
        if (!$this->_data) {
            $this->_data = new stdClass();
            $this->_data->id = 0;
            $this->_data->quran_id = 0;
            $this->_data->published = 1;
            $this->_data->filename = null;
            $this->_data->size = null;
            $this->_data->ordering = null;
            $this->_data->createdate = null;
            $this->_data->language = null;
        }
        return $this->_data;
    }
    function _buildQuery() {
        $query = ' SELECT *'
            . ' FROM #__kaprayertimes'
            . ' WHERE id = '.$this->_id;
        return $query;
    }

	function store() {
		$row =& $this->getTable();
		$data = JRequest::get( 'post' );

		$file = JRequest::getVar('file', null, 'files', 'array' ); 
		$filename = $file['name'];

		$date =& JFactory::getDate();
		$data['createdate'] = $date->toFormat();
	  	$data['filename'] = $filename;
	  	$data['language'] = ucwords($this->get_string_between($filename, '#__quran_', '.sql'));
		if ($this->upload()) {
      	// Bind the form fields to the  table
  		if (!$row->bind($data)) {
  			$this->setError($this->_db->getErrorMsg());
  			return false;
  		}
  		// Make sure the  record is valid
  		if (!$row->check()) {
  			$this->setError($this->_db->getErrorMsg());
  			return false;
  		}
  		// Store the table to the database
  		if (!$row->store()) {
  			$this->setError($this->_db->getErrorMsg());
  			return false;
  		}
  		return true;
		}
	}
	
	function get_string_between($string, $start, $end) {
	    $string = " ".$string;
	    $ini = strpos($string,$start);
	    if ($ini == 0) return "";
	    $ini += strlen($start);   
	    $len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
	}
	function upload() {
		global $mainframe, $option;
		set_time_limit(0);
		$database =& JFactory::getDBO();
		$file = JRequest::getVar('file', null, 'files', 'array' );
		$filename = strtolower($file['name']);
		$filepath = JPATH_SITE.DS.'administrator'.DS.'components'.DS.$option.DS.'uploads'.DS;
	  	if (!$filename) {
	  		$mainframe->redirect("index.php?option=$option", "Please select a file to upload.");
	  		return;
	  	}
	//    if (!eregi("(\.(sql|gz))$",$filename)) {
		if (!eregi("(\.(csv))$",$filename)) {
	  		$mainframe->redirect("index.php?option=$option", "File of this type is not allowed.");
	  		return;
	  	}
	  	if(isset($file) && is_array($file) && $file['name'] != '') {
	  	   $pathandfile = JPATH_SITE.DS.'administrator'.DS.'components'.DS.$option.DS.'uploads'.DS.strtolower($file['name']); 
	  	   jimport('joomla.filesystem.file');
	//  	   if (JFile::exists($pathandfile)) {
	//  		  $mainframe->redirect("index.php?option=$option", "File already exists!");
	//  		  return;
	//  	   }
			if (!JFile::upload($file['tmp_name'], $pathandfile)) {
				$mainframe->redirect("index.php?option=$option", "Upload failed, My be you have restrictions on upload file size.");
				return;
			}
			
			if (!$this->parseCSVFile($filepath, $filename)) {
				$mainframe->redirect("index.php?option=$option", "Could not Import CSV File.");
				return;
			}
	  	}
	    return true;
	}	

	function parseCSVFile($filepath, $filename) {
	 	global $mainframe, $option;
	 	$delimiter=trim(JRequest::getVar('delimiter',','));
 	
	  	if (eregi("(\.(csv))$",$filename)) {
	  		// Initialize variables
	  		$queries = array();
	  		$database = & $this->_db;
	  		$databaseDriver = strtolower($database->get('name'));
	  		if ($databaseDriver == 'mysqli') {
	  			$databaseDriver = 'mysql';
	  		}
	  		$databaseCharset = ($database->hasUTF()) ? 'utf8' : '';
	  			$fCharset = 'utf8';
	  			$fDriver = 'mysql';
	  			if ( $fCharset == $databaseCharset && $fDriver == $databaseDriver) {
	  		    	// Get the name of the sql file to process
	  				$csvfile = $filepath.$filename;
	  				// Check that sql files exists before reading. Otherwise raise error for rollback
	  				if ( !file_exists( $csvfile ) ) {
	            		$mainframe->redirect("index.php?option=$option", "File does not exit. Path: $csvfile");
	      		  		return;
	  				}
/*	  				$buffer = file_get_contents($csvfile);
	  				// Graceful exit and rollback if read not successful
	  				if ( $buffer === false ) {
	            		$mainframe->redirect("index.php?option=$option", "Could not open and read CSV file. Path: $csvfile");
	      		  		return false;
	  				}*/
	  				
//	  				$resFileHandler = fopen ( $csvfile, 'r' );

$arrData = array();
$resFileHandler = fopen ( $csvfile, 'r' );
$count = 0;
while ( $arrData = fgetcsv ( $resFileHandler, 1000, ",","\"" )){
	if ($count > 1) {
		$query = sprintf('INSERT INTO `#__kaprayertimes` SET 
		`date`				= "%s",
		`fajr_begins`		= "%s",
		`fajr_jamaat`		= "%s",
		`sunrise`			= "%s",
		`zuhr_begins`		= "%s",
		`zuhr_jamaat`		= "%s",
		`asr_begins`		= "%s",
		`asr_jamaat`		= "%s",
		`maghrib_jamaat`	= "%s",
		`isha_begins`		= "%s",
		`isha_jamaat`		= "%s"
		',
		mysql_real_escape_string($arrData[1]),
		mysql_real_escape_string($arrData[2]),
		mysql_real_escape_string($arrData[3]),
		mysql_real_escape_string($arrData[4]),
		mysql_real_escape_string($arrData[5]),
		mysql_real_escape_string($arrData[6]),
		mysql_real_escape_string($arrData[7]),
		mysql_real_escape_string($arrData[8]),
		mysql_real_escape_string($arrData[9]),
		mysql_real_escape_string($arrData[10]),
		mysql_real_escape_string($arrData[11])
		);
  		
		$query = trim($query);
/*
 *  TODO: Improve function to check if prayer times already exisit for a date and overwrite them or skip instead of creating new entry.
 */
  		if ($query != '') {
  			$database->setQuery($query);
  			if (!$database->query()) {
  				JError::raiseWarning(1, 'JInstaller::install: '.JText::_('SQL Error')." ".$database->stderr(true));
  				return false;
  			}
  		}
	}
	$count++;
} 
	  				
/*	  				// Create an array of queries from the sql file
	  				jimport('joomla.installer.helper');
	  				$queries = JInstallerHelper::splitSql($buffer);
	  				if (count($queries) == 0) {
	            		$mainframe->redirect("index.php?option=$option", "No queries to process. Path: $csvfile");
	      		  		return;
	  				}
	  				// Process each query in the $queries array (split out of sql file).
	  				foreach ($queries as $query) {
	  					$query = trim($query);
	  					if ($query != '' && $query{0} != '#') {
	  						$database->setQuery($query);
	  						if (!$database->query()) {
	  							JError::raiseWarning(1, 'JInstaller::install: '.JText::_('SQL Error')." ".$database->stderr(true));
	  							return false;
	  						}
	  					}
	  				}*/
	  			}
	      	return true;
	  		//	return (int) count($queries);
	  	}
  	
  	
	  	if (eregi("(\.(gz))$",$filename)) {
	      $csv_insert_table = '';     // Destination table for CSV files
	      $ajax             = false;   // AJAX mode: import will be done without refreshing the website
	      $linespersession  = 7000;   // Lines to be executed per one import session
	      $delaypersession  = 0;      // You can specify a sleep time in milliseconds after each session
	                                  // Works only if JavaScript is activated. Use to reduce server overrun
//$file = false;
	      $error = false;
	      $gzipmode = true;
	      $file = $filepath.$filename;
	      $curfilename = $file;
	
	      if ((!$gzipmode && !$file=@fopen($curfilename,"rt")) || ($gzipmode && !$file=@gzopen($curfilename,"rt"))) {
	        $mainframe->redirect("index.php?option=$option", "Can't open ".$filename." for import.");
	  		  return;
	      } else if ((!$gzipmode && @fseek($file, 0, SEEK_END)==0) || ($gzipmode && @gzseek($file, 0)==0)) {
	        if (!$gzipmode) $filesize = ftell($file);
	        else $filesize = gztell($filesize);
	      }
	      $_REQUEST["start"] = 1;
	      $_REQUEST["foffset"] = 0; 
	      $_REQUEST["totalqueries"] = 0;
	      $query = "";
	      $queries = 0;
	      $totalqueries = $_REQUEST["totalqueries"];
	      $linenumber = $_REQUEST["start"];
	      $querylines = 0;
	      $inparents = false;
	  	}
  	}
}
?>