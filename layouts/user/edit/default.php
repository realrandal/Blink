<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Crypsis
 * @subpackage  Layout.User
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;
?>

	<?php echo $this->profile->getLink(
		'<i class="uk-icon-arrow-left"></i> ' . JText::_('COM_KUNENA_BACK'),
		JText::_('COM_KUNENA_BACK'), 'nofollow', '', 'uk-button uk-float-right'
	); ?>

<h2>
	<?php echo JText::_('COM_KUNENA_USER_PROFILE'); ?> <?php echo $this->escape($this->profile->getName()); ?>
</h2>

<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=user'); ?>" method="post" enctype="multipart/form-data" name="kuserform" class="form-validate uk-form" id="kuserform">
	<input type="hidden" name="task" value="save" />
	<input type="hidden" name="userid" value="<?php echo (int) $this->user->id; ?>" />
	<?php echo JHtml::_('form.token'); ?>


	<div class="blink-tabs">
		<ul class="uk-tab" data-uk-tab="{connect:'#KunenaUserEdit'}">
			<li class="uk-active">
				<a href="#home">
					<?php echo JText::_('COM_KUNENA_PROFILE_EDIT_USER'); ?>
				</a>
			</li>
			<li>
				<a href="#editprofile">
					<?php echo JText::_('COM_KUNENA_PROFILE_EDIT_PROFILE'); ?>
				</a>
			</li>
<!-- 			<li>
				<a href="#editavatar">
					<?php echo JText::_('COM_KUNENA_PROFILE_EDIT_AVATAR'); ?>
				</a>
			</li> -->
			<li>
				<a href="#editsettings">
					<?php echo JText::_('COM_KUNENA_PROFILE_EDIT_SETTINGS'); ?>
				</a>
			</li>
		</ul>

		<ul id="KunenaUserEdit" class="uk-switcher uk-margin">
			<li class="" id="home">
				<?php echo $this->subRequest('User/Edit/User'); ?>
			</li>
			<li class="" id="editprofile">
				<?php echo $this->subRequest('User/Edit/Profile'); ?>
			</li>
			<!-- 		DISABLED TMP TODO	
			<li class="" id="editavatar">
				<?php // echo $this->subRequest('User/Edit/Avatar'); ?>
			</li> -->
			<li class="" id="editsettings">
				<?php echo $this->subRequest('User/Edit/Settings'); ?>
			</li>
		</ul>
	</div>

					<button class="uk-button uk-button-primary " type="submit">
					<?php echo JText::_('COM_KUNENA_SAVE'); ?>
				</button>
				<input type="button" name="cancel" class="uk-button"
				       value="<?php echo (' ' . JText::_('COM_KUNENA_CANCEL') . ' '); ?>"
				       onclick="window.history.back();"
				       title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_CANCEL')); ?>" />
</form>
