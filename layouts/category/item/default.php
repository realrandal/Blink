<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Category
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$categoryActions = $this->getCategoryActions();
?>

<?php if ($this->category->headerdesc) : ?>
	<div class="alert alert-info">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<?php echo $this->category->displayField('headerdesc'); ?>
	</div>
<?php endif; ?>

<?php if (!$this->category->isSection()) : ?>


	<form class="uk-form" action="<?php echo KunenaRoute::_('index.php?option=com_kunena'); ?>" method="post">
		<input type="hidden" name="view" value="topics" />
		<?php echo JHtml::_( 'form.token' ); ?>

		<?php if (empty($this->topics)) : ?>
			<div class="alert">
				<?php echo JText::_('COM_KUNENA_VIEW_NO_TOPICS') ?>
			</div>

		<?php else : ?>

			<section class="category-topics">
				<header class="category-tools">				
					<div class="uk-clearfix uk-margin">

						<?php if ($categoryActions) : ?>
							<?php echo implode($categoryActions); ?>
						<?php endif; ?>

						<?php if (!empty($this->topicActions) || !empty($this->embedded)) : ?>
							<a href="#tools" title="Narzędzia moderatora" class="uk-button uk-tip" data-uk-toggle="{target:'.mod-tools', cls:'blink-me'}"><i class="uk-icon-wrench"></i> <i class="uk-icon-caret-down"></i></a>
						<?php endif; ?>

						<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>

 						<?php // FIXME: $this->displayCategoryActions() ?>

						<div class="mod-tools blink-me">
							<?php if (!empty($this->topicActions) || !empty($this->embedded)) : ?>

								<?php if (!empty($this->moreUri)) echo JHtml::_('kunenaforum.link', $this->moreUri,
								JText::_('COM_KUNENA_MORE'), null, null, 'follow'); ?>

								<?php if (!empty($this->topicActions)) : ?>
									<?php echo JHtml::_('select.genericlist', $this->topicActions, 'task',
									'class="inputbox kchecktask" size="1"', 'value', 'text', 0, 'kchecktask'); ?>

									<?php if ($this->actionMove) :
									$options = array (
										JHtml::_('select.option', '0', JText::_('COM_KUNENA_BULK_CHOOSE_DESTINATION'))
										);
									echo JHtml::_('kunenaforum.categorylist', 'target', 0, $options, array(),
										'size="1" disabled="disabled"', 'value', 'text', 0,
										'kchecktarget');
										?>
										<button class="uk-button" name="kcheckgo" type="submit"><?php echo JText::_('COM_KUNENA_GO') ?></button>
									<?php endif; ?>

								<?php endif; ?>

							<?php endif; ?>
						</div>		
</div>	

					<div class="category-title-bar uk-navbar">
						<h2 class="category-title"><?php echo $this->escape($this->headerText); ?></h2></div>				
					</header>

					<div class="topics-headings">
						<div class="topics-h-box">
							<?php if (!empty($this->topicActions)) : ?>
								<span class="topic-checkbox-all mod-tools blink-me"><input class="kcheckall " type="checkbox" name="toggle" value="" /></span>			
							<?php endif; ?>
							<span class="topics-h"><i class="uk-icon-file-text-o"></i> Temat</span>
						</div>
						<span class="last-reply-h"><i class="uk-icon-level-up"></i> Ostatnia odpowiedź</span>
						<span class="views-h uk-text-muted">Odsłony</span>
						<span class="replies-h">Odpowiedzi</span>
					</div>	

					<?php
					/** @var KunenaForumTopic $previous */
					$previous = null;

					foreach ($this->topics as $position => $topic) {
						echo $this->subLayout('Category/List/Row')
						->set('topic', $topic)
						->set('spacing', $previous && $previous->ordering != $topic->ordering)
						->set('position', 'kunena_topic_' . $position)
						->set('checkbox', !empty($this->topicActions))
						->setLayout('row');
						$previous = $topic;
					}

					?>
					<footer class="category-footer uk-margin">		 

						<div class="pagination-bottom uk-clearfix uk-margin">
							<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>
						</div>

						<div class="uk-container-center pagination-buttons uk-clearfix"><?php echo $this->subLayout('Pagination/Buttons')->set('pagination', $this->pagination); ?></div>

					</footer>
				</section>
			<?php endif; ?>

		</form>

		<?php
		if (!empty($this->moderators))
			echo $this->subLayout('Category/Moderators')->set('moderators', $this->moderators);
		?>

	<?php endif; ?>
