uk-icon-flag<?php
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

/** @var KunenaLayout $this */
/** @var KunenaForumTopic $topic */
$topic = $this->topic;
$topicPages = $topic->getPagination(null, KunenaConfig::getInstance()->messages_per_page, 3);

$cols = empty($this->checkbox) ? 4 : 5;
$hits = $this->topic->getHits();

if (!empty($this->spacing)) : ?>
 
<?php endif; ?>

<article class="topic-row topic-<?php echo $topic->ordering ? 'sticked uk-panel-box-primary' : 'regular'; ?>">

<div class="uk-grid">
	<div class="uk-width-1-1 <?php echo ($topic->getReplies() >0 ) ? 'uk-width-large-7-10' : 'uk-width-large-6-10'; ?> uk-width-medium-6-10">	
<div class="uk-float-left first-user-avatar">
			<?php echo $topic->getFirstPostAuthor()->getLink($topic->getFirstPostAuthor()->getAvatarImage('topic-list-avatar topic-list-avatar-first', 64, 64)); ?>
			</div>

			<div class="uk-float-left topic-icon">
				<?php echo $this->getTopicLink($topic, 'unread', $topic->getIcon()); ?>
			</div>
			


			<div class="uk-float-left">
				<h4 class="category-topic-title">
					<?php echo $this->getTopicLink($topic); ?>

					<?php
					if ($topic->unread) {
						echo $this->getTopicLink($topic, 'unread', '<span dir="ltr" class="uk-badge uk-badge-success">' . (int) $topic->unread
							. ' ' . JText::_('COM_KUNENA_A_GEN_NEWCHAR') . '</span>');
					}
					?>
				</h4> 

			<?php if ($userTopic->favorite) : ?>
				<i class="uk-icon-star"></i> <?php JText::_('COM_KUNENA_FAVORITE'); ?>
			<?php endif; ?>

			<?php if ($userTopic->posts) : ?>
				<i class="uk-icon-flag color-orange"></i> <?php JText::_('COM_KUNENA_MYPOSTS'); ?>
			<?php endif; ?>
			
			<?php if ($this->topic->attachments) : ?>
				<i class="uk-cloud-picture-o"></i> <?php JText::_('COM_KUNENA_ATTACH'); ?>
			<?php endif; ?>
			
			<?php if ($this->topic->poll_id) : ?>
				<i class="uk-icon-bar-chart-o"></i> <?php JText::_('COM_KUNENA_ADMIN_POLLS'); ?>
			<?php endif; ?>		

			<?php if ($topic->locked != 0) : ?>
				<i class="uk-icon-bar-chart-o"></i> <?php JText::_('COM_KUNENA_LOCKED_TOPIC'); ?>
			<?php endif; ?>		

					<author class="uk-link-muted text-smaller"><?php echo $topic->getFirstPostAuthor()->getLink(); ?></author> ›
					<time class="timeago uk-text-muted uk-text-small topic-date" datetime="<?php echo $topic->getFirstPostTime()->toISO8601(); ?>"><?php echo $topic->getFirstPostTime()->toKunena('config_post_dateformat'); ?></time>
			</div>

 <?php if ($topic->getReplies() >0 ) : ?>  
 
			<span title="<?php echo $topic->getReplies(); ?><?php echo JText::_('COM_KUNENA_GEN_REPLIES'); ?>" class="replies"><?php echo $topic->getReplies(); ?></span>
			<span title="<?php echo $hits; ?><?php echo JText::_('COM_KUNENA_GEN_HITS'); ?>" class="views uk-text-muted" ><?php echo $hits; ?></span>

			<div class="uk-float-right uk-hidden-small">
				<?php echo $this->subLayout('Pagination/List')->set('pagination', $topicPages)->setLayout('simple'); ?>
			</div>	
	</div>

	

		<div class="uk-width-1-1 uk-width-large-3-10 uk-width-medium-4-10 last-post">	
			<div class="uk-float-left user-avatar">
				<?php echo $topic->getLastPostAuthor()->getLink($topic->getLastPostAuthor()->getAvatarImage('topic-list-avatar', 64)); ?>
			<i class="uk-icon-level-up latest-reply-icon uk-visible-small"></i>
			</div>
			<div class="uk-float-left last-post-author">	 	
				<div><?php echo $topic->getLastPostAuthor()->getLink(); ?></div>
				<time class="timeago uk-text-muted uk-text-small topic-date" datetime="<?php echo $topic->getLastPostTime()->toISO8601(); ?>"><?php echo $topic->getLastPostTime()->toKunena('config_post_dateformat'); ?></time>
			</div>

			<?php if (!empty($this->checkbox)) : ?>
				<div class="uk-float-right topic-checkbox"><input class ="kcheck" type="checkbox" name="topics[<?php echo $topic->displayField('id'); ?>]" value="1" /></div>
			<?php endif; ?> 

			<?php echo $this->getTopicLink($topic, 'last', '»', null, 'uk-float-right last-post-link'); ?>

		</div>



	<?php else: ?>

		</div>



<script>
jQuery(function($) {
 
	$(document).ready(function() {
	    var quotes = new Array(
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi. Zostaw pierszą <i class='uk-icon-hand-o-right'></i>",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"<?php echo $hits; ?> odsłon. Brak odpowiedzi.",
	    	"Jeden zapytuje, a <?php echo $hits; ?> się przypatruje.",
	    	"<?php echo $hits; ?> gapiów - 0 reakcji... Bezcenne :P",
	    	"<?php echo $hits; ?> odsłon bez odpowiedzi? Hej, Przywitaj gościa!", 
	    	"<p>Już <?php echo $hits; ?> razy wyświetlano tę wiadomość... <br>No dalej, do odważnych świat należy!  <i class='uk-icon-hand-o-right'></i> Odpowiedz</p>", 
	    	"Obywatelu! [...] bla! bla, bla. ;) ...POMOŻECIE?"
	    ),
	    randno = quotes[Math.floor( Math.random() * quotes.length )];
	    $('.react-please-<?php echo $topic->id?>').html( randno );
	});

});
</script>

		<div class="uk-width-4-10 last-post">	

		<div class="uk-text-muted uk-float-left uk-text-small no-replies-info">  
			<div class="react-please-<?php echo $topic->id?>"><?php echo $hits; ?> odsłon. Brak odpowiedzi.</div> 
		</div>

		<?php if (!empty($this->checkbox)) : ?>
			<div class="uk-float-right topic-checkbox"><input class ="kcheck" type="checkbox" name="topics[<?php echo $topic->displayField('id'); ?>]" value="1" /></div>
		<?php endif; ?> 		

		<?php echo $this->getTopicLink($topic, 'last', '»', 'Zobacz tę wiadomość', 'uk-float-right last-post-link'); ?>

	</div>

	<?php endif ?>

</div>

	<?php
	if (!empty($this->position))
		echo $this->subLayout('Page/Module')
			->set('position', $this->position)
			->set('cols', $cols)
			->setLayout('table_row');
	?>
</article>