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

 
		<?php
		// echo $this->subLayout('Pagination/Item')->set('item', $data->start);
		echo $this->subLayout('Pagination/Buttons')->setLayout('prev')->set('item', $data->previous);
		echo $this->subLayout('Pagination/Buttons')->setLayout('next')->set('item', $data->next);
		// echo $this->subLayout('Pagination/Item')->set('item', $data->end);
		?>
 



