<?php
/**
 * @package		KA Prayer Times
 * @author		Khawaib Ahmed http://www.khawaib.co.uk
 * @copyright 	Copyright (C) 2007 - 2010 Khawaib Ahmed - http://www.khawaib.co.uk
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="cpanel" class="kaptAdminCpanel">
    <?php echo $this->loadTemplate('quickicons'); ?>
    <div class="clr"></div>
    <div id="adsense">
        <iframe src="http://www.khawaib.co.uk/adsense/quran_adsense.html" width="350px" height="300px" frameborder="0" marginwidth ="0px" marginheight="0px" scrolling="no"></iframe>
    </div>
</div>
<div id="kaptAdminStats">
    <?php echo $this->loadTemplate('tabs'); ?>
</div>
<div class="clr"></div>
<div id="footer">
    <p class="copyright"><?php echo COM_KAPRAYERTIMES_VERSION_LINK; ?></p>
</div>
