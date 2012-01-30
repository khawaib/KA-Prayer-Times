<?php
/**
 * @package     KA Prayer Times
 * @author      Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright   Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
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
        <legend><?php echo JText::_( 'PRAYER TIMES' ); ?></legend>
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
                    <td>
                        <?php echo JHTML::_('calendar', date('d-m-Y',strtotime($this->detail->date)), "date", "date", $format = '%d-%m-%Y'); ?>
                        <span class="error hasTip" title="<?php echo JText::_( 'WARNING' ); ?>::<?php echo JText::_( 'DATE_FORMAT_WARN' ); ?>">
                            <img src="../includes/js/ThemeOffice/warning.png" border="0" alt="" />
                        </span>
                    </td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajar_jamaat" id="fajar_jamaat" value="<?php echo $this->detail->fajr_jamaat; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="sunrise" id="sunrise" value="<?php echo $this->detail->sunrise; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="zuhr_begins" id="zuhr_begins" value="<?php echo $this->detail->zuhr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="zuhr_jamaat" id="zuhr_jamaat" value="<?php echo $this->detail->zuhr_jamaat; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                    <td align="center"><input class="kaptinputbox inputbox" name="fajr_begins" id="fajr_begins" value="<?php echo $this->detail->fajr_begins; ?>"/></td>
                </tr>
            </tbody>
        
        
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="date">
                    <?php echo JText::_( 'DATE' ); ?>:
                </label>
            </td>
            <td>
                <?php echo JHTML::_('calendar', date('d-m-Y',strtotime($this->detail->date)), "date", "date", $format = '%d-%m-%Y'); ?>
                <span class="error hasTip" title="<?php echo JText::_( 'WARNING' ); ?>::<?php echo JText::_( 'DATE_FORMAT_WARN' ); ?>">
                    <img src="../includes/js/ThemeOffice/warning.png" border="0" alt="" />
                </span>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="fajar_begins">
                    <?php echo JText::_( 'FAJAR_BEGINS' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="fajr_begins" id="fajr_begins" size="32" maxlength="250" value="<?php echo $this->detail->fajr_begins; ?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="fajar_jamaat">
                    <?php echo JText::_( 'FAJAR_JAMAAT' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="fajr_jamaat" id="fajr_jamaat" size="32" maxlength="250" value="<?php echo $this->detail->fajr_jamaat;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="sunrise">
                    <?php echo JText::_( 'SUNRISE' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="sunrise" id="sunrise" size="32" maxlength="250" value="<?php echo $this->detail->sunrise;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="dhuhr_begins">
                    <?php echo JText::_( 'DHUHR_BEGINS' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="zuhr_begins" id="zuhr_begins" size="32" maxlength="250" value="<?php echo $this->detail->zuhr_begins;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="dhuhr_jamaat">
                    <?php echo JText::_( 'DHUHR_JAMAAT' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="zuhr_jamaat" id="zuhr_jamaat" size="32" maxlength="250" value="<?php echo $this->detail->zuhr_jamaat;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="asr_begins">
                    <?php echo JText::_( 'ASR_BEGINS' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="asr_begins" id="asr_begins" size="32" maxlength="250" value="<?php echo $this->detail->asr_begins;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="asr_jamaat">
                    <?php echo JText::_( 'ASR_JAMAAT' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="asr_jamaat" id="asr_jamaat" size="32" maxlength="250" value="<?php echo $this->detail->asr_jamaat;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="maghrib_jamaat">
                    <?php echo JText::_( 'MAGHRIB_BEGINS' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="maghrib_begins" id="maghrib_begins" size="32" maxlength="250" value="<?php echo $this->detail->maghrib_begins;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="maghrib_jamaat">
                    <?php echo JText::_( 'MAGHRIB_JAMAAT' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="maghrib_jamaat" id="maghrib_jamaat" size="32" maxlength="250" value="<?php echo $this->detail->maghrib_jamaat;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="isha_begins">
                    <?php echo JText::_( 'ISHA_BEGINS' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="isha_begins" id="isha_begins" size="32" maxlength="250" value="<?php echo $this->detail->isha_begins;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="isha_jamaat">
                    <?php echo JText::_( 'ISHA_JAMAAT' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="isha_jamaat" id="isha_jamaat" size="32" maxlength="250" value="<?php echo $this->detail->isha_jamaat;?>" />
                <?php echo $this->warningIcon; ?>
            </td>
        </tr>

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