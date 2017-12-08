<?php
/**
* @package   uneedo_j3
* @author    arrowthemes http://www.arrowthemes.com
* @copyright Copyright (C) arrowthemes
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<div class="ks_title">
<strong id="OfficeName"><a href="<?php echo $this->item->link; ?>" target="_blank"><i class="fa fa-medkit"></i><?php echo $this->item->title; ?></a></strong>
</div>
<div class="ks_Body">
		<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		<div class="itemImageBlock"> <a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" /> </a> </div>
		<?php endif; ?>
				<?php if($this->item->params->get('catItemIntroText')): ?>
					<div class="itemIntroText"> <?php echo mb_substr(str_replace('&nbsp;','',K2HelperUtilities::cleanTags($this->item->introtext,'p,span')),0,360); ?> </div>
				<?php endif; ?>
</div>
<div style="text-align:right">
				<?php if ($this->item->params->get('catItemReadMore')): ?>
				<a class="itemReadMore button" href="<?php echo $this->item->link; ?>"  target="_blank"> <?php echo JText::_('K2_READ_MORE'); ?> </a>
				<?php endif; ?>
				</div>