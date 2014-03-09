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

$colspan = empty($this->actions) ? 4 : 5;
?>
<?php if (!empty($this->embedded)) : ?>
<form action="<?php echo $this->escape(JUri::getInstance()->toString()); ?>" id="timeselect" name="timeselect"
      method="post" target="_self" class="uk-float-right">
	<?php $this->displayTimeFilter('sel'); ?>
</form>
<?php endif; ?>

<h3>
	<?php echo $this->headerText; ?>
	<span class="uk-badge badge-info"><?php echo (int) $this->pagination->total; ?></span>
</h3>

<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=topics'); ?>" method="post"
      name="ktopicsform" id="ktopicsform">
	<?php echo JHtml::_('form.token'); ?>
 
		<?php if (empty($this->messages)) : ?>
 
			<div colspan="<?php echo $colspan; ?>">
				<?php echo JText::_('COM_KUNENA_NO_POSTS') ?>
 </div>
		<?php else : ?>
		<?php if (!empty($this->embedded)) : ?>
 
 
						<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>
 

				<?php if (!empty($this->actions)) : ?>
		 
						<input class="kcheckall" type="checkbox" name="toggle" value="" />
			 
				<?php endif; ?>

 
		<?php endif; ?>

		<?php if (!empty($this->actions)) : ?>
 
					<?php
					if (!empty($this->moreUri)) {
						echo JHtml::_('kunenaforum.link', $this->moreUri, JText::_('COM_KUNENA_MORE'), null, null, 'follow');
					}
					?>

					<?php if (!empty($this->actions)) : ?>
						<?php echo JHtml::_(
							'select.genericlist', $this->actions, 'task', 'class="inputbox kchecktask" size="1"',
							'value', 'text', 0, 'kchecktask'
						); ?>
						<input type="submit" name="kcheckgo" class="uk-button" value="<?php echo JText::_('COM_KUNENA_GO') ?>" />
					<?php endif; ?>
 
		<?php endif; ?>

 
			<?php
			foreach ($this->messages as $i => $message)
				echo $this->subLayout('Message/Row')
					->set('message', $message)
					->set('position', $i)
					->set('checkbox', !empty($this->actions));
			?>
 
		<?php endif; ?>
 
</form>
