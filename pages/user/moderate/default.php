<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Pages.User
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$content = $this->execute('User/Ban/Form');

$this->addBreadcrumb(
	$content->headerText,
	'index.php?option=com_kunena&view=user&layout=moderate'
);

echo $content;
