<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Crypsis
 * @subpackage  Layout.User
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;
?>
<h3>
	<?php echo $this->headerText; ?>
</h3>

<ul class="uk-list">
		<?php foreach ($this->settings as $field) : ?>
			<li>
				<label>
					<?php echo $field->label; ?>
				</label>
				<?php echo $field->field; ?>
			</li>
		<?php endforeach ?>
</ul>
