<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Page
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;
?>


 
	<div class="uk-panel-box module-stats">
 
<h3>

	<?php if ($this->statisticsUrl) : ?>
	<a href="<?php echo $this->statisticsUrl; ?>">
		<?php echo $this->config->board_title . ' ' . JText::_('COM_KUNENA_STAT_FORUMSTATS'); ?>
	</a>
	<?php else : ?>
	<?php echo JText::_('COM_KUNENA_STAT_FORUMSTATS'); ?>
	<?php endif; ?>
 
</h3>

	
	<div class="stats-content">
		<ul class="uk-list">
			<li>
				<?php echo JText::_('COM_KUNENA_STAT_TOTAL_MESSAGES'); ?>:
				<strong><?php echo (int) $this->messageCount; ?></strong>
				<span class="divider">|</span>
				<?php echo JText::_('COM_KUNENA_STAT_TOTAL_SUBJECTS'); ?>:
				<strong><?php echo (int) $this->topicCount; ?></strong>
			</li>
			<li>
				<?php echo JText::_('COM_KUNENA_STAT_TOTAL_SECTIONS'); ?>:
				<strong><?php echo (int) $this->sectionCount; ?></strong>
				<span class="divider">|</span>
				<?php echo JText::_('COM_KUNENA_STAT_TOTAL_CATEGORIES'); ?>:
				<strong><?php echo (int) $this->categoryCount; ?></strong>
			</li>
			<li>
				<?php echo JText::_('COM_KUNENA_STAT_TODAY_OPEN_THREAD'); ?>:
				<strong><?php echo (int) $this->todayTopicCount; ?></strong>
				<span class="divider">|</span>
				<?php echo JText::_('COM_KUNENA_STAT_YESTERDAY_OPEN_THREAD'); ?>:
				<strong><?php echo (int) $this->yesterdayTopicCount; ?></strong>
			</li>
			<li>
				<?php echo JText::_('COM_KUNENA_STAT_TODAY_TOTAL_ANSWER'); ?>:
				<strong><?php echo (int) $this->todayReplyCount; ?></strong>
				<span class="divider">|</span>
				<?php echo JText::_('COM_KUNENA_STAT_YESTERDAY_TOTAL_ANSWER'); ?>:
				<strong><?php echo (int) $this->yesterdayReplyCount; ?></strong>
			</li>
		</ul>
		<ul class="uk-list">
			<li>
				<?php echo JText::_('COM_KUNENA_STAT_TOTAL_USERS'); ?>:

				<?php if ($this->userlistUrl) : ?>
				<strong><a href="<?php echo $this->userlistUrl; ?>"><?php echo $this->memberCount; ?></a></strong>
				<?php else : ?>
				<strong><?php echo $this->memberCount; ?></strong>
				<?php endif; ?>

				<span class="divider">|</span>
				<?php echo JText::_('COM_KUNENA_STAT_LATEST_MEMBERS'); ?>:

				<strong><?php echo $this->latestMemberLink; ?></strong>
			</li>
			<li>
				&nbsp;
			</li>

			<?php if ($this->userlistUrl) : ?>
			<li>
				<a href="<?php echo $this->userlistUrl; ?>">
					<?php echo JText::_('COM_KUNENA_STAT_USERLIST').' &raquo;'; ?>
				</a>
			</li>
			<?php endif; ?>

			<?php if ($this->statisticsUrl) : ?>
			<li>
				<a href="<?php echo $this->statisticsUrl; ?>">
					<?php echo JText::_('COM_KUNENA_STAT_MORE_ABOUT_STATS').' &raquo;'; ?>
				</a>
			</li>
			<?php endif; ?>

		</ul>
	</div>
 
 
</div>
