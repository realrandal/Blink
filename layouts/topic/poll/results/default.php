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

// TODO: Hide KunenaHtmlParser::parseText()


$poll_id = $this->poll->id

?>


<script type="text/javascript">

	jQuery(function($) {
		$(document).ready(function () {
			$('#poll-<?php echo $poll_id; ?>').toggleClass('minimized', $.cookie('sectionToggle<?php echo $poll_id; ?>') === 'on');
			$('#toggler<?php echo $poll_id; ?>').toggleClass('minimized', $.cookie('sectionToggle<?php echo $poll_id; ?>') === 'on');

		});

		$("#toggler<?php echo $poll_id; ?>").click(function () {
			$("#poll-<?php echo $poll_id; ?>").toggleClass("minimized");
			$(this).toggleClass("minimized");
			$.cookie('sectionToggle<?php echo $poll_id; ?>', $("#poll-<?php echo $poll_id; ?>").hasClass('minimized') ? 'on' : 'off');
		}); 

	});

</script>


<div class="uk-navbar poll-title-bar">

	<h2 class="poll-title">
		<?php echo JText::_('COM_KUNENA_POLL_NAME'); ?> <?php echo KunenaHtmlParser::parseText($this->poll->title); ?> 

		<?php echo "<span class='uk-badge uk-badge-success'>".$this->usercount." głosów</span>" ?>
	</h2>

	<?php if ($this->me->isModerator($this->category)) : ?>
		<a class="uk-tip uk-button uk-button-danger uk-float-right" href="#confirm-box" data-uk-modal title="<?php echo JText::_('COM_KUNENA_TOPIC_VOTE_RESET'); ?>"> 
			<i class="uk-icon-trash-o"></i>
		</a>
	<?php endif; ?>

	<a id="toggler<?php echo $poll_id; ?>" class="section-toggler uk-float-right">
		<i class="uk-icon-chevron-down uk-icon-small closed"></i>
		<i class="uk-icon-chevron-left uk-icon-small open"></i>
	</a>

</div>


<?php if ($this->me->isModerator($this->category)) : ?>

	<div id="confirm-box" class="uk-modal">
		<div class="uk-modal-dialog uk-modal-dialog-slide">
			<a class="uk-modal-close uk-close"></a>

			<h3><i class="uk-icon-warning"></i> <?php echo JText::_('COM_KUNENA_TOPIC_MODAL_LABEL_VOTE_RESET'); ?></h3>

			<p><?php echo JText::_('COM_KUNENA_TOPIC_MODAL_DESC_VOTE_RESET'); ?></p>

			<button class="uk-modal-close uk-button uk-button-success">
				<i class="uk-icon-thumbs-up"></i> <?php echo JText::_('COM_KUNENA_TOPIC_MODAL_LABEL_CLOSE_RESETVOTE'); ?>
			</button>

			<a class="uk-button uk-button-danger uk-float-right" href="<?php echo KunenaRoute::_("index.php?option=com_kunena&view=topic&catid={$this->category->id}&id={$this->topic->id}&pollid={$this->poll->id}&task=resetvotes&" . JSession::getFormToken() . '=1') ?>">
				<i class="uk-icon-trash-o"></i> <?php echo JText::_('COM_KUNENA_TOPIC_MODAL_LABEL_CONFIRM_RESETVOTE'); ?>
			</a>

		</div>
	</div>

<?php endif; ?>


	<div class="poll-results-section  forum-section" id="section<?php echo $poll_id; ?>">
		<div class="poll-results  forum-section section-panel"> 

			<?php
			foreach ($this->poll->getOptions() as $option) :
				$percentage = round(($option->votes * 100) / max($this->poll->getTotal(), 1), 1);

			?>

			<div class="poll-result">
				<div class="result-name"> <?php echo KunenaHtmlParser::parseText($option->text); ?>  

					<?php
					if(isset($option->votes) && $option->votes > 0) { 

						echo '<span class=uk-text-muted> - ' .$option->votes  . ' głosów </span>';

					} else 
					{ echo '<span class=uk-text-muted> - ' .  JText::_('COM_KUNENA_POLL_NO_VOTE') . '</span>';        
				}
				?>

			</div>

			<div class="result-bar">		
				<div class="uk-progress">
					<div class="uk-progress-bar" style="width:<?php echo $percentage ; ?>%;"><span class="result-percentage"><?php echo $percentage ?> %</span> </div>
				</div>

			</div>
		</div> 

	<?php endforeach; ?>

</div>
<p class="uk-text-center">	
	<?php
	echo JText::_('COM_KUNENA_POLL_LAST_VOTERS');
	if (!empty($this->users_voted_list)) echo ": ".implode(', ', $this->users_voted_list); ?>
	<?php if ($this->usercount > '5') : ?>

		... <button class="uk-button uk-tip" title="<?php echo JText::_('COM_KUNENA_POLL_VIEW_VOTERS')?>" data-uk-toggle="{target:'#poll-more-users', cls:'blink-me'}"><i class="uk-icon-users"></i></button>

		<div class="blink-me uk-text-center" id="poll-more-users">
			<?php echo implode(', ', $this->users_voted_morelist); ?>.
		</div>

	<?php endif; ?>
</p>


<?php if (!$this->me->exists()) : ?>

	<?php echo JText::_('COM_KUNENA_POLL_NOT_LOGGED'); ?>

<?php elseif ($this->topic->isAuthorised('poll.vote')) : ?>

	<a href="<?php echo KunenaRoute::_("index.php?option=com_kunena&view=topic&layout=vote&catid={$this->category->id}&id={$this->topic->id}"); ?>>">
		<?php echo JText::_('COM_KUNENA_POLL_BUTTON_VOTE'); ?>
	</a>
<?php endif; ?>

</div>