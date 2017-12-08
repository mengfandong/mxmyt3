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

<li>
<em><?php echo JHTML::_('date', $this->item->created, JText::_('m-d')); ?></em><a href="<?php echo $this->item->link; ?>" target="_blank" title="<?php echo $this->item->title; ?>" ><?php echo $this->item->title; ?></a>

</li> 
