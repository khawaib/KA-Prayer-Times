<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

class modKaPrayerTimesHelper {
	function getPrayerTimes($params) {
        $db = &JFactory::getDBO();
        $app = JFactory::getApplication();
//        $today = date( 'D jS F', time() + $app->getCfg('offset') * 60 * 60 );
        $now = date( 'Ymd', time() + $app->getCfg('offset') * 60 * 60 );

        $query = "SELECT date,fajr_begins,fajr_jamaat,sunrise,zuhr_begins,zuhr_jamaat,asr_begins,asr_jamaat,maghrib_begins,maghrib_jamaat,isha_begins,isha_jamaat FROM #__kaprayertimes WHERE date = $now";
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        if (!count($rows)) return;

        $items = array();
        foreach ($rows as $row) {
            $item = '';
            $item->date = $row->date;
            $item->fajr_begins = $row->fajr_begins;
            $item->fajr_jamaat = $row->fajr_jamaat;
            $item->sunrise = $row->sunrise;
            $item->zuhr_begins = $row->zuhr_begins;
            $item->zuhr_jamaat = $row->zuhr_jamaat;
            $item->asr_begins = $row->asr_begins;
            $item->asr_jamaat = $row->asr_jamaat;
            $item->maghrib_begins = $row->maghrib_begins;
            $item->maghrib_jamaat = $row->maghrib_jamaat;
            $item->isha_begins = $row->isha_begins;
            $item->isha_jamaat = $row->isha_jamaat;

            $items[] = $item;
        }
        return $items;
    }

	function getFridayPrayer($params) {
		$firdayprayer_text = $params->get('firdayprayer_text', 'Friday Prayer Time:');
		$firdayprayer_time = $params->get('firdayprayer_time', '1.00pm');
		return $firdayprayer_link = $firdayprayer_text." ". $firdayprayer_time;
	}
	function getFridayPrayer2($params) {
		$firdayprayer_text2 = $params->get('firdayprayer_text2', 'Friday Prayer Time:');
		$firdayprayer_time2 = $params->get('firdayprayer_time2', '1.00pm');
		return $firdayprayer_link2 = "<br />".$firdayprayer_text2." ". $firdayprayer_time2;
	}
	
	function getHyperLinks($params) {
		$hyperlink_text = $params->get('hyperlink_text', 'View full timetable');
		$hyperlink_link = $params->get('hyperlink_link', '#');
		return $link = '<br /><a href="'.$hyperlink_link.'">'.$hyperlink_text.'</a>';
	}
	function getHyperLinks2($params) {
		$hyperlink_text2 = $params->get('hyperlink_text2', 'View full timetable');
		$hyperlink_link2 = $params->get('hyperlink_link2', '#');
		return $link2 = '<br /><a href="'.$hyperlink_link2.'">'.$hyperlink_text2.'</a>';
	}
}
