<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="index.php?option=com_kaprayertimes&amp;tmpl=component" method="post" name="adminForm" autocomplete="off">
	<fieldset>
		<div class="header icon-48-share" style="float: left;"><?php echo JText::_('SHARE').' : '.$this->file->name; ?></div>
		<div class="toolbar" id="toolbar" style="float: right;">
			<table><tr>
			<td><a onclick="javascript:submitbutton('send'); return false;" href="#" ><span class="icon-32-share" title="<?php echo JText::_('SHARE',true); ?>"></span><?php echo JText::_('SHARE'); ?></a></td>
			</tr></table>
		</div>
	</fieldset>
	<fieldset class="adminform">
		By sharing this file, you allow KA Team to use it in KA project.
        You can add a personnal message in the following area which will be included in the e-mail sent to the team.<br/>
		<textarea cols="100" rows="8" name="mailbody">Hi, Here is a new version of the language file that I would like to share with you...</textarea>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="code" value="<?php echo $this->file->name; ?>" />
	<input type="hidden" name="option" value="com_kaprayertimes" />
    <input type="hidden" name="controller" value="languages" />
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>