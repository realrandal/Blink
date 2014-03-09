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
?>

<article class="topic-message">
	<div class="uk-grid">	

		<?php echo $this->subLayout('User/Profile')->set('user', $this->profile)->setLayout('default'); ?>

		<div class="uk-width-custom message-box">
			<div class="topic-message-content uk-clearfix"> 
				<?php echo $this->subLayout('Message/Item')->setProperties($this->getProperties()); ?>
				<?php echo $this->subLayout('Message/Edit')->set('message', $this->message)->setLayout('quickreply'); ?>
				<?php echo $this->subRequest('Message/Item/Actions')->set('mesid', $this->message->id); ?>
			</div>
		</div>
		
		<?php echo $this->subLayout('Page/Module')->set('position', 'kunena_msg_' . $this->location); ?>

	</div>	
</article>

<?php echo $this->subLayout('Page/Module')->set('position', 'kunena_msg_' . $this->location); ?>
