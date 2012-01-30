<?php
$link = JURI::base().'?option='.$option;
JSubMenuHelper::addEntry(JText::_('KAPRAYERTIMES_DASHBOARD'), $link);
$link = JURI::base().'?option='.$option.'&view=kaprayertimes';
JSubMenuHelper::addEntry(JText::_('KAPRAYERTIMES_PRAYERTIMES'), $link);
$link = JURI::base().'?option='.$option.'&view=uploaddata';
JSubMenuHelper::addEntry(JText::_('KAPRAYERTIMES_UPLOADDATA'), $link);
$link = JURI::base().'?option='.$option.'&view=editcss';
JSubMenuHelper::addEntry(JText::_('KAPRAYERTIMES_EDITCSS'), $link);
$link = JURI::base().'?option='.$option.'&view=languages';
JSubMenuHelper::addEntry(JText::_('KAPRAYERTIMES_LANGUAGES'), $link);
?>