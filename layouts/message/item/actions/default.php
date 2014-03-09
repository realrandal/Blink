<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Message
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$message = $this->message;

?>

<?php if (empty($this->message_closed)) : ?>
	<div class="message-buttons uk-clearfix">

		<button class="uk-button buttons-toggler uk-float-right" data-uk-toggle="{target:'#buttons-<?php echo $this->message->id; ?>'}">...</button>

		<div id="buttons-<?php echo $this->message->id; ?>" class="uk-float-right hidden-buttons uk-hidden">
			
			<?php echo $this->messageButtons->get('reply'); ?>
			<?php echo $this->messageButtons->get('quote'); ?>
			<?php echo $this->messageButtons->get('edit'); ?>

			<?php if ($this->messageButtons->get('moderate')) : ?>
				<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
					<button class="uk-button"><i class="uk-icon-cog"></i> <i class="uk-icon-caret-down"></i></button>
					<div class="uk-dropdown uk-dropdown-small">
						<ul class="uk-nav uk-nav-dropdown">
							<?php echo $this->messageButtons->get('moderate'); ?>
							<?php echo $this->messageButtons->get('delete'); ?>
							<?php echo $this->messageButtons->get('undelete'); ?>
							<?php echo $this->messageButtons->get('permdelete'); ?>
							<?php echo $this->messageButtons->get('publish'); ?>
							<?php echo $this->messageButtons->get('spam'); ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>		
		
		</div>

		<div class="uk-float-right">
		<a data-uk-smooth-scroll href="#qr-<?php echo $message->displayField('id') ?>" class="uk-button add-quick-reply" title="<?php echo JText::_('COM_KUNENA_MESSAGE_ACTIONS_LABEL_QUICK_REPLY_DESC'); ?>"><?php echo JText::_('COM_KUNENA_MESSAGE_ACTIONS_LABEL_QUICK_REPLY'); ?></a>
		<?php echo $this->messageButtons->get('thankyou'); ?>
		</div>

	</div>

<?php else : ?>

<div>
	<?php echo $this->message_closed; ?>
</div>

<?php endif;  ?>