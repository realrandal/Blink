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

$this->pagination->setDisplayedPages(3);

?>

<div class="uk-clearfix uk-margin">

	<?php if (!empty($this->topics) && empty($this->subcategories)) : ?>
		<div class="pagination uk-float-right">
			<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>
		</div>
	<?php endif; ?>
	<?php if (!empty($this->embedded)) : ?>
		<form action="<?php echo $this->escape(JUri::getInstance()->toString()); ?>" id="timeselect" name="timeselect"
			method="post" target="_self" class="uk-float-right">
			<?php $this->displayTimeFilter('sel'); ?>
		</form>
	<?php endif; ?>

	<?php if (!empty($this->actions) || !empty($this->embedded)) : ?>
		<button title="Narzędzia moderatora" class="uk-button uk-tip uk-float-left" data-uk-toggle="{target:'.mod-tools', cls:'blink-me'}"><i class="uk-icon-wrench"></i> <i class="uk-icon-caret-down"></i></button>
	<?php endif; ?> 

</div>

<form  action="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=topics'); ?>" method="post" name="ktopicsform" id="ktopicsform" class="uk-form">
	<?php echo JHtml::_('form.token'); ?>

	<?php if (empty($this->topics) && empty($this->subcategories)) : ?>

		<div>
			<?php echo JText::_('COM_KUNENA_VIEW_NO_TOPICS'); ?>
		</div>

	<?php else : ?>

			<div class="uk-navbar category-title-bar">
				<h2 class="category-title">
					<?php echo $this->escape($this->headerText); ?>
					<span class="uk-badge">Tematów: <?php echo $this->pagination->total; ?></span> 
				</h2>					
			</div>

			<div class="topics-headings">
				<?php if (!empty($this->actions)) : ?>
					<span class="topic-checkbox-all mod-tools blink-me"><input class="kcheckall " type="checkbox" name="toggle" value="" /></span>			
				<?php endif; ?>
				<div class="topics-h-box"><span class="topics-h"><i class="uk-icon-file-text-o"></i> Temat</span></div>
				<span class="last-reply-h"><i class="uk-icon-level-up"></i> Ostatnia odpowiedź</span>
				<span class="views-h uk-text-muted">Odsłony</span>
				<span class="replies-h">Odpowiedzi</span>
			</div>				

			<div class="topics-list">
				<?php
				foreach ($this->topics as $i => $topic) {
					echo $this->subLayout('Topic/Row')
					->set('topic', $topic)
					->set('position', 'kunena_topic_' . $i)
					->set('checkbox', !empty($this->actions));
				}
				?>
			</div>
		<?php endif; ?>
		
	</form>

			<?php if (!empty($this->actions) || !empty($this->embedded)) : ?>

				<div class="uk-form uk-panel-box mod-tools blink-me uk-panel-box-primary uk-clearfix uk-margin">
			 		<div class="uk-float-left uk-clearfix">
						<?php if (!empty($this->moreUri)) echo JHtml::_('kunenaforum.link', $this->moreUri, JText::_('COM_KUNENA_MORE'), null, null, 'follow'); ?>
							<?php if (!empty($this->actions)) : ?>
								<?php echo JHtml::_('select.genericlist', $this->actions, 'task', 'class="inputbox kchecktask" size="1"', 'value', 'text', 0, 'kchecktask'); ?>
								<?php if (isset($this->actions['move'])) :
								$options = array (JHtml::_ ( 'select.option', '0', JText::_('COM_KUNENA_BULK_CHOOSE_DESTINATION') ));
								echo JHtml::_('kunenaforum.categorylist', 'target', 0, $options, array(), 'class="inputbox fbs" size="1" disabled="disabled"', 'value', 'text', 0, 'kchecktarget');
								endif;?>
								<input type="submit" name="kcheckgo" class="uk-button" value="<?php echo JText::_('COM_KUNENA_GO') ?>" />
							<?php endif; ?>
					 </div>
					</div>
		 

			<?php endif; ?> 

	<?php if (!empty($this->topics) && empty($this->subcategories)) : ?>
		
		<div class="pagination-bottom uk-margin uk-clearfix">
			<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>
		</div>

		<div class="pagination-buttons uk-container-center uk-clearfix"><?php echo $this->subLayout('Pagination/Buttons')->set('pagination', $this->pagination); ?></div>
		
	<?php endif; ?>