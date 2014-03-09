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

/** @var KunenaLayout $this */
/** @var KunenaForumTopic $topic */
$topic = $this->topic;
$topicPages = $topic->getPagination(null, KunenaConfig::getInstance()->messages_per_page, 3);

$cols = empty($this->checkbox) ? 5 : 6;

if (!empty($this->spacing)) : ?>
<tr>
	<td colspan="<?php echo $cols; ?>">&nbsp;</td>
</tr>
<?php endif; ?>

<tr>
	<td class="span1 center hidden-phone">
		<strong><?php echo $this->formatLargeNumber($topic->getReplies()); ?></strong>
		<?php echo JText::_('COM_KUNENA_GEN_REPLIES'); ?>
	</td>
	<td class="span1 center hidden-phone">
		<?php echo $this->getTopicLink($topic, 'unread', $topic->getIcon()); ?>
	</td>
	<td>
		
		<div>
			<?php echo $this->getTopicLink($topic); ?>

			<?php
			if ($topic->getUserTopic()->favorite) {
				echo $this->getIcon('kfavoritestar', JText::_('COM_KUNENA_FAVORITE'));
			}

			if ($topic->unread) {
				echo $this->getTopicLink($topic, 'unread', '<sup dir="ltr" class="knewchar">('
					. (int) $topic->unread . ' ' . JText::_('COM_KUNENA_A_GEN_NEWCHAR') . ')</sup>');
			}

			if ($topic->locked != 0) {
				echo $this->getIcon('ktopiclocked', JText::_('COM_KUNENA_LOCKED_TOPIC'));
			}
			?>
		<?php if ($topic->attachments) echo $this->getIcon('icon-flag-2', JText::_('COM_KUNENA_ATTACH')); ?>
		<?php if ($topic->poll_id) echo $this->getIcon('icon-bars', JText::_('COM_KUNENA_ADMIN_POLLS')); ?>
		</div>
		<div>
			<?php echo JText::sprintf('COM_KUNENA_CATEGORY_X', $this->getCategoryLink($topic->getCategory())); ?>
		</div>
		<div title="<?php echo $topic->getFirstPostTime()->toKunena('config_post_dateformat_hover'); ?>">
			<?php echo JText::_('COM_KUNENA_TOPIC_STARTED_ON') . ' '
				. $topic->getFirstPostTime()->toKunena('config_post_dateformat'); ?>
			<?php echo JText::_('COM_KUNENA_BY') . ' ' . $topic->getFirstPostAuthor()->getLink(); ?>
		</div>

		<div class="uk-float-right">
			<?php echo $this->subLayout('Pagination/List')->set('pagination', $topicPages)->setLayout('simple'); ?>
		</div>
	</td>
	<td class="span1 center hidden-phone">
		<?php echo $this->formatLargeNumber($topic->hits); ?>
		<?php echo JText::_('COM_KUNENA_GEN_HITS');?>
	</td>
	
		<?php if (!empty($topic->avatar)) : ?>
	<td class="span1 center hidden-phone">
		<?php echo $topic->getLastPostAuthor()->getLink($topic->avatar); ?>
	</td>
		<?php endif; ?>
	
	<td>
		<?php
			echo $this->getTopicLink($topic, 'last');
			echo ' ' . JText::_('COM_KUNENA_BY') . ' ' . $topic->getLastPostAuthor()->getLink();
		?>
		<br />
		<span title="<?php echo $topic->getLastPostTime()->toKunena('config_post_dateformat_hover'); ?>">
			<?php echo $topic->getLastPostTime()->toKunena('config_post_dateformat'); ?>
		</span>
	</td>

	<?php if (!empty($this->checkbox)) : ?>
	<td class="span1 center">
		<label>
			<input class="kcheck" type="checkbox" name="topics[<?php echo $topic->displayField('id'); ?>]" value="1" />
		</label>
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

