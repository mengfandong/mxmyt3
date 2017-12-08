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

?>

  <li><span class="date"><?php echo JHTML::_('date', $this->item->created , "m-d"); ?></span>
  <a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a></li>