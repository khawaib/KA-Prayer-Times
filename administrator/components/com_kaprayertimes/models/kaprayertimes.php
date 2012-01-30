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

class KaprayertimesModelKaprayertimes extends JModel {
	var $_data = null;
	var $_total = null;
	var $_pagination = null;
	var $_table_prefix = null;
    
    function __construct() {
		parent::__construct();
    }
	function getData() {
		//Lets load the content if it doesn't already exist
		if (empty($this->_data)) {
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
		}
		return $this->_data;
	}
	function getTotal() {
		//Lets load the content if it doesn't already exist
		if (empty($this->_total)) {
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}

		return $this->_total;
	}
	function getPagination() {
		// Lets load the content if it doesn't already exist
		if (empty($this->_pagination)) {
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}

		return $this->_pagination;
	}
  	
	function _buildQuery() {
		$orderby= $this->_buildContentOrderBy();
		$where  = $this->_buildContentWhere();
		$query  = 'SELECT * FROM #__kaprayertimes '
        .$where.$orderby;

		return $query;
	}
	
	function _buildContentOrderBy() {
        $app = JFactory::getApplication();
        $option = JRequest::getVar('option');

		//give me ordering from request
		$filter_order     = $app->getUserStateFromRequest( $option.'filter_order',      'filter_order', 	  'h.ordering' );
		$filter_order_Dir = $app->getUserStateFromRequest( $option.'filter_order_Dir',  'filter_order_Dir', '' );		

    $orderby 	= ' ORDER BY date';			
		return $orderby;
	}
    function _buildContentWhere() {
        $app = JFactory::getApplication();
        $option = JRequest::getVar('option');
        $filter_months		= $app->getUserStateFromRequest( $option.'filter_months', 'filter_months', 0,	'int' );
        $filter_state = $app->getUserStateFromRequest( $option.'filter_state', 'filter_state', '', 'word' );

        if (!$filter_months) {
            $filter_months = date("mY");
        }

        $where ='WHERE date_format(date, \'%m%Y\') = '.$filter_months.'';
        return $where;
    }
}
?>