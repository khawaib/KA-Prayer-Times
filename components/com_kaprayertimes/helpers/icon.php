<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');

class JHTMLIcon {
	function pdf($article, $params, $access, $attribs = array()) {
		$url  = 'index.php?view=kaprayertimes';
		$url .= '';
		$url .= '&format=pdf';

		$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no';

		// checks template image directory for image, if non found default are loaded
		if ($params->get('show_icons')) {
			$text = JHTML::_('image.site', 'pdf_button.png', '/images/M_images/', NULL, NULL, JText::_('PDF'));
		} else {
			$text = JText::_('PDF');
		}

		$attribs['title']	= JText::_( 'PDF' );
		$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";
		$attribs['rel']     = 'nofollow';

		return JHTML::_('link', JRoute::_($url), $text, $attribs);
	}
	function email($article, $params, $access, $request_url, $attribs = array()) {
		$uri	=& JURI::getInstance();
		$base	= $uri->toString( array('scheme', 'host', 'port'));
		$link	= $base.JRoute::_( $request_url, false );
		$url	= 'index.php?option=com_mailto&tmpl=component&link='.base64_encode( $link );

		$status = 'width=400,height=350,menubar=yes,resizable=yes';

		if ($params->get('show_icons')) 	{
			$text = JHTML::_('image.site', 'emailButton.png', '/images/M_images/', NULL, NULL, JText::_('Email'));
		} else {
			$text = '&nbsp;'.JText::_('Email');
		}

		$attribs['title']	= JText::_( 'Email' );
		$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";

		$output = JHTML::_('link', JRoute::_($url), $text, $attribs);
		return $output;
	}
	function print_popup($article, $params, $access, $attribs = array()) {
		$url  = 'index.php?view=kaprayertimes';
		$url .= '';
		$url .= '&tmpl=component&print=1&layout=default';

		$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=800,height=550,directories=no,location=no';

		// checks template image directory for image, if non found default are loaded
		if ( $params->get( 'show_icons' ) ) {
            if ($params->get( 'print_icon_img_path' ) && $params->get( 'print_icon_img_name' )) {
                $text = JHTML::_('image.site',  $params->get( 'print_icon_img_name' ), $params->get( 'print_icon_img_path' ), NULL, NULL, JText::_( 'Print' ) );
            } else {
                $text = JHTML::_('image.site',  'printButton.png', '/images/M_images/', NULL, NULL, JText::_( 'Print' ) );
            }
		} else {
			$text = JText::_( 'ICON_SEP' ) .'&nbsp;'. JText::_( 'Print' ) .'&nbsp;'. JText::_( 'ICON_SEP' );
		}

		$attribs['title']	= JText::_( 'Print' );
		$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";
		$attribs['rel']     = 'nofollow';

		return JHTML::_('link', JRoute::_($url), $text, $attribs);
	}
	function print_screen($article, $params, $access, $attribs = array()) {
		// checks template image directory for image, if non found default are loaded
		if ( $params->get( 'show_icons' ) ) {
            if ($params->get( 'print_icon_img_path' ) && $params->get( 'print_icon_img_name' )) {
                $text = JHTML::_('image.site',  $params->get( 'print_icon_img_name' ), $params->get( 'print_icon_img_path' ), NULL, NULL, JText::_( 'Print' ) );
            } else {
                $text = JHTML::_('image.site',  'printButton.png', '/images/M_images/', NULL, NULL, JText::_( 'Print' ) );
            }
		} else {
			$text = JText::_( 'ICON_SEP' ) .'&nbsp;'. JText::_( 'Print' ) .'&nbsp;'. JText::_( 'ICON_SEP' );
		}
		return '<a href="#" onclick="window.print();return false;">'.$text.'</a>';
	}
    
}
?>
