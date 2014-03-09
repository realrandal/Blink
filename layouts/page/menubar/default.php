<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Page
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;
?>
<div class="navbar">
	<div class="navbar-inner">
		<div class="hidden-phone">
			<?php echo $this->subRequest('Page/Menu'); ?>
			<?php echo $this->subRequest('Page/Login'); ?>
		</div>
		<div class="visible-phone hidden-tablet">
			<?php echo $this->subLayout('Page/Mobile/Login'); ?>
		</div>
	</div>
</div>
