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

$outurl = $this->item->link;
if (count ( $this->item->extra_fields )) {
	foreach ( $this->item->extra_fields as $key => $extraField ) {
		if ($extraField->value != '' && $extraField->alias == "outurl") {
			$outurl = $extraField->value;
		}
	}
}

?>

<article class="itemView group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>"> 
<?php echo $this->item->event->BeforeDisplay; ?> 
<?php echo $this->item->event->K2BeforeDisplay; ?>
		<header>
				<?php if(isset($this->item->editLink)): ?>
				<a class="catItemEditLink modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
					<?php echo JText::_('K2_EDIT_ITEM'); ?>
				</a>
				<?php endif; ?>
		
				<?php if($this->item->params->get('catItemTitle')): ?>
				<h2>
						<?php if ($this->item->params->get('catItemTitleLinked')): ?>
						<a href="<?php echo $outurl; ?>" target="_blank"><?php echo $this->item->title; ?></a>
						<?php else: ?>
						<?php echo $this->item->title; ?>
						<?php endif; ?>
						<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
						<sup><?php echo JText::_('K2_FEATURED'); ?></sup>
						<?php endif; ?>
				</h2>
				<?php endif; ?>
				<ul>
						<?php if($this->item->params->get('catItemDateCreated')): ?>
						<li>
								<i class="fa fa-calendar"></i><span><?php echo JHTML::_('date', $this->item->created, JText::_('Y-m-d')); ?></span>
						</li>
						<?php endif; ?>
						<?php if($this->item->params->get('catItemCategory')): ?>
						<li class="itemCategory"><i class="fa fa-folder-open-o"></i><a href="<?php echo $this->item->category->link; ?>"><span><?php echo $this->item->category->name; ?></span></a></li>
						<?php endif; ?>
						<?php if($this->item->params->get('catItemAuthor')): ?>
						<li class="itemAuthor"><i class="fa fa-user"></i><span><?php echo $this->item->author->name; ?></span></li>
						<?php endif; ?>

						<?php if($this->item->params->get('catItemHits')): ?>
						<li class="itemHitsBlock"> <span class="itemHits"><i class="fa fa-eye"></i><?php echo $this->item->hits+200; ?>人浏览</span> </li>
						<?php endif; ?>
						<?php if($this->item->params->get('catItemDateModified') && $this->item->created != $this->item->modified): ?>
						<li class="itemDateModified"> <?php echo JText::_('K2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?> </li>
						<?php endif; ?>
						<?php echo $this->item->event->AfterDisplay; ?> <?php echo $this->item->event->K2AfterDisplay; ?>
				</ul>
		</header>
		<?php echo $this->item->event->AfterDisplayTitle; ?> <?php echo $this->item->event->K2AfterDisplayTitle; ?>
		<div class="itemBlock">
				<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
				<div class="itemImageBlock"> <a class="itemImage" href="<?php echo $outurl; ?>" target="_blank" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" /> </a> </div>
				<?php endif; ?>
				<div class="itemBody"> <?php echo $this->item->event->BeforeDisplayContent; ?> <?php echo $this->item->event->K2BeforeDisplayContent; ?>
						<?php if($this->item->params->get('catItemIntroText')): ?>
						<div class="itemIntroText"> <?php echo $this->item->introtext; ?> </div>
						<?php endif; ?>
						
						<?php echo $this->item->event->AfterDisplayContent; ?> <?php echo $this->item->event->K2AfterDisplayContent; ?>
						<?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
						<ul class="itemTags">
								<?php foreach ($this->item->tags as $tag): ?>
								<li> <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a> </li>
								<?php endforeach; ?>
						</ul>
						<?php endif; ?>
				</div>
		</div>
</article>
