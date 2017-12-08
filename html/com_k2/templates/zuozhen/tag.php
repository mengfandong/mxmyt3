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

?>

<section id="k2Container" class="genericView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
		<?php if($this->params->get('show_page_title')): ?>
		<header>
				<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
		</header>
		<?php endif; ?>
		<?php if(count($this->items)): ?>
		<section class="itemList">
				<?php foreach($this->items as $item): ?>
				<?php
					$outurl = $item->link;
					if (count ( $item->extra_fields )) {
						var_dump($item->extra_fields);
						foreach ( $item->extra_fields as $key => $extraField ) {
							if ($extraField->value != '' && $extraField->alias == "outurl") {
								$outurl = $extraField->value;
							}
						}
					}
				?>
				
				<article class="itemView">
						<header>
								<?php if($item->params->get('genericItemTitle')): ?>
								<h2>
										<?php if ($item->params->get('genericItemTitleLinked')): ?>
										<a href="<?php echo $outurl; ?>" target="_blank"> <?php echo $item->title; ?> </a>
										<?php else: ?>
										<?php echo $item->title; ?>
										<?php endif; ?>
								</h2>
								<?php endif; ?>
								<?php if($item->params->get('genericItemCategory') || $item->params->get('tagItemDateCreated',1)): ?>
								<ul>
										<?php if($item->params->get('tagItemDateCreated',1)): ?>
										<li>
												<i class="fa fa-calendar"></i><span><?php echo JHTML::_('date', $this->item->created, JText::_('Y-m-d')); ?></span>
										</li>
										<?php endif; ?>
										<?php if($item->params->get('genericItemCategory')) : ?>
										<li class="itemCategory"><i class="fa fa-folder-open-o"></i><a href="<?php echo $item->category->link; ?>"><span><?php echo $item->category->name; ?></span></a></li>
										<?php endif; ?>
								</ul>
								<?php endif; ?>
						</header>
						<?php if($item->params->get('genericItemImage') && !empty($item->imageGeneric)): ?>
						<div class="itemImageBlock"> <a class="itemImage" href="<?php echo $outurl; ?>" target="_blank" title="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>"> <img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" /> </a> </div>
						<?php endif; ?>
						<div class="itemBody">
								<?php if($item->params->get('genericItemIntroText')): ?>
								<div class="itemIntroText"> <?php echo $item->introtext; ?> </div>
								<?php endif; ?>
								<?php if ($item->params->get('genericItemReadMore')): ?>
								<a class="itemReadMore button" href="<?php echo $outurl; ?>"> <?php echo JText::_('K2_READ_MORE'); ?> </a>
								<?php endif; ?>
						</div>
				</article>
				<?php endforeach; ?>
		</section>
		<?php if($this->pagination->getPagesLinks()): ?>
		<?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
		<?php endif; ?>
		<?php endif; ?>
</section>
