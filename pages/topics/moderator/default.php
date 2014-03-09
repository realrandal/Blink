<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Pages.Topics
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$content = $this->execute('Topic/List/Moderator')
	->setLayout('moderator');

$this->addBreadcrumb(
	$content->headerText,
	'index.php?option=com_kunena&view=topics&layout=moderator'
);

echo $content;
