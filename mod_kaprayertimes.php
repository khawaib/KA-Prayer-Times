<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once(dirname(__FILE__).DS.'helper.php');
$items = modKaPrayerTimesHelper::getPrayerTimes($params);

$showfirdayprayer = $params->get('showfirdayprayer');
if ($showfirdayprayer) $firdayprayer = modKaPrayerTimesHelper::getFridayPrayer($params);

$showfirdayprayer2 = $params->get('showfirdayprayer2');
if ($showfirdayprayer2) $firdayprayer2 = modKaPrayerTimesHelper::getFridayPrayer2($params);

$hyperlink = $params->get('hyperlink');
if ($hyperlink) $link = modKaPrayerTimesHelper::getHyperLinks($params);

$hyperlink2 = $params->get('hyperlink2');
if ($hyperlink2) $link2 = modKaPrayerTimesHelper::getHyperLinks2($params);

$layout = JFilterInput::clean($params->get('layout', 'list'), 'word');
$path = JModuleHelper::getLayoutPath('mod_kaprayertimes', $layout);
if (file_exists($path)) require($path);