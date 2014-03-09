<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Pages.Topic
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$content = $this->request('Topic/Poll')
	->setProperties(array('alwaysVote'=>true))
	->execute();

// Display breadcrumb path to the current category / topic / message / report.
$parents = KunenaForumCategoryHelper::getParents($content->category->id);
$parents[] = $content->category;

/** @var KunenaForumCategory $parent */
foreach ($parents as $parent)
{
	$this->addBreadcrumb(
		$parent->displayField('name'),
		$parent->getUri()
	);
}

$this->addBreadcrumb(
	JText::_('COM_KUNENA_MENU_TOPIC'),
	$content->topic->getUri()
);
$this->addBreadcrumb(
	JText::_('COM_KUNENA_POLL_STATS_NAME'),
	$content->uri
);

echo $content;
