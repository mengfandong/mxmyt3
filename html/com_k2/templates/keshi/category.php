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

<div id="k2Container" class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
		<?php if($this->params->get('show_page_title')): ?>
		<h2 class="componentheading"><?php echo $this->escape($this->params->get('page_title')); ?></h2>
		<?php endif; ?>
		<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
		<div class="itemList">
				<?php if(isset($this->leading) && count($this->leading)): ?>
				<div id="ksjj">
						<?php foreach($this->leading as $key=>$item): ?>
						<?php
					if( (($key+1)%($this->params->get('num_leading_columns'))==0) || count($this->leading)<$this->params->get('num_leading_columns') )
						$lastContainer= ' itemContainerLast';
					else
						$lastContainer='';
						?>
						<div class="itemContainer<?php echo $lastContainer; ?>"<?php echo (count($this->leading)==1) ? '' : ' style="width:'.(number_format(100/$this->params->get('num_leading_columns'), 1)-0.1).'%;"'; ?>>
								<?php
						// Load category_item.php by default
						$tongjiid = $item->id;//保存
						$this->item = $item;
						echo $this->loadTemplate('keshi');
					?>
						</div>
						<?php if(($key+1)%($this->params->get('num_leading_columns'))==0): ?>
						<hr class="divide">
						<?php endif; ?>
						<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<?php if(isset($this->primary) && count($this->primary)): ?>
				<div class="zhuanjiatuandui">
				<h2 class="dotted"><i class="fa fa-user-md"></i><strong>专家团队</strong></h2>
						<?php foreach($this->primary as $key=>$item): ?>
						<?php
						if( (($key+1)%($this->params->get('num_primary_columns'))==0) || count($this->primary)<$this->params->get('num_primary_columns') )
							$lastContainer= ' itemContainerLast';
						else
							$lastContainer='';
						?>
						<div class="itemContainer<?php echo $lastContainer; ?>  width25 zhuanjialist">
						<?php
						$this->item = $item;
						echo $this->loadTemplate('doctor');
						?>
						</div>
						<?php endforeach; ?>
				</div>
				<?php endif; ?>
				
				  <script>
				  var $K2hit = jQuery.noConflict();
				  $K2hit(document).ready(function(){
					$K2hit.ajax({url: "/index.php?option=com_k2&view=item&task=hit&format=raw&itemID=<?php echo $tongjiid; ?>",
						type: 'get',
						success: function(response){
							$K2hit('#totalcount').html(response);
						}
						});
					});
				  </script>
				  <div><span id='totalcount'></span>次</div>
		</div>
		<?php if(count($this->pagination->getPagesLinks())): ?>
		<?php if($this->params->get('catPagination')): ?>
		<?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
		<?php endif; ?>
		<?php endif; ?>
		<?php endif; ?>
</div>
