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

$mmm=0;
/** @var KunenaForumCategory $section */
foreach ($this->sections as $section) :
	$markReadUrl = $section->getMarkReadUrl();
?>


<section id="forum-section-<?php echo $section->id; ?>" class="uk-margin uk-margin-top forum-section open"  >

	<?php if (count($this->sections) > 0) : ?>

	<a id="toggler<?php echo $section->id; ?>" title="Ukryj/Pokaż sekcję" class="section-toggler uk-float-right uk-tip">
	    <i class="uk-icon-chevron-down uk-icon-small closed"></i>
	    <i class="uk-icon-chevron-left uk-icon-small open"></i>
	</a>

	<script type="text/javascript">

		jQuery(function($) {
		$(document).ready(function () {
		    $('#forum-section-<?php echo $section->id; ?>').toggleClass('minimized', $.cookie('sectionToggle<?php echo $section->id; ?>') === 'on');
		    $('#toggler<?php echo $section->id; ?>').toggleClass('minimized', $.cookie('sectionToggle<?php echo $section->id; ?>') === 'on');
		  
		});

		$("#toggler<?php echo $section->id; ?>").click(function () {
		    $("#forum-section-<?php echo $section->id; ?>").toggleClass("minimized");
		    $(this).toggleClass("minimized");
		    $.cookie('sectionToggle<?php echo $section->id; ?>', $("#forum-section-<?php echo $section->id; ?>").hasClass('minimized') ? 'on' : 'off');
		}); 

		});

	</script>

	<?php endif; ?>
  
	<header class="uk-navbar section-header">
		<h2 class="section-title">
		<?php if ($section->parent_id) : ?>
		<?php echo $this->getCategoryLink($section->getParent(), $this->escape($section->getParent()->name)); ?> /
		<?php endif; ?>

		<?php echo $this->getCategoryLink($section, $this->escape($section->name)); ?>
		</h2>

		<small class="section-topics uk-text-muted">(<?php echo JText::plural('COM_KUNENA_X_TOPICS', $section->getTopics()); ?>)</small>

<?php if ($section->isSection()) : ?>

		<?php if ($markReadUrl) : ?>
		<a title="<?php echo JText::_('COM_KUNENA_MARK_CATEGORIES_READ') ?>" class="uk-button uk-button-small section-mark-read uk-tip" href="<?php echo $markReadUrl; ?>">
			<i class="uk-icon-check-square"></i>
		</a>
		<?php endif; ?>

<?php endif; ?>

	</header>

<div class="<?php echo $this->escape($section->class_sfx); ?>" id="section<?php echo $section->id; ?>">
	<div class="uk-margin section-panel">

<?php if ($section->isSection()) : ?>

	<div class="categories-headings uk-clearfix">
		<div class="category-h-box">
			<?php if (!empty($this->actions)) : ?>
				<span class="topic-checkbox-all mod-tools blink-me"><input class="kcheckall " type="checkbox" name="toggle" value="" /></span>			
			<?php endif; ?>
			<span class="category-h"><i class="uk-icon-folder-o"></i> Kategoria</span>
		</div>
		<span class="cat-last-post-h"><i class="uk-icon-file-o"></i> Najnowsza wiadomość</span>
		<span class="cat-replies-h">Odpowiedzi</span>
		<span class="cat-topics-h uk-text-info">Tematy</span>
	</div>	

