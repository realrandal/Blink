<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Statistics
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;
?>
<?php if ($this->config->showgenstats) : ?>

<div class="uk-panel-box">  

<h2>
	<?php echo JText::_('COM_KUNENA_STAT_FORUMSTATS'); ?>
</h2>

	<?php echo JText::_('COM_KUNENA_STAT_TOTAL_USERS'); ?>:
	<b>

		<?php if ($this->userlistUrl) : ?>
		<a href="<?php echo $this->userlistUrl; ?>"><?php echo $this->memberCount; ?></a>
		<?php else : ?>
		<?php echo $this->memberCount; ?>
		<?php endif; ?>

	</b>

	<?php echo JText::_('COM_KUNENA_STAT_LATEST_MEMBERS'); ?>:
	<b><?php echo $this->latestMemberLink ?></b>

	<br />

	<?php echo JText::_('COM_KUNENA_STAT_TOTAL_MESSAGES'); ?>:
	<b><?php echo (int) $this->messageCount; ?></b>

	<?php echo JText::_('COM_KUNENA_STAT_TOTAL_SUBJECTS'); ?>:
	<b><?php echo (int) $this->topicCount; ?></b>

	<?php echo JText::_('COM_KUNENA_STAT_TOTAL_SECTIONS'); ?>:
	<b><?php echo (int) $this->sectionCount; ?></b>

	<?php echo JText::_('COM_KUNENA_STAT_TOTAL_CATEGORIES'); ?>:
	<b><?php echo (int) $this->categoryCount; ?></b>

	<br />

	<?php echo JText::_('COM_KUNENA_STAT_TODAY_OPEN_THREAD'); ?>:
	<b><?php echo (int) $this->todayTopicCount; ?></b>

	<?php echo JText::_('COM_KUNENA_STAT_YESTERDAY_OPEN_THREAD'); ?>:
	<b><?php echo (int) $this->yesterdayTopicCount; ?></b>

	<?php echo JText::_('COM_KUNENA_STAT_TODAY_TOTAL_ANSWER'); ?>:
	<b><?php echo (int) $this->todayReplyCount; ?></b>

	<?php echo JText::_('COM_KUNENA_STAT_YESTERDAY_TOTAL_ANSWER'); ?>:
	<b><?php echo (int) $this->yesterdayReplyCount; ?></b>
</div>
<?php endif; ?>

<?php foreach ($this->top as $top) : ?>
<h3 class="btn-link">
	<?php echo $top[0]->title; ?>
</h3>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="span1 center">#</th>
			<th class="span5"><?php echo $top[0]->titleName; ?></th>
			<th class="span6"><?php echo $top[0]->titleCount; ?></th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($top as $id => $item) : ?>
		<tr>
			<td class="center">
				<?php echo $id+1; ?>
			</td>
			<td>
				<?php echo $item->link; ?>
			</td>
			<td>
				<div class="progress progress-info">
					<div class="bar" style="width: <?php echo $item->percent; ?>%;"><?php echo $item->count; ?></div>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>

	</tbody>
</table>
<?php endforeach; ?>
