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

$zhicheng = '';
$yuanqu='';
$techang='';
$zuozhen = '';

if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)){
	foreach ($this->item->extra_fields as $key=>$extraField){
	if($extraField->alias == 'zhicheng')
		$zhicheng = $extraField->value;
		/*$zhicheng = '<a href="<?php echo $this->item->link; ?>" target="_blank">'.$extraField->value.'</a>';	*/
	if($extraField->alias == 'yuanqu')
		$yuanqu = $extraField->value;	
	if($extraField->alias == 'techang')
		$techang = $extraField->value;	
		if($extraField->alias == 'zuozhen')
		$zuozhen = $extraField->value;	
} 
}

?>

<div class="g-doctor-item">
				<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
				<div class="itemImageBlock"> <a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" /> </a> </div>
				<?php endif; ?>
			<div class='zjname'><a href="<?php echo $this->item->link; ?>" target="_blank"><?php echo $this->item->title; ?></a></div>
			<div class='g-doc-baseinfo'>
			<div style="display: table-cell; vertical-align: middle; overflow:hidden;padding-right:10px;">
			<?php if(!empty($zhicheng)): ?>
				<ul class="nli3">
					<li class="on">职称：</li>
					<li><?php echo $zhicheng; ?></li>
				</ul>
			<?php endif; ?>
			<?php if(!empty($yuanqu)): ?>
				<ul class="nli3">
					<li class="on">所在院区：</li>
					<li><?php echo $yuanqu; ?></li>
				</ul>
			<?php endif; ?>
			<?php if(!empty($zuozhen)): ?>
			<ul class="nli3">
				<li class="on">坐诊时间：</li>
				<li><?php echo $zuozhen; ?></li>
			</ul>
			<?php endif; ?>
			</div>
			</div>
			<div class="skill">
			<ul class="nli3">
				<li class="on"><strong class="cBlack">专业特长：</strong></li>
				<li><?php echo $techang; ?></li>
			</ul>
			</div>
</div>