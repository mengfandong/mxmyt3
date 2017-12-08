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
$k2ContainerClasses = (($this->item->featured) ? ' itemIsFeatured' : '') . ($params->get('pageclass_sfx')) ? ' '.$params->get('pageclass_sfx') : ''; 

?>

<article id="k2Container" class="itemView<?php echo $k2ContainerClasses; ?>"> 
<?php echo $this->item->event->BeforeDisplay; ?> 
<?php echo $this->item->event->K2BeforeDisplay; ?>
		<?php if(isset($this->item->editLink)): ?>
		<a class="itemEditLink modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>"><?php echo JText::_('K2_EDIT_ITEM'); ?></a>
		<?php endif; ?>
		<?php if($params->get('itemImage') && !empty($this->item->image)): ?>
		<div class="itemImageBlock"> <a class="itemImage modal" rel="{handler: 'image'}" href="<?php echo $this->item->imageXLarge; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" /> </a>
				<?php if($params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
				<span class="itemImageCaption"><?php echo $this->item->image_caption; ?></span>
				<?php endif; ?>
				<?php if($params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
				<span class="itemImageCredits"><?php echo $this->item->image_credits; ?></span>
				<?php endif; ?>
		</div>
		<?php endif; ?>
		<header>
				<?php if(
				$params->get('itemFontResizer') ||
				$params->get('itemAuthor') ||
				$params->get('itemPrintButton') ||
				$params->get('itemEmailButton') ||
				$params->get('itemSocialButton') ||
				$params->get('itemVideoAnchor') ||
				$params->get('itemImageGalleryAnchor') ||
				$params->get('itemTitle') ||
				$params->get('itemDateCreated')
			): ?>
			<?php if($params->get('itemTitle')): ?>
				<h1> <?php echo $this->item->title; ?>
						<?php if($params->get('itemFeaturedNotice') && $this->item->featured): ?>
						<sup><?php echo JText::_('K2_FEATURED'); ?></sup>
						<?php endif; ?>
				</h1>
				<?php endif; ?>
				<ul>
						<?php if($params->get('itemDateCreated')): ?>
						<li>
								<i class="fa fa-calendar"></i><span><?php echo JHTML::_('date', $this->item->created, JText::_('Y-m-d h:i')); ?></span>
						</li>
						<?php endif; ?>
						<?php if($params->get('itemAuthor')): ?>
						<li class="itemAuthor"><i class="fa fa-user"></i><span><?php echo $this->item->author->name; ?></span></li>
						<?php endif; ?>
						
						<?php if($params->get('itemCategory')): ?>
						<li class="itemCategory"><i class="fa fa-folder-open-o"></i><a href="<?php echo $this->item->category->link; ?>"><span><?php echo $this->item->category->name; ?></span></a></li>
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

						
				</ul>
				
				<?php endif; ?>
		</header>
		<?php echo $this->item->event->AfterDisplayTitle; ?> <?php echo $this->item->event->K2AfterDisplayTitle; ?>
		<div class="itemBody"> 
		<?php echo $this->item->event->BeforeDisplayContent; ?> <?php echo $this->item->event->K2BeforeDisplayContent; ?>
				<?php if(!empty($this->item->fulltext)): ?>
				<?php if($params->get('itemIntroText')): ?>
				<div class="itemIntroText"> <?php echo $this->item->introtext; ?> </div>
				<?php endif; ?>
				<?php endif; ?>
				<?php if($params->get('itemFullText')): ?>
				<div class="itemFullText"> <?php echo (!empty($this->item->fulltext)) ? $this->item->fulltext : $this->item->introtext; ?> </div>
				<?php endif; ?>
				<?php if($params->get('itemExtraFields') && count($this->item->extra_fields)): ?>
				<div class="itemExtraFields">
						<h3><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h3>
						<ul>
								<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
								<?php if($extraField->value): ?>
								<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>"> <span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span> <span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span> </li>
								<?php endif; ?>
								<?php endforeach; ?>
						</ul>
				</div>
				<?php endif; ?>

				<?php echo $this->item->event->AfterDisplayContent; ?> <?php echo $this->item->event->K2AfterDisplayContent; ?>
				<?php if(
				$params->get('itemHits') ||
				$params->get('itemCategory') ||
				$params->get('itemTags') ||
				$params->get('itemTwitterButton',1) || 
				$params->get('itemFacebookButton',1) || 
				$params->get('itemGooglePlusOneButton',1) ||
				$params->get('itemAttachments')
			): ?>
				<div class="itemLinks">
						<?php if($params->get('itemTags') && count($this->item->tags)): ?>
						<div class="itemTagsBlock"> <span>标签：</span>
								<ul class="itemTags">
										<?php foreach ($this->item->tags as $tag): ?>
										<li> <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a> </li>
										<?php endforeach; ?>
								</ul>
						</div>
						<?php endif; ?>
				</div>
				<?php endif; ?>

				<?php if(($params->get('itemRelated') && isset($this->relatedItems)) || ($params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems))): ?>
				<div class="itemAuthorContent">
						<?php if($params->get('itemRelated') && isset($this->relatedItems)): ?>
						<div>
								<h3><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></h3>
								<ul>
										<?php foreach($this->relatedItems as $key=>$item): ?>
										<li class="<?php echo ($key%2) ? "odd" : "even"; ?>"> <a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a> </li>
										<?php endforeach; ?>
								</ul>
						</div>
						<?php endif; ?>
				</div>
				<?php endif; ?>

				<?php if($params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>
				<div class="itemNavigation">
						<?php if(isset($this->item->previousLink)): ?>
						<a class="itemPrevious" href="<?php echo $this->item->previousLink; ?>">上一篇： <?php echo $this->item->previousTitle; ?></a>
						<?php endif; ?>
						<?php if(isset($this->item->nextLink)): ?>
						<div class="clr"></div>
						<a class="itemNext" href="<?php echo $this->item->nextLink; ?>">下一篇：<?php echo $this->item->nextTitle; ?> </a>
						<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php echo $this->item->event->AfterDisplay; ?> <?php echo $this->item->event->K2AfterDisplay; ?> </div>
		<?php if(!JRequest::getCmd('print')): ?>
		<a class="itemBackToTop" href="<?php echo $this->item->link; ?>#"> <?php echo JText::_('K2_BACK_TO_TOP'); ?> </a>
		<?php endif; ?>
</article>
