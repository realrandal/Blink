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

// TODO: Hide KunenaHtmlParser::parseText()
?>
<div class="uk-float-right uk-button btn-small" data-toggle="collapse" data-target="#poll-vote">&times;</div>
<h2>
	<?php echo JText::_('COM_KUNENA_POLL_NAME') . ' ' . KunenaHtmlParser::parseText($this->poll->title); ?>
</h2>

<div class="collapse in" id="poll-vote">
<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=topic'); ?>" method="post">
	<input type="hidden" name="task" value="vote" />
	<input type="hidden" name="catid" value="<?php echo $this->topic->category_id; ?>" />
	<input type="hidden" name="id" value="<?php echo $this->topic->id; ?>" />
	<?php echo JHtml::_('form.token'); ?>

	<div class="well">
		<ul class="unstyled">

			<?php foreach ($this->poll->getOptions() as $key => $poll_option) : ?>
			<li>
				<label>
					<input class="kpoll-boxvote" type="radio" name="kpollradio"
					       id="radio_name<?php echo (int) $key; ?>"
					       value="<?php echo (int) $poll_option->id; ?>"
					<?php if ($this->voted && $this->voted->lastvote == $poll_option->id) echo 'checked="checked"'; ?> />
					<?php echo KunenaHtmlParser::parseText($poll_option->text); ?>
				</label>
			</li>
			<?php endforeach; ?>

		</ul>

		<input id="kpoll-button-vote" class="uk-button btn-success" type="submit"
		       value="<?php echo $this->voted && $this->config->pollallowvoteone
			       ? JText::_('COM_KUNENA_POLL_BUTTON_CHANGEVOTE')
			       : JText::_('COM_KUNENA_POLL_BUTTON_VOTE'); ?>" />
	</div>
</form>
</div>
