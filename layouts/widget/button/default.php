<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Widget
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$label = JText::_("COM_KUNENA_BUTTON_{$this->scope}_{$this->name}");
$title = JText::_("COM_KUNENA_BUTTON_{$this->scope}_{$this->name}_LONG");
if ($title == "COM_KUNENA_BUTTON_{$this->scope}_{$this->name}_LONG") $title = '';
$id = isset($this->id) ? ' id="'.$this->id.'"' : '';
$primary = !empty($this->primary) ? ' uk-button-success' : '';
?>
<a<?php echo $id; ?> class="uk-button <?php echo $primary; ?>" href="<?php echo $this->url; ?>" rel="nofollow"
   title="<?php echo $title; ?>">
	<span class="<?php echo $this->name; ?>"></span>
	<?php echo $label; ?>
</a>
