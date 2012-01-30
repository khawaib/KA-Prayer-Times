<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2011 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

class kaptHelper {
    function getVersion() {
        $folder = JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_kaprayertimes';
        if (JFolder::exists($folder)) {
            $xmlFilesInDir = JFolder::files($folder, '.xml$');
        } else {
            $folder = JPATH_SITE . DS . 'components' . DS . 'com_kaprayertimes';
            if (JFolder::exists($folder)) {
                $xmlFilesInDir = JFolder::files($folder, '.xml$');
            } else {
                $xmlFilesInDir = null;
            }
        }
        $xml_items = '';
        if (count($xmlFilesInDir)) {
            foreach ($xmlFilesInDir as $xmlfile) {
                if ($data = JApplicationHelper::parseXMLInstallFile($folder . DS . $xmlfile)) {
                    foreach ($data as $key => $value) {
                        $xml_items[$key] = $value;
                    }
                }
            }
        } if (isset($xml_items['version']) && $xml_items['version'] != '') {
            return $xml_items['version'];
        } else {
            return '';
        }
    }
    function getReleaseDate() {
        $folder = JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_kaprayertimes';
        if (JFolder::exists($folder)) {
            $xmlFilesInDir = JFolder::files($folder, '.xml$');
        } else {
            $folder = JPATH_SITE . DS . 'components' . DS . 'com_kaprayertimes';
            if (JFolder::exists($folder)) {
                $xmlFilesInDir = JFolder::files($folder, '.xml$');
            } else {
                $xmlFilesInDir = null;
            }
        }
        $xml_items = '';
        if (count($xmlFilesInDir)) {
            foreach ($xmlFilesInDir as $xmlfile) {
                if ($data = JApplicationHelper::parseXMLInstallFile($folder . DS . $xmlfile)) {
                    foreach ($data as $key => $value) {
                        $xml_items[$key] = $value;
                    }
                }
            }
        } if (isset($xml_items['creationDate']) && $xml_items['creationDate'] != '') {
            return $xml_items['creationDate'];
        } else {
            return '';
        }
    }
}
?>