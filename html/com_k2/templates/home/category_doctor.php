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

if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)){
	foreach ($this->item->extra_fields as $key=>$extraField){
	if($extraField->alias == 'zhicheng')
		$zhicheng = $extraField->value;	
	if($extraField->alias == 'yuanqu')
		$yuanqu = $extraField->value;	
	if($extraField->alias == 'techang')
		$techang = $extraField->value;		
} 
}

?>

<div class="g-doctor-item">
<div class="g-doc-baseinfo">
				<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
				<div class="itemImageBlock"> <a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" /> </a> </div>
				<?php endif; ?>
				

	<dl>
		<dt>
			<a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
			&nbsp;&nbsp;<?php echo $zhicheng; ?>
		</dt>
		<dd>
	                <span class="split">  </span>
	                <a href="http://www.guahao.com/department/592e0cf5-2c17-4c1f-8e11-a8630341eace000" onmousedown="return _smartlog(this,'TJZJ')" target="_blank">
	               痛风专病门诊</a>
	    
			<br>
		    <a target="_blank" href="http://www.guahao.com/hospital/8d8b60a2-c887-45fe-976c-7256dca1b2c5000" onmousedown="return _smartlog(this,'TJZJ')" title="青岛大学附属医院市南院区">
				<?php echo $yuanqu; ?>
			</a>
		</dd>
	</dl>
</div>
	<div class="skill">
		<p>擅长：<?php echo $techang; ?></p>
	</div>
</div>
