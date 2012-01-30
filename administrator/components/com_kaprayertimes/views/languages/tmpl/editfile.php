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
		<div class="header" style="float: left;"><?php echo JText::_('FILE').' : '.$this->file->name; ?></div>
		<div class="toolbar" id="toolbar" style="float: right;">
			<table>
                <tr>
                    <td><a onclick="javascript:submitbutton('save'); return false;" href="#" ><span class="icon-32-save" title="<?php echo JText::_('SAVE',true); ?>"></span><?php echo JText::_('SAVE'); ?></a></td>
                    <td><a onclick="javascript:submitbutton('share'); return false;" href="#" ><span class="icon-32-share" title="<?php echo JText::_('SHARE',true); ?>"></span><?php echo JText::_('SHARE'); ?></a></td>
                </tr>
            </table>
		</div>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'FILE').' : '.$this->file->name; ?>
<!--            <?php //if(!empty($this->showLatest)){ ?> <button type="button" onclick="javascript:submitbutton('latest')"> <?php //echo JText::_('LOAD_LATEST_LANGUAGE'); ?> </button> <?php //} ?> -->
		</legend>
		<textarea style="width:100%;" rows="20" name="content" id="translation" ><?php echo @$this->file->content;?></textarea>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="code" value="<?php echo $this->file->name; ?>" />
	<input type="hidden" name="option" value="com_kaprayertimes" />
    <input type="hidden" name="controller" value="languages" />
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>