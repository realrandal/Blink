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
 
<div class="uk-panel-box">

	<h3>
		<?php echo JText::_('COM_KUNENA_VIEW_COMMON_WHO_TITLE'); ?>
	</h3>

	<p>
		<?php echo JText::sprintf('COM_KUNENA_VIEW_COMMON_WHO_TOTAL', $this->membersOnline); ?>
	</p>

	<?php if (!empty($this->onlineList)) : ?>
	<ul class="uk-list users-online">

	<?php foreach ($this->onlineList as $user) : ?>
		<li><?php echo $user->getAvatarImage('user-online-avatar', 67, 67); ?><br>
		<?php echo $user->getLink(); ?></li>
	<?php endforeach; ?>

	</ul>
	<?php endif; ?>

	<?php if (!empty($this->hiddenList)) : ?>
	<ul class="uk-list uk-list-line users-online">
		<li><?php echo JText::_('COM_KUNENA_HIDDEN_USERS'); ?>:</li>

	<?php foreach ($this->hiddenList as $user) : ?>
		<li><?php echo $user->getLink(); ?></li>
	<?php endforeach; ?>

	</ul>
	<?php endif; ?>
		
<button class="uk-button" data-uk-toggle="{target:'#users-legend'}"><?php echo JText::_('COM_KUNENA_LEGEND'); ?></button>
 
	<div id="users-legend" class="uk-hidden">
		<span class="kwho-admin">
			<?php echo JText::_('COM_KUNENA_COLOR_ADMINISTRATOR'); ?>,
		</span>
		<span class="kwho-globalmoderator">
			<?php echo JText::_('COM_KUNENA_COLOR_GLOBAL_MODERATOR'); ?>,
		</span>
		<span class="kwho-moderator">
			<?php echo JText::_('COM_KUNENA_COLOR_MODERATOR'); ?>,
		</span>
		<a class="kwho-user">
			<?php echo JText::_('COM_KUNENA_COLOR_USER'); ?>,
		</a>
		<span class="kwho-banned">
			<?php echo JText::_('COM_KUNENA_COLOR_BANNED'); ?>,
		</span>
		<span class="kwho-guest">
			<?php echo JText::_('COM_KUNENA_COLOR_GUEST'); ?>
		</span>
	</div>   

</div>
