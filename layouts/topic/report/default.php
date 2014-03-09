<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Topic
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;
?>

<h2>
	<?php echo JText::_('COM_KUNENA_REPORT_TO_MODERATOR'); ?>
</h2>

<form method="post" action="<?php echo KunenaRoute::_('index.php?option=com_kunena'); ?>" class="form-horizontal">
	<input type="hidden" name="view" value="topic" />
	<input type="hidden" name="task" value="report" />
	<input type="hidden" name="catid" value="<?php echo (int) $this->category->id; ?>" />
	<input type="hidden" name="id" value="<?php echo (int) $this->topic->id; ?>" />

	<?php if ($this->message) : ?>
	<input type="hidden" name="mesid" value="<?php echo (int) $this->message->id; ?>" />
	<?php endif; ?>

	<?php echo JHtml::_('form.token'); ?>

	<div class="uk-panel-box">
		<div class="control-group">
			<label class="control-label" for="kreport-reason">
				<?php echo JText::_('COM_KUNENA_REPORT_REASON'); ?>
			</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" name="reason" size="30" id="kreport-reason"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="kreport-msg">
				<?php echo JText::_('COM_KUNENA_REPORT_MESSAGE'); ?>
			</label>
			<div class="controls">
				<textarea class="input-xxlarge" id="kreport-msg" name="text" cols="40" rows="10"></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input class="uk-button btn-primary" type="submit" name="Submit"
				       value="<?php echo JText::_('COM_KUNENA_REPORT_SEND'); ?>"/>
				<input class="uk-button" onclick="window.history.back()" type="button" name="button"
				       value="<?php echo JText::_('COM_KUNENA_BACK'); ?>"/>
			</div>
		</div>
	</div>
</form>

