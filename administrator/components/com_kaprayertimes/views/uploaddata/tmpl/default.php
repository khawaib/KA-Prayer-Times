<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<fieldset class="adminform">
	<legend><?php echo JText::_( 'IMPORT_FROM' ); ?></legend>
		<?php echo JHTML::_('select.radiolist',   $this->importvalues, 'importfrom', 'class="inputbox" size="1" onclick="updateImport(this.value);"', 'value', 'text','file'); ?>
	</fieldset>
	<div>
	<?php 
        foreach($this->importdata as $div => $name) {
            echo '<div id="'.$div.'"';
            if($div != 'file') echo ' style="display:none"';
            echo '>';
            echo '<fieldset class="adminform">';
            echo '<legend>'.$name.'</legend>';
            echo $this->loadTemplate($div);
            echo '</fieldset>';
            echo '</div>';
        }
    ?>
	</div>
	<div class="clr"></div>
    <div id="footer">
        <p class="copyright"><?php echo COM_KAPRAYERTIMES_VERSION_LINK; ?></p>
    </div>
	<input type="hidden" name="MAX_FILE_SIZE" value="$upload_max_filesize" />
	<input type="hidden" name="option" value="com_kaprayertimes" />
	<input type="hidden" name="id" value="<?php echo $this->manageuploads->id; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="controller" value="uploaddata" />
</form>