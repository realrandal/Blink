<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Pagination
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$item = $this->item;

if (!is_null($item->base))
{
	// Check if the item can be clicked.
	$limit = 'limitstart.value=' . (int) $item->base;
	echo '<a class="uk-button uk-button-success uk-button-large" href="' . $item->link . '" title="' . $item->text . '">' . $item->text . '</a>';
}
elseif (!empty($item->active))
{
	// Check if the item is the active (or current) page.
	echo '<li class="uk-active uk-button-primary uk-button-large"><a>' . $item->text . '</a></li>';
}
else
{
 
}