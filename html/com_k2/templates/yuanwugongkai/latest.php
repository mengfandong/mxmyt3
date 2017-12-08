<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addStyleSheet($this->baseurl . '/assets/style/ywgk.css');

?>

<div class="listbox"> 
<?php foreach($this->blocks as $key=>$block): ?>
	<dl class="tbox">
		<dt><strong><a href="<?php echo $block->link; ?>"><?php echo $block->name; ?></a></strong>
		<span class="more"><a href="<?php echo $block->link; ?>">更多...</a></span></dt>
		<dd>
		<div style="height:188px;width:233px;float:left;padding:3px;">
			<img src="<?php echo $block->image; ?>"  height="185" width="230" />
		</div>
		<div style="width:706px;float:right;">
		 <ul class="d1 ico3">
		<?php foreach ($block->items as $item):?>
			  <li><span class="date"><?php echo JHTML::_('date', $item->created , "m-d"); ?></span>
				<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
		<?php endforeach; ?>
		 </ul>
		 </div>
		</dd>
	   </dl>
	<?php endforeach; ?>	   
</div>