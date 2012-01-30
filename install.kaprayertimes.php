<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
jimport('joomla.installer.installer');

?>
<?php 
//function com_install() {
$db = JFactory::getDBO();
$status = new JObject();
$status->modules = array();
$status->plugins = array();
if( version_compare( JVERSION, '1.6.0', 'ge' ) ) {
	$src = dirname(__FILE__);
} else {
	$src = $this->parent->getPath('source');
}
// -- Download ID
if(is_dir($src.DS.'mod_kaprayertimes')) {
	$installer = new JInstaller;
	$result = $installer->install($src.DS.'mod_kaprayertimes');
	$status->modules[] = array('name'=>'mod_kaprayertimes','client'=>'site', 'result'=>$result);
}
// Load the translation strings (Joomla! 1.5 and 1.6 compatible)
if( version_compare( JVERSION, '1.6.0', 'lt' ) ) {
	global $j15;
	// Joomla! 1.5 will have to load the translation strings
	$j15 = true;
	$jlang =& JFactory::getLanguage();
	$path = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_kaprayertimes';
	$jlang->load('com_kaprayertimes.sys', $path, 'en-GB', true);
	$jlang->load('com_kaprayertimes.sys', $path, $jlang->getDefault(), true);
	$jlang->load('com_kaprayertimes.sys', $path, null, true);
} else {
	$j15 = false;
}
$rows = 0;
?>
    <table width = "100%" border = "0" cellpadding = "0" cellspacing = "0">
        <tr>
            <td width = "100%" valign = "top" style = "padding:10px;">
                <?php $app = JFactory::getApplication(); ?>
                <?php $live_site = $app->isAdmin() ? JURI::root() : JURI::base(); ?>
                <h1>Alhamdulillah (الحمد لله) - KA Prayer Times Component installed successfully</h1>
                <div style="float:right"><img src = "<?php echo $live_site; ?>components/com_kaprayertimes/assets/images/com_kaprayertimes.png" alt = "KA Prayer Times" border = "0"></div>
                <p>KA Prayer Times Joomla component displays prayer times from database.</p>            
                <h3>Usage Instructions</h3>
                <ol>
                    <li>Goto <strong>Component > <a href="<?php echo $live_site; ?>administrator/index.php?option=com_kaprayertimes" target="_blank">KA Prayer Times</a></strong></li>
                    <li>Click on <a href="<?php echo $live_site; ?>administrator/index.php?option=com_kaprayertimes&view=uploaddata" target="_blank"><strong>Upload Data</strong></a> to upload prayer times from CSV file.</li>
                    <li>Click on <strong>Menu > Main Menu</strong> to create menus.</li>
                    <li>Choose the menu options available and save.</li>
                    <li>You can also view frontend of KA Prayer Times directly <a href="<?php echo $live_site; ?>index.php?option=com_kaprayertimes" target="_blank">here</a>.</li>
                </ol>

                <table class="adminlist">
                    <thead>
                        <tr>
                            <th class="title" colspan="2"><?php echo JText::_('Extension'); ?></th>
                            <th width="30%"><?php echo JText::_('Status'); ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr class="row0">
                            <td class="key" colspan="2"><?php echo 'KA Prayer Times '.JText::_('Component'); ?></td>
                            <td><strong><?php echo '<span style="color:green">'.JText::_('Installed').'</span>' ?></strong></td>
                        </tr>
                        <?php if (count($status->modules)) : ?>
                        <tr>
                            <th><?php echo JText::_('Module'); ?></th>
                            <th><?php echo JText::_('Client'); ?></th>
                            <th></th>
                        </tr>
                        <?php foreach ($status->modules as $module) : ?>
                        <tr class="row<?php echo (++ $rows % 2); ?>">
                            <td class="key"><?php echo $module['name']; ?></td>
                            <td class="key"><?php echo ucfirst($module['client']); ?></td>
                            <td><strong><?php echo ($module['result']) ? '<span style="color:green">'.JText::_('Installed').'</span>':'<span style="color:red">'.JText::_('Not installed').'</span>'; ?></strong></td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif; ?>
                    </tbody>
                </table>

                Developer: <a href="http://www.khawaib.co.uk" target="_blank">Khawaib Ahmed</a><br />
                Demo Site: <a href="http://www.khawaib.co.uk/demo"  target="_blank">www.Khawaib.co.uk/demo</a> <br />
                Support: <a href="http://www.khawaib.co.uk/index.php?option=com_kunena&Itemid=19&catid=65&func=showcat&lang=en" target="_blank">Support Forum</a> <br />
            </td>
        </tr>
    </table>
<?php //} ?>