<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<table style="border-width: 0px; width: 100%">
<?php foreach ($items as $item) : ?>
	<tr>
    <td>
    </td>
    <td>
      <span title="<?php echo JText::_( 'FAJAR' ); ?>"><?php echo JText::_( 'FAJAR' ); ?></span>
    </td>  
    <td>
      <span title="<?php echo JText::_( 'SUNRISE' ); ?>"><?php echo JText::_( 'SUNRISE' ); ?></span>
    </td>  
    <td>
      <span title="<?php echo JText::_( 'ZUHR' ); ?>"><?php echo JText::_( 'ZUHR' ); ?></span>
    </td>
    <td>
      <span title="<?php echo JText::_( 'ASR' ); ?>"><?php echo JText::_( 'ASR' ); ?></span>
    </td>
    <td>
      <span title="<?php echo JText::_( 'MAGHRIB' ); ?>"><?php echo JText::_( 'MAGHRIB' ); ?></span>
    </td>
    <td>
      <span title="<?php echo JText::_( 'ISHA' ); ?>"><?php echo JText::_( 'ISHA' ); ?></span>
    </td>
  </tr>

  <tr>
    <td>
      <span title="<?php echo JText::_( 'BEGINS' ); ?>"><?php echo JText::_( 'BEGINS' ); ?></span>
    </td>
    <td>
      <span title="<?php echo $item->fajr_begins ?>"><?php echo $item->fajr_begins ?></span>
    </td>
    <td>
      <span title="<?php echo $item->sunrise ?>"><?php echo $item->sunrise ?></span>
    </td>  
    <td>
      <span title="<?php echo $item->zuhr_begins ?>"><?php echo $item->zuhr_begins ?></span>
    </td>  
    <td>
      <span title="<?php echo $item->asr_begins ?>"><?php echo $item->asr_begins ?></span>
    </td>
    <td>
      <span title="<?php echo $item->maghrib_begins ?>"><?php echo $item->maghrib_begins ?></span>
    </td>
    <td>
      <span title="<?php echo $item->isha_begins ?>"><?php echo $item->isha_begins ?></span>
    </td>
  </tr>

  <tr>
    <td>
      <span title="<?php echo JText::_( 'JAMAAT' ); ?>"><?php echo JText::_( 'JAMAAT' ); ?></span>
    </td>
    <td>
      <span title="<?php echo $item->fajr_jamaat ?>"><?php echo $item->fajr_jamaat ?></span>
    </td>
    <td>
    </td>
    <td>
      <span title="<?php echo $item->zuhr_jamaat ?>"><?php echo $item->zuhr_jamaat ?></span>
    </td>
    <td>
      <span title="<?php echo $item->asr_jamaat ?>"><?php echo $item->asr_jamaat ?></span>
    </td>
    <td>
        <span title="<?php echo $item->maghrib_jamaat ?>"><?php echo $item->maghrib_jamaat ?></span>
    </td>
    <td>
      <span title="<?php echo $item->isha_jamaat ?>"><?php echo $item->isha_jamaat ?></span>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<?php if ($showfirdayprayer) : ?>
<?php echo $firdayprayer; ?>
<?php endif; ?>
<?php if ($showfirdayprayer2) : ?>
<?php echo $firdayprayer2; ?>
<?php endif; ?>

<?php if ($hyperlink) : ?>
<?php echo $link; ?>
<?php endif; ?>
<?php if ($hyperlink2) : ?>
<?php echo $link2; ?>
<?php endif; ?>