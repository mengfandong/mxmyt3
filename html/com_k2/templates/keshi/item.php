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

// Code used to generate the page elements
$params = $this->item->params;
//$k2ContainerClasses = (($this->item->featured) ? ' itemIsFeatured' : '') . ($params->get('pageclass_sfx')) ? ' '.$params->get('pageclass_sfx') : '';

// 先看看是不是专家的介绍
$zhicheng = '';

$k2ContainerClasses = 'itemks';

if ($this->item->params->get ( 'catItemExtraFields' ) && count ( $this->item->extra_fields )) {
	foreach ( $this->item->extra_fields as $key => $extraField ) {
		if ($extraField->alias == 'zhicheng' && !empty($extraField->value)) {
			$k2ContainerClasses = 'itemzj';
		}
	}
}

?>

<article id="k2Container" class="ksitemView<?php echo ' '.$k2ContainerClasses; ?>"> 

		<?php if($params->get('itemImage') && !empty($this->item->image)): ?>
		<div class="itemImageBlock">
		<a class="itemImage modal" rel="{handler: 'image'}"
			href="<?php echo $this->item->imageXLarge; ?>"
			title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
		</a>
				<?php if($params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
				<span class="itemImageCaption"><?php echo $this->item->image_caption; ?></span>
				<?php endif; ?>
				<?php if($params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
				<span class="itemImageCredits"><?php echo $this->item->image_credits; ?></span>
				<?php endif; ?>
		</div>
		<?php endif; ?>
		
		<header>
			<?php if($params->get('itemTitle') || $params->get('itemDateCreated')): ?>
			
			<?php if($k2ContainerClasses == 'itemzj'): ?>
				<h2 class="dotted"><i class="fa fa-user-md" style="margin-right:10px;"></i><strong>专家团队</strong></h2>
			<?php else: ?>			
				<?php if($params->get('itemTitle')): ?>
					<h1> <?php echo $this->item->title; ?></h1>
				<?php endif; ?>
			<?php endif; ?>
				
				<ul>
				<?php if($params->get('itemCategory')): ?>
				<li><i class="fa fa-hospital-o"></i><a
				href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a></li>
				<?php endif; ?>
				
				<?php if($params->get('itemDateCreated')): ?>
				<li><i class="fa fa-calendar"></i><?php echo JHTML::_('date', $this->item->created, JText::_('Y-m-d')); ?></li>
				<?php endif; ?>
				
				<?php if($params->get('itemHits')): ?>
				   <script>
				  var $K2hit = jQuery.noConflict();
				  $K2hit(document).ready(function(){
					$K2hit.ajax({url: "<?php echo  $this->baseurl; ?>/index.php?option=com_k2&view=item&task=hit&format=raw&itemID=<?php echo($this->item->id);?>",
						type: 'get',
						success: function(response){
							$K2hit('#totalcount').html(response);
						}
						});
					});
				  </script>
				<li class="itemHitsBlock"> <span class="itemHits" ><i class="fa fa-eye"></i><span id="totalcount"></span>人浏览</span></li>
				<?php endif; ?>
				
				<?php if($params->get('itemAuthor')): ?>
				<li class="itemAuthor"> <?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?>&nbsp;
						<?php if(empty($this->item->created_by_alias)): ?>
						<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
						<?php else: ?>
						<?php echo $this->item->author->name; ?>
						<?php endif; ?>
				</li>
				<?php endif; ?>	
				</ul>				
				<?php endif; ?>
		</header>

	<div class="itemBody"> 
		<?php if($k2ContainerClasses == 'itemzj'): ?>
			<div class="grid-box width50">
			<div class="itemExtraFields">
				<h3><?php echo $this->item->title; ?></h3>
				<ul>
					<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
					<?php if($extraField->value): ?>
						<li><p class="zjLabel"><?php echo $extraField->name; ?>:</p>
						<p class="zjValue"><?php echo $extraField->value; ?></p>
					</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<div class="grid-box width50">
					<?php if(!empty($this->item->fulltext)): ?>
					<?php if($params->get('itemIntroText')): ?>
					<div class="itemIntroText"> <?php echo $this->item->introtext; ?> </div>
					<?php endif; ?>
					<?php endif; ?>
					<?php if($params->get('itemFullText')): ?>
					<div class="itemFullText"> <?php echo (!empty($this->item->fulltext)) ? $this->item->fulltext : $this->item->introtext; ?> </div>
					<?php endif; ?>
			</div>
		<?php else: ?>	
			<?php if(!empty($this->item->fulltext)): ?>
			<?php if($params->get('itemIntroText')): ?>
			<div class="itemIntroText"> <?php echo $this->item->introtext; ?> </div>
			<?php endif; ?>
			<?php endif; ?>
			<?php if($params->get('itemFullText')): ?>
			<div class="itemFullText"> <?php echo (!empty($this->item->fulltext)) ? $this->item->fulltext : $this->item->introtext; ?> </div>
			<?php endif; ?>		
		<?php endif; ?>
		
		<?php if(($params->get('itemRelated') && isset($this->relatedItems)) || ($params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems))): ?>
			<div class="itemAuthorContent">
					<?php if($params->get('itemRelated') && isset($this->relatedItems)): ?>
				<div>
				<h3><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></h3>
				<ul>
					<?php foreach($this->relatedItems as $key=>$item): ?>
					<li class="<?php echo ($key%2) ? "odd" : "even"; ?>"><a
						class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
			</div>
		<?php endif; ?>
 
</div>
</article>
