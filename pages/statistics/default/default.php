<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Pages.Statistics
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$content = $this->execute('Statistics/General');

$this->addBreadcrumb(
	JText::_('COM_KUNENA_MENU_STATISTICS'),
	'index.php?option=com_kunena&view=statistics&layout=default'
);

echo $content;
echo $this->subRequest('Statistics/WhoIsOnline');
