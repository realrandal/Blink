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

		

		<?php if ($this->topicButtons->get('reply')
			|| $this->topicButtons->get('subscribe')
			|| $this->topicButtons->get('favorite')) : ?>

 				<?php echo $this->topicButtons->get('reply') ?>
				<?php echo $this->topicButtons->get('subscribe') ?>
				<?php echo $this->topicButtons->get('favorite') ?>

		<?php endif ?>

		<?php if ($this->topicButtons->get('delete')
			|| $this->topicButtons->get('moderate')
			|| $this->topicButtons->get('sticky')
			|| $this->topicButtons->get('lock')) : ?>

		<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">

		    <button class="uk-button"><i class="uk-icon-cog"></i> <i class="uk-icon-caret-down"></i></button>

		    <div class="uk-dropdown uk-dropdown-small">
		        <ul class="uk-nav uk-nav-dropdown">
					<?php echo $this->topicButtons->get('delete') ?>
					<?php echo $this->topicButtons->get('moderate') ?>
					<?php echo $this->topicButtons->get('sticky') ?>
					<?php echo $this->topicButtons->get('lock') ?>
		        </ul>
		    </div>

		</div>

		<?php endif ?>

		<?php if ($this->topicButtons->get('flat')
			|| $this->topicButtons->get('threaded')
			|| $this->topicButtons->get('indented')) : ?>

				<?php echo $this->topicButtons->get('flat') ?>
				<?php echo $this->topicButtons->get('threaded') ?>
				<?php echo $this->topicButtons->get('indented') ?>

		<?php endif ?>

	

<!-- 		<div class="search-field">
			<?php echo $this->subLayout('Search/Button')
				->set('id', $this->topic->id)
				->set('title', JText::_('COM_KUNENA_SEARCH_TOPIC')); ?>
		</div> -->