<?php
defined('_JEXEC') or die('Restricted access');
$text = JRequest::getString("textareaentries");
$textarea = '<span style="color:red; font-weight:bold;">THIS IS NOT FUNCTIONAL YET.</span>';
$textarea .= '<textarea style="width:100%" rows="20" name="textareaentries">';
if ( empty($text) ) {
    $textarea .= 'TEXT AREA IMPORT IS NOT FUNCTIONAL YET&#013;&#013;';
//    $textarea .= 'islamic_date, day, fajar_begins, fajar_jamaat&#013;';
} else {
    $textarea .= $text;
}
$textarea .= '</textarea>';
echo $textarea;
?>
<table class="admintable" cellspacing="1">
<?php //if($this->config->get('require_confirmation')){ ?>
    <tr>
        <td class="key" >
            <?php //echo JText::_('IMPORT_CONFIRMED'); ?>
        </td>
        <td>
            <?php //echo JHTML::_('select.booleanlist', "import_confirmed_textarea" , '',JRequest::getInt('import_confirmed_textarea',1) ); ?>
        </td>
    </tr>
<?php //} ?>
    <tr>
        <td class="key" >
            <?php echo JText::_('GENERATE_NAME'); ?>
        </td>
        <td>
            <?php echo JHTML::_('select.booleanlist', "generatename_textarea" , '',JRequest::getInt('generatename_textarea',1) ); ?>
        </td>
    </tr>
    <tr>
        <td class="key" >
            <?php echo JText::_('OVERWRITE_EXISTING'); ?>
        </td>
        <td>
            <?php echo JHTML::_('select.booleanlist', "overwriteexisting_textarea" , '',JRequest::getInt('overwriteexisting_textarea',0) ); ?>
        </td>
    </tr>
</table>