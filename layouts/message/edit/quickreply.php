<?php
/**
 * Kunena Component
 * @package Kunena.Template.Blink
 * @subpackage Topic
 *
 * @copyright (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

/** @var KunenaLayout $this */

/** @var KunenaForumMessage  $message  Message to reply to. */
$message = $this->message;
/** @var KunenaUser  $author  Author of the message. */
$author = isset($this->author) ? $this->author : $message->getAuthor();
/** @var KunenaForumTopic  $topic Topic of the message. */
$topic = isset($this->topic) ? $this->topic : $message->getTopic();
/** @var KunenaForumCategory  $category  Category of the message. */
$category = isset($this->category) ? $this->category : $message->getCategory();
/** @var KunenaConfig  $config  Kunena configuration. */
$config = isset($this->config) ? $this->config : KunenaFactory::getConfig();
/** @var KunenaUser  $me  Current user. */
$me = isset($this->me) ? $this->me : KunenaUserHelper::getMyself();
?>

<div id="qr-<?php echo $message->displayField('id') ?>" class="quick-reply blink-me">
	<div class="quick-reply-header">
		<a class="close-this-reply uk-close uk-float-right"></a>
		<h3 class="quick-reply-heading"><i class="uk-icon-hand-o-right"></i> Odpowiedź do <?php echo $author->getLink() ?></h3>
	</div>
	<form class="uk-form" action="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=topic') ?>" method="post" enctype="multipart/form-data" name="postform" id="postform">
		<input type="hidden" name="task" value="post" />
		<input type="hidden" name="parentid" value="<?php echo $message->displayField('id') ?>" />
		<input type="hidden" name="catid" value="<?php echo $category->displayField('id') ?>" />
		<?php echo JHtml::_( 'form.token' ) ?>

		<?php if ($me->exists() && $category->allow_anonymous): ?>
		<input type="text" name="authorname" size="35"   maxlength="35" value="<?php echo $this->escape($me->getName()) ?>" />
		<input type="checkbox" id="kanonymous<?php echo $message->displayField('id') ?>" name="anonymous" value="1" class="kinputbox postinput" <?php if ($category->post_anonymous) echo 'checked="checked"'; ?> />
		<label for="kanonymous<?php echo intval($message->id) ?>"><?php echo JText::_('COM_KUNENA_POST_AS_ANONYMOUS_DESC') ?></label>
		<?php else: ?>
		<input type="hidden" name="authorname" value="<?php echo $this->escape($me->getName()) ?>" />
		<?php endif; ?>
		<input type="text" name="subject" placeholder="Tytuł wiadomości..." size="35" class="uk-clearfix uk-width-1-1 uk-width-medium-7-10" maxlength="<?php echo intval($config->maxsubject); ?>" value="<?php echo $message->displayField('subject') ?>" />
		<textarea class="uk-clearfix uk-width-1-1 uk-margin uk-margin-small-top quick-reply-textarea" name="message" placeholder="Wpisz swoją odpowiedź..." rows="6" cols="60"></textarea>
		<?php if ($topic->authorise('subscribe')) : ?>
		<div class="uk-clearfix">
			<input type="checkbox" id="subscribe-<?php echo $message->displayField('id') ?>" name="subscribeMe" value="1" <?php echo ($config->subscriptionschecked == 1) ? : '' ?> />
			<label for="subscribe-<?php echo $message->displayField('id') ?>"><?php echo JText::_('COM_KUNENA_POST_NOTIFIED'); ?></label>
		</div>
		<?php endif; ?>

		<div class="uk-margin">
			<input type="submit" class="uk-button uk-button-primary kreply-submit" name="submit" value="<?php echo JText::_('COM_KUNENA_SUBMIT') ?>" title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_SUBMIT'));?>" />
			lub <a class="close-this-reply uk-text-danger" title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_CANCEL'));?>"><?php echo JText::_('COM_KUNENA_CANCEL') ?></a>
		</div>
	</form>
</div>
