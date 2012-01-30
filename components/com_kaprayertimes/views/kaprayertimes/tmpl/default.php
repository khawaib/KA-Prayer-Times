<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="<?php echo $this->action; ?>" method='post' name='frontForm'>
    <table class="kaptTable" width="100%">
        <tr>
            <td>
                <?php if ($this->params->get('show_comp_heading')) { ?>
                    <h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"><?php echo $this->params->get( 'comp_heading' ); ?></h1>
                <?php } ?>
            </td>
            <td align="right">
                <?php if ($this->params->get('show_page_image')) { ?>
                    <img src="<?php echo $this->params->get( 'img_path' ); ?>" border="1" alt="<?php echo COM_KAPRAYERTIMES_VERSION;?>" width="<?php echo $this->params->get('imagew');?>" height="<?php echo $this->params->get('imageh');?>" />
                <?php } ?>
            </td>
        </tr>
    </table>
    <?php if ($this->params->get('show_month_dropdown')) { ?>
        <div id="kaptFilterMonths">
            <?php echo JText::_( 'SELECT_A_MONTH' ); echo $this->lists['months']; ?>
            <?php 
                if ($this->params->get('show_khutba_message')) {
                    echo '<span id="message">';
                        echo $this->params->get('khutba_message');
                    echo '<span>';
                }
            ?>
            <div id="kaptIcons">
                <?php if ((!$this->print) && ($this->format != 'pdf')): ?>
                    <?php if ($this->params->get('show_pdf_icon')) : ?>
                        <span class="buttonheading">
                            <?php //echo JHTML::_('icon.pdf',  '', $this->params, ''); ?>
                        </span>
                    <?php endif; ?>

                    <?php if ( $this->params->get( 'show_print_icon' )) : ?>
                        <span class="buttonheading">
                            <?php echo JHTML::_('icon.print_popup',  '', $this->params, ''); ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($this->params->get('show_email_icon')) : ?>
                        <span class="buttonheading">
                            <?php //echo JHTML::_('icon.email',  '', $this->params, $this->request_url, ''); ?>
                        </span>
                    <?php endif; ?>
                <?php elseif ($this->print): ?>
                    <span class="buttonheading">
                        <?php echo JHTML::_('icon.print_screen',  '', $this->params, ''); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    <?php } ?>

    <table class="kaPrayerTimes">
        <thead>
            <tr>
                <?php if ($this->params->get( 'date_column' )): ?>
                    <th id="dateColTh"><span title="<?php echo JText::_( 'DATE' ); ?>"><?php echo JText::_( 'DATE' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'day_column' )): ?>
                    <th id="dayColTh"><span title="<?php echo JText::_( 'DAY' ); ?>"><?php echo JText::_( 'DAY' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'faj_b_column' )): ?>
                    <th id="fajBColTh"><span title="<?php echo JText::_( 'FAJAR BEGINS' ); ?>"><?php echo JText::_( 'FAJAR BEGINS' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'faj_j_column' )): ?>
                    <th id="fajJColTh"><span title="<?php echo JText::_( 'FAJAR JAMAAT' ); ?>"><?php echo JText::_( 'FAJAR JAMAAT' ); ?></span></th>  
                <?php endif; ?>
                <?php if ($this->params->get( 'sunrise_column' )): ?>
                    <th id="sunColTh"><span title="<?php echo JText::_( 'SUNRISE' ); ?>"><?php echo JText::_( 'SUNRISE' ); ?></span></th>  
                <?php endif; ?>
                <?php if ($this->params->get( 'dhuhr_b_column' )): ?>
                    <th id="dhuBColTh"><span title="<?php echo JText::_( 'DHUHR BEGINS' ); ?>"><?php echo JText::_( 'DHUHR BEGINS' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'dhuhr_j_column' )): ?>
                    <th id="dhuJColTh"><span title="<?php echo JText::_( 'DHUHR JAMAAT' ); ?>"><?php echo JText::_( 'DHUHR JAMAAT' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'asr_b_column' )): ?>
                    <th id="asrBColTh"><span title="<?php echo JText::_( 'ASR BEGINS' ); ?>"><?php echo JText::_( 'ASR BEGINS' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'asr_j_column' )): ?>
                    <th id="asrJColTh"><span title="<?php echo JText::_( 'ASR JAMAAT' ); ?>"><?php echo JText::_( 'ASR JAMAAT' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'magrib_b_column' )): ?>
                    <th id="magJColTh"><span title="<?php echo JText::_( 'MAGHRIB BEGINS' ); ?>"><?php echo JText::_( 'MAGHRIB BEGINS' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'magrib_j_column' )): ?>
                    <th id="magJColTh"><span title="<?php echo JText::_( 'MAGHRIB JAMAAT' ); ?>"><?php echo JText::_( 'MAGHRIB JAMAAT' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'isha_b_column' )): ?>
                    <th id="ishBColTh"><span title="<?php echo JText::_( 'ISHA BEGINS' ); ?>"><?php echo JText::_( 'ISHA BEGINS' ); ?></span></th>
                <?php endif; ?>
                <?php if ($this->params->get( 'isha_j_column' )): ?>
                    <th id="ishJColTh"><span title="<?php echo JText::_( 'ISHA JAMAAT' ); ?>"><?php echo JText::_( 'ISHA JAMAAT' ); ?></span></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php
        $fajrJamaatTimeCheck  = '';
        $zuhrJamaatTimeCheck  = '';
        $asrJamaatTimeCheck   = '';
        $ishaJamaatTimeCheck  = '';

        $k = 1;
        $row_counter = 0;
        for ($i=0, $n=count( $this->items ); $i < $n; $i++) {
            $row = &$this->items[$i];
            $checked 	= JHTML::_('grid.id',   $i, $row->id );
            if ($row->date == date("Y-m-d")) {  echo "<tr class='today'>"; } else {
            ?>
                <tr class="<?php echo "row$k"; ?>">
            <?php
            }
            ?>      <?php if ($this->params->get( 'date_column' )): ?>
                        <td class="dateColTh"><span title="<?php echo $row->date; ?>"><?php echo date($this->params->get( 'date_format' ),strtotime($row->date)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'day_column' )): ?>
                        <td class="dayColTh"><span title="<?php echo $weekday = date('l', strtotime($row->date)); ?>"><?php echo $weekday = date($this->params->get( 'day_format' ), strtotime($row->date)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'faj_b_column' )): ?>
                        <td class="fajBColTh"><span title="<?php echo $row->fajr_begins ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->fajr_begins)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'faj_j_column' )): ?>
                        <td class="fajJColTh"><span <?php if (($fajrJamaatTimeCheck != $row->fajr_jamaat) && ($row_counter!=0)): echo 'class="time_change"'; endif; ?> title="<?php echo $row->fajr_jamaat ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->fajr_jamaat)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'sunrise_column' )): ?>
                        <td class="sunColTh"><span title="<?php echo $row->sunrise ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->sunrise)); ?></span></td>  
                    <?php endif; ?>
                    <?php if ($this->params->get( 'dhuhr_b_column' )): ?>
                        <td class="dhuBColTh"><span title="<?php echo $row->zuhr_begins ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->zuhr_begins)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'dhuhr_j_column' )): ?>
                        <td class="dhuJColTh"><span <?php if (($zuhrJamaatTimeCheck != $row->zuhr_jamaat) && ($row_counter!=0)): echo 'class="time_change"'; endif; ?> title="<?php echo $row->zuhr_jamaat ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->zuhr_jamaat)); ?></span></td>  
                    <?php endif; ?>
                    <?php if ($this->params->get( 'asr_b_column' )): ?>
                        <td class="asrBColTh"><span title="<?php echo $row->asr_begins ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->asr_begins)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'asr_j_column' )): ?>
                        <td class="asrJColTh"><span <?php if (($asrJamaatTimeCheck != $row->asr_jamaat) && ($row_counter!=0)): echo 'class="time_change"'; endif; ?> title="<?php echo $row->asr_jamaat ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->asr_jamaat)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'magrib_b_column' )): ?>
                        <td class="magBColTh"><span title="<?php echo $row->maghrib_begins ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->maghrib_begins)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'magrib_j_column' )): ?>
                        <td class="magJColTh"><span title="<?php echo $row->maghrib_jamaat ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->maghrib_jamaat)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'isha_b_column' )): ?>
                        <td class="ishBColTh"><span title="<?php echo $row->isha_begins ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->isha_begins)); ?></span></td>
                    <?php endif; ?>
                    <?php if ($this->params->get( 'isha_j_column' )): ?>
                        <td class="ishJColTh"><span <?php if (($ishaJamaatTimeCheck != $row->isha_jamaat) && ($row_counter!=0)): echo 'class="time_change"'; endif; ?> title="<?php echo $row->isha_jamaat ?>"><?php echo date($this->params->get( 'time_format' ), strtotime($row->isha_jamaat)); ?></span></td>
                    <?php endif; ?>
                </tr>
        <?php  
            $k = 1 - $k;
            $row_counter++;
            $fajrJamaatTimeCheck = $row->fajr_jamaat;
            $zuhrJamaatTimeCheck = $row->zuhr_jamaat;
            $asrJamaatTimeCheck = $row->asr_jamaat;
            $ishaJamaatTimeCheck = $row->isha_jamaat;
        }
        ?>
        </tbody>
        <tfoot>
            <td align="center" colspan="14">
                <?php echo COM_KAPRAYERTIMES_VERSION_LINK; ?>
            </td>
        </tfoot>
    </table>
</form>