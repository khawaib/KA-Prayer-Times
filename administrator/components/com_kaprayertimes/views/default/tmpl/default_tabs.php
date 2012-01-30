<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.html.pane');

$pane =& JPane::getInstance('Tabs');
echo $pane->startPane('myPane');

echo $pane->startPanel(JText::_('KA Prayer Times'), 'aboutKAPTTab');
?>
<div id="about">
	<p>KA Prayer Times displays prayer times in Joomla 1.5 websites.</p>
	<p>You like this component and would like to support the development of this component?</p>
	<ul>
	    <li>
	        <a href="http://extensions.joomla.org/extensions/living/religious-events/13010" target="_blank">Submit Review for KA Prayer Times on Joomla! Extensions Directory.</a>
	    </li>
	    <li>
	        Donate to this project:
            <form id="kapt_donate_form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="AN996PWRQ55RN">
            <input type="image" src="https://www.paypal.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
            <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
            </form>
        </li>
	    <li>
	        Make translations for KA Prayer Times into your language and share.
	    </li>
	</ul>
	<table width = "100%" border = "0" cellpadding = "0" cellspacing = "0">
	    <tr>
	        <td width = "100%" valign = "top" style = "padding:10px;">
	            Project Website: <a href="http://www.khawaib.co.uk/index.php?option=com_content&Itemid=29&catid=12&id=44&lang=en&view=article"  target="_blank">www.Khawaib.co.uk</a> <br />
	            Demo Site: <a href="http://www.khawaib.co.uk/demo"  target="_blank">www.Khawaib.co.uk/demo</a> <br />
	            Support: <a href="http://www.khawaib.co.uk/index.php?option=com_kunena&Itemid=19&catid=64&func=showcat&lang=en"  target="_blank">www.Khawaib.co.uk/forum</a> <br />
	        </td>
	    </tr>
	</table>
</div>
<table class="adminlist">
    <thead>
        <tr>
            <th colspan="2"><?php echo JText::_( 'VERSION CHECK' ); ?></th>
        </tr>
    </thead>
	<tbody>
		<tr>
			<td width="40%">
				<?php echo JText::_( 'LATEST VERSION' ).':'; ?>
			</td>
			<td>
                [ <a href="http://www.khawaib.co.uk/index.php?option=com_content&Itemid=29&catid=12&id=44&lang=en&view=article"  target="_blank">Check Latest version</a> ]
				<?php //echo $this->check['versionread']; ?>
			</td>
		</tr>
		<tr>
			<td width="40%">
				<?php echo JText::_( 'INSTALLED VERSION' ).':'; ?>
			</td>
			<td>
				<?php //echo $this->check['versionread_current']; ?>
                <?php echo COM_KAPRAYERTIMES_VERSION; ?>
			</td>
		</tr>
		<tr>
		  	<td width="40%">
		  		<?php echo JText::_( 'RELEASE DATE' ).':'; ?>
		  	</td>
		  	<td>
		  		<?php echo COM_KAPRAYERTIMES_RELEASEDATE; ?>
		  	</td>
		</tr>
	</tbody>
</table>
<?php echo $pane->endPanel(); ?>

<?php echo $pane->startPanel(JText::_('Languages'), 'languagesTab'); ?>
    <p>Following are the translations available:</p>
    <table class="adminlist">
        <thead>
            <tr>
                <td class="title"><?php echo JText::_('Language'); ?></td>
                <td class="title"><?php echo JText::_('Submitted By'); ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Albanian</td>
                <td>Suad Seferi</td>
            </tr>
            <tr>
                <td>English</td>
                <td><a href="http://www.khawaib.co.uk" target="_blank">Khawaib Ahmed</a></td>
            </tr>
        </tbody>
    </table>
    <p>You can submit your language file by going to Languages and then editing the language you want to share.</p>
<?php echo $pane->endPanel(); ?>

<?php echo $pane->startPanel(JText::_('Credits'), 'creditsTab'); ?>
    <table class="adminlist">
        <thead>
            <tr>
                <td class="title"><?php echo JText::_(''); ?></td>
                <td class="title"><?php echo JText::_(''); ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Developer</td>
                <td><a href="http://www.khawaib.co.uk/index.php?option=com_content&Itemid=6&id=1&lang=en&view=article" target="_blank">Khawaib Ahmed</a></td>
            </tr>
            <tr>
                <td>Director</td>
                <td><a href="http://www.paradex.co.uk" target="_blank">M Khan - www.Paradex.co.uk</a></td>
            </tr>
            <tr>
                <td>Tester</td>
                <td><a href="http://www.masjidtawhid.org/" target="_blank">Masjid al-Tawhid</a></td>
            </tr>
        </tbody>
    </table>
<?php echo $pane->endPanel(); ?>
<?php echo $pane->startPanel(JText::_('Contributors'), 'contributorsTab'); ?>
    <table class="adminlist">
        <thead>
            <tr>
                <td class="title"><?php echo JText::_(''); ?></td>
                <td class="title"><?php echo JText::_(''); ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mirza Baig</td>
                <td><a href="http://www.MyPrintsupplier.com " target="_blank">A&A ASSOCIATES PRINTING AND DESIGN INC.</a></td>
            </tr>
            <tr>
                <td>M Khan</td>
                <td><a href="http://www.paradex.co.uk" target="_blank">www.Paradex.co.uk</a></td>
            </tr>
        </tbody>
    </table>
<?php echo $pane->endPanel(); ?>
<?php echo $pane->endPane(); ?>