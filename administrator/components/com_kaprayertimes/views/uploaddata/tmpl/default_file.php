<?php defined('_JEXEC') or die('Restricted access'); ?>
<table class="admintable">
    <tr>
        <td class="key"><?php echo JText::_( 'UPLOAD_FILE' );?></td>
        <td >
            <input type="file" id="file" name="file" size="75"><br/>
            <?php echo JText::_('MAXIMUM_FILE_SIZE_ALLOWED').' '.ini_get('upload_max_filesize');?>
        </td>
        <td></td>
    </tr>
	<tr>
		<td class="key" >
			<?php //echo JText::_('OVERWRITE_EXISTING'); ?>
		</td>
		<td>
			<?php //echo $this->lists['overwriteexisting']; ?>
		</td>
	</tr>
	<tr>
		<td class="key" >
			CSV File Format
		</td>
		<td>
			Format for CSV file should be as follows:<br/>
            Islamic Date, date, fajr_begins, fajr_jamaat, sunrise, zuhr_begins, zuhr_jamaat, asr_begins, asr_jamaat, maghrib_begins, maghrib_jamaat, isha_begins, isha_jamaat<br/>
            2, 21/01/2010, 06:26, 07:00, 08:06, 12:07, 12:45, 02:09, 02:30, 04:07, 04:07, 05:37, 08:00<br/><br/>
            Islamic Date column is optional and can be left blank but must not be deleted.<br/><br/>
            You can use example CSV file included in zip file and edit and upload it.
		</td>
	</tr>
</table>