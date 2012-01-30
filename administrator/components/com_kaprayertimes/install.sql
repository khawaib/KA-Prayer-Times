CREATE TABLE IF NOT EXISTS `#__kaprayertimes` (
`id` int(10) NOT NULL auto_increment,
`date` date NOT NULL default '0000-00-00',
`fajr_begins` varchar(5) default NULL,
`fajr_jamaat` varchar(5) default NULL,
`sunrise` varchar(5) default NULL,
`zuhr_begins` varchar(5) default NULL,
`zuhr_jamaat` varchar(5) default NULL,
`asr_begins` varchar(5) default NULL,
`asr_jamaat` varchar(5) default NULL,
`maghrib_begins` varchar(5) default NULL,
`maghrib_jamaat` varchar(5) default NULL,
`isha_begins` varchar(5) default NULL,
`isha_jamaat` varchar(5) default NULL,
`published` tinyint(1) default NULL,
`checked_out` int(11) default NULL,
PRIMARY KEY  (`id`),
KEY `Date` (`date`)
) DEFAULT CHARSET=utf8;