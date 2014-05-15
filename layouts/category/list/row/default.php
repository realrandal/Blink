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

/** @var KunenaLayout $this */
/** @var KunenaForumTopic $topic */
$topic = $this->topic;
$topicPages = $topic->getPagination(null, KunenaConfig::getInstance()->messages_per_page, 3);

// FIXME TODO - We want to display last 3 or 4 pages. It would be nice even not display first page if there are more than 3 or 4 pages. Don't need any dots here.
// $topicPages->setDisplayedPages(0, 0, 0); 


$userTopic = $topic->getUserTopic();

$cols = empty($this->checkbox) ? 4 : 5;
$hits = $this->topic->getHits();

if (!empty($this->spacing)) : ?>

<?php endif; ?>

<article class="topic-row topic-<?php echo $topic->ordering ? 'sticked uk-panel-box-primary' : 'regular'; ?>">
 
	<div class="topic-info">		
			<?php if (!empty($this->checkbox)) : ?>
				<span class="uk-float-left topic-checkbox mod-tools blink-me"><input class ="kcheck" type="checkbox" name="topics[<?php echo $topic->displayField('id'); ?>]" value="1" /></span>
			<?php endif; ?>	

			<?php echo $topic->getFirstPostAuthor()->getLink($topic->getFirstPostAuthor()->getAvatarImage('topic-list-avatar topic-list-avatar-first', 70, 70), null, null, null, 'topic-author-avatar'); ?>

			<?php echo $this->getTopicLink($topic, 'unread', $topic->getIcon(), null, 'topic-icon'); ?>
 
		<header class="topic-desc">		
					<h4 class="category-topic-title">
							<?php echo $this->getTopicLink($topic); ?>
		
					  		<?php if ($userTopic->favorite) :  
								echo $this->getIcon('star color-yellow', JText::_('COM_KUNENA_FAVORITE'));
							endif; 
		
							if ($userTopic->subscribed) :  
								echo $this->getIcon('envelope-o color-violet', JText::_('COM_KUNENA_SUBSCRIBED'));
							endif; 
		
							if ($userTopic->posts) :  
								echo $this->getIcon('pencil color-green', JText::_('COM_KUNENA_MYPOSTS'));
							endif; 
		
							if ($this->topic->attachments) :  
								echo $this->getIcon('paperclip uk-text-muted', JText::_('COM_KUNENA_ATTACH'));
							endif; 
		
							if ($this->topic->poll_id) : 
		 						echo $this->getTopicLink($topic, null, ' ' . $this->getIcon('bar-chart-o') . ' '. JText::_('COM_KUNENA_POLL').' ', JText::_('COM_KUNENA_TOPIC_POLL_INFO'), 'uk-button uk-button-danger uk-button-mini uk-tip-slow');  
							endif; 
		
							if ($topic->locked != 0) : 
								echo $this->getIcon('lock', JText::_('COM_KUNENA_LOCKED_TOPIC'));
							endif; ?>
		
							<?php if ($topic->unread) {
								echo $this->getTopicLink($topic, 'unread', '' . (int) $topic->unread . '', null, 'uk-button uk-text-success uk-button-mini uk-tip-slow');
							}
		
							?>
						</h4> 
		
						<author class="uk-link-muted text-smaller"><?php echo $topic->getFirstPostAuthor()->getLink(null, null, null, null, 'user-link'); ?></author> ›
						<time class="reply-date timeago uk-text-muted uk-text-small" datetime="<?php echo $topic->getFirstPostTime()->toISO8601(); ?>"><?php echo $topic->getFirstPostTime()->toKunena('config_post_dateformat'); ?></time>
						
		</header>
	</div>	

			<?php if ($topic->getReplies() >0 ) : ?>  

				<div class="last-reply-info">		
						<?php echo $this->getTopicLink($topic, 'last', '»', null, 'last-reply-link uk-tip-slow'); ?>				
						<?php echo $topic->getLastPostAuthor()->getLink($topic->getLastPostAuthor()->getAvatarImage('topic-list-avatar', 70, 70),  null, null, null, 'last-reply-avatar'); ?>
						<i class="uk-icon-level-up latest-reply-icon"></i>	
						<author class="last-reply-author"><?php echo $topic->getLastPostAuthor()->getLink(); ?></author>
						<time class="timeago uk-text-muted uk-text-small topic-date" datetime="<?php echo $topic->getLastPostTime()->toISO8601(); ?>"><?php echo $topic->getLastPostTime()->toKunena('config_post_dateformat'); ?></time>
				</div>	
								 			 
				<span title="<?php echo $hits; ?> <?php echo JText::_('COM_KUNENA_GEN_HITS'); ?>" class="views uk-text-muted" ><?php echo $hits; ?></span>
				<span title="<?php echo $topic->getReplies(); ?> <?php echo JText::_('COM_KUNENA_GEN_REPLIES'); ?>" class="replies"><?php echo $topic->getReplies(); ?></span>
 				
				<?php echo $this->subLayout('Pagination/List')->set('pagination', $topicPages)->setLayout('simple'); ?>
				 
	
	<?php else: ?>
 
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

<div class="last-reply-info no-reply-info">	
		<div class="uk-text-muted uk-float-left uk-text-small no-replies-info">  
			<span class="react-please-<?php echo $topic->id?>"><?php echo $hits; ?> odsłon. Brak odpowiedzi.</span> 
		</div>

		<?php echo $this->getTopicLink($topic, 'last', '»', 'Zobacz tę wiadomość', 'last-reply-link'); ?>
</div>

<?php endif ?>

</article>

<?php
if (!empty($this->position))
	echo $this->subLayout('Page/Module')
->set('position', $this->position)
->set('cols', $cols)
->setLayout('table_row');
?>