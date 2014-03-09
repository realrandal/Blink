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

/** @var KunenaLayout $this */
/** @var KunenaForumMessage $message */
$message = $this->message;
$author = $message->getAuthor();
$topic = $message->getTopic();
$isReply = $message->id != $topic->first_post_id;

$config = KunenaFactory::getConfig();
$cols = empty($this->checkbox) ? 4 : 5;
?>
<tr>
	<td class="span1 hidden-phone">
		<?php echo $this->getTopicLink($topic, 'unread', $topic->getIcon()); ?>
	</td>
	<td class="span4">
		<?php
		// FIXME:
		/*if ($message->attachments) {
			echo $this->getIcon('ktopicattach', JText::_('COM_KUNENA_ATTACH'));
		}*/
		?>
		<div>
			<?php echo $this->getTopicLink(
				$topic, $message, ($isReply ? JText::_('COM_KUNENA_RE').' ' : '') . $message->displayField('subject')
			); ?>
		</div>
	</td>
	<td class="span3">
		<div>
			<?php
			echo $this->getTopicLink($topic);

			if ($topic->getUserTopic()->favorite) {
				echo $this->getIcon ('kfavoritestar', JText::_('COM_KUNENA_FAVORITE'));
			}

			if ($topic->unread) {
				echo $this->getTopicLink($topic, 'unread', '<sup dir="ltr">(' . (int) $topic->unread
					. ' ' . JText::_('COM_KUNENA_A_GEN_NEWCHAR') . ')</sup>');
			}

			if ($topic->locked != 0) {
				echo $this->getIcon ('ktopiclocked', JText::_('COM_KUNENA_LOCKED_TOPIC'));
			}
			?>
		</div>
		<div>
			<?php echo JText::sprintf('COM_KUNENA_CATEGORY_X', $this->getCategoryLink($topic->getCategory())); ?>
		</div>
	</td>
	<td class="span4">
		<div>
			<?php
			if ($config->avataroncat > 0) {
				$avatar = $author->getAvatarImage('klist-avatar', 'list');

				if ($avatar)
				{
					echo $author->getLink($avatar);
				}
			}
			?>
			<span title="<?php echo KunenaDate::getInstance($message->time)->toKunena('config_post_dateformat_hover'); ?>">
				<?php echo JText::_('COM_KUNENA_POSTED_AT')
					. ' ' . KunenaDate::getInstance($message->time)->toKunena('config_post_dateformat'); ?>
			</span>

			<?php if ($message->userid) : ?>
			<br />
			<span><i class="uk-icon-user"></i><?php echo JText::_('COM_KUNENA_BY') . ' ' . $message->getAuthor()->getLink(); ?></span>
			<?php endif; ?>

		</div>
	</td>

	<?php if (!empty($this->checkbox)) : ?>
	<td class="span1">
		<input class ="kcheck" type="checkbox" name="posts[<?php echo $message->id?>]" value="1" />
	</td>
	<?php endif; ?>

	<?php
	if (!empty($this->position))
		echo $this->subLayout('Page/Module')
			->set('position', $this->position)
			->set('cols', $cols)
			->setLayout('table_row');
	?>
</tr>
