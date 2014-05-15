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

	<?php if ($this->profile->isAuthorised('edit')) : ?>
	<?php echo $this->profile->getLink(
		'<i class="uk-icon-pencil"></i> ' . JText::_('COM_KUNENA_EDIT'),
		JText::_('COM_KUNENA_EDIT_PROFILE'), 'nofollow', 'edit', 'uk-button uk-float-right'
	); ?>
	<?php endif; ?>

<h2>
	<?php echo JText::_('COM_KUNENA_USER_PROFILE'); ?>
	<?php echo $this->escape($this->profile->getName()); ?>
</h2>

<?php
echo $this->subLayout('User/Item/Summary')
	->set('profile', $this->profile)
	->set('config', $this->config);
?>

<div class="tabs hidden-phone">
 <br />
<br />

	<ul class="nav nav-tabs">

		<?php foreach ($tabs as $name => $tab) : ?>
		<li<?php echo $tab->active ? ' class="active"' : ''; ?>>
			<a href="#<?php echo $name; ?>" data-toggle="tab"><?php echo $tab->title; ?></a>
		</li>
		<?php endforeach; ?>

	</ul>
	<div class="tab-content">

		<?php foreach ($tabs as $name => $tab) : ?>
		<div class="tab-pane fade<?php echo $tab->active ? ' in active' : ''; ?>" id="<?php echo $name; ?>">
			<div>
				<?php echo $tab->content; ?>
			</div>
		</div>
		<?php endforeach; ?>

	</div>
</div>

<div class="clearfix"></div>
