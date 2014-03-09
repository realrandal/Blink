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

$data = $this->pagination->getData();
if (count($data->pages) <= 1) return;
$last = 0;
?>

	<ul class="uk-pagination blink-pagination-simple">
		<?php
		foreach($data->pages as $k=>$item)
		{
			if ($last+1 != $k)
			{
				echo '<li class="uk-disabled"><span>...</span></li>';
			}

			$last = $k;

			if (!is_null($item->base))
			{
				// Check if the item can be clicked.
				$limit = 'limitstart.value=' . (int) $item->base;
				echo '<li><a href="' . $item->link . '" title="' . $item->text . '">' . $item->text . '</a></li>';
			}
			elseif (!empty($item->active))
			{
				// Check if the item is the active (or current) page.
				echo '<li class="uk-active"><span>' . $item->text . '</span></li>';
			}
			else
			{
				// Doesn't match any other condition, render disabled item.
				echo '<li class="uk-disabled"><span>' . $item->text . '</span></li>';
			}
		}
		?>
	</ul>