<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
//import html tooltips
JHTML::_('behavior.tooltip');
?>
<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		var daterejex = /\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/;
        var timeregex=/^(2[0-3])|[01][0-9]:[0-5][0-9]$/;
		// do field validation
		if ((form.date.value == "") || (!daterejex.test(form.date.value))) {
			alert( "<?php echo JText::_( 'Prayer Times must have a valid date', true ); ?>" );
		} else if ((form.fajr_begins.value == "") || (!timeregex.test(form.fajr_begins.value))) {
			alert( "<?php echo JText::_( 'You must enter a valid Fajr Begins time.', true ); ?>" );
		} else if ((form.fajr_jamaat.value == "") || (!timeregex.test(form.fajr_jamaat.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Fajr Jamaat time.', true ); ?>" );
		} else if ((form.sunrise.value == "") || (!timeregex.test(form.sunrise.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Sunrise time.', true ); ?>" );
		} else if ((form.zuhr_begins.value == "") || (!timeregex.test(form.zuhr_begins.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Zuhr Begins time.', true ); ?>" );
		} else if ((form.zuhr_jamaat.value == "") || (!timeregex.test(form.zuhr_jamaat.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Zuhr Jamaat time.', true ); ?>" );
		} else if ((form.asr_jamaat.value == "") || (!timeregex.test(form.asr_jamaat.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Asr Jamaat time.', true ); ?>" );
		} else if ((form.maghrib_begins.value == "") || (!timeregex.test(form.maghrib_begins.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Maghrib Jamaat time.', true ); ?>" );
		} else if ((form.maghrib_jamaat.value == "") || (!timeregex.test(form.maghrib_jamaat.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Maghrib Jamaat time.', true ); ?>" );
		} else if ((form.isha_begins.value == "") || (!timeregex.test(form.isha_begins.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Isha Begins time.', true ); ?>" );
		} else if ((form.isha_jamaat.value == "") || (!timeregex.test(form.isha_jamaat.value))){
			alert( "<?php echo JText::_( 'You must enter a valid Isha Jamaat time.', true ); ?>" );
		} else {
			submitform( pressbutton );
		}
	}
</script>
<style type="text/css">
	table.paramlist td.paramlist_key {
		width: 92px;
		text-align: left;
		height: 30px;
	}
</style>

<form action="<?php echo JRoute::_($this->request_url) ?>" method="post" name="adminForm" id="adminForm">
<div class="col50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'PRAYER TIMES' ); ?> [ <?php echo date('d-m-Y',strtotime($this->detail->date)); ?> ]</legend>
        <table class="adminlist">
            <thead>
                <tr>
                    <th class="id"><span title="<?php echo JText::_( 'ID' ); ?>"><?php echo JText::_( 'ID' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'DATE' ); ?>"><?php echo JText::_( 'DATE' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'FAJAR_BEGINS' ); ?>"><?php echo JText::_( 'FAJAR_BEGINS' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'FAJAR_JAMAAT' ); ?>"><?php echo JText::_( 'FAJAR_JAMAAT' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'SUNRISE' ); ?>"><?php echo JText::_( 'SUNRISE' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'DHUHR_BEGINS' ); ?>"><?php echo JText::_( 'DHUHR_BEGINS' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'DHUHR_JAMAAT' ); ?>"><?php echo JText::_( 'DHUHR_JAMAAT' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'ASR_BEGINS' ); ?>"><?php echo JText::_( 'ASR_BEGINS' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'ASR_JAMAAT' ); ?>"><?php echo JText::_( 'ASR_JAMAAT' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'MAGHRIB_BEGINS' ); ?>"><?php echo JText::_( 'MAGHRIB_BEGINS' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'MAGHRIB_JAMAAT' ); ?>"><?php echo JText::_( 'MAGHRIB_JAMAAT' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'ISHA_BEGINS' ); ?>"><?php echo JText::_( 'ISHA_BEGINS' ); ?></span></th>
                    <th class="title"><span title="<?php echo JText::_( 'ISHA_JAMAAT' ); ?>"><?php echo JText::_( 'ISHA_JAMAAT' ); ?></span></th>                    
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td align="center"><?php echo $this->detail->id; ?></td>
                    <td><?php echo JHTML::_('calendar', date('d-m-Y',strtotime($this->detail->date)), "date", "date", $format = '%d-%m-%Y'); ?></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="fajr_jamaat" id="fajr_jamaat" value="<?php echo $this->detail->fajr_jamaat; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="sunrise" id="sunrise" value="<?php echo $this->detail->sunrise; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="zuhr_begins" id="zuhr_begins" value="<?php echo $this->detail->zuhr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="zuhr_jamaat" id="zuhr_jamaat" value="<?php echo $this->detail->zuhr_jamaat; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="asr_begins" id="asr_begins" value="<?php echo $this->detail->asr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="asr_jamaat" id="asr_jamaat" value="<?php echo $this->detail->asr_jamaat; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="maghrib_begins" id="maghrib_begins" value="<?php echo $this->detail->maghrib_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="maghrib_jamaat" id="maghrib_jamaat" value="<?php echo $this->detail->maghrib_jamaat; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="isha_begins" id="isha_begins" value="<?php echo $this->detail->isha_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" type="text" name="isha_jamaat" id="isha_jamaat" value="<?php echo $this->detail->isha_jamaat; ?>"/></td>
                </tr>
            </tbody>
            <tfoot>
                <td align="center"  colspan="20"><p class="copyright"><?php echo COM_KAPRAYERTIMES_VERSION_LINK; ?></p></td>
            </tfoot>
        </table>
	</fieldset>
</div>
<div class="col50">
</div>
<div class="clr"></div>
<input type="hidden" name="cid[]" value="<?php echo $this->detail->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="kaprayertimes" />
</form>