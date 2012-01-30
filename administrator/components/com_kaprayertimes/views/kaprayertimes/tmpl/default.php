<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.tooltip');
?>

<script language="javascript" type="text/javascript">
function submitform(pressbutton){
    var form = document.adminForm;
    if (pressbutton) {form.task.value=pressbutton;}
    if ((pressbutton=='add')||(pressbutton=='edit')||(pressbutton=='publish')||(pressbutton=='unpublish') ||(pressbutton=='orderdown')||(pressbutton=='orderup')||(pressbutton=='saveorder')||(pressbutton=='remove') ) {
        form.controller.value="prayertimes_detail";
    } try {
        form.onsubmit();
    }
    catch(e){}
    form.submit();
}
</script>
<form action="<?php echo $this->request_url; ?>" method="post" name="adminForm" >
    <div>
        <table class="prayertimes">
            <tr>
                <td><?php echo JText::_( 'SELECT_A_MONTH' ); ?></td>
                <td><?php echo $this->lists['months'];?></td>
                <span style="color:red; font-weight:bold; float:right;">Save feature is not functional yet.</span>
            </tr>
        </table>
    </div>
    <div id="editcell">
        <table class="adminlist">
        <thead>
            <tr>
                <th width="5"><?php echo JText::_( 'NUM' ); ?></th>
                <th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" /></th>
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
                <th class="title"><span title="<?php echo JText::_( 'SAVE' ); ?>"><?php echo JText::_( 'SAVE' ); ?></span></th>
                <th class="title"><span title="<?php echo JText::_( 'SAVED' ); ?>"><?php echo JText::_( 'SAVED' ); ?></span></th>
                <th class="id"><span title="<?php echo JText::_( 'ID' ); ?>"><?php echo JText::_( 'ID' ); ?></span></th>
            </tr>
        </thead>
        <?php
        $k = 0;
        for ($i=0, $n=count( $this->items ); $i < $n; $i++) {
            $row = &$this->items[$i];
            $link 	= JRoute::_( 'index.php?option=com_kaprayertimes&controller=kaprayertimes&task=edit&cid[]='. $row->id );
            $checked 	= JHTML::_('grid.checkedout',   $row, $i );
            $published 	= JHTML::_('grid.published', $row, $i );
            ?>
            <tr class="<?php echo "row$k"; ?>">
                <td><?php echo $this->pagination->getRowOffset( $i ); ?></td>
                <td><?php echo $checked; ?></td>
                <td>
                    <a href="<?php echo $link; ?>" title="<?php echo JText::_( 'EDIT PRAYER TIME FOR THIS DATE' ); ?>" alt="<?php echo JText::_( 'EDIT PRAYER TIME FOR THIS DATE' ); ?>">
                    <span title="<?php echo date('d-m-Y',strtotime($row->date)); ?>"><?php echo date('d-m-Y',strtotime($row->date)); ?></span></a>
                </td>

                <td align="center"><input class="kaptinputbox inputbox" name="kapt_fajr_begins_title_<?php echo $i; ?>" id="kapt_fajr_begins_title_<?php echo $i; ?>" value="<?php echo $row->fajr_begins ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_fajr_jamaat_title_<?php echo $i; ?>" id="kapt_fajr_jamaat_title_<?php echo $i; ?>" value="<?php echo $row->fajr_jamaat ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_sunrise_title_<?php echo $i; ?>" id="kapt_sunrise_title_<?php echo $i; ?>" value="<?php echo $row->sunrise ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_zuhr_begins_title_<?php echo $i; ?>" id="kapt_zuhr_begins_title_<?php echo $i; ?>" value="<?php echo $row->zuhr_begins ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_zuhr_jamaat_title_<?php echo $i; ?>" id="kapt_zuhr_jamaat_title_<?php echo $i; ?>" value="<?php echo $row->zuhr_jamaat ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_asr_begins_title_<?php echo $i; ?>" id="kapt_asr_begins_title_<?php echo $i; ?>" value="<?php echo $row->asr_begins ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_asr_jamaat_title_<?php echo $i; ?>" id="kapt_asr_jamaat_title_<?php echo $i; ?>" value="<?php echo $row->asr_jamaat ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_maghrib_begins_title_<?php echo $i; ?>" id="kapt_maghrib_begins_title_<?php echo $i; ?>" value="<?php echo $row->maghrib_begins ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_maghrib_jamaat_title_<?php echo $i; ?>" id="kapt_maghrib_jamaat_title_<?php echo $i; ?>" value="<?php echo $row->maghrib_jamaat ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_isha_begins_title_<?php echo $i; ?>" id="kapt_isha_begins_title_<?php echo $i; ?>" value="<?php echo $row->isha_begins ?>"/></td>
                <td align="center"><input class="kaptinputbox inputbox" name="kapt_isha_jamaat_title_<?php echo $i; ?>" id="kapt_isha_jamaat_title_<?php echo $i; ?>" value="<?php echo $row->isha_jamaat ?>"/></td>
                <td align="center">
                    <span class="hasTip" title="<?php echo JText::_( 'SAVE_THIS_ROW' );?>">
                        <img src="components/com_kaprayertimes/assets/images/filesave.png" alt="<?php echo JText::_( 'SAVE' );?>" id="yag_save_<?php echo $i; ?>" class="yag_save" />
                    </span>
                </td>
                <td align="center">
                    <span id="yag_ok_<?php echo $i; ?>"
                        <img src="components/com_kaprayertimes/assets/images/ok1.png" alt="<?php echo JText::_( 'SAVED' );?>" />
                    </span>
                </td>
                <td align="center"><span title="<?php echo $row->id ?>"><?php echo $row->id ?></span></td>
            </tr>
            <?php
            $k = 1 - $k;
        }
        ?>
        <tfoot>
            <td align="center"  colspan="20"><p class="copyright"><?php echo COM_KAPRAYERTIMES_VERSION_LINK; ?></p></td>
        </tfoot>
        </table>
    </div>
<input type="hidden" name="controller" value="kaprayertimes" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php //echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php //echo $this->lists['order_Dir']; ?>" />
</form>