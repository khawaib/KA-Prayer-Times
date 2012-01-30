<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

/*
 * Function to convert a system URL to a SEF URL
 */
function KaprayertimesBuildRoute(&$query) {
    $segments = array();
    if(isset( $query['view'] )) {
        $segments[] = $query['view'];
        unset( $query['view'] );
    };
    
    return $segments;
}
/*
 * Function to convert a SEF URL back to a system URL
 */
function KaprayertimesParseRoute($segments) {
    $vars = array();
    switch($segments[0]) {
    case 'kaprayertimes':
        $vars['view'] = 'kaprayertimes';
        break;
    }
    
    return $vars;
}
?>