<?php endif; ?>

		<?php if ($this->me->exists()) : ?>

		<?php if ($this->me->isAdmin($section)) : ?>
		<?php // FIXME: translate and implement. ?>
		<!-- <button class="uk-button btn-small">Approve Posts</button> -->
		<?php endif; ?>

		<?php endif; ?>	

		<?php if (!empty($section->description)) : ?>
 			<div class="section-description"><?php echo $section->displayField('description'); ?></div>	 
		<?php endif; ?>

		<?php if ($section->isSection() && empty($this->categories[$section->id]) && empty($this->more[$section->id])) : ?>
 			<h4 class="section-title"><?php echo JText::_('COM_KUNENA_GEN_NOFORUMS'); ?></h4>
		<?php else : ?>

		<?php
			/** @var KunenaForumCategory $category */
			foreach ($this->categories[$section->id] as $category) : ?>
		<div class="topic-row forum-category <?php echo $this->escape($category->class_sfx); ?>" id="category<?php echo $category->id; ?>">
			<?php /* FIXME: implement category icons.
			<div class="tede span1">
				<?php echo $this->getCategoryLink($category, $this->getCategoryIcon($category), ''); ?>
			</div> */ ?>

 		 

			<div class="category-info">

			<span class="category-icon uk-tip" <?php if (!empty($category->description)) : ?> title="<?php echo $category->displayField('description'); ?>"<?php endif; ?>>	
					<?php if (!empty($category->description)) : ?> <i class="uk-icon-info-circle category-icon-i"></i><?php endif; ?>	 				 		
					<i class="uk-icon-folder-open-o uk-icon-medium"></i>
			</span>

				<header class="category-desc">
					<h3 class="category-title-name uk-float-left">
						<?php echo $this->getCategoryLink($category); ?>
						
						<?php
						if (($new = $category->getNewCount()) > 0) {
							echo '<span class="new-badge uk-badge uk-badge-success">' . $new . ' ' . JText::_('COM_KUNENA_A_GEN_NEWCHAR') . '</span>';
						}
						if ($category->locked) {
							echo $this->getIcon('lock', JText::_('COM_KUNENA_LOCKED_CATEGORY'));
						}
						if ($category->review) {
							echo $this->getIcon('user', JText::_('COM_KUNENA_GEN_MODERATED'));
						}
						?>

					</h3>

				</header>			

				<?php
				// Display subcategories
				if (!empty($this->categories[$category->id])) : ?>
				<ul class="inline">

					<?php foreach ($this->categories[$category->id] as $subcategory) : ?>
					<li>
						<?php
						// FIXME: Implement small category icons.
						//echo $this->getCategoryIcon($subcategory, true);
						echo $this->getCategoryLink($subcategory) . '<small class="hidden-phone muted"> ('
							. JText::plural('COM_KUNENA_X_TOPICS', $this->formatLargeNumber($subcategory->getTopics()))
							. ')</small>';
						?>
					</li>
					<?php endforeach; ?>
					<?php if (!empty($this->more[$category->id])) : ?>
					<li>
						<?php echo $this->getCategoryLink($category, JText::_('COM_KUNENA_SEE_MORE')); ?>
						<small class="hidden-phone muted">
							(<?php echo JText::sprintf('COM_KUNENA_X_HIDDEN', (int) $this->more[$category->id]); ?>)
						</small>
					</li>
					<?php endif; ?>

				</ul>
				<?php endif; ?>

				<?php if (!empty($this->pending[$category->id])) : ?>
				<div class="alert">
					<?php echo JHtml::_('kunenaforum.link', 'index.php?option=com_kunena&view=topics&layout=posts&mode=unapproved&userid=0&catid='.intval($category->id),
						intval($this->pending[$category->id]) . ' ' . JText::_('COM_KUNENA_SHOWCAT_PENDING'),
						'', '', 'nofollow'); ?>
				</div>
				<?php endif; ?>

			</div>

			<?php $last = $category->getLastTopic(); ?>

			<?php if (!$last->exists()) : ?>
			<div class="tede tede2" colspan="2" class="span3 hidden-phone"><?php echo JText::_('COM_KUNENA_NO_POSTS'); ?></div>
			<?php else :
				$author = $last->getLastPostAuthor();
				$time = $last->getLastPostTime();
				$avatar = $this->config->avataroncat > 0 ? $author->getAvatarImage('last-post-avatar', 70, 70) : null;
			?>

			<div class="last-post-info">
				<?php if ($avatar) : ?>
					<?php echo $author->getLink($avatar); ?>
				<?php endif; ?>

			<?php echo $this->getLastPostLink($category, null, null, 'last-post-link uk-tip-slow') ?>

			<author class="uk-link-muted text-smaller"><?php echo JText::sprintf($author->getLink()); ?></author> ›
			<time class="post-date timeago uk-text-muted uk-text-small" datetime="<?php echo $time->toISO8601(); ?>"><?php echo $time->toKunena('config_post_dateformat'); ?></time>

			</div>
			<?php endif; ?>

			<span title="<?php echo JText::plural('COM_KUNENA_X_REPLIES', $category->getReplies()); ?>" class="cat-replies"><?php echo $category->getReplies(); ?></span>
			<span title="<?php echo JText::plural('COM_KUNENA_X_Topics', $category->getTopics()); ?>" class="cat-topics uk-text-info"><?php echo $category->getTopics(); ?></span>			 			 

		</div>
		<?php endforeach; ?>

		<?php endif; ?>

		<?php if (!empty($this->more[$section->id])) : ?>
		<div class="trtt">
			<div class="tede tede2" colspan="3">
				<h4>
					<?php echo $this->getCategoryLink($section, JText::sprintf('COM_KUNENA_SEE_ALL_SUBJECTS')); ?>
					<small>(<?php echo JText::sprintf('COM_KUNENA_X_HIDDEN', (int) $this->more[$section->id]); ?>)</small>
				</h4>
			</div>
		</div>
		<?php endif; ?>

	</div>
</div>

</section>


<?php echo $this->subLayout('Page/Module')->set('position', 'kunena_section_' . ++$mmm); ?>

<?php endforeach; ?>
