<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Pages.Category
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$content = $this->execute('Category/Index');

$this->addBreadcrumb(
	JText::_('COM_KUNENA_VIEW_CATEGORIES_DEFAULT'),
	'index.php?option=com_kunena&view=category&layout=list'
);

echo $content; ?>

<div class="uk-grid">
<div class="uk-width-medium-6-10"><?php echo $this->subRequest('Statistics/WhoIsOnline'); ?></div>
<div class="uk-width-medium-4-10"><?php echo $this->subRequest('Page/Statistics'); ?></div>
</div>