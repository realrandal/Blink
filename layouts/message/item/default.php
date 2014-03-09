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

$isReply = $this->message->id != $this->topic->first_post_id;
$signature = $this->profile->getSignature();
$attachments = $this->message->getAttachments();
?>

<div id="<?php echo $this->message->id ?>" class="topic-<?php echo (!$isReply) ? 'start' : 'reply'; ?> uk-clearfix">

	<div class="uk-float-right uk-text-muted uk-text-small message-date">
	
 	<time class="timeago" datetime="<?php echo $this->message->getTime()->toISO8601(); ?>"><?php echo $this->message->getTime()->toKunena('config_post_dateformat'); ?></time>

	<a data-uk-smooth-scroll class="uk-tip-slow" title="Link do tej wiadomości" href="#<?php echo $this->message->id; ?>"><i class="uk-icon-chain"></i><?php // TODO: FIX IT always output real message ID echo $this->location; ?></a>

	</div>


	<?php if ($this->topic->subject != $message->subject) : ?>

		<?php if ($isReply) : ?>
			<h3 class="message-title uk-hidden uk-clearfix">
				<?php if ($this->message->subject) : ?>
					<?php echo $this->message->displayField('subject'); ?>
				<?php endif; ?>
			</h3>
		<?php endif; ?>

	<?php endif; ?>
	
	<div class="message-content">
		<?php echo $this->message->displayField('message'); ?>
	</div>

	<?php if (!empty($attachments)) : ?>
	<b>
		<?php echo JText::_('COM_KUNENA_ATTACHMENTS'); ?>
	</b>

	<ul class="uk-list attachments uk-clearfix">
		<?php foreach($attachments as $attachment) : ?>
			<li class="attachment">
				<div class="attachment-thumbnail">
					<?php echo $attachment->getThumbnailLink(); ?>
				</div>
					<?php echo $attachment->getTextLink(); ?>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php endif; ?>

	<?php if(!empty($this->thankyou)): ?>
		<div class="uk-clearfix">		
			<div class="message-thanks">
				<?php
				echo JText::_('COM_KUNENA_THANKYOU_BLINK').' '.implode(', ', $this->thankyou).' ';
				if ($this->more_thankyou) echo JText::sprintf('COM_KUNENA_THANKYOU_MORE_USERS_BLINK',$this->more_thankyou);
				?>
			</div>
		</div>
	<?php endif; ?>

<!-- 	<?php if (!empty($this->reportMessageLink)) : ?>
		<li>
			<i class="icon-warning"></i>
			<?php echo $this->reportMessageLink; ?>
		</li>
	<?php endif; ?>

	<?php if (!empty($this->ipLink)) : ?>
		<li>
			<?php echo $this->ipLink; ?>
		</li>
	<?php endif; ?> -->

	<?php if ($signature) : ?>
	<div class="message-signature uk-clearfix"><?php echo $signature; ?></div>
	<?php endif ?> 
 
</div>
