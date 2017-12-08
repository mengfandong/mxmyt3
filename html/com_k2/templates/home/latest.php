<?php
/**
* @package   uneedo_j3
* @author    arrowthemes http://www.arrowthemes.com
* @copyright Copyright (C) arrowthemes
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/**
 * @package		K2
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2Container" class="latestView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
  	<?php foreach($this->blocks as $key=>$block): ?> 
    	<?php if($this->source=='categories'): $category=$block; ?>      		
	      		<?php if ($this->params->get('categoryTitle')): ?>
	      		<h2><a href="<?php echo $category->link; ?>" target="_blank"><i class="fa fa-newspaper-o"></i><?php echo $category->name; ?></a>	<span><a href="<?php echo $category->link; ?>" target="_blank">更多+</a></span></h2>
	      		<?php endif; ?>
		<?php endif; ?>
		
    <div class="itemList">
	<ul class="style bullet-1">
      <?php if($this->params->get('latestItemsDisplayEffect')=="first"): ?>
      	<?php foreach ($block->items as $itemCounter=>$item): K2HelperUtilities::setDefaultImage($item, 'latest', $this->params); ?>
      		<?php if($itemCounter==0): ?>
      			<?php $this->item=$item; echo $this->loadTemplate('item'); ?>
      		<?php else: ?>
      		<h2 class="itemTitleList">
        		<?php if ($item->params->get('latestItemTitleLinked')): ?>
        			<a href="<?php echo $item->link; ?>" target="_blank"> <?php echo $item->title; ?> </a>
        		<?php else: ?>
        			<?php echo $item->title; ?>
        		<?php endif; ?>
      		</h2>
      		<?php endif; ?>
      	<?php endforeach; ?>
      <?php else: ?>
      	<?php foreach ($block->items as $item): K2HelperUtilities::setDefaultImage($item, 'latest', $this->params); ?>
      		<?php $this->item=$item; echo $this->loadTemplate('item'); ?>
      	<?php endforeach; ?>
      <?php endif; ?>
	</ul>
    </div>
  <?php endforeach; ?>
</div>