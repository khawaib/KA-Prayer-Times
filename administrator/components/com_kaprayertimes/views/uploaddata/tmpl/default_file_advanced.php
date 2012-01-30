<?php defined('_JEXEC') or die('Restricted access'); ?>
<table class="admintable">
    <tr>
        <td class="key"><?php echo JText::_( 'UPLOAD_FILE' );?></td>
        <td >
            <span style="color:red; font-weight:bold;">THIS IS NOT FUNCTIONAL YET.</span>
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr>
                    <td><input type="file" id="file" name="file_advanced" size="75"></td>
                </tr>
                <tr>
                    <td><?php echo JText::_('MAXIMUM FILE SIZE ALLOWED').' '.ini_get('upload_max_filesize');?></td>
                </tr>
            </table>
        </td>
    </tr>
	<tr>
		<td class="key" >
		</td>
		<td>
			<span style="color:red">Leave Following to default if you do not understand them.<br/>Day does not need to be imported as it is calculated automatically from date field.</span>
		</td>
	</tr>
	<tr>
		<td class="key" >
			<?php echo JText::_('OVERWRITE_EXISTING'); ?>
		</td>
		<td>
			<?php echo $this->lists['overwriteexisting22222']; ?>
		</td>
	</tr>
	<tr>
		<td class="key" >
			<?php echo JText::_('USE_CSV_HEADER'); ?>
		</td>
		<td>
			<?php echo JHTML::_('select.booleanlist', "overwriteexisting" , '',JRequest::getInt('overwriteexisting',0) ); ?>
		</td>
	</tr>
	<tr>
		<td class="key" >
			<?php echo JText::_('SEPARATE_CHAR'); ?>
		</td>
		<td>
			<?php echo JHTML::_('select.booleanlist', "overwriteexisting" , '',JRequest::getInt('overwriteexisting',0) ); ?>
		</td>
	</tr>
	<tr>
		<td class="key" >
			<?php echo JText::_('ENCLOSE_CHAR'); ?>
		</td>
		<td>
			<?php echo JHTML::_('select.booleanlist', "overwriteexisting" , '',JRequest::getInt('overwriteexisting',0) ); ?>
		</td>
	</tr>
	<tr>
		<td class="key" >
			<?php echo JText::_('ESCAPE_CHAR'); ?>
		</td>
		<td>
			<?php echo JHTML::_('select.genericlist‎', "overwriteexisting" , '', JRequest::getInt('overwriteexisting',0) ); ?>
		</td>
	</tr>
	<tr>
		<td class="key" >
			<?php echo JText::_('ENCODING'); ?>
		</td>
		<td>
			<?php echo JHTML::_('select.genericlist‎', "overwriteexisting" , '', JRequest::getInt('overwriteexisting',0) ); ?>
		</td>
	</tr>
    <?php
    foreach ( $this->selectLists as $key => $value ) :
    ?>
    <tr>
		<td class="key" >
			<?php $column = $key + 1; echo JText::_( 'COLUMN' ) . ' ' . $column; ?> = 
		</td>
        <td>
            <?php echo $value; ?>
        </td>
    </tr>
    <?php
    endforeach;
    ?>

</table>