<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Announcement
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$options = $this->getOptions();
?>

<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=announcement'); ?>" method="post"
      id="adminForm" name="adminForm">
	<input type="hidden" name="boxchecked" value="0" />
	<?php echo JHtml::_( 'form.token' ); ?>

	<h2>
		<?php echo JText::_('COM_KUNENA_ANN_ANNOUNCEMENTS'); ?>

		<?php if (!empty($options)) : ?>
			<div class="btn-toolbar pull-right">
				<div class="uk-button-group input-append">
					<?php echo JHtml::_('select.genericlist', $options, 'task', '', 'value', 'text', 0, 'kchecktask'); ?>
					<input type="submit" name="kcheckgo" class="uk-button" value="<?php echo JText::_('COM_KUNENA_GO') ?>" />
				</div>
				<div class="uk-button-group input-append">
					<a class="uk-button btn-small"
					   href="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=announcement&layout=create'); ?>">
						<?php echo JText::_('COM_KUNENA_ANNOUNCEMENT_ACTIONS_LABEL_ADD'); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>

	</h2>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th class="span1">
					<?php echo JText::_('COM_KUNENA_ANN_DATE'); ?>
				</th>
				<th class="span4">
					<?php echo JText::_('COM_KUNENA_ANN_TITLE'); ?>
				</th>

				<?php if ($options): ?>
				<th class="span1 center">
					<?php echo JText::_('COM_KUNENA_ANN_PUBLISH'); ?>
				</th>
				<th class="span1 center">
					<?php echo JText::_('COM_KUNENA_ANN_EDIT'); ?>
				</th>
				<th class="span1 center">
					<?php echo JText::_('COM_KUNENA_ANN_DELETE'); ?>
				</th>
				<th class="span3">
					<?php echo JText::_('COM_KUNENA_ANNOUNCEMENT_AUTHOR'); ?>
				</th>
				<?php endif; ?>

				<th class="span1 center">
					<?php echo JText::_('COM_KUNENA_ANN_ID'); ?>
				</th>

				<?php if ($options): ?>
				<th class="span1 center">
					<input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this);" />
				</th>
				<?php endif; ?>

			</tr>
		</thead>

		<tfoot>
			<tr>
				<td colspan="<?php echo $options ? 8 : 3; ?>">
					<div class="uk-float-right">
						<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>
					</div>
				</td>
			</tr>
		</tfoot>

		<tbody>

			<?php
			foreach ($this->announcements as $row => $announcement)
				echo $this->subLayout('Announcement/List/Row')
					->set('announcement', $announcement)
					->set('row', $row)
					->set('checkbox', !empty($options));
			?>

		</tbody>
	</table>
</form>
