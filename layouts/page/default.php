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
<div id="kunena" class="layout">
	<?php
	// echo $this->subLayout('Widget/MenuBar');
	// echo $this->subLayout('Widget/Module')->set('position', 'kunena_top');
	echo $this->subRequest('Widget/Announcement');
	echo $this->subLayout('Widget/Module')->set('position', 'kunena_announcement');

	// Display current view/layout
	echo $this->content;

	echo $this->subLayout('Widget/Breadcrumb')->set('breadcrumb', $this->breadcrumb);
	echo $this->subLayout('Widget/Module')->set('position', 'kunena_bottom');
	echo $this->subLayout('Widget/Footer');
	?>
</div>
