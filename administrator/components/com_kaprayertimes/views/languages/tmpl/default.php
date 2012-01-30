<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="config_languages">
<br  style="font-size:1px;" />
	<fieldset>
		<legend><?php echo JText::_('LANGUAGES') ?></legend>
		<table class="adminlist" cellpadding="1">
			<thead>
				<tr>
					<th class="title titlenum"><?php echo JText::_( 'NUM' );?></th>
					<th class="title titletoggle"><?php echo JText::_('EDIT'); ?></th>
					<th class="title"><?php echo JText::_('NAME'); ?></th>
					<th class="title titletoggle"><?php echo JText::_('ID'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$k = 0;
					for($i = 0, $a = count($this->languages); $i<$a; $i++) {
						$row =& $this->languages[$i];
				?>
					<tr class="<?php echo "row$k"; ?>">
						<td align="center"><?php echo $i+1; ?></td>
						<td  align="center"><?php echo $row->edit; ?></td>
						<td align="center"><?php echo $row->name; ?></td>
						<td align="center"><?php echo $row->language; ?></td>
					</tr>
				<?php
						$k = 1-$k;
					}
				?>
			</tbody>
		</table>
	</fieldset>
</div>